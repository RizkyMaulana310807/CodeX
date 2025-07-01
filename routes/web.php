<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/Home', [WebController::class, 'home'])->name('home');
Route::get('/Dashboard', [WebController::class, 'dashboard'])->name('dashboard');
Route::get('/Analytic', [WebController::class, 'analytic'])->name('analytic.index');
Route::get('/worker', [WebController::class, 'worker'])->name('workers.index');
Route::get('/uangmasuk', [WebController::class, 'pemasukan'])->name('uang.pemasukan');
Route::get('/uangmasuk', [WebController::class, 'pemasukan'])->name('pemasukan.store');