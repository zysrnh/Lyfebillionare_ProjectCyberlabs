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
            min-height: 100vh;
            background: linear-gradient(135deg, #0a0f2e 0%, #001068 45%, #0d1847 100%);
            overflow-x: hidden;
        }

        /* Animated mesh background */
        body::before {
            content: '';
            position: fixed; inset: 0; z-index: 0;
            background-image:
                radial-gradient(ellipse 800px 600px at 10% 20%, rgba(59,130,246,0.08) 0%, transparent 60%),
                radial-gradient(ellipse 600px 500px at 90% 80%, rgba(239,68,68,0.07) 0%, transparent 60%),
                radial-gradient(rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 30px 30px;
            pointer-events: none;
        }

        /* Floating orbs */
        .orb {
            position: fixed; border-radius: 50%; filter: blur(80px); pointer-events: none; z-index: 0;
            animation: orbFloat 8s ease-in-out infinite;
        }
        .orb-1 { width: 400px; height: 400px; top: -100px; left: -100px; background: rgba(0,11,126,0.4); }
        .orb-2 { width: 300px; height: 300px; bottom: -80px; right: -80px; background: rgba(220,38,38,0.25); animation-delay: -4s; }
        .orb-3 { width: 200px; height: 200px; top: 50%; left: 60%; background: rgba(99,102,241,0.2); animation-delay: -2s; }
        @keyframes orbFloat {
            0%,100% { transform: translate(0,0) scale(1); }
            33%      { transform: translate(20px,-20px) scale(1.05); }
            66%      { transform: translate(-15px,15px) scale(0.95); }
        }

        /* Card */
        .form-card {
            position: relative; z-index: 1;
            background: rgba(255,255,255,0.97);
            border-radius: 28px;
            box-shadow: 0 40px 120px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.1);
            overflow: hidden;
        }

        /* Top accent bar */
        .card-accent-bar {
            height: 4px;
            background: linear-gradient(90deg, #000B7E 0%, #3b82f6 50%, #ef4444 100%);
        }

        /* Inputs */
        .field-input {
            width: 100%;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 0.75rem 1.25rem;
            font-family: 'Outfit', sans-serif;
            font-size: 0.875rem;
            color: #1e293b;
            transition: all 0.2s ease;
            outline: none;
        }
        .field-input:focus {
            border-color: #000B7E;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(0,11,126,0.08);
        }
        .field-input::placeholder { color: #94a3b8; }

        /* Radio pill */
        .radio-pill input { display: none; }
        .radio-pill-label {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 8px 20px; border-radius: 50px;
            border: 1.5px solid #e2e8f0;
            background: #f8fafc; color: #64748b;
            font-size: 12px; font-weight: 700; letter-spacing: 0.04em;
            cursor: pointer; transition: all 0.2s ease;
            user-select: none;
        }
        .radio-pill input:checked + .radio-pill-label {
            background: #000B7E; color: #fff;
            border-color: #000B7E;
            box-shadow: 0 4px 12px rgba(0,11,126,0.3);
        }
        .radio-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: #cbd5e1; transition: background 0.2s;
        }
        .radio-pill input:checked + .radio-pill-label .radio-dot { background: rgba(255,255,255,0.7); }

        /* Animations */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px) scale(0.98); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .anim-card    { animation: slideUp 0.9s cubic-bezier(0.16,1,0.3,1) both; }
        .anim-content { opacity:0; animation: fadeIn 0.7s cubic-bezier(0.16,1,0.3,1) 0.2s both; }

        /* ── ACARA (bottom hero) ─────────────────────────────── */
        .acara-hero {
            background: linear-gradient(135deg, #000B7E 0%, #0d1b8e 40%, #1a0050 100%);
            position: relative; overflow: hidden;
        }
        .acara-hero::before {
            content: '';
            position: absolute; inset: 0;
            background-image: radial-gradient(rgba(255,255,255,0.04) 1px, transparent 1px);
            background-size: 22px 22px;
        }
        .acara-hero::after {
            content: '';
            position: absolute; top: -80px; right: -80px;
            width: 320px; height: 320px; border-radius: 50%;
            background: radial-gradient(circle, rgba(239,68,68,0.18) 0%, transparent 65%);
        }
        .acara-inner { position: relative; z-index: 2; padding: 40px; }

        /* Live badge */
        .live-badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 6px 16px 6px 12px;
            background: rgba(34,197,94,0.12);
            border: 1px solid rgba(34,197,94,0.3);
            border-radius: 50px; margin-bottom: 24px;
        }
        .live-dot {
            width: 8px; height: 8px; border-radius: 50%; background: #22c55e;
            animation: pulse 1.8s ease-in-out infinite;
            box-shadow: 0 0 0 0 rgba(34,197,94,0.5);
        }
        @keyframes pulse {
            0%   { box-shadow: 0 0 0 0 rgba(34,197,94,0.5); }
            70%  { box-shadow: 0 0 0 8px rgba(34,197,94,0); }
            100% { box-shadow: 0 0 0 0 rgba(34,197,94,0); }
        }
        .live-text { color: #86efac; font-size: 10px; font-weight: 800; letter-spacing: 0.2em; text-transform: uppercase; }

        /* Headline */
        .acara-title {
            font-size: clamp(38px, 7vw, 56px);
            font-weight: 900; line-height: 1;
            color: #fff; text-transform: uppercase;
            letter-spacing: -0.02em;
            margin-bottom: 6px;
        }
        .acara-subtitle {
            font-size: clamp(42px, 7.5vw, 62px);
            font-weight: 900; line-height: 1;
            color: #ef4444; text-transform: uppercase;
            letter-spacing: -0.02em; margin-bottom: 0;
            text-shadow: 0 0 80px rgba(239,68,68,0.4);
            animation: flicker 4s ease-in-out infinite;
        }
        @keyframes flicker {
            0%,100%  { opacity: 1; }
            48%      { opacity: 1; }
            50%       { opacity: 0.85; }
            52%      { opacity: 1; }
        }

        /* Divider */
        .acara-divider {
            height: 1px; margin: 28px 0;
            background: linear-gradient(90deg, rgba(255,255,255,0.15), rgba(255,255,255,0.04));
        }

        /* Feature chips */
        .chip {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 7px 16px; border-radius: 50px;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.06);
            color: rgba(255,255,255,0.8);
            font-size: 12px; font-weight: 700;
            backdrop-filter: blur(4px);
            transition: all 0.2s ease;
        }
        .chip:hover { background: rgba(255,255,255,0.12); border-color: rgba(255,255,255,0.2); }
        .chip-icon { font-size: 13px; }

        /* Urgency row */
        .urgency-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 10px 18px; border-radius: 12px;
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.25);
            color: #fca5a5; font-size: 11px; font-weight: 800;
            letter-spacing: 0.08em; text-transform: uppercase;
        }

        /* Counter */
        .counter-box {
            display: inline-flex; align-items: center; gap: 4px;
            background: rgba(0,0,0,0.3); border-radius: 10px; padding: 6px 10px;
        }
        .counter-digit {
            background: rgba(255,255,255,0.12); border-radius: 6px;
            width: 22px; height: 26px;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 800; color: #fff;
        }

        /* Submit button */
        .btn-submit {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 28px; border-radius: 50px;
            background: #fff; color: #000B7E;
            font-weight: 800; font-size: 13px;
            letter-spacing: 0.06em; text-transform: uppercase;
            border: none; cursor: pointer;
            box-shadow: 0 8px 30px rgba(0,0,0,0.25), 0 0 0 0 rgba(255,255,255,0.3);
            transition: all 0.25s ease;
        }
        .btn-submit:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 14px 40px rgba(0,0,0,0.35), 0 0 0 4px rgba(255,255,255,0.15);
        }
        .btn-submit:active { transform: translateY(0) scale(0.99); }

        /* Validation modal backdrop */
        #validation-alert { backdrop-filter: blur(8px); }
    </style>
</head>
<body>

    <!-- Background orbs -->
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>

    <!-- Top brand bar -->
    <div style="position:relative;z-index:1;" class="max-w-2xl mx-auto w-full px-6 pt-6 pb-2 flex justify-between items-center">
        <span class="text-xs font-black tracking-[0.2em] uppercase text-white/40">LYFEBILLIONAIRES</span>
        <span class="text-[9px] font-bold tracking-widest uppercase px-3 py-1 rounded-full border border-white/10 text-white/30">FORMULIR</span>
    </div>

    <!-- Main -->
    <main class="relative z-1 flex-grow flex items-center justify-center py-8 px-4" style="z-index:1;">
        <div class="max-w-2xl w-full form-card anim-card">

            <!-- Accent stripe -->
            <div class="card-accent-bar"></div>

            <form action="{{ route('pengajuan.store-gratis') }}" method="POST" id="pengajuan-form">
                @csrf

                <!-- Close -->
                <a href="/eventexitplan" class="absolute right-5 top-5 z-20 w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-400 hover:text-slate-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>

                <!-- Form body -->
                <div class="p-8 md:p-10 space-y-7 anim-content">

                    <!-- Header -->
                    <div class="space-y-3">
                        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50 border border-blue-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse inline-block"></span>
                            <span class="text-[10px] font-black tracking-widest text-blue-600 uppercase">Pendaftaran Terbuka</span>
                        </div>
                        <div>
                            <h1 class="text-3xl font-black tracking-tight text-slate-900">Formulir Pengajuan</h1>
                            <p class="text-slate-400 text-sm mt-1.5 font-medium leading-relaxed">Isi data kamu di bawah ini dan dapatkan akses ke acara <strong class="text-[#000B7E]">GRATIS!</strong></p>
                        </div>
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
                    <div class="space-y-2.5">
                        <label class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">Status Pernikahan <span class="text-blue-500">*</span></label>
                        <div class="flex flex-wrap gap-3">
                            <label class="radio-pill">
                                <input type="radio" name="status_pernikahan" value="Belum Menikah" required {{ old('status_pernikahan', 'Belum Menikah') == 'Belum Menikah' ? 'checked' : '' }}>
                                <span class="radio-pill-label">
                                    <span class="radio-dot"></span>
                                    Belum Menikah
                                </span>
                            </label>
                            <label class="radio-pill">
                                <input type="radio" name="status_pernikahan" value="Menikah" required {{ old('status_pernikahan') == 'Menikah' ? 'checked' : '' }}>
                                <span class="radio-pill-label">
                                    <span class="radio-dot"></span>
                                    Sudah Menikah
                                </span>
                            </label>
                        </div>
                    </div>

                    <!-- Input Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div class="space-y-1.5">
                            <label for="nama_lengkap" class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">Nama Lengkap <span class="text-blue-500">*</span></label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" required value="{{ old('nama_lengkap') }}"
                                class="field-input" placeholder="Joseph Loren">
                        </div>

                        <div class="space-y-1.5">
                            <label for="tgl_lahir" class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">Tanggal Lahir <span class="text-blue-500">*</span></label>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" required value="{{ old('tgl_lahir') }}"
                                class="field-input">
                        </div>

                        <div class="space-y-1.5">
                            <label for="no_hp" class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">No. HP / WhatsApp <span class="text-blue-500">*</span></label>
                            <input type="text" name="no_hp" id="no_hp" required value="{{ old('no_hp') }}"
                                class="field-input" placeholder="+62 812 3456 XXX">
                        </div>

                        <div class="space-y-1.5">
                            <label for="email" class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">Alamat Email <span class="text-blue-500">*</span></label>
                            <input type="email" name="email" id="email" required value="{{ old('email', Auth::user()?->email) }}"
                                class="field-input" placeholder="email@contoh.com">
                        </div>

                        <div class="space-y-1.5">
                            <label for="pekerjaan" class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">Pekerjaan <span class="text-blue-500">*</span></label>
                            <input type="text" name="pekerjaan" id="pekerjaan" required value="{{ old('pekerjaan') }}"
                                class="field-input" placeholder="Wiraswasta / Karyawan">
                        </div>

                        <div class="space-y-1.5">
                            <label for="alamat_ig" class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">Instagram</label>
                            <input type="text" name="alamat_ig" id="alamat_ig" value="{{ old('alamat_ig') }}"
                                class="field-input" placeholder="@username">
                        </div>

                        <div class="space-y-1.5 md:col-span-2">
                            <label for="alamat_tiktok" class="text-[11px] font-black text-slate-400 uppercase tracking-widest block">TikTok</label>
                            <input type="text" name="alamat_tiktok" id="alamat_tiktok" value="{{ old('alamat_tiktok') }}"
                                class="field-input" placeholder="@username_tiktok">
                        </div>

                    </div>
                    <!-- END Input Grid -->

                </div>

                <!-- ─── ACARA HERO ──────────────────────────────── -->
                <div class="acara-hero">
                    <div class="acara-inner">

                        <!-- Live badge -->
                        <div class="live-badge">
                            <div class="live-dot"></div>
                            <span class="live-text">Pendaftaran Dibuka</span>
                        </div>

                        <!-- Headline -->
                        <h2 class="acara-title">Acara Woowwww</h2>
                        <h2 class="acara-subtitle">+ GRATIS!</h2>

                        <div class="acara-divider"></div>

                        <!-- Feature chips -->
                        <div class="flex flex-wrap gap-2 mb-7">
                            <div class="chip"><span class="chip-icon">🤝</span> Networking</div>
                            <div class="chip"><span class="chip-icon">🎓</span> Materi Premium</div>
                            <div class="chip"><span class="chip-icon">📜</span> Sertifikat Resmi</div>
                            <div class="chip"><span class="chip-icon">✅</span> 100% Gratis</div>
                        </div>

                        <!-- CTA + counter -->
                        <div class="flex items-center flex-wrap gap-4 mb-8">
                            <div class="urgency-badge">🔥 Kursi Sangat Terbatas</div>
                            <div class="flex items-center gap-2 text-white/40 text-xs font-semibold">
                                Sisa kursi:
                                <div class="counter-box">
                                    <div class="counter-digit">2</div>
                                    <div class="counter-digit">3</div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-between items-center">
                            <p class="text-white/30 text-xs font-medium">Daftar sekarang — Gratis!</p>
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
    <footer class="relative z-10 text-center py-5 text-[10px] text-white/20 font-semibold tracking-wide">
        &copy; {{ date('Y') }} LyFeBillionaires. Hak Cipta Dilindungi.
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
                '<p class="font-extrabold text-slate-700 mb-2">Silakan perbaiki:</p>' +
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
    <div id="validation-alert" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/70 hidden opacity-0 transition-all duration-300">
        <div class="max-w-sm w-full bg-white rounded-3xl p-6 shadow-2xl transform scale-95 transition-all duration-300 space-y-5">
            <div class="flex items-center gap-3">
                <div class="p-2.5 bg-rose-50 rounded-full border border-rose-100 shrink-0">
                    <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="font-extrabold text-base text-slate-900">Cek Kembali Data Kamu</h3>
            </div>
            <div class="text-xs leading-relaxed" id="validation-errors-list"></div>
            <button onclick="closeValidationAlert()"
                class="w-full py-3.5 bg-[#000B7E] hover:bg-[#000966] text-white text-xs font-extrabold rounded-full transition duration-150 uppercase tracking-wider">
                Mengerti
            </button>
        </div>
    </div>

</body>
</html>