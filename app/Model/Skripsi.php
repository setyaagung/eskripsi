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
        'approve',
        'publish',
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
        'daftar_pustaka',
        'nilai_angka',
        'nilai_huruf',
        'slug',
        'views'
    ];

    public function pem1()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing1', 'id_dosen');
    }
    public function pem2()
    {
        return $this->belongsTo(Dosen::class, 'pembimbing2', 'id_dosen');
    }
    public function peng1()
    {
        return $this->belongsTo(Dosen::class, 'penguji1', 'id_dosen');
    }
    public function peng2()
    {
        return $this->belongsTo(Dosen::class, 'penguji2', 'id_dosen');
    }
    public function peng3()
    {
        return $this->belongsTo(Dosen::class, 'penguji3', 'id_dosen');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
