<?php

use Illuminate\Support\Facades\Route;

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
    return view('Admin.dashboard');
});


// Services
Route::get('/services', function(){
    return view('Admin.services.index');
});
Route::get('/service_detail', function(){
    return view('Admin.services.detail');
});
Route::get('/edit_service', function(){
    return view('Admin.services.edit');
});
Route::get('/tambah_service', function(){
    return view('Admin.services.tambah');
});