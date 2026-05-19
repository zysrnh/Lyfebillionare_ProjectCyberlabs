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
        return view('pengajuan.index', compact('pengajuans'));
    }
}
