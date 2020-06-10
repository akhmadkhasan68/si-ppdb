<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DokumenPendukung extends Model
{
    protected $table = 'table_dokumen_pendukung';
    protected $fillable = [
        'user_id',
        'foto',
        'kk',
        'scan_raport',
        'ijazah'
    ];
}
