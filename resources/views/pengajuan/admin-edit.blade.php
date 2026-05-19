<x-app-layout>
    <!-- Outfit Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif !important;
        }
        .custom-input {
            border-radius: 9999px;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 0.85rem 1.5rem;
            transition: all 0.15s ease-in-out;
            width: 100%;
            font-size: 0.875rem;
        }
        .custom-input:focus {
            outline: none;
            border-color: #000B7E;
            box-shadow: 0 0 0 2px rgba(0, 11, 126, 0.1);
        }
    </style>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-extrabold text-2xl text-slate-900 tracking-tight leading-none">
                    {{ __('Edit Data Pendaftar') }}
                </h2>
                <p class="text-xs text-slate-500 mt-1.5 font-medium">Ubah detail data submisi pendaftar dan kelola verifikasi pembayaran.</p>
            </div>
            
            <a href="{{ route('dashboard') }}" 
               class="px-5 py-2.5 bg-white border border-slate-200/80 hover:bg-slate-50 text-slate-700 text-xs font-extrabold rounded-full transition duration-150 inline-flex items-center gap-2 shadow-sm uppercase tracking-wider">
                Batal
            </a>
        </div>
    </x-slot>

    <div class="py-8 bg-slate-50 min-h-[calc(100vh-140px)]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white border border-slate-200/80 rounded-[32px] shadow-sm overflow-hidden p-8 sm:p-10 space-y-8">
                
                <form action="{{ route('pengajuan.admin.update', $pengajuan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Name & Date of Birth -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="nama_lengkap" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Nama Lengkap *</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="custom-input" placeholder="Masukkan nama lengkap" required value="{{ old('nama_lengkap', $pengajuan->nama_lengkap) }}">
                            @error('nama_lengkap') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="tgl_lahir" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Tanggal Lahir *</label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir" class="custom-input" required value="{{ old('tgl_lahir', $pengajuan->tgl_lahir) }}">
                            @error('tgl_lahir') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Phone Number & Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="no_hp" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">No. HP / WhatsApp *</label>
                            <input type="text" id="no_hp" name="no_hp" class="custom-input" placeholder="Contoh: 081234567890" required value="{{ old('no_hp', $pengajuan->no_hp) }}">
                            @error('no_hp') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="email" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Alamat Email *</label>
                            <input type="email" id="email" name="email" class="custom-input" placeholder="Contoh: nama@domain.com" required value="{{ old('email', $pengajuan->email) }}">
                            @error('email') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Job & Marriage Status -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="pekerjaan" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Pekerjaan *</label>
                            <input type="text" id="pekerjaan" name="pekerjaan" class="custom-input" placeholder="Contoh: Karyawan, Pengusaha" required value="{{ old('pekerjaan', $pengajuan->pekerjaan) }}">
                            @error('pekerjaan') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Status Pernikahan *</label>
                            <div class="flex flex-wrap gap-3">
                                <label class="cursor-pointer select-none">
                                    <input type="radio" name="status_pernikahan" value="Belum Menikah" class="peer sr-only" {{ old('status_pernikahan', $pengajuan->status_pernikahan) === 'Belum Menikah' ? 'checked' : '' }}>
                                    <span class="inline-block px-5 py-2.5 rounded-full border border-slate-200 text-xs font-extrabold text-slate-600 bg-white peer-checked:border-[#000B7E] peer-checked:bg-[#000B7E]/5 peer-checked:text-[#000B7E] transition duration-150">
                                        Belum Menikah
                                    </span>
                                </label>
                                <label class="cursor-pointer select-none">
                                    <input type="radio" name="status_pernikahan" value="Menikah" class="peer sr-only" {{ old('status_pernikahan', $pengajuan->status_pernikahan) === 'Menikah' ? 'checked' : '' }}>
                                    <span class="inline-block px-5 py-2.5 rounded-full border border-slate-200 text-xs font-extrabold text-slate-600 bg-white peer-checked:border-[#000B7E] peer-checked:bg-[#000B7E]/5 peer-checked:text-[#000B7E] transition duration-150">
                                        Sudah Menikah
                                    </span>
                                </label>
                            </div>
                            @error('status_pernikahan') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Instagram & TikTok -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="alamat_ig" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Username Instagram <span class="text-[9px] font-semibold text-slate-400">(Opsional)</span></label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-xs font-bold text-slate-400 select-none">@</span>
                                <input type="text" id="alamat_ig" name="alamat_ig" class="custom-input !pl-8" placeholder="username" value="{{ old('alamat_ig', ltrim($pengajuan->alamat_ig, '@')) }}">
                            </div>
                            @error('alamat_ig') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                        </div>

                        <div class="space-y-1.5">
                            <label for="alamat_tiktok" class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Username TikTok <span class="text-[9px] font-semibold text-slate-400">(Opsional)</span></label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-xs font-bold text-slate-400 select-none">@</span>
                                <input type="text" id="alamat_tiktok" name="alamat_tiktok" class="custom-input !pl-8" placeholder="username" value="{{ old('alamat_tiktok', ltrim($pengajuan->alamat_tiktok, '@')) }}">
                            </div>
                            @error('alamat_tiktok') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Bukti Pembayaran / Upload -->
                    <div class="space-y-3">
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-wider block ml-3">Bukti Pembayaran <span class="text-[9px] font-semibold text-slate-400">(Biarkan kosong jika tidak ingin mengubah)</span></label>
                        
                        @if($pengajuan->bukti_setor)
                            <div class="flex items-center gap-4 bg-slate-50 border border-slate-200/60 p-4 rounded-[20px] ml-3 max-w-md">
                                <img src="{{ asset($pengajuan->bukti_setor) }}" alt="Bukti Saat Ini" class="w-16 h-16 object-cover rounded-lg border border-slate-200 shadow-sm">
                                <div>
                                    <span class="text-xs font-extrabold text-slate-700 block">Bukti Pembayaran Saat Ini</span>
                                    <span class="text-[10px] font-semibold text-slate-400 block mt-0.5">Nama File: {{ basename($pengajuan->bukti_setor) }}</span>
                                </div>
                            </div>
                        @endif

                        <div class="relative w-full">
                            <input type="file" id="bukti_setor" name="bukti_setor" accept="image/*" class="custom-input py-2">
                        </div>
                        <p class="text-[10px] text-slate-400 ml-3">Format file: JPG, JPEG, PNG, WEBP (maks. 5MB).</p>
                        @error('bukti_setor') <span class="text-rose-500 text-xs ml-3">{{ $message }}</span> @enderror
                    </div>

                    <!-- Form Buttons -->
                    <div class="pt-6 border-t border-slate-100 flex flex-col sm:flex-row justify-end items-center gap-3">
                        <a href="{{ route('dashboard') }}" class="w-full sm:w-auto px-6 py-3.5 border border-slate-200/80 hover:bg-slate-50 text-slate-700 text-xs font-extrabold rounded-full transition duration-150 block text-center uppercase tracking-wider">
                            Batal
                        </a>
                        <button type="submit" class="w-full sm:w-auto px-8 py-3.5 bg-[#000B7E] hover:bg-[#000966] text-white text-xs font-extrabold rounded-full transition duration-150 block text-center uppercase tracking-wider shadow-sm">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
