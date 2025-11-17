<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Definisikan kolom yang bisa diisi
    protected $fillable = [
        'judul',
        'slug',
        'deskripsi_singkat',
        'konten',
        'author',
        'kategori',
        'thumbnail_path',
        'is_published',
    ];
    
    // Konversi kolom created_at menjadi objek Carbon (opsional tapi disarankan)
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
