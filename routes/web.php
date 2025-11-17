<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TierListController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', [KalkulatorController::class, 'dashboard']);
Route::get('/dashboard', [KalkulatorController::class, 'dashboard'])->name('dashboard');
Route::post('/calculate', [KalkulatorController::class, 'calculate'])->name('calculate');
Route::delete('/clear-history/{id}', [KalkulatorController::class, 'clearHistory'])->name('clear-history');

// Route::get('/', function () {
//     return view('dashboard');
// });


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'proseslogin']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/tierlist/store', [TierListController::class, 'store'])->name('tierlist.store');

// Rute untuk Halaman Utama Edukasi
Route::get('/edukasi', [ArticleController::class, 'index'])->name('edukasi.index');
// Rute untuk Detail Artikel (Menggunakan slug sebagai parameter dinamis)
Route::get('/edukasi/artikel/{slug}', [ArticleController::class, 'show'])->name('edukasi.show');
Route::get('/edukasi/kategori/{slug}', [ArticleController::class, 'category'])->name('edukasi.category');


// Rute untuk Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => redirect()->route('admin.artikel.index'))->name('index');
    Route::resource('artikel', AdminArticleController::class);

    // route untuk Ajax kategori
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
});



// Route::get('/register', function () {
//     return view('register');
// });

