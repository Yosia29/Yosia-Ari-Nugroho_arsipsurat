<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;

Route::get('/', [SuratController::class, 'index'])->name('surat.index');
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
Route::get('/surat/{id}/lihat', [SuratController::class, 'lihat'])->name('surat.lihat');
Route::delete('/surat/{surat}', [SuratController::class, 'destroy'])->name('surat.destroy');
Route::get('/surat/{surat}/download', [SuratController::class, 'download'])->name('surat.download');

// Kategori CRUD
Route::resource('kategori', KategoriController::class)->except(['show']);

// About
Route::get('/about', function(){
    return view('about');
})->name('about');
