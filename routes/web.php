<?php

use App\Models\Video;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EkonomiController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\JenjangController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\UsiaController;
use App\Http\Controllers\TierListController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VideoController;

// Route::get('/', [KalkulatorController::class, 'dashboard']);
Route::get('/', [KalkulatorController::class, 'dashboard'])->name('dashboard');
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
    Route::get('/artikel', fn() => redirect()->route('admin.artikel.index'))->name('index');
    Route::resource('artikel', AdminArticleController::class);

    Route::get('/jenjang', [JenjangController::class, 'show'])->name('jenjang.index');
    Route::get('/create/jenjang', [JenjangController::class, 'create'])->name('jenjang.create');
    Route::get('/store/jenjang', [JenjangController::class, 'store'])->name('jenjang.store');
    Route::post('/jenjang/{id}/edit', [JenjangController::class, 'update'])->name('jenjang.edit');
    Route::delete('/jenjang/{id}', [JenjangController::class, 'destroy'])->name('jenjang.destroy');

    Route::get('/ekonomi', [EkonomiController::class, 'show'])->name('ekonomi.index');
    Route::get('/create/ekonomi', [EkonomiController::class, 'create'])->name('ekonomi.create');
    Route::get('/store/ekonomi', [EkonomiController::class, 'store'])->name('ekonomi.store');
    Route::post('/ekonomi/{id}/edit', [EkonomiController::class, 'update'])->name('ekonomi.edit');
    Route::delete('/ekonomi/{id}', [EkonomiController::class, 'destroy'])->name('ekonomi.destroy');

    Route::get('/usia', [UsiaController::class, 'show'])->name('usia.index');
    Route::get('/create/usia', [UsiaController::class, 'create'])->name('usia.create');
    Route::get('/store/usia', [UsiaController::class, 'store'])->name('usia.store');
    Route::post('/usia/{id}/edit', [UsiaController::class, 'update'])->name('usia.edit');
    Route::delete('/usia/{id}', [UsiaController::class, 'destroy'])->name('usia.destroy');

    Route::get('/gender', [GenderController::class, 'show'])->name('gender.index');
    Route::get('/create/gender', [GenderController::class, 'create'])->name('gender.create');
    Route::get('/store/gender', [GenderController::class, 'store'])->name('gender.store');
    Route::post('/gender/{id}/edit', [GenderController::class, 'update'])->name('gender.edit');
    Route::delete('/gender/{id}', [GenderController::class, 'destroy'])->name('gender.destroy');

    Route::get('/provinsi', [ProvinsiController::class, 'show'])->name('provinsi.index');
    Route::get('/create/provinsi', [ProvinsiController::class, 'create'])->name('provinsi.create');
    Route::get('/store/provinsi', [ProvinsiController::class, 'store'])->name('provinsi.store');
    Route::post('/provinsi/{id}/edit', [ProvinsiController::class, 'update'])->name('provinsi.edit');
    Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');


    // route untuk Ajax kategori
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
});



// Route::get('/register', function () {
//     return view('register');
// });
// Rute untuk Admin (VIDEO)

Route::get('/admin/videos', [VideoController::class, 'index'])
    ->name('videos.index');

Route::get('/admin/videos/create', [VideoController::class, 'create'])
    ->name('videos.create');

Route::post('/admin/videos', [VideoController::class, 'store'])
    ->name('videos.store');

Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('/videos/{video}', [VideoController::class, 'update'])->name('videos.update');
Route::delete('/videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');



    Route::get('/dashboard', function () {
    $videos = Video::all();

    $mainVideo = $videos->first(); 
    $otherVideos = $videos->skip(1)->take(3); 

    return view('dashboard', compact('mainVideo', 'otherVideos'));
});
