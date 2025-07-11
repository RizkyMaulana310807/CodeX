<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\RedirectController;

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/Home', [WebController::class, 'home'])->name('home');
Route::get('/Dashboard', [WalletController::class, 'index'])->name('dashboard');
Route::get('/Analytic', [WebController::class, 'analytic'])->name('analytic.index');
Route::get('/worker', [WebController::class, 'worker'])->name('workers.index');
Route::get('/uangmasuk', [WebController::class, 'pemasukan'])->name('wallet.index');
Route::post('/uangmasuk', [WalletController::class, 'store'])->name('wallet.store');
Route::get('/redirect/failed', [RedirectController::class, 'failed'])->name('redirect.failed');
Route::get('/redirect/create', [RedirectController::class, 'create'])->name('redirect.create');
Route::post('/links', [RedirectController::class, 'store'])->name('links.store');
Route::get('/redirect/{code}', [RedirectController::class, 'index'])->name('redirect');
Route::post('/kategori/store', [RedirectController::class, 'kategori_store'])->name('kategori.store');
