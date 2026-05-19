<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Tampilkan halaman form pengajuan.
     */
    public function create()
    {
        return view('pengajuan.create');
    }

    /**
     * Simpan data pengajuan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'pekerjaan' => 'required|string|max:255',
            'status_pernikahan' => 'required|string|in:Menikah,Belum Menikah',
            'alamat_ig' => 'nullable|string|max:255',
            'alamat_tiktok' => 'nullable|string|max:255',
            'bukti_setor' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // maks 5MB
        ]);

        $pengajuan = new Pengajuan();
        $pengajuan->nama_lengkap = $request->nama_lengkap;
        $pengajuan->tgl_lahir = $request->tgl_lahir;
        $pengajuan->no_hp = $request->no_hp;
        $pengajuan->email = $request->email;
        $pengajuan->pekerjaan = $request->pekerjaan;
        $pengajuan->status_pernikahan = $request->status_pernikahan;
        $pengajuan->alamat_ig = $request->alamat_ig;
        $pengajuan->alamat_tiktok = $request->alamat_tiktok;
        $pengajuan->user_id = Auth::id(); // Link ke user jika login

        if ($request->hasFile('bukti_setor')) {
            $file = $request->file('bukti_setor');
            $nextId = (Pengajuan::max('id') ?? 0) + 1;
            $filename = sprintf("PAXP%03d.%s", $nextId, $file->getClientOriginalExtension());
            // Simpan langsung ke public/uploads/bukti_setor
            $file->move(public_path('uploads/bukti_setor'), $filename);
            $pengajuan->bukti_setor = 'uploads/bukti_setor/' . $filename;
        }

        $pengajuan->save();

        return redirect()->route('pengajuan.success')->with('success', 'Pengajuan awal Anda berhasil dikirim!');
    }

    /**
     * Halaman sukses pengajuan.
     */
    public function success()
    {
        return view('pengajuan.success');
    }

    /**
     * Tampilkan semua pengajuan untuk admin.
     */
    public function index()
    {
        $pengajuans = Pengajuan::latest()->paginate(10);
        return view('dashboard', compact('pengajuans'));
    }

    /**
     * Tampilkan form pengajuan manual untuk admin.
     */
    public function adminCreate()
    {
        return view('pengajuan.admin-create');
    }

    /**
     * Simpan pengajuan manual dari admin.
     */
    public function adminStore(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'pekerjaan' => 'required|string|max:255',
            'status_pernikahan' => 'required|string|in:Menikah,Belum Menikah',
            'alamat_ig' => 'nullable|string|max:255',
            'alamat_tiktok' => 'nullable|string|max:255',
            'bukti_setor' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $pengajuan = new Pengajuan();
        $pengajuan->nama_lengkap = $request->nama_lengkap;
        $pengajuan->tgl_lahir = $request->tgl_lahir;
        $pengajuan->no_hp = $request->no_hp;
        $pengajuan->email = $request->email;
        $pengajuan->pekerjaan = $request->pekerjaan;
        $pengajuan->status_pernikahan = $request->status_pernikahan;
        $pengajuan->alamat_ig = $request->alamat_ig;
        $pengajuan->alamat_tiktok = $request->alamat_tiktok;
        $pengajuan->user_id = Auth::id();

        if ($request->hasFile('bukti_setor')) {
            $file = $request->file('bukti_setor');
            $nextId = (Pengajuan::max('id') ?? 0) + 1;
            $filename = sprintf("PAXP%03d.%s", $nextId, $file->getClientOriginalExtension());
            $file->move(public_path('uploads/bukti_setor'), $filename);
            $pengajuan->bukti_setor = 'uploads/bukti_setor/' . $filename;
        } else {
            // Jika manual dan tidak upload bukti, set default logo
            $pengajuan->bukti_setor = 'logo/Logo.png';
        }

        $pengajuan->save();

        return redirect()->route('dashboard')->with('success', 'Pengajuan manual berhasil ditambahkan!');
    }

    /**
     * Export data pengajuan ke Excel (format CSV dengan kode bukti transaksi aman).
     */
    public function exportExcel()
    {
        $pengajuans = Pengajuan::latest()->get();
        $filename = 'daftar_pengajuan_' . date('Ymd_His') . '.csv';
        
        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['ID', 'Tanggal Masuk', 'Nama Lengkap', 'Email', 'No HP / WhatsApp', 'Tanggal Lahir', 'Pekerjaan', 'Status Pernikahan', 'Instagram', 'TikTok', 'Kode Bukti Pembayaran'];

        $callback = function() use($pengajuans, $columns) {
            $file = fopen('php://output', 'w');
            
            // Add UTF-8 BOM for proper Excel encoding without warnings
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
            
            fputcsv($file, $columns);

            foreach ($pengajuans as $pengajuan) {
                // Generate a professional code based on ID, e.g., PAXP001
                $kodeBukti = sprintf("PAXP%03d", $pengajuan->id);

                // Format dates and clean social media handles
                $tglMasuk = $pengajuan->created_at->format('d-m-Y H:i') . ' WIB';
                $tglLahir = \Carbon\Carbon::parse($pengajuan->tgl_lahir)->format('d-m-Y');
                $igHandle = $pengajuan->alamat_ig ? ltrim($pengajuan->alamat_ig, '@') : '-';
                $tiktokHandle = $pengajuan->alamat_tiktok ? ltrim($pengajuan->alamat_tiktok, '@') : '-';

                fputcsv($file, [
                    $pengajuan->id,
                    $tglMasuk,
                    $pengajuan->nama_lengkap,
                    $pengajuan->email,
                    '="' . $pengajuan->no_hp . '"', // Force text format in Excel
                    $tglLahir,
                    $pengajuan->pekerjaan,
                    $pengajuan->status_pernikahan,
                    $igHandle,
                    $tiktokHandle,
                    $kodeBukti
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Hapus data pengajuan.
     */
    public function destroy(Pengajuan $pengajuan)
    {
        // Hapus file bukti setor jika ada dan bukan logo default
        if ($pengajuan->bukti_setor && $pengajuan->bukti_setor !== 'logo/Logo.png') {
            $filePath = public_path($pengajuan->bukti_setor);
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $pengajuan->delete();

        return redirect()->route('dashboard')->with('success', 'Data pendaftar berhasil dihapus!');
    }

    /**
     * Tampilkan form edit data pendaftar.
     */
    public function edit(Pengajuan $pengajuan)
    {
        return view('pengajuan.admin-edit', compact('pengajuan'));
    }

    /**
     * Update data pendaftar.
     */
    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'pekerjaan' => 'required|string|max:255',
            'status_pernikahan' => 'required|string|in:Menikah,Belum Menikah',
            'alamat_ig' => 'nullable|string|max:255',
            'alamat_tiktok' => 'nullable|string|max:255',
            'bukti_setor' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $pengajuan->nama_lengkap = $request->nama_lengkap;
        $pengajuan->tgl_lahir = $request->tgl_lahir;
        $pengajuan->no_hp = $request->no_hp;
        $pengajuan->email = $request->email;
        $pengajuan->pekerjaan = $request->pekerjaan;
        $pengajuan->status_pernikahan = $request->status_pernikahan;
        $pengajuan->alamat_ig = $request->alamat_ig;
        $pengajuan->alamat_tiktok = $request->alamat_tiktok;

        if ($request->hasFile('bukti_setor')) {
            // Hapus file bukti setor lama jika ada dan bukan logo default
            if ($pengajuan->bukti_setor && $pengajuan->bukti_setor !== 'logo/Logo.png') {
                $oldFilePath = public_path($pengajuan->bukti_setor);
                if (file_exists($oldFilePath)) {
                    @unlink($oldFilePath);
                }
            }

            $file = $request->file('bukti_setor');
            $filename = sprintf("PAXP%03d.%s", $pengajuan->id, $file->getClientOriginalExtension());
            $file->move(public_path('uploads/bukti_setor'), $filename);
            $pengajuan->bukti_setor = 'uploads/bukti_setor/' . $filename;
        }

        $pengajuan->save();

        return redirect()->route('dashboard')->with('success', 'Data pendaftar berhasil diperbarui!');
    }

    /**
     * Hapus beberapa data pengajuan sekaligus (Bulk Delete).
     */
    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('ids', []);
        
        if (empty($ids)) {
            return redirect()->route('dashboard')->with('error', 'Pilih minimal satu data untuk dihapus!');
        }

        $pengajuans = Pengajuan::whereIn('id', $ids)->get();

        foreach ($pengajuans as $pengajuan) {
            // Hapus file bukti setor jika ada dan bukan logo default
            if ($pengajuan->bukti_setor && $pengajuan->bukti_setor !== 'logo/Logo.png') {
                $filePath = public_path($pengajuan->bukti_setor);
                if (file_exists($filePath)) {
                    @unlink($filePath);
                }
            }
            $pengajuan->delete();
        }

        return redirect()->route('dashboard')->with('success', count($ids) . ' data pendaftar berhasil dihapus sekaligus!');
    }
}
