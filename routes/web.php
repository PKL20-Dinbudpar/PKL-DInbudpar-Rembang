<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route for Dinas
Route::get('/dinas', function () {
    return view('dinas.home-dinas');
})->middleware(['auth', 'verified'])->name('dinas-home');

Route::get('/dinas/rekap', function () {
    return view('dinas.home-dinas');
})->middleware(['auth', 'verified'])->name('dinas-rekap');

Route::get('/dinas/wisata', function () {
    return view('dinas.home-dinas');
})->middleware(['auth', 'verified'])->name('dinas-wisata');

Route::get('/dinas/users', function () {
    return view('dinas.home-dinas');
})->middleware(['auth', 'verified'])->name('dinas-users');

// Route for Wisata
Route::get('/wisata', function () {
    return view('wisata.home-wisata');
})->middleware(['auth', 'verified'])->name('wisata-home');

Route::get('/wisata/transaksi', function () {
    return view('wisata.home-wisata');
})->middleware(['auth', 'verified'])->name('wisata-transaksi');

Route::get('/rekap', function () {
    return view('wisata.home-wisata');
})->middleware(['auth', 'verified'])->name('wisata-rekap');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
