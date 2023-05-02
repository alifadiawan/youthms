<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SegmenController;
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
Route::get('/user', function(){
    return view('Admin.user.index');
});
Route::get('/userdetail', function(){
    return view('Admin.user.user-detail');
});
Route::get('/edituser', function(){
    return view('Admin.user.edit-user');
});
Route::get('/adduser', function(){
    return view('Admin.user.add-user');
});


//member
Route::get('/member', function(){
    return view('Admin.member.index');
});
Route::get('/memberdetail', function(){
    return view('Admin.member.member-detail');
});
Route::get('/editmember', function(){
    return view('Admin.member.edit-member');
});
Route::get('/addmember', function(){
    return view('Admin.member.add-member');
});


//landing page
Route::resource('landing-page', landingpageController::class);  


//pesan
Route::get('/pesan', function () {
    return view('Admin.chat.index');
});