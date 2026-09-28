<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Tiga rute fungsional ditangani oleh satu PageController (DRY).
Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/profil-mahasiswa', [PageController::class, 'profil'])->name('profil');
Route::get('/ide-agent', [PageController::class, 'ideAgent'])->name('ide-agent');
