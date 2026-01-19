<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Masuk - QadhaKu</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#1A4D2E] selection:bg-[#D4AF37] selection:text-white">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
            
            <div class="mb-8 text-center animate-fade-in-down">
                <a href="/" class="flex flex-col items-center gap-2 group">
                    <span class="text-6xl group-hover:scale-110 transition duration-300">🌙</span>
                    <span class="text-3xl font-extrabold text-white tracking-wide">QadhaKu</span>
                    <span class="text-xs text-[#D4AF37] font-bold tracking-[0.2em] uppercase">Manajemen Puasa</span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-2xl overflow-hidden rounded-3xl border-t-4 border-[#D4AF37]">
                {{ $slot }}
            </div>
            
            <div class="mt-8 text-white/50 text-sm">
                &copy; {{ date('Y') }} QadhaKu Project.
            </div>
        </div>
    </body>
</html>