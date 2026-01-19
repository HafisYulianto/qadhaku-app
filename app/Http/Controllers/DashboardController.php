<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuasaDebt;
use App\Models\PuasaLog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Menampilkan Halaman Dashboard
    public function index()
    {
        $user = Auth::user();
        $debt = PuasaDebt::where('user_id', $user->id)->with('logs')->first();

        // 1. DATA QUOTES (Kata Mutiara)
        $quotes = [
            "Puasa itu perisai, yang dengannya seorang hamba membentengi diri dari api neraka.",
            "Barangsiapa berpuasa satu hari di jalan Allah, maka Allah akan menjauhkan wajahnya dari neraka sejauh tujuh puluh tahun perjalanan.",
            "Waktu terbaik untuk melunasi hutang adalah hari ini, jangan tunda sampai Ramadhan tiba.",
            "Allah menyukai amal yang sedikit namun terus menerus (istiqomah).",
            "Kesabaran itu separuh iman, dan puasa itu separuh kesabaran."
        ];
        // Pilih satu secara acak
        $randomQuote = $quotes[array_rand($quotes)];


        // 2. LOGIKA HITUNG MUNDUR RAMADHAN (DINAMIS SAMPAI 2030)
        // Prediksi tanggal 1 Ramadhan (Bisa diupdate jika ada perubahan)
        $daftarRamadhan = [
            '2026-02-18', 
            '2027-02-08', 
            '2028-01-28',
            '2029-01-16', 
            '2030-01-06'
        ];

        $targetRamadhan = null;
        
        // Cari tanggal Ramadhan yang belum lewat
        foreach($daftarRamadhan as $tgl) {
            $date = \Carbon\Carbon::parse($tgl);
            
            // Jika tanggal di list >= hari ini, maka itu targetnya
            if($date->gte(now()->startOfDay())) {
                $targetRamadhan = $date;
                break; // Ketemu! Berhenti looping.
            }
        }

        // Fallback: Jika list tahun habis (misal sudah tahun 2031), set otomatis setahun lagi
        if(!$targetRamadhan) {
            $targetRamadhan = now()->addYear(); 
        }

        // Hitung selisih hari
        $daysToRamadan = now()->diffInDays($targetRamadhan, false);
        $daysToRamadan = $daysToRamadan < 0 ? 0 : (int)$daysToRamadan;
        
        // Ambil tahun target (untuk ditampilkan di Widget)
        $tahunRamadhan = $targetRamadhan->year;


        // 3. ESTIMASI LUNAS (Asumsi Puasa Senin-Kamis)
        $estimasiLunas = null;
        if($debt && $debt->sisa_hutang > 0) {
            // Asumsi: Seminggu bayar 2 hari (Senin & Kamis)
            $weeksNeeded = ceil($debt->sisa_hutang / 2); 
            $estimasiLunas = now()->addWeeks($weeksNeeded)->format('d M Y');
        }
        
        return view('dashboard', compact('debt', 'randomQuote', 'daysToRamadan', 'estimasiLunas', 'tahunRamadhan'));
    }

    // Menyimpan Target Hutang Awal
    public function storeDebt(Request $request)
    {
        $request->validate([
            'total_hutang' => 'required|integer|min:1',
            'target_selesai' => 'nullable|date'
        ]);

        PuasaDebt::create([
            'user_id' => Auth::id(),
            'total_hutang' => $request->total_hutang,
            'sisa_hutang' => $request->total_hutang, // Awalnya sisa = total
            'target_selesai' => $request->target_selesai
        ]);

        return back()->with('success', 'Bismillah! Target hutang berhasil dicatat.');
    }

    // Menyimpan Cicilan Puasa (Log Harian)
    public function storeLog(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_hari' => 'required|integer|min:1'
        ]);

        $debt = PuasaDebt::where('user_id', Auth::id())->first();

        // Validasi: Tidak boleh bayar lebih dari sisa hutang
        if($request->jumlah_hari > $debt->sisa_hutang) {
            return back()->with('error', 'Jumlah hari melebihi sisa hutang Anda!');
        }

        // Transaksi Database (Agar data aman)
        DB::transaction(function() use ($request, $debt) {
            // 1. Buat Log Riwayat
            $debt->logs()->create([
                'tanggal' => $request->tanggal,
                'jumlah_hari' => $request->jumlah_hari
            ]);

            // 2. Kurangi Sisa Hutang
            $debt->decrement('sisa_hutang', $request->jumlah_hari);
        });

        // Cek jika sudah lunas
        if ($debt->fresh()->sisa_hutang == 0) {
            return back()->with('success', 'Alhamdulillah! Hutang Puasa Anda LUNAS!');
        }

        return back()->with('success', 'Alhamdulillah! Puasa tercatat.');
    }

    // Menghapus Riwayat (Batalkan Puasa)
    public function destroyLog($id)
    {
        $log = PuasaLog::findOrFail($id);
        $debt = $log->debt;

        // Pastikan yang menghapus adalah pemilik data
        if($debt->user_id != Auth::id()) {
            abort(403);
        }

        DB::transaction(function() use ($log, $debt) {
            // Kembalikan jumlah hari ke sisa hutang
            $debt->increment('sisa_hutang', $log->jumlah_hari);
            
            // Hapus log
            $log->delete();
        });

        return back()->with('success', 'Riwayat dihapus, sisa hutang dikembalikan.');
    }

    // UPDATE HANYA TOTAL AWAL (Sisa Hutang Dihitung Ulang Otomatis)
    public function updateDebt(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'total_hutang' => 'required|integer|min:1'
        ]);

        $debt = PuasaDebt::where('user_id', Auth::id())->first();

        // 2. Hitung berapa hari yang SUDAH dibayar (dari riwayat logs)
        $sudah_dibayar = $debt->logs()->sum('jumlah_hari');

        // 3. Validasi Logika: Total baru tidak boleh lebih kecil dari yang sudah dibayar
        // (Contoh: Sudah bayar 5 hari, tidak mungkin Total diubah jadi 3 hari)
        if($request->total_hutang < $sudah_dibayar) {
            return back()->with('error', 'Gagal update! Total hutang tidak boleh lebih kecil dari jumlah puasa yang sudah Anda kerjakan (' . $sudah_dibayar . ' hari).');
        }

        // 4. Update Total Baru & Hitung Ulang Sisa
        // Rumus: Sisa = Total Baru - Sudah Dibayar
        $debt->update([
            'total_hutang' => $request->total_hutang,
            'sisa_hutang' => $request->total_hutang - $sudah_dibayar
        ]);

        return back()->with('success', 'Total hutang diperbarui. Sisa hutang otomatis disesuaikan.');
    }
}