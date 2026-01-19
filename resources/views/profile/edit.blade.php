<x-app-layout>
    <div class="bg-[#1A4D2E] h-48 w-full absolute top-16 left-0 -z-10 rounded-b-[3rem] shadow-md"></div>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <div class="flex items-center gap-3 mb-8">
                <div class="bg-white/20 p-3 rounded-2xl backdrop-blur-sm">
                    <span class="text-3xl">⚙️</span>
                </div>
                <h2 class="text-3xl font-extrabold text-white">
                    Pengaturan Akun
                </h2>
            </div>

            <div class="p-8 sm:p-10 bg-white shadow-xl rounded-3xl border-t-8 border-[#D4AF37] relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5">
                    <svg class="w-24 h-24 text-[#D4AF37]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                </div>
                <div class="max-w-xl relative z-10">
                    <h3 class="text-2xl font-bold text-[#1A4D2E] mb-2">Informasi Profil</h3>
                    <p class="text-sm text-gray-500 mb-6">Perbarui nama akun dan alamat email Anda agar data tetap valid.</p>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 sm:p-10 bg-white shadow-xl rounded-3xl border-t-8 border-[#1A4D2E] relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5">
                    <svg class="w-24 h-24 text-[#1A4D2E]" fill="currentColor" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                </div>
                <div class="max-w-xl relative z-10">
                    <h3 class="text-2xl font-bold text-[#1A4D2E] mb-2">Keamanan Password</h3>
                    <p class="text-sm text-gray-500 mb-6">Pastikan akun Anda aman dengan menggunakan password yang panjang dan acak.</p>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 sm:p-10 bg-white shadow-xl rounded-3xl border-t-8 border-red-500 relative overflow-hidden">
                <div class="absolute top-0 right-0 p-4 opacity-5">
                    <svg class="w-24 h-24 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                </div>
                <div class="max-w-xl relative z-10">
                    <h3 class="text-2xl font-bold text-red-600 mb-2">Zona Bahaya</h3>
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                        <p class="text-sm text-red-700">
                            <strong>Peringatan:</strong> Menghapus akun bersifat permanen. Semua data hutang puasa dan riwayat pencatatan Anda akan hilang selamanya.
                        </p>
                    </div>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</x-app-layout>