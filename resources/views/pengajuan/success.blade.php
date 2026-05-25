<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - LyFeBillionaires</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('ico/AhaConvert_Logo.ico') }}" type="image/x-icon">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Outfit from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #d1e1f1;
            /* Cyberlabs clean dot tech pattern */
            background-image: radial-gradient(#b1c4d9 1.5px, transparent 1.5px);
            background-size: 28px 28px;
        }

        /* Premium Intro Animations */
        @keyframes cardEntrance {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.96);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-card {
            animation: cardEntrance 1s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .animate-fade-in-1 {
            opacity: 0;
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards;
        }
    </style>
</head>
<body class="text-slate-800 min-h-screen flex flex-col justify-between selection:bg-[#000B7E] selection:text-white">

    <!-- Top Watermark (Company Brand Touch) -->
    <div class="max-w-md mx-auto w-full px-6 pt-6 flex justify-between items-center text-xs text-slate-500 font-bold tracking-widest uppercase opacity-75">
        <span>LYFEBILLIONAIRES</span>
        <span class="text-[9px] px-2 py-0.5 border border-slate-400/30 rounded-md">SUKSES</span>
    </div>

    <!-- Spacer -->
    <div class="pt-4"></div>

    <!-- Main Content Section -->
    <main class="flex-grow flex items-center justify-center py-12 px-4">
        <div class="max-w-md w-full bg-white border border-slate-200 rounded-[32px] p-8 sm:p-10 shadow-lg text-center space-y-6 animate-card">

            <div class="space-y-6 animate-fade-in-1">
                <!-- Logo -->
                <div class="flex justify-center">
                    <img src="{{ asset('logo/Logo.png') }}" class="h-16 w-auto object-contain" alt="LyFeBillionaires Logo">
                </div>

            <!-- Very Simple Message -->
            <div class="space-y-2">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#000B7E] tracking-tight">
                    Selamat, Anda sudah terdaftar!
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm font-medium leading-relaxed">
                    Data pengajuan awal Anda telah berhasil masuk dan disimpan ke dalam database kami.
                </p>
            </div>

            <!-- Simple Clean Button to Return -->
            <div class="pt-4">
                <a href="/" class="w-full py-3.5 bg-[#000B7E] hover:bg-[#000966] text-white font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-full transition duration-150 block text-center shadow-sm">
                    Kembali Ke Halaman Utama
                </a>
            </div>

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="max-w-md mx-auto w-full text-center py-6 text-[10px] sm:text-xs text-slate-600 font-medium">
        <p>&copy; {{ date('Y') }} LyFeBillionaires. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>
