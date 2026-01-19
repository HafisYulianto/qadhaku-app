<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-2xl font-bold text-[#1A4D2E] text-center mb-6">Selamat Datang Kembali</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email" class="block font-bold text-sm text-gray-700 ml-1 mb-1">Email</label>
            <input id="email" class="block mt-1 w-full border-gray-200 rounded-xl focus:border-[#D4AF37] focus:ring-[#D4AF37] py-3 bg-gray-50" 
                   type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="nama@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-5">
            <label for="password" class="block font-bold text-sm text-gray-700 ml-1 mb-1">Password</label>
            <input id="password" class="block mt-1 w-full border-gray-200 rounded-xl focus:border-[#D4AF37] focus:ring-[#D4AF37] py-3 bg-gray-50" 
                   type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-[#1A4D2E] shadow-sm focus:ring-[#D4AF37]" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Ingat Saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-500 hover:text-[#D4AF37] transition" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
        </div>

        <div class="mt-6">
            <button class="w-full bg-[#1A4D2E] text-white font-bold py-3 rounded-xl hover:bg-[#143d24] shadow-lg transition transform active:scale-95 flex justify-center items-center gap-2">
                <span>Masuk Sekarang</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <div class="relative flex py-5 items-center">
            <div class="flex-grow border-t border-gray-200"></div>
            <span class="flex-shrink mx-4 text-gray-400 text-xs uppercase">Belum punya akun?</span>
            <div class="flex-grow border-t border-gray-200"></div>
        </div>

        <div class="text-center">
            <a href="{{ route('register') }}" class="inline-block text-[#D4AF37] font-bold hover:text-[#b8952b] hover:underline transition">
                Daftar Akun Baru
            </a>
        </div>
    </form>
</x-guest-layout>