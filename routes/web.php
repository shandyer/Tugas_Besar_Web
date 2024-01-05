<?php

use App\Http\Controllers\bukuController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\jurnalController;
use App\Http\Controllers\artikelController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {return view('kerangka.master');})




Route::get('/dashboard', [dashboardController::class, 'index'])->middleware('auth');

Route::post('/logout', [loginController::class, 'logout'])->name('logout');
Route::get('/', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/home', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/log', [loginController::class, 'login'])->name('login.store');


Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/regist',[registerController::class, 'store'])->name('register.store');


Route::get('/data-buku', [bukuController::class, 'index'])->name('buku.index');
Route::get('/create-buku', [bukuController::class, 'create'])->name('buku.create');
Route::post('/bukus', [bukuController::class, 'store'])->name('buku.store');

Route::get('/bukus/{buku}/edit', [bukuController::class, 'edit'])->name('buku.edit');
Route::post('/bukus/{buku}/update', [bukuController::class, 'update'])->name('buku.update');

Route::delete('/bukus/{buku}', [bukuController::class, 'destroy'])->name('buku.destroy');

//jurnals

Route::get('/data-jurnals', [jurnalController::class, 'index'])->name('jurnal.index');
Route::get('/create-jurnal', [jurnalController::class, 'create'])->name('jurnal.create');
Route::post('/jurnals', [jurnalController::class, 'store'])->name('jurnal.store');

Route::get('/jurnals/{jurnal}/edit', [jurnalController::class, 'edit'])->name('jurnal.edit');
Route::post('/jurnals/{jurnal}/update', [jurnalController::class, 'update'])->name('jurnal.update');

Route::delete('/jurnals/{jurnal}', [jurnalController::class, 'destroy'])->name('jurnal.destroy');

//artikel

Route::get('/data-artikels', [artikelController::class, 'index'])->name('artikel.index');
Route::get('/create-artikel', [artikelController::class, 'create'])->name('artikel.create');
Route::post('/artikels', [artikelController::class, 'store'])->name('artikel.store');

Route::get('/artikel/{artikel}/edit', [artikelController::class, 'edit'])->name('artikel.edit');
Route::post('/artikels/{artikel}/update', [artikelController::class, 'update'])->name('artikel.update');

Route::delete('/artikels/{artikel}', [artikelController::class, 'destroy'])->name('artikel.destroy');


