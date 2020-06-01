<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class AsalSekolah extends Model
{
    use SoftDeletes;
    protected $table = 'table_sekolah_asal';
    protected $fillable = [
        'user_id',
        'nama_sekolah',
        'npsn',
        'jenis_sekolah',
        'tahun_lulus',
        'alamat'
    ];
}
