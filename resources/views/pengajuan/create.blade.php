<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan - LyFeBillionaires</title>
    
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
        /* Custom styling to match reference image inputs */
        .custom-input {
            border-radius: 9999px;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 0.85rem 1.5rem;
            transition: all 0.15s ease-in-out;
        }
        .custom-input:focus {
            outline: none;
            border-color: #000B7E;
            box-shadow: 0 0 0 2px rgba(0, 11, 126, 0.1);
            background-color: #fcfdfe;
        }
        .custom-input:not(:placeholder-shown) {
            background-color: #f7f9fc; /* Soft active state background from image */
        }

        /* Premium Intro Animations */
        @keyframes cardEntrance {
            0% {
                opacity: 0;
                transform: translateY(40px) scale(0.97);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(15px);
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
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.15s forwards;
        }
    </style>
</head>
<body class="text-slate-800 min-h-screen flex flex-col justify-between selection:bg-[#000B7E] selection:text-white">

    <!-- Top Watermark (Company Brand Touch) -->
    <div class="max-w-2xl mx-auto w-full px-6 pt-6 flex justify-between items-center text-xs text-slate-500 font-bold tracking-widest uppercase opacity-75">
        <span>LYFEBILLIONAIRES</span>
        <span class="text-[9px] px-2 py-0.5 border border-slate-400/30 rounded-md">FORMULIR</span>
    </div>

    <!-- Empty space instead of header -->
    <div class="pt-4"></div>

    <!-- Main Content Form Section -->
    <main class="flex-grow flex items-center justify-center py-10 px-4">
        <div class="max-w-2xl w-full bg-white border border-slate-200/80 rounded-[32px] shadow-lg overflow-hidden relative animate-card">
            
            <!-- Top Close X Button (Just decorative to match image layout) -->
            <a href="/" class="absolute right-6 top-6 text-slate-400 hover:text-slate-600 transition z-20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </a>

            <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data" id="pengajuan-form">
                @csrf

                <!-- Form Content Box -->
                <div class="p-8 md:p-10 space-y-8 animate-fade-in-1">
                
                <!-- Styled Logo Badge (Exactly matching the second image) -->
                <div class="flex justify-start">
                    <div class="inline-block px-7 py-2.5 rounded-full bg-[#ebf3fc] border border-[#d3e5f7] text-[#000B7E] font-extrabold text-xs tracking-wider uppercase shadow-sm">
                        DATA AWAL PENGAJUAN
                    </div>
                </div>

                <!-- Section Header -->
                <div>
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 leading-none">Formulir Pengajuan</h1>
                    <p class="text-slate-500 text-xs mt-2 font-medium">Silakan isi lengkap seluruh data awal di bawah ini dengan benar.</p>
                </div>

                <!-- Display Error Alert if any -->
                @if ($errors->any())
                    <div class="p-4 bg-red-50 border border-red-200 text-red-600 rounded-2xl text-xs">
                        <span class="font-bold block mb-1">Terjadi kesalahan input:</span>
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-6">

                    <!-- Selection Toggles (Player 1 / 2 style from image) for Status Pernikahan -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Status Pernikahan <span class="text-[#000B7E]">*</span></label>
                        <div class="flex flex-wrap gap-3">
                            <!-- Belum Menikah Radio Button -->
                            <label class="cursor-pointer">
                                <input type="radio" name="status_pernikahan" value="Belum Menikah" class="sr-only peer" required {{ old('status_pernikahan', 'Belum Menikah') == 'Belum Menikah' ? 'checked' : '' }}>
                                <div class="px-5 py-2.5 rounded-full border border-slate-200 bg-white text-slate-600 font-bold text-xs tracking-wide transition-all duration-150 peer-checked:bg-[#000B7E] peer-checked:text-white peer-checked:border-transparent flex items-center gap-1.5 shadow-sm">
                                    <span class="w-2 h-2 rounded-full bg-slate-300 peer-checked:bg-white inline-block"></span>
                                    Belum Menikah
                                </div>
                            </label>

                            <!-- Sudah Menikah Radio Button -->
                            <label class="cursor-pointer">
                                <input type="radio" name="status_pernikahan" value="Menikah" class="sr-only peer" required {{ old('status_pernikahan') == 'Menikah' ? 'checked' : '' }}>
                                <div class="px-5 py-2.5 rounded-full border border-slate-200 bg-white text-slate-600 font-bold text-xs tracking-wide transition-all duration-150 peer-checked:bg-[#000B7E] peer-checked:text-white peer-checked:border-transparent flex items-center gap-1.5 shadow-sm">
                                    <span class="w-2 h-2 rounded-full bg-slate-300 peer-checked:bg-white inline-block"></span>
                                    Sudah Menikah
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Input Fields Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        
                        <!-- Nama Lengkap -->
                        <div class="space-y-1">
                            <label for="nama_lengkap" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Nama Lengkap *</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}"
                                class="custom-input w-full text-slate-800 placeholder:text-slate-400 text-sm"
                                placeholder="Joseph Loren">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="space-y-1">
                            <label for="tgl_lahir" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Tanggal Lahir *</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" required value="{{ old('tgl_lahir') }}"
                                class="custom-input w-full text-slate-800 text-sm">
                        </div>

                        <!-- No. HP (WhatsApp) -->
                        <div class="space-y-1">
                            <label for="no_hp" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">No. HP (WhatsApp) *</label>
                            <input type="text" name="no_hp" id="no_hp" required value="{{ old('no_hp') }}"
                                class="custom-input w-full text-slate-800 placeholder:text-slate-400 text-sm"
                                placeholder="+62 812 3456 XXX">
                        </div>

                        <!-- Alamat Email -->
                        <div class="space-y-1">
                            <label for="email" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Alamat Email *</label>
                            <input type="email" name="email" id="email" required value="{{ old('email', Auth::user()?->email) }}"
                                class="custom-input w-full text-slate-800 placeholder:text-slate-400 text-sm"
                                placeholder="josephloren@gmail.com">
                        </div>

                        <!-- Pekerjaan -->
                        <div class="space-y-1">
                            <label for="pekerjaan" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Pekerjaan *</label>
                            <input type="text" name="pekerjaan" id="pekerjaan" required value="{{ old('pekerjaan') }}"
                                class="custom-input w-full text-slate-800 placeholder:text-slate-400 text-sm"
                                placeholder="Wiraswasta / Karyawan">
                        </div>

                        <!-- Alamat IG -->
                        <div class="space-y-1">
                            <label for="alamat_ig" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Instagram</label>
                            <input type="text" name="alamat_ig" id="alamat_ig" value="{{ old('alamat_ig') }}"
                                class="custom-input w-full text-slate-800 placeholder:text-slate-400 text-sm"
                                placeholder="@username">
                        </div>

                        <!-- Alamat TikTok -->
                        <div class="space-y-1 md:col-span-2">
                            <label for="alamat_tiktok" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">TikTok</label>
                            <input type="text" name="alamat_tiktok" id="alamat_tiktok" value="{{ old('alamat_tiktok') }}"
                                class="custom-input w-full text-slate-800 placeholder:text-slate-400 text-sm"
                                placeholder="@username_tiktok">
                        </div>

                    </div>

                    <!-- Bukti Setor Pembayaran -->
                    <div class="space-y-3 pt-2">
                        <div class="flex flex-col gap-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Upload Bukti Transfer Setor *</label>
                            
                            <!-- Transfer Information Box -->
                            <div class="p-3.5 bg-[#f0f6fc] border border-[#d3e5f7] rounded-xl text-xs">
                                <ul class="space-y-2 text-slate-600">
                                    <li><span class="font-bold text-[#000B7E] inline-block w-20">Investasi</span> <span class="font-medium text-slate-700">: IDR 100.000 /pax</span> <span class="text-slate-500">(Include: Snacks & Drink)</span></li>
                                    <li class="flex items-center flex-wrap gap-1">
                                        <span class="font-bold text-[#000B7E] inline-block w-20">Transfer ke</span>
                                        <span class="font-medium text-slate-700 mr-0.5">: BCA</span>
                                        <span class="font-mono font-bold text-emerald-600 bg-white px-1.5 py-0.5 rounded shadow-sm border border-slate-200/60 tracking-wider text-[13px]" id="norek-bca">4661166881</span>
                                        <button type="button" onclick="copyNorek()" class="p-1.5 ml-0.5 bg-white border border-slate-200 rounded-md text-slate-400 hover:text-[#000B7E] hover:border-[#000B7E] hover:bg-blue-50 transition-all duration-150 shadow-sm" title="Salin Nomor Rekening">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                            </svg>
                                        </button>
                                        <span class="text-slate-500 ml-1">(a/n Wanda Juwita)</span>
                                    </li>
                                    <li><span class="font-bold text-[#000B7E] inline-block w-20">Berita</span> <span class="font-medium text-slate-700">:</span> <span class="italic text-slate-500">Tuliskan Nama Peserta</span></li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-center w-full mt-1">
                            <label for="bukti_setor" class="flex flex-col items-center justify-center w-full h-36 border border-slate-200 hover:border-[#000B7E]/40 bg-slate-50 hover:bg-slate-100 rounded-2xl cursor-pointer transition duration-150 group">
                                <div class="flex flex-col items-center justify-center pt-4 pb-4 text-center px-4">
                                    <div class="p-2.5 bg-blue-50 rounded-full text-[#000B7E] mb-2 border border-blue-100">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-semibold text-slate-700 mb-0.5">Klik untuk upload bukti setor</p>
                                    <p class="text-[11px] text-slate-400">JPEG, PNG, atau WEBP (Maksimal 5MB)</p>
                                </div>
                                <input type="file" name="bukti_setor" id="bukti_setor" class="sr-only" accept="image/*" onchange="previewFile()">
                            </label>
                        </div>
                        
                        <!-- File Upload Status / Preview -->
                        <div id="file-info" class="hidden mt-2 p-3 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-between text-xs">
                            <div class="flex items-center gap-2 text-slate-700">
                                <svg class="w-4 h-4 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span id="file-name" class="font-semibold truncate max-w-[250px]">Namafile.jpg</span>
                            </div>
                            <span id="file-size" class="text-slate-500 font-mono">1.2 MB</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Bottom Bar (Exactly matching the light blue footer design) -->
            <div class="bg-[#e6f0fa] border-t border-slate-200/60 px-8 py-6 flex justify-end">
                <!-- Pill styled Submit Button -->
                <button type="submit"
                    class="w-full sm:w-auto px-8 py-3.5 bg-[#000B7E] hover:bg-[#000966] text-white font-extrabold text-xs tracking-wider uppercase rounded-full transition duration-150 inline-flex items-center justify-center gap-2 shadow-sm">
                    Kirim Pengajuan
                    <!-- Arrow Icon -->
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </div>

            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="max-w-4xl mx-auto w-full text-center py-6 text-xs text-slate-600 font-medium">
        <p>&copy; {{ date('Y') }} LyFeBillionaires. Hak Cipta Dilindungi Undang-Undang.</p>
    </footer>

    <!-- Script for Dynamic Preview -->
    <script>
        function copyNorek() {
            navigator.clipboard.writeText('4661166881').then(function() {
                // Change button style temporarily to show success
                const btn = event.currentTarget;
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>';
                btn.classList.add('border-emerald-500', 'bg-emerald-50');
                
                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                    btn.classList.remove('border-emerald-500', 'bg-emerald-50');
                }, 2000);
            }).catch(function(err) {
                console.error('Failed to copy text: ', err);
                alert('Gagal menyalin nomor rekening.');
            });
        }
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

        // Custom Validation Alert Triggers
        document.getElementById('pengajuan-form').addEventListener('submit', function(e) {
            let nama = document.getElementById('nama_lengkap').value.trim();
            let email = document.getElementById('email').value.trim();
            let no_hp = document.getElementById('no_hp').value.trim();
            let tgl_lahir = document.getElementById('tgl_lahir').value.trim();
            let pekerjaan = document.getElementById('pekerjaan').value.trim();
            let fileInput = document.getElementById('bukti_setor');

            let errors = [];
            if (!nama) errors.push("Nama Lengkap wajib diisi");
            if (!email) errors.push("Alamat Email wajib diisi");
            if (!no_hp) errors.push("Nomor HP / WhatsApp wajib diisi");
            if (!tgl_lahir) errors.push("Tanggal Lahir wajib diisi");
            if (!pekerjaan) errors.push("Pekerjaan wajib diisi");
            if (fileInput.files.length === 0) errors.push("Bukti Transfer Setor wajib di-upload");

            if (errors.length > 0) {
                e.preventDefault();
                showValidationAlert(errors);
            }
        });

        function showValidationAlert(errors) {
            const alertModal = document.getElementById('validation-alert');
            const errorsList = document.getElementById('validation-errors-list');
            
            // Populate errors
            errorsList.innerHTML = '<p class="font-extrabold text-slate-700 mb-2">Silakan perbaiki kesalahan berikut:</p><ul class="list-disc pl-5 space-y-1.5 font-semibold text-slate-600">' + 
                errors.map(err => <li> + err + </li>).join('') + 
                '</ul>';
            
            // Reveal alert modal beautifully
            alertModal.classList.remove('hidden');
            setTimeout(() => {
                alertModal.classList.remove('opacity-0');
                alertModal.firstElementChild.classList.remove('scale-95');
            }, 10);
        }

        function closeValidationAlert() {
            const alertModal = document.getElementById('validation-alert');
            alertModal.classList.add('opacity-0');
            alertModal.firstElementChild.classList.add('scale-95');
            setTimeout(() => {
                alertModal.classList.add('hidden');
            }, 300);
        }
    </script>

    <!-- Beautiful Premium Alert Modal -->
    <div id="validation-alert" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm hidden opacity-0 transition-all duration-300">
        <div class="max-w-md w-full bg-white rounded-[24px] p-6 shadow-2xl border border-slate-200/80 transform scale-95 transition-all duration-300 space-y-5">
            <div class="flex items-center gap-3 text-rose-600">
                <div class="p-2.5 bg-rose-50 rounded-full border border-rose-100 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
                <h3 class="font-extrabold text-lg text-slate-900 tracking-tight">Validasi Pendaftaran</h3>
            </div>
            
            <div class="text-xs leading-relaxed" id="validation-errors-list">
                <!-- Errors list injected dynamically -->
            </div>

            <button onclick="closeValidationAlert()" class="w-full py-3.5 bg-[#000B7E] hover:bg-[#000966] text-white text-xs font-extrabold rounded-full transition duration-150 uppercase tracking-wider shadow-sm active:scale-98">
                Mengerti
            </button>
        </div>
    </div>
</body>
</html>
