<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Praja extends Model
{
    protected $table = 'praja';
    protected $primaryKey = 'id_praja';
    protected $fillable = [
        'id_mahasiswa',
        'id_dosen',
        'judul_praja',
        'slug',
        'tempat_praja',
        'latar_belakang',
        'manfaat',
        'tujuan',
        'mulai_praja',
        'selesai_praja',
        'file',
        'views',
        'approve',
        'publish'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
