<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LyFeBillionaires - Pengajuan Awal</title>
    
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
            overflow-x: hidden;
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
        @keyframes logoFloat {
            0%, 100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-6px) scale(1.02);
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
        .animate-logo {
            animation: logoFloat 4s ease-in-out infinite;
        }
        .animate-fade-in-1 {
            opacity: 0;
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards;
        }
        .animate-fade-in-2 {
            opacity: 0;
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.4s forwards;
        }
        .animate-fade-in-3 {
            opacity: 0;
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.6s forwards;
        }
    </style>
</head>
<body class="text-slate-800 min-h-screen flex flex-col justify-between selection:bg-[#000B7E] selection:text-white">

    <!-- Top Watermark (Company Brand Touch) -->
    <div class="max-w-4xl mx-auto w-full px-6 pt-6 flex justify-between items-center text-xs text-slate-500 font-bold tracking-widest uppercase opacity-75">
        <span>LYFEBILLIONAIRES</span>
        <span class="text-[9px] px-2 py-0.5 border border-slate-400/30 rounded-md">EST. 2026</span>
    </div>

    <!-- Main Entry Container -->
    <main class="flex-grow flex items-center justify-center p-4 sm:p-6">
        <div class="max-w-md w-full bg-white border border-slate-200/80 rounded-[32px] p-8 sm:p-10 shadow-lg text-center space-y-8 relative overflow-hidden animate-card">
            
            <!-- Large Company Logo Centered -->
            <div class="flex justify-center pt-2">
                <img src="{{ asset('logo/Logo.png') }}" class="h-28 sm:h-32 w-auto object-contain transition-transform duration-300 hover:scale-105 animate-logo" alt="LyFeBillionaires Logo">
            </div>

            <!-- Welcoming Content (Refined Human Copywriting) -->
            <div class="space-y-3 animate-fade-in-1">
                <span class="inline-flex items-center gap-1 bg-[#ebf3fc] border border-[#d3e5f7] text-[#000B7E] px-4 py-1.5 rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-wider">
                    Registrasi Pertemuan
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-slate-900 leading-tight">
                    LyFeBillionaires
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm leading-relaxed max-w-xs mx-auto">
                    Silakan isi data pengajuan awal Anda secara lengkap untuk penjadwalan sesi diskusi langsung bersama mentor pada Acara kami.
                </p>
            </div>

            <!-- Start Button (Flat Navy Pill) -->
            <div class="pt-2 animate-fade-in-2">
                <a href="{{ route('pengajuan.create-gratis') }}" 
                   class="w-full py-4 bg-[#000B7E] hover:bg-[#000966] text-white font-extrabold text-xs sm:text-sm uppercase tracking-wider rounded-full transition-all duration-150 inline-flex items-center justify-center gap-2 shadow-sm active:scale-[0.98]">
                    Mulai Pengisian
                    <!-- Arrow Icon -->
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>

            <!-- Small Info Footer Inside Card -->
            <div class="pt-4 border-t border-slate-100 flex justify-center items-center gap-1.5 text-[10px] text-slate-400 font-bold animate-fade-in-3">
                <svg class="w-3.5 h-3.5 text-[#000B7E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
                <span>Sistem Pendaftaran Resmi</span>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="max-w-md mx-auto w-full text-center py-6 text-[10px] sm:text-xs text-slate-500 font-bold tracking-wide">
        <p>&copy; {{ date('Y') }} LyFeBillionaires. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>
