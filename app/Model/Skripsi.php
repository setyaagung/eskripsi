<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    protected $table = 'skripsi';
    protected $primaryKey = 'id_skripsi';
    protected $fillable = [
        'id_mahasiswa',
        'mulai_bimbingan',
        'selesai_bimbingan',
        'pembimbing1',
        'pembimbing2',
        'penguji1',
        'penguji2',
        'penguji3',
        'judul_indo',
        'judul_eng',
        'abstrak_indo',
        'abstrak_eng',
        'kata_kunci',
        'daftar_pustaka'
    ];

    public function pem1()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'pembimbing1');
    }
}
