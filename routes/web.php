<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KalkulatorController;

Route::get('/', [KalkulatorController::class, 'dashboard']);
Route::get('/dashboard', [KalkulatorController::class, 'dashboard'])->name('dashboard');
Route::post('/calculate', [KalkulatorController::class, 'calculate'])->name('calculate');
Route::delete('/clear-history/{id}', [KalkulatorController::class, 'clearHistory'])->name('clear-history');