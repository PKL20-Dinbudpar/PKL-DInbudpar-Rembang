<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// route index check auth
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'dinas'){
            return redirect('/dinas');
        } else if (Auth::user()->role == 'wisata'){
            return redirect('/wisata');
        }
    } else {
        return redirect('/login');
    }
})->name('dashboard');

// Route for Dinas
Route::middleware(['auth', 'user-role:dinas'])->group(function () {
    Route::get('/dinas', function () {
        return view('dinas.home-dinas');
    })->name('dinas-home');

    Route::get('/dinas/rekap', function () {
        return view('dinas.rekap-tahunan-dinas');
    })->name('dinas-rekap');
    Route::get('/dinas/wisata', function () {
        return view('dinas.wisata-dinas');
    })->name('dinas-wisata');

    Route::get('/dinas/users', function () {
        return view('dinas.user-dinas');
    })->name('dinas-users');
});

// Route for Wisata
Route::middleware(['auth', 'user-role:wisata'])->group(function () {
    Route::get('/wisata', function () {
        return view('wisata.home-wisata');
    })->name('wisata-home');

    Route::get('/wisata/transaksi', function () {
        return view('wisata.transaksi-wisata');
    })->name('wisata-transaksi');

    Route::get('/rekap', function () {
        return view('wisata.rekap-wisata');
    })->name('wisata-rekap');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
