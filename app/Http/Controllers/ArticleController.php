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
        $article = Article::where('slug', $slug)
                  ->where('is_published', 1)
                  ->firstOrFail();

        // Ambil 6 artikel lain yang terkait (kecuali artikel ini)
        $relatedArticles = Article::where('id', '!=', $article->id)
                          ->where('is_published', 1)
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
        $latestArticles = Article::where('is_published', 1)
                         ->orderBy('created_at', 'desc')
                         ->take(10)
                         ->get();

        $categories = Article::where('is_published', 1)
                         ->select('kategori')
                         ->distinct()
                         ->get();
        
        return view('edukasi.index', compact('latestArticles', 'categories'));
    }

    public function category($slug)
    {
        // 1. Ubah slug menjadi nama kategori yang mungkin (misalnya 'the-hidden-truth' menjadi 'The Hidden Truth')
        // Note: Asumsi nama kategori di DB dan slug-nya sama, jika tidak, Anda perlu tabel Kategori.
        $categoryName = str_replace('-', ' ', ucwords($slug)); 
        
        // 2. Ambil semua artikel di kategori tersebut
        $articles = Article::where('kategori', $categoryName)
                   ->where('is_published', 1)
                   ->orderBy('created_at', 'desc')
                   ->paginate(12);

        // 3. Kirim data ke view edukasi/kategori.blade.php
        return view('edukasi.kategori', [
            'categoryName' => $categoryName,
            'articles' => $articles,
        ]);
    }
}
