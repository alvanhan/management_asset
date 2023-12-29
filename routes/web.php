<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\TransaksiController;

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

Route::get('/', function () {
    return redirect()->route("frontend.index");
});

Route::get('/homepage', [IndexController::class, 'index'])->name('frontend.index');
Route::get('/barang', [IndexController::class, 'barang'])->name('frontend.barang');
Route::get('/transaksi', [IndexController::class, 'transaksi'])->name('frontend.transaksi');
Route::get('/editbarang', [BarangController::class, 'editbarang'])->name('barangview.edit');
Route::get('/addtransaksi', [TransaksiController::class, 'addtransaksi'])->name('addtransaksi.edit');



