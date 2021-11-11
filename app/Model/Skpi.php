<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Skpi extends Model
{
    protected $table = 'skpi';
    protected $primaryKey = 'id_skpi';
    protected $fillable = ['id_mahasiswa', 'nama_pelatihan', 'tanggal', 'file'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}
