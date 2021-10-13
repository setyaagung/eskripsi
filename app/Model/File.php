<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';
    protected $primaryKey = 'id_file';
    protected $fillable = ['id_skripsi', 'jenis_file', 'nama_file'];
}
