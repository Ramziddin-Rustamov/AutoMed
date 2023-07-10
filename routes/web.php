<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopSellerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PDFMakerController;

// use PDF;


Route::get('/', function () {
    return view('auth.login');
  
})->middleware('guest');


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('can:super-admin');
Route::get('/seller', [ShopSellerController::class, 'index'])->name('seller.index')->middleware('can:seller'); // for seller
// Route::get('/seller/code', [ServiceController::class, 'qrcode'])->name('master.qrcode')->middleware('can:master'); // for seller
// Route::get('/master/code', [ShopSellerController::class, 'qrcode'])->name('seller.qrcode')->middleware('can:seller'); // for seller
Route::get('/products', [ProductController::class, 'index'])->name('product.index')->middleware('can:seller'); // for seller
Route::get('/service', [ServiceController::class, 'index'])->name('service.index')->middleware('can:master'); //for masters
Route::put('/client/{id}', [ClientController::class, 'update'])->name('client.update')->middleware('can:super-admin'); // for super admin
Route::put('/sellUpdate/{id}', [ClientController::class, 'updateSell'])->name('sell.update')->middleware('can:super-admin'); // for super admin
Route::get('/automed', [HomeController::class, 'redirect'])->middleware('auth'); // for all user who registereded
Route::get('/generate/{id}', [PDFMakerController::class, 'index']);
Route::get('/pdf', [PDFController::class, 'dowloadPDf']);
Route::get('/index', [PDFController::class, 'index']);
//service index