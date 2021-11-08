<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    protected $table = 'jurnal';
    protected $primaryKey = 'id_jurnal';
    protected $fillable = [
        'id_mahasiswa',
        'judul_indo',
        'judul_eng',
        'abstrak_indo',
        'abstrak_eng',
        'keyword',
        'tanggal',
        'daftar_pustaka',
        'file'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
