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

Route::get('/', function () {
    return view('login');
});
// Route::get('/login', function () {
//     return view('login');
// });
Route::get('/dashboard', function () {
    return view('Admin.dashboard');
});



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
Route::resource('/landingpage', landingpageController::class);  
Route::get('/landing-page/illustration', [landingpageController::class , 'illustration'])->name('landingpage.illustration');
Route::get('/landing-page/data/', [landingpageController::class , 'data'])->name('landingpage.data');
Route::get('/landing-page/text', [landingpageController::class , 'text'])->name('landingpage.text');
Route::get('/text/{$id}/edit', [landingpageController::class , 'edit_text'])->name('landingpage.edittext');


//pesan
Route::get('/pesan', function () {
    return view('Admin.chat.index');
});