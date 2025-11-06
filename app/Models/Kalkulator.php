<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kalkulator extends Model
{
    protected $table = 'kalkulator';
    protected $fillable = [
        'bungkus_per_hari',
        'harga_per_bungkus', 
        'lama_bulan_merokok',
        'total_per_hari',
        'total_per_bulan',
        'total_uang'
    ];
}