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
    return view('login');
});
Route::get('/dashboard', function () {
    return view('Admin.dashboard');
});



//store
Route::get('/store', function(){
    return view('Admin.store.index');
});
Route::get('/store_detail', function(){
    return view('Admin.store.detail');
});
Route::get('/store_edit', function(){
    return view('Admin.store.edit');
});
Route::get('/store_tambah', function(){
    return view('Admin.store.tambah');
});


//services
Route::get('/services', function(){
    return view('Admin.services.index');
});
Route::get('/tambah_service', function(){
    return view('Admin.services.tambah');
});
Route::get('/edit_service', function(){
    return view('Admin.services.edit');
});
Route::get('/detail_service', function(){
    return view('Admin.services.detail');
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
//user
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
