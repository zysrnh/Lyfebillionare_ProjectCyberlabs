<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-900 tracking-tight">
                    {{ __('Kelola Pengajuan Masuk') }}
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">Sistem monitoring dan pengelolaan data awal pendaftar LyfeBillionaire.</p>
            </div>
            
            <a href="{{ route('pengajuan.create') }}" target="_blank" 
               class="px-4 py-2 bg-[#000B7E] hover:bg-[#000966] text-white text-xs font-bold rounded-lg transition duration-150 inline-flex items-center gap-1.5 shadow-sm">
                <!-- Plus Icon -->
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                </svg>
                Formulir Baru
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-[calc(100vh-140px)]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            
            <!-- Notification banner if session has success -->
            @if(session('success'))
                <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Clean Statistics Widgets Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Stat 1: Total Pengajuan -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex items-center gap-4">
                    <div class="p-3.5 bg-slate-100 rounded-xl text-[#000B7E]">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-slate-400 block uppercase tracking-wider">Total Pengajuan</span>
                        <strong class="text-3xl font-extrabold text-slate-800 leading-tight">
                            {{ $pengajuans->total() }}
                        </strong>
                    </div>
                </div>

                <!-- Stat 2: Sudah Menikah -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex items-center gap-4">
                    <div class="p-3.5 bg-emerald-50 rounded-xl text-emerald-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-slate-400 block uppercase tracking-wider">Sudah Menikah</span>
                        <strong class="text-3xl font-extrabold text-slate-800 leading-tight">
                            {{ \App\Models\Pengajuan::where('status_pernikahan', 'Menikah')->count() }}
                        </strong>
                    </div>
                </div>

                <!-- Stat 3: Belum Menikah -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm flex items-center gap-4">
                    <div class="p-3.5 bg-indigo-50 rounded-xl text-indigo-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xs font-semibold text-slate-400 block uppercase tracking-wider">Belum Menikah</span>
                        <strong class="text-3xl font-extrabold text-slate-800 leading-tight">
                            {{ \App\Models\Pengajuan::where('status_pernikahan', 'Belum Menikah')->count() }}
                        </strong>
                    </div>
                </div>
            </div>

            <!-- Main Management Table Card -->
            <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">
                
                <!-- Table Controls Header -->
                <div class="p-5 border-b border-slate-200 flex justify-between items-center bg-slate-50/50">
                    <h3 class="font-extrabold text-base text-slate-800 tracking-tight">Daftar Submisi Pengajuan</h3>
                    <span class="text-xs text-slate-500 font-medium">Halaman {{ $pengajuans->currentPage() }} dari {{ $pengajuans->lastPage() }}</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50 text-slate-500 text-xs uppercase tracking-wider font-semibold">
                                <th class="py-3 px-6">Tanggal Masuk</th>
                                <th class="py-3 px-6">Identitas Pendaftar</th>
                                <th class="py-3 px-6">Nomor HP & WhatsApp</th>
                                <th class="py-3 px-6">Pekerjaan & Status</th>
                                <th class="py-3 px-6">Media Sosial</th>
                                <th class="py-3 px-6 text-center">Verifikasi Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700 text-sm">
                            @forelse($pengajuans as $pengajuan)
                                <tr class="hover:bg-slate-50/40 transition">
                                    <!-- Tanggal Masuk -->
                                    <td class="py-4 px-6">
                                        <span class="text-xs font-mono text-slate-500 block">{{ $pengajuan->created_at->format('d M Y') }}</span>
                                        <span class="text-[10px] font-mono text-slate-400 block">{{ $pengajuan->created_at->format('H:i') }} WIB</span>
                                    </td>

                                    <!-- Identitas -->
                                    <td class="py-4 px-6">
                                        <strong class="text-slate-900 block text-sm font-bold">{{ $pengajuan->nama_lengkap }}</strong>
                                        <span class="text-xs text-slate-500 block">Email: {{ $pengajuan->email }}</span>
                                        <span class="text-xs text-slate-400 block">Lahir: {{ \Carbon\Carbon::parse($pengajuan->tgl_lahir)->format('d-m-Y') }}</span>
                                    </td>

                                    <!-- Kontak / WhatsApp -->
                                    <td class="py-4 px-6">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $pengajuan->no_hp) }}" target="_blank" 
                                           class="inline-flex items-center gap-1 text-emerald-700 hover:text-emerald-800 font-semibold text-xs bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-md transition duration-100">
                                            <!-- WhatsApp Icon -->
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.031 2c-5.516 0-9.999 4.486-9.999 10.002 0 1.901.533 3.677 1.458 5.201l-1.49 5.43c-.116.425.263.804.688.688l5.43-1.49c1.524.925 3.3 1.458 5.201 1.458 5.516 0 10.002-4.486 10.002-10.002 0-5.516-4.486-10.002-10.002-10.002zm5.727 14.129c-.275.772-1.341 1.415-1.854 1.472-.444.05-1.02.074-2.827-.674-2.31-.956-3.791-3.3-3.906-3.456-.114-.155-.935-1.246-.935-2.378 0-1.132.592-1.686.804-1.914.212-.228.462-.285.616-.285.155 0 .307.001.442.008.143.007.337-.054.527.402.196.471.674 1.644.733 1.765.059.12.098.261.019.418-.079.158-.119.261-.238.4-.119.139-.251.31-.358.416-.12.119-.244.249-.105.487.139.238.616 1.011 1.186 1.52.735.654 1.353.856 1.545.952.193.096.306.079.42-.053.114-.132.492-.573.623-.768.132-.196.264-.162.443-.096.179.066 1.137.536 1.332.634.195.099.325.148.373.23.049.083.049.48-.226 1.252z"></path>
                                            </svg>
                                            {{ $pengajuan->no_hp }}
                                        </a>
                                    </td>

                                    <!-- Pekerjaan & Status -->
                                    <td class="py-4 px-6">
                                        <span class="font-semibold text-slate-800 block text-xs">{{ $pengajuan->pekerjaan }}</span>
                                        <span class="text-xs text-slate-500 block">{{ $pengajuan->status_pernikahan }}</span>
                                    </td>

                                    <!-- Media Sosial -->
                                    <td class="py-4 px-6 text-xs space-y-1">
                                        @if($pengajuan->alamat_ig)
                                            <div class="flex items-center gap-1 text-slate-500">
                                                <span class="text-rose-500 font-bold text-[10px]">IG:</span>
                                                <a href="https://instagram.com/{{ $pengajuan->alamat_ig }}" target="_blank" class="hover:underline hover:text-slate-800 font-medium">
                                                    {{ $pengajuan->alamat_ig }}
                                                </a>
                                            </div>
                                        @endif
                                        @if($pengajuan->alamat_tiktok)
                                            <div class="flex items-center gap-1 text-slate-500">
                                                <span class="text-slate-800 font-bold text-[10px]">TikTok:</span>
                                                <a href="https://tiktok.com/@{{ $pengajuan->alamat_tiktok }}" target="_blank" class="hover:underline hover:text-slate-800 font-medium">
                                                    {{ $pengajuan->alamat_tiktok }}
                                                </a>
                                            </div>
                                        @endif
                                        @if(!$pengajuan->alamat_ig && !$pengajuan->alamat_tiktok)
                                            <span class="text-slate-400 italic text-xs">Tidak dicantumkan</span>
                                        @endif
                                    </td>

                                    <!-- Bukti Setor -->
                                    <td class="py-4 px-6 text-center">
                                        <a href="{{ asset($pengajuan->bukti_setor) }}" target="_blank" 
                                           class="inline-flex items-center gap-1 px-3 py-1.5 bg-[#000B7E]/10 border border-[#000B7E]/20 hover:bg-[#000B7E]/20 text-[#000B7E] transition text-xs font-bold rounded-lg">
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
                                    <td colspan="6" class="py-12 text-center text-slate-400 italic">
                                        Belum ada data pengajuan awal yang masuk ke database.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination Footer -->
                @if($pengajuans->hasPages())
                    <div class="px-6 py-4 border-t border-slate-200 bg-slate-50/50">
                        {{ $pengajuans->links() }}
                    </div>
                @endif

            </div>

        </div>
    </div>
</x-app-layout>
