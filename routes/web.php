<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\PersetujuanBarangController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;


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

Auth::routes(
    [
        'register' => false
    ]
);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    Route::get('/', function(){
        return 'halaman admin';
    });

    Route::get('profile', function(){
        return 'halaman profile admin';
    });
});

Route::group(['prefix' => 'petugas', 'middleware' => ['auth', 'role:petugas']], function(){
    Route::get('/', function(){
        return 'halaman petugas';
    });

    Route::get('profile', function(){
        return 'halaman profile petugas';
    });
});

// Sidebar Menu

Route::group(['prefix' => 'pengadaanbarang', 'middleware' => ['auth']], function(){
    // Route::get('supplier', function(){
    //     return view('supplier.index');
    // })->middleware(['role:admin|petugas']);

    Route::resource('satuan', SatuanController::class)
    ->middleware('role:admin');

    Route::resource('kategori', KategoriController::class)
    ->middleware('role:admin');;

    Route::resource('barang', BarangController::class)
    ->middleware('role:admin|superadmin|user');

    Route::resource('supplier', SupplierController::class)
    ->middleware('role:admin');

    Route::resource('permintaan', PermintaanController::class)
    ->middleware(['role:user|admin|superadmin']);

    Route::resource('barang-masuk', BarangMasukController::class)
    ->middleware('role:user|admin|superadmin');    ;

    Route::resource('barang-keluar', BarangKeluarController::class)
    ->middleware('role:user|admin|superadmin');

    Route::resource('transaksi', TransaksiController::class)
    ->middleware('role:admin');

    Route::get('persetujuanbarang', [PersetujuanBarangController::class, 'index'])
    ->middleware(['role:superadmin']);

    Route::post('persetujuanbarang', [PersetujuanBarangController::class, 'persetujuan'])
    ->middleware(['role:superadmin']);

    Route::get('persetujuanbarangmasuk', [PersetujuanController::class, 'index'])
    ->middleware(['role:superadmin|admin']);

    Route::post('persetujuanbarangmasuk', [PersetujuanController::class, 'persetujuan'])
    ->middleware(['role:superadmin|admin']);

     //Cetak Laporan Sesuai tanggal
     Route::get('cetak-laporan', [ReportController::class, 'index'])
     ->middleware(['role:admin']);

     Route::post('cetak-laporan', [ReportController::class, 'laporan'])
     ->middleware(['role:admin']);

     //user management
    Route::resource('user-management', UserController::class)->middleware(['role:superadmin']);
});
