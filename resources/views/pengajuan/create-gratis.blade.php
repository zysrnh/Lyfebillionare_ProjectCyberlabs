<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Acara Gratis - LyFeBillionaires</title>

    <link rel="shortcut icon" href="{{ asset('ico/AhaConvert_Logo.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: #d1e1f1;
            background-image: radial-gradient(#b1c4d9 1.5px, transparent 1.5px);
            background-size: 28px 28px;
        }

        /* Inputs */
        .custom-input {
            border-radius: 9999px;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 0.85rem 1.5rem;
            transition: all 0.15s ease-in-out;
            width: 100%;
            font-family: 'Outfit', sans-serif;
            font-size: 0.875rem;
            color: #1e293b;
            outline: none;
        }
        .custom-input:focus {
            border-color: #000B7E;
            box-shadow: 0 0 0 2px rgba(0, 11, 126, 0.1);
            background-color: #fcfdfe;
        }
        .custom-input::placeholder { color: #94a3b8; }
        .custom-input:not(:placeholder-shown) { background-color: #f7f9fc; }

        /* Radio pill */
        .radio-pill input { display: none; }
        .radio-pill-label {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 9px 20px; border-radius: 9999px;
            border: 1px solid #e2e8f0;
            background: #fff; color: #64748b;
            font-size: 12px; font-weight: 700; letter-spacing: 0.04em;
            cursor: pointer; transition: all 0.15s ease;
            user-select: none; box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }
        .radio-pill input:checked + .radio-pill-label {
            background: #000B7E; color: #fff;
            border-color: #000B7E;
            box-shadow: 0 4px 12px rgba(0,11,126,0.25);
        }
        .radio-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: #cbd5e1; transition: background 0.15s;
            flex-shrink: 0;
        }
        .radio-pill input:checked + .radio-pill-label .radio-dot { background: rgba(255,255,255,0.6); }

        /* Animations */
        @keyframes cardEntrance {
            from { opacity: 0; transform: translateY(40px) scale(0.97); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(15px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-card { animation: cardEntrance 1s cubic-bezier(0.16,1,0.3,1) forwards; }
        .animate-content { opacity: 0; animation: fadeInUp 0.8s cubic-bezier(0.16,1,0.3,1) 0.15s forwards; }

        /* ── ACARA HERO ─────────────────────────────── */
        .acara-hero {
            background: linear-gradient(135deg, #000B7E 0%, #0d1b8e 50%, #1a0050 100%);
            position: relative; overflow: hidden;
        }
        .acara-hero::before {
            content: '';
            position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.045) 1px, transparent 1px);
            background-size: 22px 22px;
        }
        .acara-glow {
            position: absolute; top: -60px; right: -60px;
            width: 280px; height: 280px; border-radius: 50%;
            background: radial-gradient(circle, rgba(239,68,68,0.18) 0%, transparent 65%);
            pointer-events: none;
        }
        .acara-glow-left {
            position: absolute; bottom: -40px; left: -40px;
            width: 200px; height: 200px; border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.06) 0%, transparent 65%);
            pointer-events: none;
        }
        .acara-inner { position: relative; z-index: 2; padding: 36px 40px 40px; }

        /* Live badge */
        .live-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 5px 14px 5px 10px;
            background: rgba(34,197,94,0.1);
            border: 1px solid rgba(34,197,94,0.25);
            border-radius: 9999px; margin-bottom: 22px;
        }
        .live-dot {
            width: 7px; height: 7px; border-radius: 50%; background: #22c55e;
            animation: pulse-live 1.8s ease-in-out infinite;
        }
        @keyframes pulse-live {
            0%   { box-shadow: 0 0 0 0 rgba(34,197,94,0.5); }
            70%  { box-shadow: 0 0 0 7px rgba(34,197,94,0); }
            100% { box-shadow: 0 0 0 0 rgba(34,197,94,0); }
        }
        .live-text { color: #86efac; font-size: 9px; font-weight: 800; letter-spacing: 0.2em; text-transform: uppercase; }

        /* Headline */
        .acara-title {
            font-size: clamp(40px, 7.5vw, 58px);
            font-weight: 900; line-height: 1; letter-spacing: -0.025em;
            color: #fff; text-transform: uppercase; margin: 0;
        }
        .acara-red {
            display: block;
            color: #ef4444;
            text-shadow: 0 0 60px rgba(239,68,68,0.35);
            animation: shimmer 3.5s ease-in-out infinite;
        }
        @keyframes shimmer {
            0%,100% { opacity: 1; }
            50%      { opacity: 0.87; }
        }

        /* Divider */
        .acara-divider {
            height: 1px; margin: 26px 0;
            background: linear-gradient(90deg, rgba(255,255,255,0.14) 0%, rgba(255,255,255,0.03) 100%);
        }

        /* Submit button */
        .btn-submit {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 13px 28px; border-radius: 9999px;
            background: #ffffff; color: #000B7E;
            font-weight: 800; font-size: 12px; letter-spacing: 0.07em; text-transform: uppercase;
            border: none; cursor: pointer;
            box-shadow: 0 8px 28px rgba(0,0,0,0.22);
            transition: all 0.2s ease;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 14px 36px rgba(0,0,0,0.3); }
        .btn-submit:active { transform: translateY(0) scale(0.99); }
    </style>
</head>
<body class="text-slate-800 min-h-screen flex flex-col justify-between selection:bg-[#000B7E] selection:text-white">

    <!-- Top Watermark -->
    <div class="max-w-2xl mx-auto w-full px-6 pt-6 flex justify-between items-center text-xs text-slate-500 font-bold tracking-widest uppercase opacity-75">
        <span>LYFEBILLIONAIRES</span>
        <span class="text-[9px] px-2 py-0.5 border border-slate-400/30 rounded-md">FORMULIR</span>
    </div>

    <div class="pt-4"></div>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-10 px-4">
        <div class="max-w-2xl w-full bg-white border border-slate-200/80 rounded-[32px] shadow-lg overflow-hidden relative animate-card">

            <!-- Close Button -->
            <a href="/eventexitplan" class="absolute right-6 top-6 text-slate-400 hover:text-slate-600 transition z-20">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </a>

            <form action="{{ route('pengajuan.store-gratis') }}" method="POST" id="pengajuan-form">
                @csrf

                <!-- Form Body -->
                <div class="p-8 md:p-10 space-y-8 animate-content">

                    <!-- Badge -->
                    <div class="flex justify-start">
                        <div class="inline-block px-7 py-2.5 rounded-full bg-[#ebf3fc] border border-[#d3e5f7] text-[#000B7E] font-extrabold text-xs tracking-wider uppercase shadow-sm">
                            DATA AWAL PENGAJUAN
                        </div>
                    </div>

                    <!-- Header -->
                    <div>
                        <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 leading-none">Formulir Pengajuan</h1>
                        <p class="text-slate-500 text-xs mt-2 font-medium">Silakan isi lengkap seluruh data awal di bawah ini dengan benar.</p>
                    </div>

                    <!-- Validation Errors -->
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

                    <!-- Status Pernikahan -->
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-wider block">Status Pernikahan <span class="text-[#000B7E]">*</span></label>
                        <div class="flex flex-wrap gap-3">
                            <label class="radio-pill">
                                <input type="radio" name="status_pernikahan" value="Belum Menikah" required
                                    {{ old('status_pernikahan', 'Belum Menikah') == 'Belum Menikah' ? 'checked' : '' }}>
                                <span class="radio-pill-label"><span class="radio-dot"></span> Belum Menikah</span>
                            </label>
                            <label class="radio-pill">
                                <input type="radio" name="status_pernikahan" value="Menikah" required
                                    {{ old('status_pernikahan') == 'Menikah' ? 'checked' : '' }}>
                                <span class="radio-pill-label"><span class="radio-dot"></span> Sudah Menikah</span>
                            </label>
                        </div>
                    </div>

                    <!-- Input Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div class="space-y-1">
                            <label for="nama_lengkap" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Nama Lengkap *</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}"
                                class="custom-input" placeholder="Joseph Loren">
                        </div>

                        <div class="space-y-1">
                            <label for="tgl_lahir" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Tanggal Lahir *</label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" required value="{{ old('tgl_lahir') }}"
                                class="custom-input">
                        </div>

                        <div class="space-y-1">
                            <label for="no_hp" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">No. HP (WhatsApp) *</label>
                            <input type="text" name="no_hp" id="no_hp" required value="{{ old('no_hp') }}"
                                class="custom-input" placeholder="+62 812 3456 XXX">
                        </div>

                        <div class="space-y-1">
                            <label for="email" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Alamat Email *</label>
                            <input type="email" name="email" id="email" required value="{{ old('email', Auth::user()?->email) }}"
                                class="custom-input" placeholder="josephloren@gmail.com">
                        </div>

                        <div class="space-y-1">
                            <label for="pekerjaan" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Pekerjaan *</label>
                            <input type="text" name="pekerjaan" id="pekerjaan" required value="{{ old('pekerjaan') }}"
                                class="custom-input" placeholder="Wiraswasta / Karyawan">
                        </div>

                        <div class="space-y-1">
                            <label for="alamat_ig" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Instagram</label>
                            <input type="text" name="alamat_ig" id="alamat_ig" value="{{ old('alamat_ig') }}"
                                class="custom-input" placeholder="@username">
                        </div>

                        <div class="space-y-1 md:col-span-2">
                            <label for="alamat_tiktok" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">TikTok</label>
                            <input type="text" name="alamat_tiktok" id="alamat_tiktok" value="{{ old('alamat_tiktok') }}"
                                class="custom-input" placeholder="@username_tiktok">
                        </div>

                    </div>

                </div>
                <!-- END Form Body -->

                <!-- ─── ACARA HERO ────────────────────────────── -->
                <div class="acara-hero">
                    <div class="acara-glow"></div>
                    <div class="acara-glow-left"></div>

                    <div class="acara-inner">

                        <!-- Live badge -->
                        <div class="live-badge">
                            <div class="live-dot"></div>
                            <span class="live-text">Pendaftaran Dibuka</span>
                        </div>

                        <!-- Headline -->
                        <h2 class="acara-title">
                            Acara Woowwww
                            <span class="acara-red">+ GRATIS!</span>
                        </h2>

                        <div class="acara-divider"></div>

                        <!-- Submit row -->
                        <div class="flex items-center justify-between flex-wrap gap-4">
                            <p class="text-white/40 text-xs font-semibold">Gratis — Tanpa biaya apapun.</p>
                            <button type="submit" class="btn-submit">
                                Daftar Sekarang
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </div>

                    </div>
                </div>
                <!-- ─── END ACARA HERO ─────────────────────────── -->

            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="max-w-4xl mx-auto w-full text-center py-6 text-xs text-slate-600 font-medium">
        <p>&copy; {{ date('Y') }} LyFeBillionaires. Hak Cipta Dilindungi Undang-Undang.</p>
    </footer>

    <!-- Validation Script -->
    <script>
        document.getElementById('pengajuan-form').addEventListener('submit', function(e) {
            const fields = [
                { id: 'nama_lengkap', label: 'Nama Lengkap' },
                { id: 'email',        label: 'Alamat Email' },
                { id: 'no_hp',        label: 'Nomor HP / WhatsApp' },
                { id: 'tgl_lahir',    label: 'Tanggal Lahir' },
                { id: 'pekerjaan',    label: 'Pekerjaan' },
            ];
            const errors = fields
                .filter(f => !document.getElementById(f.id).value.trim())
                .map(f => f.label + ' wajib diisi');

            if (errors.length > 0) {
                e.preventDefault();
                showValidationAlert(errors);
            }
        });

        function showValidationAlert(errors) {
            const modal = document.getElementById('validation-alert');
            const list  = document.getElementById('validation-errors-list');
            list.innerHTML =
                '<p class="font-extrabold text-slate-700 mb-2">Silakan perbaiki kesalahan berikut:</p>' +
                '<ul class="list-disc pl-5 space-y-1.5 font-semibold text-slate-600">' +
                errors.map(e => `<li>${e}</li>`).join('') +
                '</ul>';
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.firstElementChild.classList.remove('scale-95');
            }, 10);
        }

        function closeValidationAlert() {
            const modal = document.getElementById('validation-alert');
            modal.classList.add('opacity-0');
            modal.firstElementChild.classList.add('scale-95');
            setTimeout(() => modal.classList.add('hidden'), 300);
        }
    </script>

    <!-- Validation Modal -->
    <div id="validation-alert" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm hidden opacity-0 transition-all duration-300">
        <div class="max-w-md w-full bg-white rounded-[24px] p-6 shadow-2xl border border-slate-200/80 transform scale-95 transition-all duration-300 space-y-5">
            <div class="flex items-center gap-3 text-rose-600">
                <div class="p-2.5 bg-rose-50 rounded-full border border-rose-100 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="font-extrabold text-lg text-slate-900 tracking-tight">Validasi Pendaftaran</h3>
            </div>
            <div class="text-xs leading-relaxed" id="validation-errors-list"></div>
            <button onclick="closeValidationAlert()"
                class="w-full py-3.5 bg-[#000B7E] hover:bg-[#000966] text-white text-xs font-extrabold rounded-full transition duration-150 uppercase tracking-wider shadow-sm">
                Mengerti
            </button>
        </div>
    </div>

</body>
</html>