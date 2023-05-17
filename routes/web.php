<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\JenisLayananController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SegmenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EUController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegisterController;
use App\Models\portofolio;
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

// undefined route
route::get('/returnan', function () {
    return view('returnan');
});

//guest
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'authenticate']);

    //landing page EU
    Route::get('/', [EUController::class, 'index'])->name('landingpageEU.index');

    //blog
    Route::get('/blog/editing', function () {
        return view('EU.blog.editing');
    });
    Route::get('/blog/design', function () {
        return view('EU.blog.design');
    });
    Route::get('/blog/pemrograman', function () {
        return view('EU.blog.pemrograman');
    });

    //Store EU
    Route::get('/store/all', [EUController::class, 'storeindex'])->name('storeEU.index');
    Route::get('/store/editing', [EUController::class, 'editing'])->name('storeEU.editing');
    Route::get('/store/design', [EUController::class, 'design'])->name('storeEU.design');
    Route::resource('/store', EUController::class);
    route::get('/store/{id}', [EUController::class, 'show']);

    //services
    Route::get('/services/all', function () {
        return view('EU.services.index');
    });


    //register
    Route::resource('register', RegisterController::class);


    // user EU
    Route::get('/edit-profile', function () {
        return view('EU.user.edit');
    });
    Route::get('/profile', function () {
        return view('EU.user.index');
    });
});

//  client
route::middleware('client')->group(function () {
    // landing page
    Route::get('/', [EUController::class, 'index'])->name('landingpageEU.index');

    //blog
    Route::get('/blog/editing', function () {
        return view('EU.blog.editing');
    });
    Route::get('/blog/design', function () {
        return view('EU.blog.design');
    });
    Route::get('/blog/pemrograman', function () {
        return view('EU.blog.pemrograman');
    });

    //Store EU
    Route::get('/store/all', [EUController::class, 'storeindex'])->name('storeEU.index');
    Route::get('/store/editing', [EUController::class, 'editing'])->name('storeEU.editing');
    Route::get('/store/design', [EUController::class, 'design'])->name('storeEU.design');
    Route::resource('/store', EUController::class);
    route::get('/store/{id}', [EUController::class, 'show']);
    
    //services
    Route::get('/services/all', function () {
        return view('EU.services.index');
    });
    
    //cart
    Route::get('/cart', function () {
        return view('EU.transaction.cart');
    });

    //transaction
    Route::get('/pembayaran', function () {
        return view('EU.transaction.pembayaran');
    });

    // user EU
    Route::get('/edit-profile', function () {
        return view('EU.user.edit');
    });
    Route::get('/profile', function () {
        return view('EU.user.index');
    });
});

// role admin
// Route::middleware('auth')->group(function() {
Route::middleware(['admin', 'owner', 'employee'])->group(function () {
    Route::resource('/dashboard', DashboardController::class);

    //store
    Route::resource('adm_store', ProdukController::class);
    Route::get('/adm_store/{id}/hapus', [ProdukController::class, 'hapus'])->name('store.hapus');

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
    Route::resource('transaksi', TransaksiController::class);

    //user

    Route::post('role', [RoleController::class, 'store'])->name('role.store');
    Route::get('role/{id}/hapus', [RoleController::class, 'hapus'])->name('role.hapus');

    Route::get('user/{id}/hapus', [UserController::class, 'hapus'])->name('user.hapus');
    Route::resource('user', UserController::class);

    //member
    Route::get('member/{id}/hapus', [MemberController::class, 'hapus'])->name('member.hapus');
    Route::resource('member', MemberController::class);

    //employee
    Route::get('employee/{id}/hapus', [EmployeeController::class, 'hapus'])->name('employee.hapus');
    Route::resource('employee', EmployeeController::class);

    //landing page
    Route::resource('landing_page', landingpageController::class);

    //landing illustration
    Route::get('/landing-page/illustration', [landingpageController::class, 'illustration'])->name('landing.illustration');
    Route::get('/landing-page/illustration/{id}/edit', [landingpageController::class, 'edit_illustration'])->name('landing.illustration_edit');
    Route::put('/landing-page/illustration/{id}/update', [landingpageController::class, 'update_illustration'])->name('landing.illustration_update');

    //landing partner
    Route::get('/landing-page/illustration/partner/{id}/edit', [landingpageController::class, 'edit_partner'])->name('landing.partner_edit');
    Route::get('/landing-page/illustration/partner/create', [landingpageController::class, 'create_partner'])->name('landing.partner_create');
    Route::post('/landing-page/illustration/partner/store', [landingpageController::class, 'store_partner'])->name('landing.partner_store');
    Route::put('/landing-page/illustration/partner/{id}/update', [landingpageController::class, 'update_partner'])->name('landing.partner_update');
    Route::get('/landing-page/illustration/partner/{id}/hapus', [landingpageController::class, 'hapus_partner'])->name('landing.partner_hapus');

    //landing data
    Route::get('/landing-page/data', [landingpageController::class, 'data'])->name('landing.data');
    Route::get('/landing-page/data/{id}/edit', [landingpageController::class, 'edit_data'])->name('landing.data_edit');
    Route::get('/landing-page/data/create', [landingpageController::class, 'create_data'])->name('landing.data_create');
    Route::get('/landing-page/data/{id}/hapus', [landingpageController::class, 'hapus_data'])->name('landing.data_hapus');
    Route::post('/landing-page/data/store', [landingpageController::class, 'store_data'])->name('landing.data_store');
    Route::put('/landing-page/data/{id}/update', [landingpageController::class, 'update_data'])->name('landing.data_update');

    //landing text
    Route::get('/landing-page/text', [landingpageController::class, 'text'])->name('landing.text');
    Route::get('/landing-page/text/{id}/edit', [landingpageController::class, 'edit_text'])->name('landing.text_edit');
    Route::get('/landing-page/text/{id}/update', [landingpageController::class, 'update_text'])->name('landing.text_update');

    //portofolio
    Route::resource('/portofolio', PortofolioController::class);
    Route::get('/edit', [PortofolioController::class, 'test'])->name('portofolio.test');
    Route::get('/tambah', [PortofolioController::class, 'test'])->name('portofolio.tambah');

    //notif
    Route::resource('notif', NotificationController::class);
    Route::get('/read/{notificationId}', [NotificationController::class, 'read'])->name('notif.read');
});


//logout
// Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');
Route::post('logout', [LoginController::class, 'logout']);

