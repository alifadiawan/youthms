<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cart-update', [CartController::class, 'updateQuantity'])->name('api.cart.update');
Route::get('/transaksi/total', [CartController::class, 'getTotalTransaksi'])->name('api.transaksi.total');


Route::get('/cart/quantity', [ProdukController::class, 'getCartQuantity'])->name('api.quantity.cart');
Route::post('/produk/cart/update', [ProdukController::class, 'updateQuantity'])->name('api.update.cart');

// Route::get('/history-transaksi/status', [TransaksiController::class, 'findstatus'])->name('api.transaksi.findstatus');


// Route::get('/get-data', [BlogController::class, 'getData'])->name('api.getData.blog');
