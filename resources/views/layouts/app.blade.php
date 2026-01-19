<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashboard - QadhaKu</title>

        <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌙</text></svg>">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800">
        <div class="min-h-screen flex flex-col justify-between">
            
            <div>
                @include('layouts.navigation')

                @if (isset($header))
                    <header class="bg-white shadow relative z-10">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main>
                    {{ $slot }}
                </main>
            </div>

            <footer class="py-8 text-center text-sm text-gray-500 mt-10">
                <p>
                    Dibuat dengan <span class="text-red-500 animate-pulse">❤️</span> oleh 
                    <a href="https://github.com/HafisYulianto" target="_blank" class="font-bold text-[#1A4D2E] hover:text-[#D4AF37] transition">
                        Hafis Yulianto
                    </a>
                </p>
                <p class="text-xs mt-1 opacity-70">&copy; {{ date('Y') }} QadhaKu App. All rights reserved.</p>
            </footer>

        </div>
    </body>
</html>