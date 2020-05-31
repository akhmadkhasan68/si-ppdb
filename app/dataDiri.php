<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dataDiri extends Model
{
    use SoftDeletes;
    protected $table = 'table_data_diri';
    protected $fillable = [
        'user_id',
        'name',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'jenis_kelamin',
        'email',
        'nomor_handphone',
        'alamat_lengkap',
        'kota',
        'provinsi',
        'kode_pos',
        'kode_pos'
    ];
}
