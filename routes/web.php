<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SegmenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Models\Services;

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

//guest
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);
});

//role admin
Route::middleware('auth')->group(function() {
    Route::resource('dashboard', DashboardController::class);

    //store
    Route::resource('store', ProdukController::class);
    Route::get('/store/{id}/hapus', [ProdukController::class, 'hapus'])->name('store.hapus');

    //services
    Route::resource('services', ServicesController::class);
    Route::POST('jenislayanan', [JenisLayananController::class, 'store'])->name('jenislayanan.store');
    Route::GET('jenislayanan/{id}/hapus', [JenisLayananController::class, 'hapus'])->name('jenislayanan.hapus');
    Route::GET('services/{id}/hapus', [ServicesController::class, 'hapus'])->name('services.hapus');
    Route::get('id_services', [ServicesController::class, 'id_services']);

    //blog
    Route::get('blog/{id}/hapus', [BlogController::class, 'hapus'])->name('blog.hapus');
    Route::resource('blog', BlogController::class);
    Route::post('segmen', [SegmenController::class, 'store'])->name('segmen.store');
    Route::get('segmen/{id}/hapus', [SegmenController::class, 'hapus'])->name('segmen.hapus');

    //transaction
    Route::get('/transaction', function () {
        return view('Admin.transaction.index');
    });

    //user
    Route::post('jabatan', [JabatanController::class, 'store'])->name('jabatan.store');
    Route::get('jabatan/{id}/hapus', [JabatanController::class, 'hapus'])->name('jabatan.hapus');
    Route::get('user/{id}/hapus', [UserController::class, 'hapus'])->name('user.hapus');
    Route::resource('user', UserController::class);

    //member
    Route::get('member/{id}/hapus', [MemberController::class, 'hapus'])->name('member.hapus');
    Route::resource('member', MemberController::class);

    //landing page
    Route::resource('landing-page', landingpageController::class);  

    //pesan
    Route::get('/pesan', function () {
        return view('Admin.chat.index');
    });
});


//logout
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');
