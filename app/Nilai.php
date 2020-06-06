<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'table_nilai';
    protected $fillable = [
        'user_id',
        'matematika',
        'bahasa_indonesia',
        'bahasa_inggris',
        'ipa',
        'semester_1',
        'semester_2',
        'semester_3',
        'semester_4',
        'semester_5',
        'semester_6'
    ];
}
