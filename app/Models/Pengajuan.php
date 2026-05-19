<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'tgl_lahir',
        'no_hp',
        'email',
        'pekerjaan',
        'status_pernikahan',
        'alamat_ig',
        'alamat_tiktok',
        'bukti_setor',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
