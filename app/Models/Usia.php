<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usia extends Model
{
    protected $table = 'usia';
    protected $fillable = [
        'tahun',
        'umur',
        'presentase'
    ];
}
