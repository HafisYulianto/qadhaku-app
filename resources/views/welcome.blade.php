<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QadhaKu - Aplikasi Manajemen Hutang Puasa Terpercaya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-800 antialiased">

    <nav class="bg-[#1A4D2E] text-white py-4 fixed w-full top-0 z-50 shadow-lg border-b border-[#ffffff10] backdrop-blur-sm bg-opacity-95">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <div class="font-extrabold text-2xl flex items-center gap-2 tracking-tight">
                🌙 QadhaKu
            </div>
            <div class="hidden md:flex space-x-8 text-sm font-medium text-gray-200">
                <a href="#fitur" class="hover:text-[#D4AF37] transition">Fitur</a>
                <a href="#cara-kerja" class="hover:text-[#D4AF37] transition">Cara Kerja</a>
                <a href="#faq" class="hover:text-[#D4AF37] transition">FAQ</a>
            </div>
            <div>
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-[#D4AF37] text-white px-6 py-2.5 rounded-full font-bold shadow-lg hover:bg-[#b8952b] transition transform hover:scale-105">Dashboard Saya</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold hover:text-[#D4AF37] transition mr-6">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-[#D4AF37] text-white px-6 py-2.5 rounded-full font-bold shadow-lg hover:bg-[#b8952b] transition transform hover:scale-105">Buat Akun Gratis</a>
                @endauth
            </div>
        </div>
    </nav>

    <header class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 bg-[#1A4D2E] overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#D4AF37 1.5px, transparent 1.5px); background-size: 30px 30px;"></div>
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-[#D4AF37] rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-96 h-96 bg-[#4ade80] rounded-full mix-blend-multiply filter blur-3xl opacity-10 animate-pulse"></div>

        <div class="relative max-w-7xl mx-auto px-6 text-center">
            <span class="inline-block py-1.5 px-4 rounded-full bg-[#ffffff15] border border-[#ffffff30] text-sm mb-8 text-[#D4AF37] font-bold tracking-wide uppercase">
                Aplikasi Ramadhan Planner #1
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 leading-tight tracking-tight">
                Lunasi Hutang Puasa <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#D4AF37] to-[#fcd34d]">Sebelum Terlambat</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed">
                Jangan biarkan hutang puasa menumpuk tanpa catatan. QadhaKu membantu Anda mencatat, memantau, dan mengingatkan target ibadah Anda dengan mudah dan aman.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 items-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="w-full sm:w-auto bg-[#D4AF37] text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-xl hover:bg-[#b8952b] transition transform hover:-translate-y-1">
                        Lanjut Mencatat &rarr;
                    </a>
                @else
                    <a href="{{ route('register') }}" class="w-full sm:w-auto bg-[#D4AF37] text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-xl hover:bg-[#b8952b] transition transform hover:-translate-y-1">
                        Mulai Sekarang (Gratis)
                    </a>
                    <a href="#cara-kerja" class="w-full sm:w-auto px-8 py-4 rounded-2xl font-bold text-white border border-gray-500 hover:bg-[#ffffff10] transition">
                        Pelajari Dulu
                    </a>
                @endauth
            </div>
            
            <p class="mt-6 text-sm text-gray-400">🔒 Data Anda 100% Privat & Aman</p>
        </div>
    </header>

    <section class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="text-4xl text-[#D4AF37] mb-4">❝</div>
            <h2 class="text-2xl md:text-3xl font-serif italic text-[#1A4D2E] leading-relaxed mb-4">
                "Barangsiapa yang memiliki hutang puasa Ramadhan, hendaklah ia segera menggantinya (di hari lain)."
            </h2>
            <p class="text-gray-500 font-medium">— Prinsip Qadha Puasa</p>
        </div>
    </section>

    <section id="cara-kerja" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-[#1A4D2E] font-extrabold text-3xl md:text-4xl mb-4">Cara Kerja QadhaKu</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Sistem kami didesain sangat sederhana agar Anda bisa fokus beribadah tanpa pusing memikirkan hitungan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center group hover:shadow-xl transition duration-300">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-[#1A4D2E] text-white rounded-full flex items-center justify-center font-bold text-xl border-4 border-gray-50">1</div>
                    <div class="mt-8 mb-4 text-5xl">🎯</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Set Target Awal</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Masukkan total hutang puasa Anda (misal: 30 hari). Anda juga bisa mengatur target tanggal selesai.</p>
                </div>
                <div class="relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center group hover:shadow-xl transition duration-300">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-[#D4AF37] text-white rounded-full flex items-center justify-center font-bold text-xl border-4 border-gray-50">2</div>
                    <div class="mt-8 mb-4 text-5xl">✍️</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Catat Harian</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Setiap kali selesai puasa, klik tombol "Catat". Sistem akan otomatis mengurangi sisa hutang Anda.</p>
                </div>
                <div class="relative bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center group hover:shadow-xl transition duration-300">
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-12 h-12 bg-[#1A4D2E] text-white rounded-full flex items-center justify-center font-bold text-xl border-4 border-gray-50">3</div>
                    <div class="mt-8 mb-4 text-5xl">🎉</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Pantau Hingga Lunas</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Lihat grafik progress bar yang bergerak maju. Rasakan kelegaan saat hutang mencapai 0 hari.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12 mb-20">
                <div class="w-full md:w-1/2 bg-green-50 p-10 rounded-3xl">
                    <div class="text-6xl mb-4">📊</div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100">
                        <div class="h-4 w-full bg-gray-100 rounded-full mb-2">
                            <div class="h-4 bg-[#D4AF37] rounded-full" style="width: 70%"></div>
                        </div>
                        <p class="text-center text-sm font-bold text-gray-600">70% Selesai</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-[#D4AF37] font-bold uppercase tracking-wide text-sm mb-2">Visualisasi Data</h3>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#1A4D2E] mb-4">Pantau Progress Secara Visual</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Otak manusia lebih menyukai gambar daripada angka. QadhaKu menyajikan sisa hutang Anda dalam bentuk grafik batang (Progress Bar) yang memotivasi. Melihat grafik yang semakin penuh memberikan kepuasan tersendiri.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-gray-700">
                            <span class="text-green-500">✔</span> Tampilan grafik Real-time
                        </li>
                        <li class="flex items-center gap-3 text-gray-700">
                            <span class="text-green-500">✔</span> Persentase kelulusan otomatis
                        </li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col md:flex-row-reverse items-center gap-12">
                <div class="w-full md:w-1/2 bg-yellow-50 p-10 rounded-3xl">
                    <div class="text-6xl mb-4">📱</div>
                    <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 text-center">
                        <button class="bg-[#1A4D2E] text-white px-6 py-3 rounded-xl font-bold w-full">Tambah Puasa +</button>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h3 class="text-[#D4AF37] font-bold uppercase tracking-wide text-sm mb-2">Kemudahan Akses</h3>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-[#1A4D2E] mb-4">Catat Kapan Saja, Di Mana Saja</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Aplikasi ini didesain "Mobile First". Tampilannya sangat nyaman dibuka lewat HP Android maupun iPhone. Tidak perlu install aplikasi berat, cukup buka browser dan catat puasa Anda dalam hitungan detik.
                    </p>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-gray-700">
                            <span class="text-green-500">✔</span> Ringan dan Cepat
                        </li>
                        <li class="flex items-center gap-3 text-gray-700">
                            <span class="text-green-500">✔</span> Tombol besar yang ramah jari
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-24 bg-gray-50 border-t border-gray-200">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-[#1A4D2E] font-extrabold text-3xl mb-4">Pertanyaan Umum</h2>
            </div>

            <div class="space-y-4">
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Apakah aplikasi ini berbayar?</h3>
                    <p class="text-gray-600">Tidak. Aplikasi ini 100% Gratis untuk membantu umat muslim menyelesaikan kewajiban puasanya.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Apakah data saya aman?</h3>
                    <p class="text-gray-600">Ya, data hutang puasa Anda hanya bisa dilihat oleh Anda sendiri setelah login. Kami tidak membagikan data Anda ke pihak manapun.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm">
                    <h3 class="font-bold text-lg text-gray-900 mb-2">Bagaimana jika saya lupa jumlah hutang saya?</h3>
                    <p class="text-gray-600">Kami menyarankan Anda untuk memperkirakan jumlah maksimal agar lebih aman (ihtiyat), lalu masukkan angka tersebut sebagai target awal.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-[#1A4D2E] text-center px-6">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-6">Siap Melunasi Hutang Puasa?</h2>
            <p class="text-gray-300 mb-8 text-lg">Mulai langkah kecil hari ini untuk ketenangan hati di kemudian hari.</p>
            <a href="{{ route('register') }}" class="inline-block bg-[#D4AF37] text-white px-10 py-5 rounded-2xl font-bold text-xl shadow-2xl hover:bg-[#b8952b] transition transform hover:-translate-y-1">
                Buat Akun Sekarang 🚀
            </a>
        </div>
    </section>

    <footer class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 text-center md:text-left flex flex-col md:flex-row justify-between items-center gap-8">
            <div>
                <span class="text-2xl font-bold text-white flex items-center justify-center md:justify-start gap-2">
                    🌙 QadhaKu
                </span>
                <p class="mt-2 text-sm">Aplikasi manajemen ibadah harian.</p>
            </div>
            <div class="text-sm">
                &copy; {{ date('Y') }} QadhaKu Project. Dibuat dengan niat baik untuk umat.
            </div>
        </div>
    </footer>

</body>
</html>