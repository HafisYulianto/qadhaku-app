<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QadhaKu - Aplikasi Manajemen Hutang Puasa Terpercaya</title>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌙</text></svg>">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800 antialiased">

    <nav class="bg-[#1A4D2E] text-white py-4 fixed w-full top-0 z-50 shadow-lg border-b border-[#ffffff10] backdrop-blur-sm bg-opacity-95">
        <div class="max-w-7xl mx-auto px-4 md:px-6 flex justify-between items-center">
            
            <div class="font-extrabold text-xl md:text-2xl flex items-center gap-2 tracking-tight">
                🌙 QadhaKu
            </div>

            <div class="hidden md:flex space-x-8 text-sm font-medium text-gray-200">
                <a href="#fitur" class="hover:text-[#D4AF37] transition">Fitur</a>
                <a href="#cara-kerja" class="hover:text-[#D4AF37] transition">Cara Kerja</a>
                <a href="#faq" class="hover:text-[#D4AF37] transition">FAQ</a>
            </div>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-[#D4AF37] text-white px-4 py-2 text-sm md:text-base md:px-6 md:py-2.5 rounded-full font-bold shadow-lg hover:bg-[#b8952b] transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-[#D4AF37] transition md:mr-4">Masuk</a>
                    
                    <a href="{{ route('register') }}" class="hidden md:inline-block bg-[#D4AF37] text-white px-6 py-2.5 rounded-full font-bold shadow-lg hover:bg-[#b8952b] transition transform hover:scale-105">Buat Akun Gratis</a>
                @endauth
            </div>
        </div>
    </nav>

    <header class="relative pt-28 pb-16 md:pt-48 md:pb-32 bg-[#1A4D2E] overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#D4AF37 1.5px, transparent 1.5px); background-size: 30px 30px;"></div>
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-64 h-64 md:w-96 md:h-96 bg-[#D4AF37] rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-64 h-64 md:w-96 md:h-96 bg-[#4ade80] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse"></div>

        <div class="relative max-w-7xl mx-auto px-4 md:px-6 text-center">
            <span class="inline-block py-1 px-3 md:py-1.5 md:px-4 rounded-full bg-[#ffffff15] border border-[#ffffff30] text-xs md:text-sm mb-6 text-[#D4AF37] font-bold tracking-wide uppercase">
                Aplikasi Ramadhan Planner #1
            </span>
            
            <h1 class="text-4xl md:text-7xl font-extrabold text-white mb-6 md:mb-8 leading-tight tracking-tight">
                Lunasi Hutang Puasa <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D4AF37] to-[#fcd34d]">Sebelum Terlambat</span>
            </h1>

            <p class="text-base md:text-xl text-gray-300 mb-8 md:mb-10 max-w-2xl mx-auto leading-relaxed px-2">
                Jangan biarkan hutang puasa menumpuk tanpa catatan. QadhaKu membantu Anda mencatat & memantau target ibadah dengan mudah.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-3 md:gap-4 items-center px-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto bg-[#D4AF37] text-white px-8 py-3 md:py-4 rounded-xl md:rounded-2xl font-bold text-lg shadow-xl hover:bg-[#b8952b] transition transform hover:-translate-y-1">
                        Lanjut Mencatat &rarr;
                    </a>
                @else
                    <a href="{{ route('register') }}" class="w-full sm:w-auto bg-[#D4AF37] text-white px-8 py-3 md:py-4 rounded-xl md:rounded-2xl font-bold text-lg shadow-xl hover:bg-[#b8952b] transition transform hover:-translate-y-1">
                        Mulai Sekarang (Gratis)
                    </a>
                    <a href="#cara-kerja" class="w-full sm:w-auto px-8 py-3 md:py-4 rounded-xl md:rounded-2xl font-bold text-white border border-gray-500 hover:bg-[#ffffff10] transition">
                        Pelajari Dulu
                    </a>
                @endauth
            </div>
            
            <p class="mt-6 text-xs md:text-sm text-gray-400">🔒 Data Anda 100% Privat & Aman</p>
        </div>
    </header>

    <section class="py-12 md:py-16 bg-white border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="text-3xl md:text-4xl text-[#D4AF37] mb-4">❝</div>
            <h2 class="text-xl md:text-3xl font-serif italic text-[#1A4D2E] leading-relaxed mb-4">
                "Barangsiapa yang memiliki hutang puasa Ramadhan, hendaklah ia segera menggantinya (di hari lain)."
            </h2>
            <p class="text-gray-500 font-medium text-sm md:text-base">— Prinsip Qadha Puasa</p>
        </div>
    </section>

    <section id="cara-kerja" class="py-16 md:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-[#1A4D2E] font-extrabold text-2xl md:text-4xl mb-4">Cara Kerja QadhaKu</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">Sistem kami didesain sangat sederhana agar Anda bisa fokus beribadah.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-10">
                <div class="relative bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 text-center hover:shadow-xl transition duration-300">
                    <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-10 h-10 bg-[#1A4D2E] text-white rounded-full flex items-center justify-center font-bold text-lg border-4 border-gray-50">1</div>
                    <div class="mt-4 mb-4 text-4xl md:text-5xl">🎯</div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">Set Target Awal</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Masukkan total hutang puasa Anda (misal: 30 hari).</p>
                </div>
                <div class="relative bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 text-center hover:shadow-xl transition duration-300">
                    <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-10 h-10 bg-[#D4AF37] text-white rounded-full flex items-center justify-center font-bold text-lg border-4 border-gray-50">2</div>
                    <div class="mt-4 mb-4 text-4xl md:text-5xl">✍️</div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">Catat Harian</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Setiap kali selesai puasa, klik tombol "Catat". Otomatis berkurang.</p>
                </div>
                <div class="relative bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-100 text-center hover:shadow-xl transition duration-300">
                    <div class="absolute -top-5 left-1/2 transform -translate-x-1/2 w-10 h-10 bg-[#1A4D2E] text-white rounded-full flex items-center justify-center font-bold text-lg border-4 border-gray-50">3</div>
                    <div class="mt-4 mb-4 text-4xl md:text-5xl">🎉</div>
                    <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">Pantau Lunas</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Lihat grafik progress bar bergerak maju hingga mencapai 0 hari.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 mb-16 md:mb-20">
                <div class="w-full md:w-1/2 bg-green-50 p-6 md:p-10 rounded-3xl">
                    <div class="text-5xl md:text-6xl mb-4">📊</div>
                    <div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg border border-gray-100">
                        <div class="h-4 w-full bg-gray-100 rounded-full mb-2">
                            <div class="h-4 bg-[#D4AF37] rounded-full" style="width: 70%"></div>
                        </div>
                        <p class="text-center text-sm font-bold text-gray-600">70% Selesai</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-[#D4AF37] font-bold uppercase tracking-wide text-xs md:text-sm mb-2">Visualisasi Data</h3>
                    <h2 class="text-2xl md:text-4xl font-extrabold text-[#1A4D2E] mb-4">Pantau Progress Secara Visual</h2>
                    <p class="text-gray-600 text-base md:text-lg leading-relaxed mb-6">
                        QadhaKu menyajikan sisa hutang Anda dalam bentuk grafik batang (Progress Bar) yang memotivasi.
                    </p>
                    <ul class="space-y-3 text-sm md:text-base">
                        <li class="flex items-center gap-3 text-gray-700"><span class="text-green-500">✔</span> Tampilan grafik Real-time</li>
                        <li class="flex items-center gap-3 text-gray-700"><span class="text-green-500">✔</span> Persentase kelulusan otomatis</li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col md:flex-row-reverse items-center gap-8 md:gap-12">
                <div class="w-full md:w-1/2 bg-yellow-50 p-6 md:p-10 rounded-3xl">
                    <div class="text-5xl md:text-6xl mb-4">📱</div>
                    <div class="bg-white p-4 md:p-6 rounded-2xl shadow-lg border border-gray-100 text-center">
                        <button class="bg-[#1A4D2E] text-white px-6 py-3 rounded-xl font-bold w-full">Tambah Puasa +</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-[#D4AF37] font-bold uppercase tracking-wide text-xs md:text-sm mb-2">Mobile First</h3>
                    <h2 class="text-2xl md:text-4xl font-extrabold text-[#1A4D2E] mb-4">Akses Di Mana Saja</h2>
                    <p class="text-gray-600 text-base md:text-lg leading-relaxed mb-6">
                        Tampilannya sangat nyaman dibuka lewat HP Android maupun iPhone. Tidak perlu install aplikasi berat.
                    </p>
                    <ul class="space-y-3 text-sm md:text-base">
                        <li class="flex items-center gap-3 text-gray-700"><span class="text-green-500">✔</span> Ringan dan Cepat</li>
                        <li class="flex items-center gap-3 text-gray-700"><span class="text-green-500">✔</span> Tombol besar ramah jari</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-20 bg-[#1A4D2E] text-center px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-2xl md:text-4xl font-extrabold text-white mb-6">Siap Melunasi Hutang Puasa?</h2>
            <a href="{{ route('register') }}" class="inline-block bg-[#D4AF37] text-white px-8 py-4 rounded-2xl font-bold text-lg md:text-xl shadow-2xl hover:bg-[#b8952b] transition transform hover:-translate-y-1">
                Buat Akun Sekarang 🚀
            </a>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-400 py-8 md:py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <span class="text-xl md:text-2xl font-bold text-white flex items-center justify-center md:justify-start gap-2">
                    🌙 QadhaKu
                </span>
                <p class="mt-2 text-xs md:text-sm">Aplikasi manajemen ibadah harian.</p>
            </div>
            <div class="text-xs md:text-sm">
                &copy; {{ date('Y') }} QadhaKu Project.
            </div>
        </div>
    </footer>

</body>
</html>