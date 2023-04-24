<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Models\Barang;
use App\Models\Cart;
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
Route::middleware('admin')->group(function(){
    Route::get('/list-barang', [BarangController::class, 'getBarangs'])->name('getBarangs');
    
    Route::get('/add-kategori', [BarangController::class, 'getCreateKategori'])->name('getCreateKategori');
    Route::post('/create-kategori', [BarangController::class, 'createKategori'])->name('createKategori');
    Route::delete('/delete-kategori/{id}', [BarangController::class, 'deleteKategori'])->name('deleteKategori');
    
    Route::get('/add-barang', [BarangController::class, 'getCreateBarang'])->name('getCreateBarang');
    Route::post('/create-barang', [BarangController::class, 'createBarang'])->name('createBarang');
    
    Route::get('/update-barang/{id}', [BarangController::class, 'getBarangById'])->name('getBarangById');
    Route::patch('/update-barang/{id}', [BarangController::class, 'updateBarang'])->name('updateBarang');
    
    Route::delete('/delete-barang/{id}', [BarangController::class, 'deleteBarang'])->name('delete');
});


//USER
Route::middleware('user')->group(function(){
    //View Barang
    Route::get('/view-barang', [BarangController::class, 'viewBarangs'])->name('viewBarangs');
    Route::get('/sort-by-category/{id}', [BarangController::class, 'sortByCategory']);
    Route::post('/add-to-cart/{id}', [CartController::class, 'createCart'])->name('createCart');
    
    //View Cart
    Route::get('/view-cart', [CartController::class, 'viewCart'])->name('viewCart');
    Route::delete('/delete-item/{id}', [CartController::class, 'deleteItem'])->name('deleteItem');
    Route::patch('/minus-jumlah/{id}', [CartController::class, 'minusJumlah'])->name('minusJumlah');
    Route::patch('/plus-jumlah/{id}', [CartController::class, 'plusJumlah'])->name('plusJumlah');
    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('checkout');

    //View Invoices / Transactions
    Route::get('/view-transactions/{id}', [TransactionController::class, 'transactionHistory'])->name('transactionHistory');
    Route::get('/view-invoice/{id}', [TransactionController::class, 'getTransaction'])->name('getTransaction');
    Route::get('/downloadInvoide/{id}', [TransactionController::class, 'downloadInvoice'])->name('downloadInvoice');
});
