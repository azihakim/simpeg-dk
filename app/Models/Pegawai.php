<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';
    protected $fillable = [
        'user_id',
        'nama',
        'divisi_id',
        'status',
        'status_kerja',
        'nik',
        'no_telp',
        'alamat',
        'umur',
        'jenis_kelamin'
    ];

    public function divisi()
    {
        return $this->belongsTo(Jabatan::class, 'divisi_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
