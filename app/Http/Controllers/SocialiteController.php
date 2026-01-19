<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    // 1. Mengarahkan user ke halaman Login Google
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    // 2. Menerima balikan data dari Google
    public function callback()
    {
        try {
            // Ambil data user dari Google
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah user ini sudah ada (berdasarkan Google ID atau Email)
            $user = User::where('google_id', $googleUser->getId())
                        ->orWhere('email', $googleUser->getEmail())
                        ->first();

            if ($user) {
                // Jika user ada, kita UPDATE data google_id & avatar
                // Supaya kalau user ganti foto di Google, di aplikasi kita ikut berubah
                $user->update([
                    'google_id' => $googleUser->getId(),
                    'avatar'    => $googleUser->getAvatar()
                ]);
                
                // Login-kan user
                Auth::login($user);
                return redirect('/dashboard');
            
            } else {
                // Jika user belum ada, buat user baru + Simpan Fotonya
                $newUser = User::create([
                    'name'      => $googleUser->getName(),
                    'email'     => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'avatar'    => $googleUser->getAvatar(), // <--- INI BAGIAN PENTINGNYA
                    'password'  => Hash::make(Str::random(16)), // Password acak
                ]);

                Auth::login($newUser);
                return redirect('/dashboard');
            }

        } catch (\Exception $e) {
            // Jika gagal, kembalikan ke halaman login
            return redirect('/login')->with('error', 'Gagal login dengan Google, coba lagi.');
        }
    }
}