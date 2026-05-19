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
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
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
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
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

                fputcsv($file, [
                    $pengajuan->id,
                    $pengajuan->created_at->format('Y-m-d H:i:s'),
                    $pengajuan->nama_lengkap,
                    $pengajuan->email,
                    '="' . $pengajuan->no_hp . '"', // Force text format in Excel
                    $pengajuan->tgl_lahir,
                    $pengajuan->pekerjaan,
                    $pengajuan->status_pernikahan,
                    $pengajuan->alamat_ig ?? '-',
                    $pengajuan->alamat_tiktok ?? '-',
                    $kodeBukti
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
