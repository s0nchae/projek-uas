<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;

class ArticleController extends Controller
{
    public function show($slug)
    {
        // Menampilkan satu artikel tunggal berdasarkan slug
        
        // Ambil artikel utama. firstOrFail() akan melempar 404 jika tidak ditemukan.
        $article = Article::where('slug', $slug)->firstOrFail();

        // Ambil 6 artikel lain yang terkait (kecuali artikel ini)
        $relatedArticles = Article::where('id', '!=', $article->id)
                                    ->orderBy('created_at', 'desc')
                                    ->take(6)
                                    ->get();

        // Kirim data ke view edukasi/artikel.blade.php
        return view('edukasi.artikel', [
            'article' => $article,
            'relatedArticles' => $relatedArticles,
        ]);
    }
    
    // Anda bisa tambahkan metode index() di sini untuk halaman utama edukasi/index.blade.php
    public function index()
    {
        // Contoh: Ambil 10 artikel terbaru
        $latestArticles = Article::orderBy('created_at', 'desc')->take(10)->get();
        
        return view('edukasi.index', compact('latestArticles'));
    }

    public function category($slug)
    {
        // 1. Ubah slug menjadi nama kategori yang mungkin (misalnya 'the-hidden-truth' menjadi 'The Hidden Truth')
        // Note: Asumsi nama kategori di DB dan slug-nya sama, jika tidak, Anda perlu tabel Kategori.
        $categoryName = str_replace('-', ' ', ucwords($slug)); 
        
        // 2. Ambil semua artikel di kategori tersebut
        $articles = Article::where('kategori', $categoryName)
                            ->orderBy('created_at', 'desc')
                            ->paginate(12); // Menggunakan pagination untuk efisiensi

        // 3. Kirim data ke view edukasi/kategori.blade.php
        return view('edukasi.kategori', [
            'categoryName' => $categoryName,
            'articles' => $articles,
        ]);
    }
}
