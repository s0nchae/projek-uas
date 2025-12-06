<?php

use App\Models\Video;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\AdminOnly;
use App\Http\Controllers\AuthController;
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

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [KalkulatorController::class, 'dashboard'])->name('dashboard');
Route::post('/calculate', [KalkulatorController::class, 'calculate'])->name('calculate');
Route::delete('/clear-history/{id}', [KalkulatorController::class, 'clearHistory'])->name('clear-history');

Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [AuthController::class, 'proseslogin']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/tierlist/store', [TierListController::class, 'store'])->name('tierlist.store');

Route::get('/edukasi', [ArticleController::class, 'index'])->name('edukasi.index');
Route::get('/edukasi/artikel/{slug}', [ArticleController::class, 'show'])->name('edukasi.show');
Route::get('/edukasi/kategori/{slug}', [ArticleController::class, 'category'])->name('edukasi.category');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware([AdminOnly::class])->prefix('admin')->name('admin.')->group(function () {

    /* ----------------------------
       DASHBOARD ADMIN
    ----------------------------- */
    Route::get('/', function () {
        return redirect()->route('admin.artikel.index');
    });


    /* ----------------------------
       ARTIKEL ADMIN
    ----------------------------- */
    Route::get('/artikel', [AdminArticleController::class, 'index'])->name('artikel.index');
    Route::get('/artikel/create', [AdminArticleController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [AdminArticleController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{id}/edit', [AdminArticleController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [AdminArticleController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{id}', [AdminArticleController::class, 'destroy'])->name('artikel.destroy');

    /* AJAX Category */
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');


    /* ----------------------------
       JENJANG
    ----------------------------- */
    Route::get('/jenjang', [JenjangController::class, 'show'])->name('jenjang.index');
    Route::get('/jenjang/create', [JenjangController::class, 'create'])->name('jenjang.create');
    Route::post('/jenjang', [JenjangController::class, 'store'])->name('jenjang.store');
    Route::get('/jenjang/{id}/edit', [JenjangController::class, 'edit'])->name('jenjang.edit');
    Route::put('/jenjang/{id}', [JenjangController::class, 'update'])->name('jenjang.update');
    Route::delete('/jenjang/{id}', [JenjangController::class, 'destroy'])->name('jenjang.destroy');


    /* ----------------------------
       EKONOMI
    ----------------------------- */
    Route::get('/ekonomi', [EkonomiController::class, 'show'])->name('ekonomi.index');
    Route::get('/ekonomi/create', [EkonomiController::class, 'create'])->name('ekonomi.create');
    Route::post('/ekonomi', [EkonomiController::class, 'store'])->name('ekonomi.store');
    Route::get('/ekonomi/{id}/edit', [EkonomiController::class, 'edit'])->name('ekonomi.edit');
    Route::put('/ekonomi/{id}', [EkonomiController::class, 'update'])->name('ekonomi.update');
    Route::delete('/ekonomi/{id}', [EkonomiController::class, 'destroy'])->name('ekonomi.destroy');


    /* ----------------------------
       USIA
    ----------------------------- */
    Route::get('/usia', [UsiaController::class, 'show'])->name('usia.index');
    Route::get('/usia/create', [UsiaController::class, 'create'])->name('usia.create');
    Route::post('/usia', [UsiaController::class, 'store'])->name('usia.store');
    Route::get('/usia/{id}/edit', [UsiaController::class, 'edit'])->name('usia.edit');
    Route::put('/usia/{id}', [UsiaController::class, 'update'])->name('usia.update');
    Route::delete('/usia/{id}', [UsiaController::class, 'destroy'])->name('usia.destroy');


    /* ----------------------------
       GENDER
    ----------------------------- */
    Route::get('/gender', [GenderController::class, 'show'])->name('gender.index');
    Route::get('/gender/create', [GenderController::class, 'create'])->name('gender.create');
    Route::post('/gender', [GenderController::class, 'store'])->name('gender.store');
    Route::get('/gender/{id}/edit', [GenderController::class, 'edit'])->name('gender.edit');
    Route::put('/gender/{id}', [GenderController::class, 'update'])->name('gender.update');
    Route::delete('/gender/{id}', [GenderController::class, 'destroy'])->name('gender.destroy');


    /* ----------------------------
       PROVINSI
    ----------------------------- */
    Route::get('/provinsi', [ProvinsiController::class, 'show'])->name('provinsi.index');
    Route::get('/provinsi/create', [ProvinsiController::class, 'create'])->name('provinsi.create');
    Route::post('/provinsi', [ProvinsiController::class, 'store'])->name('provinsi.store');
    Route::get('/provinsi/{id}/edit', [ProvinsiController::class, 'edit'])->name('provinsi.edit');
    Route::put('/provinsi/{id}', [ProvinsiController::class, 'update'])->name('provinsi.update');
    Route::delete('/provinsi/{id}', [ProvinsiController::class, 'destroy'])->name('provinsi.destroy');


    /* ----------------------------
       VIDEOS ADMIN
    ----------------------------- */
    Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
    Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
    Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{video}', [VideoController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{video}', [VideoController::class, 'destroy'])->name('videos.destroy');
    
    /* ----------------------------
       USER ROLES
    ----------------------------- */
    // Halaman manajemen role user
    Route::get('/users/roles', [AdminController::class, 'showUserRoles'])->name('users.roles');

    // Update role satu user
    Route::post('/users/roles/{id}', [AdminController::class, 'updateUserRole'])->name('users.roles.update');
});
