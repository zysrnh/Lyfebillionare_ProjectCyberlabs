<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengajuan Masuk - LyfeBillionaire</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Inter from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 min-h-screen flex flex-col justify-between selection:bg-emerald-500 selection:text-slate-950">
    
    <!-- Ambient Background Light -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-500 rounded-full blur-[150px] opacity-10"></div>
        <div class="absolute bottom-0 right-0 w-[450px] h-[450px] bg-blue-600 rounded-full blur-[180px] opacity-10"></div>
    </div>

    <!-- Header / Navbar -->
    <header class="border-b border-slate-800/80 bg-slate-950/70 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-gradient-to-tr from-emerald-500 to-teal-400 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/20">
                    <span class="font-extrabold text-slate-950 text-xl tracking-tighter">L</span>
                </div>
                <div>
                    <span class="font-bold text-lg tracking-wide bg-gradient-to-r from-white via-slate-200 to-emerald-400 bg-clip-text text-transparent">LyfeBillionaire</span>
                    <span class="text-xs block text-slate-400 -mt-1">Admin Panel</span>
                </div>
            </div>
            
            <nav class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="text-slate-400 hover:text-white transition text-sm">Dashboard</a>
                <a href="{{ route('pengajuan.create') }}" class="px-4 py-2 rounded-lg bg-emerald-500 text-slate-950 font-bold hover:bg-emerald-400 transition text-xs">Isi Form Baru</a>
            </nav>
        </div>
    </header>

    <!-- Main Container -->
    <main class="max-w-7xl mx-auto w-full px-4 py-10 flex-grow">
        
        <!-- Header Info -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight text-white mb-1">Daftar Pengajuan Masuk</h1>
                <p class="text-slate-400 text-sm">Berikut adalah seluruh data awal pengajuan calon peserta yang masuk ke database.</p>
            </div>
            <div class="flex items-center gap-2 bg-slate-900 border border-slate-800 rounded-xl px-4 py-2 text-xs text-slate-400">
                Total Submisi: <strong class="text-white text-sm font-semibold">{{ $pengajuans->total() }}</strong>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-xl text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- Responsive Card Table -->
        <div class="bg-slate-900/40 backdrop-blur-xl border border-slate-800/80 rounded-2xl overflow-hidden shadow-xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-800 bg-slate-950/55 text-slate-400 text-xs uppercase tracking-wider">
                            <th class="py-4 px-6 font-semibold">Tgl Masuk</th>
                            <th class="py-4 px-6 font-semibold">Data Diri</th>
                            <th class="py-4 px-6 font-semibold">Kontak & Email</th>
                            <th class="py-4 px-6 font-semibold">Pekerjaan / Status</th>
                            <th class="py-4 px-6 font-semibold">Media Sosial</th>
                            <th class="py-4 px-6 font-semibold">Bukti Setor</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60 text-slate-300 text-sm">
                        @forelse($pengajuans as $pengajuan)
                            <tr class="hover:bg-slate-900/30 transition">
                                <!-- Tanggal Submisi -->
                                <td class="py-4 px-6">
                                    <span class="text-xs font-mono text-slate-500 block">{{ $pengajuan->created_at->format('d M Y') }}</span>
                                    <span class="text-[10px] font-mono text-slate-600 block">{{ $pengajuan->created_at->format('H:i') }} WIB</span>
                                </td>

                                <!-- Data Diri -->
                                <td class="py-4 px-6">
                                    <strong class="text-white block text-sm font-semibold">{{ $pengajuan->nama_lengkap }}</strong>
                                    <span class="text-xs text-slate-500">Lahir: {{ \Carbon\Carbon::parse($pengajuan->tgl_lahir)->format('d-m-Y') }}</span>
                                </td>

                                <!-- Kontak & Email -->
                                <td class="py-4 px-6">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengajuan->no_hp) }}" target="_blank" 
                                       class="inline-flex items-center gap-1 text-emerald-400 hover:text-emerald-300 font-medium text-xs bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded-md mb-1 transition">
                                        <!-- WhatsApp Small Icon -->
                                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.031 2c-5.516 0-9.999 4.486-9.999 10.002 0 1.901.533 3.677 1.458 5.201l-1.49 5.43c-.116.425.263.804.688.688l5.43-1.49c1.524.925 3.3 1.458 5.201 1.458 5.516 0 10.002-4.486 10.002-10.002 0-5.516-4.486-10.002-10.002-10.002zm5.727 14.129c-.275.772-1.341 1.415-1.854 1.472-.444.05-1.02.074-2.827-.674-2.31-.956-3.791-3.3-3.906-3.456-.114-.155-.935-1.246-.935-2.378 0-1.132.592-1.686.804-1.914.212-.228.462-.285.616-.285.155 0 .307.001.442.008.143.007.337-.054.527.402.196.471.674 1.644.733 1.765.059.12.098.261.019.418-.079.158-.119.261-.238.4-.119.139-.251.31-.358.416-.12.119-.244.249-.105.487.139.238.616 1.011 1.186 1.52.735.654 1.353.856 1.545.952.193.096.306.079.42-.053.114-.132.492-.573.623-.768.132-.196.264-.162.443-.096.179.066 1.137.536 1.332.634.195.099.325.148.373.23.049.083.049.48-.226 1.252z"></path>
                                        </svg>
                                        {{ $pengajuan->no_hp }}
                                    </a>
                                    <span class="text-xs text-slate-500 block">{{ $pengajuan->email }}</span>
                                </td>

                                <!-- Pekerjaan & Status -->
                                <td class="py-4 px-6">
                                    <span class="text-xs font-semibold text-slate-200 block">{{ $pengajuan->pekerjaan }}</span>
                                    <span class="text-xs text-slate-500 block">{{ $pengajuan->status_pernikahan }}</span>
                                </td>

                                <!-- Media Sosial -->
                                <td class="py-4 px-6 text-xs space-y-1">
                                    @if($pengajuan->alamat_ig)
                                        <div class="flex items-center gap-1.5 text-slate-400">
                                            <span class="text-rose-400 font-bold">IG:</span>
                                            <a href="https://instagram.com/{{ $pengajuan->alamat_ig }}" target="_blank" class="hover:underline hover:text-slate-300">
                                                {{ $pengajuan->alamat_ig }}
                                            </a>
                                        </div>
                                    @endif
                                    @if($pengajuan->alamat_tiktok)
                                        <div class="flex items-center gap-1.5 text-slate-400">
                                            <span class="text-slate-200 font-bold">TikTok:</span>
                                            <a href="https://tiktok.com/@{{ $pengajuan->alamat_tiktok }}" target="_blank" class="hover:underline hover:text-slate-300">
                                                {{ $pengajuan->alamat_tiktok }}
                                            </a>
                                        </div>
                                    @endif
                                    @if(!$pengajuan->alamat_ig && !$pengajuan->alamat_tiktok)
                                        <span class="text-slate-600 italic">Tidak dicantumkan</span>
                                    @endif
                                </td>

                                <!-- Bukti Setor -->
                                <td class="py-4 px-6">
                                    <a href="{{ asset($pengajuan->bukti_setor) }}" target="_blank" 
                                       class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-500/10 border border-blue-500/20 hover:bg-blue-500/20 text-blue-400 hover:text-blue-300 transition text-xs font-semibold rounded-lg">
                                        <!-- Eye Icon -->
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Lihat Bukti
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-12 text-center text-slate-500 italic">
                                    Belum ada data pengajuan awal yang masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Section -->
            @if($pengajuans->hasPages())
                <div class="bg-slate-950/40 px-6 py-4 border-t border-slate-800">
                    {{ $pengajuans->links() }}
                </div>
            @endif
        </div>

    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-900 bg-slate-950 py-6 text-center text-xs text-slate-600">
        <div class="max-w-7xl mx-auto px-4">
            <p>&copy; {{ date('Y') }} LyfeBillionare. Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </footer>

</body>
</html>
