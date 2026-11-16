<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use Illuminate\Image\Transformations\Rotate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.welcome');
});

//Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/update{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/delete{id}', [ProdukController::class, 'destroy'])->name('produk.delete');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');

//Supplier
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');    
Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('/supplier/update{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/delete{id}', [SupplierController::class, 'destroy'])->name('supplier.delete');
Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');

//Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');    
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/update{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/delete{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');

Route::get('/pelanggan', function () {
    return view('pelanggan.index');
})->name('pelanggan.index');