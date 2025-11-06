<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TierListController;
use App\Http\Controllers\KalkulatorController;

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


// Route::get('/register', function () {
//     return view('register');
// });

