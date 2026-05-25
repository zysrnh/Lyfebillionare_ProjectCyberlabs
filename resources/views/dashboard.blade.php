<x-app-layout>
    <!-- Outfit Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif !important;
        }
        @keyframes dashboardEntrance {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-dashboard {
            animation: dashboardEntrance 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>

    <x-slot name="header">
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-900 tracking-tight leading-none">
                    {{ __('Kelola Pengajuan Masuk') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1.5 font-medium">Sistem monitoring dan pengelolaan data pendaftar LyFeBillionaires.</p>
            </div>
            
            <div class="flex flex-wrap items-center gap-3 w-full lg:w-auto">
                <!-- Export Excel -->
                <a href="{{ route('pengajuan.admin.export') }}" 
                   class="px-5 py-2.5 bg-white border border-emerald-200 hover:bg-emerald-50 text-emerald-700 text-xs font-extrabold rounded-full transition duration-150 inline-flex items-center gap-2 shadow-sm uppercase tracking-wider">
                    <!-- Excel / Sheet Grid Icon -->
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Excel
                </a>

                <!-- Tambah Manual -->
                <a href="{{ route('pengajuan.admin.create') }}" 
                   class="px-5 py-2.5 bg-white border border-[#000B7E]/20 hover:bg-[#000B7E]/5 text-[#000B7E] text-xs font-extrabold rounded-full transition duration-150 inline-flex items-center gap-2 shadow-sm uppercase tracking-wider">
                    <!-- Pen / Edit Icon -->
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Tambah Manual
                </a>

                <!-- Formulir Baru -->
                <a href="{{ route('pengajuan.create') }}" target="_blank" 
                   class="px-5 py-2.5 bg-[#000B7E] hover:bg-[#000966] text-white text-xs font-extrabold rounded-full transition duration-150 inline-flex items-center gap-2 shadow-sm uppercase tracking-wider">
                    <!-- Plus Icon -->
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Formulir Baru
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-[calc(100vh-140px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6 animate-dashboard">
            
            <!-- Notification banner if session has success -->
            @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl text-xs font-bold flex items-center gap-2 shadow-sm">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Clean Statistics Widgets Grid (Enhanced Premium Design) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Stat 1: Total Pengajuan -->
                <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm flex items-center justify-between group hover:border-[#000B7E]/30 transition duration-150">
                    <div class="space-y-1">
                        <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-widest">Total Pengajuan</span>
                        <strong class="text-3xl font-extrabold text-slate-900 leading-none">
                            {{ $pengajuans->total() }}
                        </strong>
                    </div>
                    <div class="p-4 bg-[#ebf3fc] rounded-2xl text-[#000B7E]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Stat 2: Sudah Menikah -->
                <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm flex items-center justify-between group hover:border-emerald-200 transition duration-150">
                    <div class="space-y-1">
                        <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-widest">Sudah Menikah</span>
                        <strong class="text-3xl font-extrabold text-slate-900 leading-none">
                            {{ \App\Models\Pengajuan::where('status_pernikahan', 'Menikah')->count() }}
                        </strong>
                    </div>
                    <div class="p-4 bg-[#ecfdf5] rounded-2xl text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </div>

                <!-- Stat 3: Belum Menikah -->
                <div class="bg-white border border-slate-200/80 rounded-2xl p-6 shadow-sm flex items-center justify-between group hover:border-violet-200 transition duration-150">
                    <div class="space-y-1">
                        <span class="text-[10px] font-bold text-slate-400 block uppercase tracking-widest">Belum Menikah</span>
                        <strong class="text-3xl font-extrabold text-slate-900 leading-none">
                            {{ \App\Models\Pengajuan::where('status_pernikahan', 'Belum Menikah')->count() }}
                        </strong>
                    </div>
                    <div class="p-4 bg-[#f5f3ff] rounded-2xl text-violet-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Main Management Table Card -->
            <div class="bg-white border border-slate-200/80 rounded-2xl overflow-hidden shadow-sm">
                
                <!-- Table Controls Header -->
                <div class="p-5 border-b border-slate-200/80 flex flex-wrap justify-between items-center bg-slate-50/50 gap-4">
                    <div class="flex items-center gap-3">
                        <h3 class="font-extrabold text-base text-slate-800 tracking-tight">Daftar Submisi Pengajuan</h3>
                        
                        <!-- Bulk Delete Button (hidden by default) -->
                        <button type="button" id="btn-bulk-delete" onclick="submitBulkDelete()" class="hidden items-center gap-1.5 px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white font-extrabold text-xs rounded-full shadow-sm transition active:scale-95">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus Terpilih (<span id="selected-count">0</span>)
                        </button>
                    </div>
                    
                    <span class="text-xs text-slate-500 font-bold bg-slate-100 border border-slate-200/60 px-3 py-1 rounded-full">
                        Halaman {{ $pengajuans->currentPage() }} dari {{ $pengajuans->lastPage() }}
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50/70 text-slate-500 text-[10px] uppercase tracking-widest font-bold">
                                <th class="py-3.5 px-6 text-center w-12">
                                    <input type="checkbox" id="select-all" class="rounded border-slate-300 text-[#000B7E] focus:ring-[#000B7E]">
                                </th>
                                <th class="py-3.5 px-6">Tanggal Masuk</th>
                                <th class="py-3.5 px-6">Identitas Pendaftar</th>
                                <th class="py-3.5 px-6">Nomor HP & WhatsApp</th>
                                <th class="py-3.5 px-6">Pekerjaan & Status</th>
                                <th class="py-3.5 px-6">Media Sosial</th>
                                <th class="py-3.5 px-6 text-center">Verifikasi Pembayaran</th>
                                <th class="py-3.5 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                            @forelse($pengajuans as $pengajuan)
                                <tr class="hover:bg-slate-50/40 transition duration-100">
                                    <!-- Bulk Select Checkbox -->
                                    <td class="py-4 px-6 text-center w-12">
                                        <input type="checkbox" value="{{ $pengajuan->id }}" class="row-checkbox rounded border-slate-300 text-[#000B7E] focus:ring-[#000B7E]">
                                    </td>

                                    <!-- Tanggal Masuk -->
                                    <td class="py-4 px-6">
                                        <span class="text-xs font-bold text-slate-600 block">{{ $pengajuan->created_at->format('d M Y') }}</span>
                                        <span class="text-[10px] font-semibold text-slate-400 block mt-0.5">{{ $pengajuan->created_at->format('H:i') }} WIB</span>
                                    </td>

                                    <!-- Identitas -->
                                    <td class="py-4 px-6">
                                        <strong class="text-slate-900 block text-sm font-extrabold">{{ $pengajuan->nama_lengkap }}</strong>
                                        <span class="text-xs text-slate-500 block mt-0.5">Email: {{ $pengajuan->email }}</span>
                                        <span class="text-[10px] text-slate-400 block font-semibold">Lahir: {{ \Carbon\Carbon::parse($pengajuan->tgl_lahir)->format('d-m-Y') }}</span>
                                    </td>

                                    <!-- Kontak / WhatsApp -->
                                    <td class="py-4 px-6">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengajuan->no_hp) }}" target="_blank" 
                                           class="inline-flex items-center gap-1.5 text-emerald-700 hover:text-emerald-800 font-extrabold text-xs bg-[#ecfdf5] border border-emerald-200/80 px-3.5 py-2 rounded-full transition duration-100 shadow-sm active:scale-95">
                                            <!-- WhatsApp Icon -->
                                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.031 2c-5.516 0-9.999 4.486-9.999 10.002 0 1.901.533 3.677 1.458 5.201l-1.49 5.43c-.116.425.263.804.688.688l5.43-1.49c1.524.925 3.3 1.458 5.201 1.458 5.516 0 10.002-4.486 10.002-10.002 0-5.516-4.486-10.002-10.002-10.002zm5.727 14.129c-.275.772-1.341 1.415-1.854 1.472-.444.05-1.02.074-2.827-.674-2.31-.956-3.791-3.3-3.906-3.456-.114-.155-.935-1.246-.935-2.378 0-1.132.592-1.686.804-1.914.212-.228.462-.285.616-.285.155 0 .307.001.442.008.143.007.337-.054.527.402.196.471.674 1.644.733 1.765.059.12.098.261.019.418-.079.158-.119.261-.238.4-.119.139-.251.31-.358.416-.12.119-.244.249-.105.487.139.238.616 1.011 1.186 1.52.735.654 1.353.856 1.545.952.193.096.306.079.42-.053.114-.132.492-.573.623-.768.132-.196.264-.162.443-.096.179.066 1.137.536 1.332.634.195.099.325.148.373.23.049.083.049.48-.226 1.252z"></path>
                                            </svg>
                                            {{ $pengajuan->no_hp }}
                                        </a>
                                    </td>

                                    <!-- Pekerjaan & Status -->
                                    <td class="py-4 px-6">
                                        <span class="font-extrabold text-slate-800 block text-xs">{{ $pengajuan->pekerjaan }}</span>
                                        <span class="text-xs text-slate-500 font-semibold block mt-0.5">{{ $pengajuan->status_pernikahan }}</span>
                                    </td>

                                    <!-- Media Sosial -->
                                    <td class="py-4 px-6 text-xs space-y-2">
                                        @if($pengajuan->alamat_ig)
                                            <div class="flex items-center gap-2 text-slate-600">
                                                <span class="p-1.5 bg-rose-50 border border-rose-100 rounded-lg shrink-0 block" title="Instagram">
                                                    <svg class="w-3.5 h-3.5 text-rose-600" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                                    </svg>
                                                </span>
                                                <a href="https://instagram.com/{{ ltrim($pengajuan->alamat_ig, '@') }}" target="_blank" class="hover:underline hover:text-[#000B7E] font-bold">
                                                    @<span>{{ ltrim($pengajuan->alamat_ig, '@') }}</span>
                                                </a>
                                            </div>
                                        @endif
                                        @if($pengajuan->alamat_tiktok)
                                            <div class="flex items-center gap-2 text-slate-600">
                                                <span class="p-1.5 bg-slate-100 border border-slate-200 rounded-lg shrink-0 block" title="TikTok">
                                                    <svg class="w-3.5 h-3.5 text-slate-800" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.17-2.86-.74-3.99-1.72-.08-.07-.17-.14-.24-.22v7.11c.04 3.41-1.66 6.84-4.89 8.16-3.23 1.32-7.23.47-9.58-2.02-2.35-2.5-2.69-6.73-1.12-9.75 1.57-3.03 5.15-4.95 8.57-4.48v4.07c-2.03-.43-4.32.41-5.18 2.29-.86 1.87-.23 4.41 1.41 5.48 1.64 1.07 4.07.69 5.08-1.04.29-.5.42-1.07.41-1.64V0l.28.02z"/>
                                                    </svg>
                                                </span>
                                                <a href="https://tiktok.com/@{{ ltrim($pengajuan->alamat_tiktok, '@') }}" target="_blank" class="hover:underline hover:text-[#000B7E] font-bold">
                                                    @<span>{{ ltrim($pengajuan->alamat_tiktok, '@') }}</span>
                                                </a>
                                            </div>
                                        @endif
                                        @if(!$pengajuan->alamat_ig && !$pengajuan->alamat_tiktok)
                                            <span class="text-slate-400 italic text-xs font-medium">Tidak dicantumkan</span>
                                        @endif
                                    </td>

                                    <!-- Bukti Setor -->
                                    <td class="py-4 px-6 text-center">
                                        <button onclick="openImageModal('{{ asset($pengajuan->bukti_setor) }}')"
                                           class="inline-flex items-center gap-1 px-4 py-2 bg-[#000B7E] hover:bg-[#000966] text-white transition text-xs font-extrabold rounded-full shadow-sm active:scale-95">
                                            <!-- Eye Icon -->
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Lihat Bukti
                                        </button>
                                    </td>

                                    <!-- Action / Buttons -->
                                    <td class="py-4 px-6 text-center">
                                        <div class="inline-flex items-center justify-center gap-1">
                                            <!-- Edit Button -->
                                            <a href="{{ route('pengajuan.admin.edit', $pengajuan->id) }}" class="inline-flex items-center justify-center p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-full transition duration-100 shadow-none border border-transparent hover:border-blue-100 active:scale-95" title="Edit Data">
                                                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>

                                            <!-- Delete Button -->
                                            <form action="{{ route('pengajuan.admin.destroy', $pengajuan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pendaftar {{ $pengajuan->nama_lengkap }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center justify-center p-2 text-rose-600 hover:text-rose-800 hover:bg-rose-50 rounded-full transition duration-100 shadow-none border border-transparent hover:border-rose-100 active:scale-95" title="Hapus Data">
                                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="py-12 text-center text-slate-400 italic font-medium">
                                        Belum ada data pengajuan awal yang masuk ke database.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer -->
                @if($pengajuans->hasPages())
                    <div class="px-6 py-4 border-t border-slate-200/80 bg-slate-50/50">
                        {{ $pengajuans->links() }}
                    </div>
                @endif

            </div>

        </div>
    </div>

    <!-- Premium Image Preview Modal -->
    <div id="image-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-md hidden opacity-0 transition-all duration-300">
        <div class="max-w-2xl w-full bg-white rounded-[24px] overflow-hidden shadow-2xl border border-slate-200 transform scale-95 transition-all duration-300 relative flex flex-col">
            
            <!-- Modal Header -->
            <div class="p-4 border-b border-slate-100 flex justify-between items-center bg-white">
                <h3 class="font-extrabold text-sm text-slate-800 tracking-tight flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#000B7E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Bukti Pembayaran Pendaftar
                </h3>
                <button onclick="closeImageModal()" class="text-slate-400 hover:text-slate-600 transition p-1 rounded-full hover:bg-slate-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal Content / Image Display -->
            <div class="p-6 bg-slate-50 flex justify-center items-center overflow-auto max-h-[70vh]">
                <img id="modal-preview-image" src="" class="max-w-full max-h-[60vh] object-contain rounded-xl border border-slate-200/80 shadow-md" alt="Bukti Transfer">
            </div>

            <!-- Modal Footer -->
            <div class="p-4 border-t border-slate-100 flex justify-end bg-white">
                <button onclick="closeImageModal()" class="px-6 py-2 bg-[#000B7E] hover:bg-[#000966] text-white text-xs font-extrabold rounded-full transition duration-150 uppercase tracking-wider shadow-sm active:scale-98">
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Hidden Bulk Delete Form -->
    <form id="bulk-delete-form" action="{{ route('pengajuan.admin.bulk-destroy') }}" method="POST" class="hidden">
        @csrf
    </form>

    <!-- Script for Premium Image Pop-up & Bulk Actions -->
    <script>
        function openImageModal(imgSrc) {
            const modal = document.getElementById('image-modal');
            const previewImg = document.getElementById('modal-preview-image');
            
            // Set source
            previewImg.src = imgSrc;
            
            // Reveal beautifully
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.firstElementChild.classList.remove('scale-95');
            }, 10);
        }

        function closeImageModal() {
            const modal = document.getElementById('image-modal');
            const previewImg = document.getElementById('modal-preview-image');
            modal.classList.add('opacity-0');
            modal.firstElementChild.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                previewImg.src = ''; // Clear image src to avoid flashing previous image on next open
            }, 300);
        }

        // --- SELECT ALL & BULK ACTIONS LOGIC ---
        const selectAllCheckbox = document.getElementById('select-all');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        const btnBulkDelete = document.getElementById('btn-bulk-delete');
        const selectedCountSpan = document.getElementById('selected-count');

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function() {
                rowCheckboxes.forEach(cb => {
                    cb.checked = selectAllCheckbox.checked;
                });
                updateBulkDeleteButton();
            });
        }

        rowCheckboxes.forEach(cb => {
            cb.addEventListener('change', function() {
                // If one checkbox is unchecked, uncheck select-all
                const allChecked = Array.from(rowCheckboxes).every(c => c.checked);
                if (selectAllCheckbox) {
                    selectAllCheckbox.checked = allChecked;
                }
                updateBulkDeleteButton();
            });
        });

        function updateBulkDeleteButton() {
            const checkedCount = Array.from(rowCheckboxes).filter(c => c.checked).length;
            if (selectedCountSpan) {
                selectedCountSpan.textContent = checkedCount;
            }

            if (checkedCount > 0) {
                btnBulkDelete.classList.remove('hidden');
                btnBulkDelete.classList.add('inline-flex');
            } else {
                btnBulkDelete.classList.add('hidden');
                btnBulkDelete.classList.remove('inline-flex');
            }
        }

        function submitBulkDelete() {
            const checkedBoxes = Array.from(rowCheckboxes).filter(c => c.checked);
            if (checkedBoxes.length === 0) return;

            if (confirm(`Apakah Anda yakin ingin menghapus ${checkedBoxes.length} data pendaftar terpilih?`)) {
                const bulkForm = document.getElementById('bulk-delete-form');
                
                // Clear any existing hidden fields first
                bulkForm.querySelectorAll('input[name="ids[]"]').forEach(el => el.remove());

                // Append selected IDs
                checkedBoxes.forEach(cb => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'ids[]';
                    input.value = cb.value;
                    bulkForm.appendChild(input);
                });

                bulkForm.submit();
            }
        }
    </script>
</x-app-layout>
