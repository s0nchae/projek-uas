<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'judul' => 'Bukan Cuma Paru: Dampak Rokok ke Organ yang Tak Terduga',
            'slug' => Str::slug('Bukan Cuma Paru: Dampak Rokok ke Organ yang Tak Terduga'),
            'deskripsi_singkat' => 'Selain kanker paru, apakah rokok benar-benar bisa merenggut penglihatan dan vitalitas Anda? Temukan fakta mengejutkan...',
            'konten' => '<p style="text-indent: 50px">Rokok mengandung ribuan zat kimia berbahaya...</p><p style="text-indent: 50px">...dan seterusnya...</p>',
            'author' => 'Muhammad Fikri',
            'kategori' => 'The Hidden Truth',
            'thumbnail_path' => 'assets/smokingbanner.jpg',
            'is_published' => true,
        ]);

        // Tambahkan 6-7 artikel lain di sini untuk menguji carousel
        for ($i = 2; $i <= 8; $i++) {
             Article::create([
                'judul' => "Artikel Lain Tentang Rokok Ke-$i",
                'slug' => Str::slug("Artikel Lain Tentang Rokok Ke-$i"),
                'deskripsi_singkat' => "Ringkasan artikel nomor $i.",
                'konten' => '<p>Konten detail artikel...</p>',
                'author' => 'Muhammad Fikri',
                'kategori' => 'Fakta Cepat',
                'thumbnail_path' => 'assets/smokingbanner.jpg',
                'is_published' => true,
            ]);
        }
    }
}
