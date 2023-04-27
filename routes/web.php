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





//blog
Route::get('/blog', function () {
    return view('Admin.blog.index');
});
Route::get('/addartikel', function () {
    return view('Admin.blog.add');
});
Route::get('/edit', function () {
    return view('Admin.blog.edit');
});
Route::get('/detail', function () {
    return view('Admin.blog.detail');
});
