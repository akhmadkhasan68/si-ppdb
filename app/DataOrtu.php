<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataOrtu extends Model
{
    protected $table = 'table_data_ortu';
    protected $fillable = [
        'user_id',
        'nama_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'gaji_ayah',
        'alamat_ayah',
        'kota_ayah',
        'provinsi_ayah',
        'kode_pos_ayah',
        'nama_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'gaji_ibu',
        'alamat_ibu',
        'kota_ibu',
        'provinsi_ibu',
        'kode_pos_ibu'
    ];
}
