<x-guest-layout>
    <h2 class="text-2xl font-bold text-[#1A4D2E] text-center mb-2">Buat Akun Baru</h2>
    <p class="text-center text-gray-500 text-sm mb-6">Mulai perjalanan melunasi Qadha Anda.</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" class="block font-bold text-sm text-gray-700 ml-1 mb-1">Nama Lengkap</label>
            <input id="name" class="block mt-1 w-full border-gray-200 rounded-xl focus:border-[#D4AF37] focus:ring-[#D4AF37] py-3 bg-gray-50" 
                   type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Fulan bin Fulan" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="email" class="block font-bold text-sm text-gray-700 ml-1 mb-1">Email</label>
            <input id="email" class="block mt-1 w-full border-gray-200 rounded-xl focus:border-[#D4AF37] focus:ring-[#D4AF37] py-3 bg-gray-50" 
                   type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password" class="block font-bold text-sm text-gray-700 ml-1 mb-1">Password</label>
            <input id="password" class="block mt-1 w-full border-gray-200 rounded-xl focus:border-[#D4AF37] focus:ring-[#D4AF37] py-3 bg-gray-50" 
                   type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block font-bold text-sm text-gray-700 ml-1 mb-1">Konfirmasi Password</label>
            <input id="password_confirmation" class="block mt-1 w-full border-gray-200 rounded-xl focus:border-[#D4AF37] focus:ring-[#D4AF37] py-3 bg-gray-50" 
                   type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button class="w-full bg-[#D4AF37] text-white font-bold py-3 rounded-xl hover:bg-[#b8952b] shadow-lg transition transform active:scale-95">
                Daftar Sekarang 🚀
            </button>
        </div>

        <div class="mt-6 text-center">
            <a class="underline text-sm text-gray-600 hover:text-[#1A4D2E]" href="{{ route('login') }}">
                {{ __('Sudah punya akun? Masuk') }}
            </a>
        </div>
    </form>
</x-guest-layout>