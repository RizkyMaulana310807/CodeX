<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WalletController;

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/Home', [WebController::class, 'home'])->name('home');
Route::get('/Dashboard', [WalletController::class, 'index'])->name('dashboard');
Route::get('/Analytic', [WebController::class, 'analytic'])->name('analytic.index');
Route::get('/worker', [WebController::class, 'worker'])->name('workers.index');
Route::get('/uangmasuk', [WebController::class, 'pemasukan'])->name('wallet.index');
Route::post('/uangmasuk', [WalletController::class, 'store'])->name('wallet.store');
