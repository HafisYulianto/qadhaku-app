<x-app-layout>
    <div x-data="{ showDeleteModal: false, deleteAction: '' }">

        <div class="bg-[#1A4D2E] h-48 w-full absolute top-16 left-0 -z-10 rounded-b-[3rem] shadow-md"></div>

        <div class="py-8">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

                @if(session('success'))
                    <div x-data="{ show: true }" x-show="show" class="bg-[#D4AF37] text-white px-6 py-4 rounded-2xl shadow-lg flex items-center justify-between mb-6 animate-bounce">
                        <div class="flex items-center gap-3 font-bold text-lg">
                            <span class="text-2xl">✨</span> {{ session('success') }}
                        </div>
                        <button @click="show = false" class="text-white hover:text-gray-200 text-2xl font-bold">&times;</button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-500 text-white px-6 py-4 rounded-2xl shadow-lg mb-6 font-bold">
                        ⚠️ {{ session('error') }}
                    </div>
                @endif

                @if(!$debt) 
                    
                    <div class="bg-white rounded-3xl shadow-2xl p-8 mt-16 text-center relative overflow-hidden border border-gray-100">
                        <div class="absolute top-0 left-0 w-full h-3 bg-[#D4AF37]"></div>
                        <div class="w-24 h-24 bg-[#1A4D2E] text-[#D4AF37] rounded-full flex items-center justify-center mx-auto mb-6 text-4xl shadow-xl border-4 border-white -mt-16">
                            🤲
                        </div>
                        <h3 class="text-3xl font-extrabold text-[#1A4D2E] mb-3">Bismillah, Mulai Niat Qadha</h3>
                        <p class="text-gray-500 mb-8 text-lg max-w-md mx-auto">
                            "Hutang kepada Allah lebih berhak untuk ditunaikan."
                        </p>
                        <form action="{{ route('debt.store') }}" method="POST" class="max-w-md mx-auto space-y-5">
                            @csrf
                            <div class="text-left">
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Total Hutang Puasa (Hari)</label>
                                <input type="number" name="total_hutang" class="w-full border-gray-200 rounded-2xl py-4 px-5 focus:ring-[#D4AF37] focus:border-[#D4AF37] bg-gray-50 text-xl font-bold text-center" placeholder="30" required>
                            </div>
                            <div class="text-left">
                                <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Target Selesai (Opsional)</label>
                                <input type="date" name="target_selesai" class="w-full border-gray-200 rounded-2xl py-4 px-5 focus:ring-[#D4AF37] focus:border-[#D4AF37] bg-gray-50">
                            </div>
                            <button type="submit" class="w-full bg-[#D4AF37] hover:bg-[#b8952b] text-white font-bold py-4 rounded-2xl shadow-xl transition transform hover:-translate-y-1 active:scale-95 text-lg mt-4">
                                Simpan Target Saya 🚀
                            </button>
                        </form>
                    </div>

                @else
                    
                    <div class="bg-white rounded-3xl shadow-lg p-8 relative overflow-hidden mb-6" x-data="{ editMode: false }">
                        <div class="absolute right-0 top-0 opacity-5 pointer-events-none">
                            <svg width="250" height="250" viewBox="0 0 200 200"><path fill="#1A4D2E" d="M45.7,-76.4C58.9,-69.3,69.1,-56.3,76.6,-42.1C84.1,-27.9,88.9,-12.5,86.6,1.8C84.3,16.1,74.9,29.3,65.1,41.2C55.3,53.1,45.1,63.7,33.1,70.8C21.1,77.9,7.3,81.5,-5.6,79.8C-18.5,78.1,-30.5,71.1,-41.6,63.1C-52.7,55.1,-62.9,46.1,-70.8,35.1C-78.7,24.1,-84.3,11.1,-82.9,-1.1C-81.5,-13.3,-73.1,-24.7,-64.1,-34.8C-55.1,-44.9,-45.5,-53.7,-34.7,-62.1C-23.9,-70.5,-11.9,-78.5,1.5,-80.9C15,-83.2,32.5,-79.8,45.7,-76.4Z" transform="translate(100 100)" /></svg>
                        </div>

                        <form action="{{ route('debt.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="grid grid-cols-2 gap-8 text-center relative z-10">
                                
                                <div class="border-r border-gray-100 pr-4 flex flex-col items-center justify-center relative">
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Total Awal</p>
                                    
                                    <div x-show="!editMode" class="flex items-center gap-2">
                                        <p class="text-4xl font-extrabold text-[#1A4D2E]">{{ $debt->total_hutang }}</p>
                                        <button type="button" @click="editMode = true" class="text-gray-300 hover:text-[#D4AF37] transition p-1.5 bg-gray-50 rounded-full hover:bg-gray-100" title="Koreksi Total Hutang">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <span x-show="!editMode" class="text-sm font-medium text-gray-400 bg-gray-50 px-2 py-1 rounded-md mt-2 inline-block">Hari</span>

                                    <div x-show="editMode" style="display: none;" class="flex flex-col items-center animate-fade-in-up mt-1">
                                        <input type="number" name="total_hutang" value="{{ $debt->total_hutang }}" 
                                               class="w-24 text-center border-2 border-[#1A4D2E] rounded-xl text-xl font-bold text-[#1A4D2E] p-2 focus:ring-[#D4AF37] focus:border-[#D4AF37]">
                                        <div class="flex gap-2 mt-2">
                                            <button type="submit" class="bg-[#1A4D2E] text-white text-xs px-3 py-1.5 rounded-lg hover:bg-green-800 transition font-bold">Simpan</button>
                                            <button type="button" @click="editMode = false" class="bg-gray-200 text-gray-600 text-xs px-3 py-1.5 rounded-lg hover:bg-gray-300 transition">Batal</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="pl-4 flex flex-col items-center justify-center">
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-1">Sisa Hutang</p>
                                    <p class="text-5xl font-extrabold text-[#D4AF37] drop-shadow-sm">{{ $debt->sisa_hutang }}</p>
                                    <span class="text-sm font-medium text-white bg-[#D4AF37] px-2 py-1 rounded-md mt-2 inline-block shadow-sm">Hari Lagi</span>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-3xl shadow-md p-6 border border-gray-50 mb-6">
                        <div class="flex justify-between items-end mb-4">
                            <div>
                                <h3 class="font-bold text-[#1A4D2E] text-lg">Progress Ibadah</h3>
                                @if($debt->target_selesai)
                                    <p class="text-xs text-gray-400 mt-1">Target Lunas: <span class="text-[#D4AF37] font-bold">{{ \Carbon\Carbon::parse($debt->target_selesai)->format('d M Y') }}</span></p>
                                @endif
                            </div>
                            <span class="text-3xl font-extrabold text-[#1A4D2E]">
                                {{ round((($debt->total_hutang - $debt->sisa_hutang) / $debt->total_hutang) * 100) }}<span class="text-lg">%</span>
                            </span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-5 overflow-hidden shadow-inner">
                            <div class="bg-gradient-to-r from-[#1A4D2E] to-[#4ade80] h-5 rounded-full transition-all duration-1000 shadow-md relative flex items-center justify-end" 
                                 style="width: {{ (($debt->total_hutang - $debt->sisa_hutang) / $debt->total_hutang) * 100 }}%">
                                 <div class="w-1 h-full bg-white opacity-40 blur-sm"></div>
                            </div>
                        </div>
                        @if($debt->sisa_hutang == 0)
                            <div class="mt-6 p-5 bg-[#D4AF37] text-white rounded-2xl text-center font-bold shadow-xl animate-pulse">
                                <span class="text-4xl mb-2 block">🎉🏆🎉</span>
                                <span>Alhamdulillah! Hutang Puasa Anda LUNAS!</span>
                            </div>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        
                        <div class="bg-gradient-to-br from-[#1A4D2E] to-[#143d24] rounded-2xl p-6 text-white shadow-lg relative overflow-hidden group hover:scale-105 transition duration-300">
                            <div class="absolute -right-4 -bottom-4 opacity-20 transform group-hover:rotate-12 transition">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z"/></svg>
                            </div>
                            <h4 class="text-sm font-medium text-green-200 uppercase tracking-wider mb-2">Menuju Ramadhan {{ $tahunRamadhan }}</h4>
                            <div class="flex items-baseline gap-1">
                                <span class="text-4xl font-extrabold text-[#D4AF37]">{{ $daysToRamadan }}</span>
                                <span class="text-sm">Hari Lagi</span>
                            </div>
                            <p class="text-xs text-green-300 mt-2">Ayo lunasi sebelum terlambat!</p>
                        </div>

                        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm relative overflow-hidden group hover:shadow-md transition">
                            <h4 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">💡 Prediksi Lunas</h4>
                            @if($debt->sisa_hutang > 0)
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Jika rutin puasa <span class="font-bold text-[#1A4D2E]">Senin & Kamis</span> (2 hari/minggu), hutang lunas pada:
                                </p>
                                <p class="text-xl font-bold text-[#1A4D2E] mt-2 border-b-2 border-[#D4AF37] inline-block">
                                    {{ $estimasiLunas }}
                                </p>
                            @else
                                <div class="flex items-center gap-2 mt-2">
                                    <span class="text-2xl">🎉</span>
                                    <p class="text-green-600 font-bold text-sm">MasyaAllah! Anda sudah bebas hutang.</p>
                                </div>
                            @endif
                        </div>

                        <div class="bg-[#FFF8E1] border border-[#D4AF37] rounded-2xl p-6 shadow-sm relative">
                            <div class="absolute top-4 right-4 text-[#D4AF37] opacity-50 text-4xl leading-none">❝</div>
                            <h4 class="text-sm font-bold text-[#b8952b] uppercase tracking-wider mb-3">Penyemangat Harian</h4>
                            <p class="text-[#1A4D2E] text-sm italic font-medium leading-relaxed">
                                "{{ $randomQuote }}"
                            </p>
                        </div>
                    </div>

                    @if($debt->sisa_hutang > 0)
                    <div x-data="{ open: false }" class="mb-8">
                        <button @click="open = !open" class="w-full bg-gradient-to-r from-[#D4AF37] to-[#b8952b] hover:from-[#c29f2f] hover:to-[#a38222] text-white font-bold py-5 rounded-3xl shadow-xl flex items-center justify-center gap-3 transition transform active:scale-95 group">
                            <span class="text-2xl bg-white/20 w-10 h-10 rounded-full flex items-center justify-center group-hover:rotate-12 transition">✍️</span> 
                            <span class="text-xl tracking-wide">Catat Puasa Hari Ini</span>
                        </button>
                        <div x-show="open" x-transition class="mt-4 bg-white p-6 rounded-3xl shadow-xl border-2 border-[#D4AF37] relative">
                            <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 w-4 h-4 bg-white border-t-2 border-l-2 border-[#D4AF37] rotate-45"></div>
                            <form action="{{ route('log.store') }}" method="POST" class="flex flex-col gap-5">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="text-sm font-bold text-gray-600 ml-1 mb-1 block">Tanggal Puasa</label>
                                        <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="w-full border-gray-200 rounded-xl focus:ring-[#1A4D2E] focus:border-[#1A4D2E] py-3 bg-gray-50">
                                    </div>
                                    <div>
                                        <label class="text-sm font-bold text-gray-600 ml-1 mb-1 block">Jumlah Hari</label>
                                        <input type="number" name="jumlah_hari" value="1" min="1" max="{{ $debt->sisa_hutang }}" class="w-full border-gray-200 rounded-xl focus:ring-[#1A4D2E] focus:border-[#1A4D2E] py-3 bg-gray-50 font-bold text-[#1A4D2E]">
                                    </div>
                                </div>
                                <button class="w-full bg-[#1A4D2E] text-white font-bold py-4 rounded-xl hover:bg-[#143d24] shadow-md transition">
                                    Simpan Data ✔
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif

                    <div class="space-y-4">
                        <div class="flex items-center justify-between mb-2 px-2">
                            <h3 class="font-bold text-[#1A4D2E] text-xl">Riwayat Terakhir</h3>
                            <span class="text-xs font-bold bg-green-100 text-[#1A4D2E] px-2 py-1 rounded-md">{{ $debt->logs->count() }} Data</span>
                        </div>
                        
                        @forelse($debt->logs as $log)
                        <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition duration-200">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-[#1A4D2E] to-[#2E6B44] text-white flex flex-col items-center justify-center shadow-lg">
                                    <span class="text-xs font-normal opacity-80">{{ \Carbon\Carbon::parse($log->tanggal)->format('M') }}</span>
                                    <span class="text-lg font-bold leading-none">{{ \Carbon\Carbon::parse($log->tanggal)->format('d') }}</span>
                                </div>
                                <div>
                                    <p class="font-bold text-gray-800 text-lg">{{ \Carbon\Carbon::parse($log->tanggal)->format('l') }}</p>
                                    <p class="text-xs text-gray-400">{{ \Carbon\Carbon::parse($log->tanggal)->year }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="block font-extrabold text-[#1A4D2E] text-lg">+{{ $log->jumlah_hari }} Hari</span>
                                
                                <button @click="showDeleteModal = true; deleteAction = '{{ route('log.destroy', $log->id) }}'" class="text-xs text-red-400 hover:text-red-600 font-semibold bg-red-50 px-3 py-1.5 rounded hover:bg-red-100 transition mt-1">
                                    Hapus
                                </button>
                            </div>
                        </div>
                        @empty
                            <div class="text-center py-12 text-gray-400 bg-white rounded-3xl border-2 border-dashed border-gray-200">
                                <p>Belum ada riwayat puasa.</p>
                            </div>
                        @endforelse
                    </div>

                    <div x-show="showDeleteModal" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div @click="showDeleteModal = false" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                            
                            <div class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">Hapus Catatan Puasa?</h3>
                                            <div class="mt-2"><p class="text-sm text-gray-500">Data akan terhapus dan sisa hutang kembali bertambah.</p></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-2">
                                    <form :action="deleteAction" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-full inline-flex justify-center rounded-xl border border-transparent shadow-sm px-5 py-3 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:w-auto sm:text-sm">Ya, Hapus</button>
                                    </form>
                                    <button @click="showDeleteModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-xl border border-gray-300 shadow-sm px-5 py-3 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
</x-app-layout>