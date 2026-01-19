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

        <div class="relative flex py-4 items-center">
            <div class="flex-grow border-t border-gray-200"></div>
            <span class="flex-shrink mx-4 text-gray-400 text-xs uppercase">Atau masuk dengan</span>
            <div class="flex-grow border-t border-gray-200"></div>
        </div>

        <div class="mb-2">
            <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center gap-3 bg-white border border-gray-300 rounded-xl py-3 text-sm font-bold text-gray-700 hover:bg-gray-50 shadow-sm transition transform active:scale-95">
                <svg class="h-5 w-5" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                <span>Google Account</span>
            </a>
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