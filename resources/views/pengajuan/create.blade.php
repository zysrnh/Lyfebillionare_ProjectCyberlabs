<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Awal - LyfeBillionaire</title>
    
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
    
    <!-- Decorative Ambient Background Lights -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-emerald-500 rounded-full blur-[150px] opacity-20 animate-pulse"></div>
        <div class="absolute top-1/2 -right-40 w-[450px] h-[450px] bg-blue-600 rounded-full blur-[180px] opacity-15"></div>
    </div>

    <!-- Header / Navbar -->
    <header class="border-b border-slate-800/80 bg-slate-950/70 backdrop-blur-md sticky top-0 z-50 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-gradient-to-tr from-emerald-500 to-teal-400 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/20">
                    <span class="font-extrabold text-slate-950 text-xl tracking-tighter">L</span>
                </div>
                <div>
                    <span class="font-bold text-lg tracking-wide bg-gradient-to-r from-white via-slate-200 to-emerald-400 bg-clip-text text-transparent">LyfeBillionaire</span>
                    <span class="text-xs block text-slate-400 -mt-1">Cyberlabs System</span>
                </div>
            </div>
            
            <nav class="flex items-center gap-4">
                <a href="/" class="text-slate-400 hover:text-white transition text-sm">Beranda</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg bg-slate-900 border border-slate-800 hover:bg-slate-800 transition text-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="px-4 py-2 rounded-lg bg-slate-900 border border-slate-800 hover:bg-slate-800 transition text-sm">Masuk</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Main Content Form Section -->
    <main class="flex-grow flex items-center justify-center py-12 px-4 relative">
        <div class="max-w-2xl w-full bg-slate-900/40 backdrop-blur-xl border border-slate-800/80 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
            
            <!-- Form Glow Accent Line -->
            <div class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-emerald-500 via-teal-400 to-blue-500"></div>

            <div class="mb-8 text-center">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 mb-3 uppercase tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-ping"></span>
                    Data Awal Pengajuan
                </span>
                <h1 class="text-3xl font-extrabold tracking-tight text-white mb-2">Formulir Pengajuan Pertemuan</h1>
                <p class="text-slate-400 text-sm max-w-md mx-auto">
                    Silakan isi lengkap data awal Anda untuk dijadwalkan ngobrol dahulu & diarahkan bertemu langsung di Acara.
                </p>
            </div>

            <!-- Display Error Alert if any -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-400 rounded-xl text-sm">
                    <span class="font-semibold block mb-1">Terjadi kesalahan input:</span>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Group 1: Informasi Diri -->
                <div class="border-b border-slate-800/60 pb-6">
                    <h3 class="text-sm font-semibold text-slate-300 mb-4 uppercase tracking-wider">I. Informasi Pribadi</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        
                        <!-- Nama Lengkap -->
                        <div class="space-y-2">
                            <label for="nama_lengkap" class="text-xs font-semibold text-slate-300">Nama Lengkap <span class="text-emerald-400">*</span></label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}"
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-100 placeholder:text-slate-600 focus:outline-none focus:border-emerald-500/80 focus:ring-1 focus:ring-emerald-500/30 transition duration-200 text-sm"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="space-y-2">
                            <label for="tgl_lahir" class="text-xs font-semibold text-slate-300">Tanggal Lahir <span class="text-emerald-400">*</span></label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" required value="{{ old('tgl_lahir') }}"
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-100 placeholder:text-slate-600 focus:outline-none focus:border-emerald-500/80 focus:ring-1 focus:ring-emerald-500/30 transition duration-200 text-sm">
                        </div>

                        <!-- No. HP (WhatsApp) -->
                        <div class="space-y-2">
                            <label for="no_hp" class="text-xs font-semibold text-slate-300">No. HP / WhatsApp <span class="text-emerald-400">*</span></label>
                            <input type="text" name="no_hp" id="no_hp" required value="{{ old('no_hp') }}"
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-100 placeholder:text-slate-600 focus:outline-none focus:border-emerald-500/80 focus:ring-1 focus:ring-emerald-500/30 transition duration-200 text-sm"
                                placeholder="Contoh: 08123456789">
                        </div>

                        <!-- Alamat Email -->
                        <div class="space-y-2">
                            <label for="email" class="text-xs font-semibold text-slate-300">Alamat Email <span class="text-emerald-400">*</span></label>
                            <input type="email" name="email" id="email" required value="{{ old('email', Auth::user()?->email) }}"
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-100 placeholder:text-slate-600 focus:outline-none focus:border-emerald-500/80 focus:ring-1 focus:ring-emerald-500/30 transition duration-200 text-sm"
                                placeholder="Contoh: nama@domain.com">
                        </div>

                    </div>
                </div>

                <!-- Group 2: Detail Profil -->
                <div class="border-b border-slate-800/60 pb-6">
                    <h3 class="text-sm font-semibold text-slate-300 mb-4 uppercase tracking-wider">II. Detail Pekerjaan & Status</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- Pekerjaan -->
                        <div class="space-y-2">
                            <label for="pekerjaan" class="text-xs font-semibold text-slate-300">Pekerjaan <span class="text-emerald-400">*</span></label>
                            <input type="text" name="pekerjaan" id="pekerjaan" required value="{{ old('pekerjaan') }}"
                                class="w-full bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 text-slate-100 placeholder:text-slate-600 focus:outline-none focus:border-emerald-500/80 focus:ring-1 focus:ring-emerald-500/30 transition duration-200 text-sm"
                                placeholder="Masukkan jenis pekerjaan Anda">
                        </div>

                        <!-- Status Pernikahan -->
                        <div class="space-y-2">
                            <label class="text-xs font-semibold text-slate-300">Status Pernikahan <span class="text-emerald-400">*</span></label>
                            <div class="flex gap-4">
                                <label class="flex-1 flex items-center justify-between bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 cursor-pointer hover:border-slate-700 transition duration-200 text-sm">
                                    <span class="text-slate-300">Belum Menikah</span>
                                    <input type="radio" name="status_pernikahan" value="Belum Menikah" required {{ old('status_pernikahan') == 'Belum Menikah' ? 'checked' : '' }}
                                        class="w-4 h-4 text-emerald-500 focus:ring-emerald-500/50 bg-slate-900 border-slate-800">
                                </label>
                                <label class="flex-1 flex items-center justify-between bg-slate-950/80 border border-slate-800 rounded-xl px-4 py-3 cursor-pointer hover:border-slate-700 transition duration-200 text-sm">
                                    <span class="text-slate-300">Sudah Menikah</span>
                                    <input type="radio" name="status_pernikahan" value="Menikah" required {{ old('status_pernikahan') == 'Menikah' ? 'checked' : '' }}
                                        class="w-4 h-4 text-emerald-500 focus:ring-emerald-500/50 bg-slate-900 border-slate-800">
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Group 3: Media Sosial -->
                <div class="border-b border-slate-800/60 pb-6">
                    <h3 class="text-sm font-semibold text-slate-300 mb-4 uppercase tracking-wider">III. Media Sosial</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- Alamat IG -->
                        <div class="space-y-2">
                            <label for="alamat_ig" class="text-xs font-semibold text-slate-300">Username / URL Instagram</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-sm">
                                    @
                                </div>
                                <input type="text" name="alamat_ig" id="alamat_ig" value="{{ old('alamat_ig') }}"
                                    class="w-full bg-slate-950/80 border border-slate-800 rounded-xl pl-9 pr-4 py-3 text-slate-100 placeholder:text-slate-600 focus:outline-none focus:border-emerald-500/80 focus:ring-1 focus:ring-emerald-500/30 transition duration-200 text-sm"
                                    placeholder="username_instagram">
                            </div>
                        </div>

                        <!-- Alamat TikTok -->
                        <div class="space-y-2">
                            <label for="alamat_tiktok" class="text-xs font-semibold text-slate-300">Username / URL TikTok</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-sm">
                                    @
                                </div>
                                <input type="text" name="alamat_tiktok" id="alamat_tiktok" value="{{ old('alamat_tiktok') }}"
                                    class="w-full bg-slate-950/80 border border-slate-800 rounded-xl pl-9 pr-4 py-3 text-slate-100 placeholder:text-slate-600 focus:outline-none focus:border-emerald-500/80 focus:ring-1 focus:ring-emerald-500/30 transition duration-200 text-sm"
                                    placeholder="username_tiktok">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Group 4: Bukti Setor Pembayaran -->
                <div class="pb-4">
                    <h3 class="text-sm font-semibold text-slate-300 mb-2 uppercase tracking-wider">IV. Verifikasi Pembayaran</h3>
                    <p class="text-slate-400 text-xs mb-4">
                        Mohon upload bukti transfer setor investasi awal sebesar <strong class="text-emerald-400">Rp 100.000 / pax</strong>.
                    </p>

                    <div class="space-y-2">
                        <label class="text-xs font-semibold text-slate-300">Bukti Transfer Setor <span class="text-emerald-400">*</span></label>
                        
                        <!-- Premium Custom File Input Box -->
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col items-center justify-center w-full h-44 border-2 border-dashed border-slate-800 hover:border-emerald-500/50 bg-slate-950/50 hover:bg-slate-950/80 rounded-2xl cursor-pointer transition duration-300 group">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 text-center px-4">
                                    <!-- Upload Icon -->
                                    <div class="p-3 bg-emerald-500/10 rounded-full text-emerald-400 group-hover:scale-110 transition duration-300 mb-3 border border-emerald-500/20">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-300 mb-1 group-hover:text-emerald-400 transition">Klik untuk upload file</p>
                                    <p class="text-xs text-slate-500">Mendukung format JPEG, PNG, JPG, atau WEBP (Maksimal 5MB)</p>
                                </div>
                                <input type="file" name="bukti_setor" id="bukti_setor" required class="hidden" accept="image/*" onchange="previewFile()">
                            </label>
                        </div>
                        
                        <!-- File Upload Status / Preview -->
                        <div id="file-info" class="hidden mt-2 p-3 bg-slate-950/80 border border-slate-800 rounded-xl flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2 text-slate-300">
                                <svg class="w-4 h-4 text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span id="file-name" class="font-medium truncate max-w-[250px]">Namafile.jpg</span>
                            </div>
                            <span id="file-size" class="text-slate-500 font-mono">1.2 MB</span>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full relative group overflow-hidden bg-gradient-to-r from-emerald-500 via-teal-500 to-blue-600 hover:from-emerald-400 hover:to-blue-500 text-slate-950 font-bold py-4 px-6 rounded-2xl shadow-xl shadow-emerald-500/10 hover:shadow-emerald-500/20 active:scale-[0.99] transition duration-200 text-sm tracking-wide uppercase">
                    <!-- Glow button effect -->
                    <span class="absolute inset-0 bg-white/10 opacity-0 group-hover:opacity-100 transition duration-300"></span>
                    Kirim Pengajuan Awal
                </button>

            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-900 bg-slate-950 py-6 text-center text-xs text-slate-600">
        <div class="max-w-6xl mx-auto px-4">
            <p>&copy; {{ date('Y') }} LyfeBillionare. Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </footer>

    <!-- Script for Dynamic Preview -->
    <script>
        function previewFile() {
            const fileInput = document.getElementById('bukti_setor');
            const fileInfo = document.getElementById('file-info');
            const fileName = document.getElementById('file-name');
            const fileSize = document.getElementById('file-size');

            if (fileInput.files.length > 0) {
                const file = fileInput.files[0];
                fileName.textContent = file.name;
                
                // Convert size to human readable MB/KB
                const sizeInMB = (file.size / (1024 * 1024)).toFixed(2);
                if (sizeInMB > 0.1) {
                    fileSize.textContent = sizeInMB + ' MB';
                } else {
                    fileSize.textContent = (file.size / 1024).toFixed(0) + ' KB';
                }
                
                fileInfo.classList.remove('hidden');
            } else {
                fileInfo.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
