<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Models\Barang;
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

//Login + Logout
Route::get('/', function () {
    return view('login');
})->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//User Registration
Route::get('/register', function () {
    return view('register');
})->middleware('guest');;
Route::post('/register-user', [RegisterController::class, 'registerUser'])->name('registerUser');

//ADMIN
Route::get('/list-barang', [BarangController::class, 'getBarangs'])->name('getBarangs');

Route::get('/add-kategori', [BarangController::class, 'getCreateKategori'])->name('getCreateKategori');
Route::post('/create-kategori', [BarangController::class, 'createKategori'])->name('createKategori');

Route::get('/add-barang', [BarangController::class, 'getCreateBarang'])->name('getCreateBarang');
Route::post('/create-barang', [BarangController::class, 'createBarang'])->name('createBarang');

Route::get('/update-barang/{id}', [BarangController::class, 'getBarangById'])->name('getBarangById');
Route::patch('/update-barang/{id}', [BarangController::class, 'updateBarang'])->name('updateBarang');

Route::delete('/delete-barang/{id}', [BarangController::class, 'deleteBarang'])->name('delete');

//USER
Route::get('/view-barang', [BarangController::class, 'viewBarangs'])->name('viewBarangs');