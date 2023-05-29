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
use App\Http\Middleware\StaffMiddleware;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RequestUserController;
use App\Http\Controllers\GroupChatController;
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
route::get('/1', function () {
    return view('returnan');
});
route::get('/2', function () {
    return view('returnan');
});
route::get('/3', function () {
    return view('returnan');
});
route::get('/4', function () {
    return view('returnan');
});
route::get('/5', function () {
    return view('returnan');
});
route::get('/returnan', function () {
    return view('returnan');
});




Route::get('/group-chat', [GroupChatController::class, 'index'])->name('gc.index');
Route::post('group-chat/send-message', [GroupChatController::class, 'sendMessage']);


route::get('/transaksi/acc', function () {
    return view('Admin.transaction.acc');
});
route::get('/transaksi/acc/detail', function () {
    return view('Admin.transaction.YesNo');
});




//landing page
Route::get('/', [EUController::class, 'index'])->name('landingpageEU.index');


//history transaksi
Route::get('/history-transaction', function () {
    return view('EU.history.index');
});


//portfolio
Route::resource('portfolio', PortofolioController::class);

//store
Route::resource('store', ProdukController::class);
Route::get('/store/{id}/showid', [ProdukController::class, 'showid'])->name('store.showid');
Route::get('/store/{type}/show', [ProdukController::class, 'showtype'])->name('store.showtype');

//blog
Route::resource('blog', BlogController::class);
Route::get('/blog/editing', function () {
    return view('EU.blog.editing');
});
Route::get('/blog/design', function () {
    return view('EU.blog.design');
});

Route::get('/blog/pemrograman', function () {
    return view('EU.blog.pemrograman');
});
Route::get('/blog/show', function () {
    return view('EU.blog.show');
});

//services
Route::get('/services/all', function () {
    return view('EU.services.index');
});

Route::get('/services/detail', function () {
    return view('EU.services.detail');
});

Route::get('/profile', function () {
    return view('EU.user.index');
});

Route::get('/cara', function () {
    return view('EU.transaction.cara');
});
//logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

//logout khusus jika eror (akses dari ketik url /logout)
// Route::get('logout', [LoginController::class, 'logout'])->middleware('auth');

//guest
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::get('authcheck', [LoginController::class, 'authcheck'])->name('authcheck');
    Route::post('login', [LoginController::class, 'authenticate']);

    //register
    Route::resource('register', RegisterController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('/filter', [UserController::class, 'filterUsers'])->name('user.filter');
    Route::get('user/{id}/hapus', [UserController::class, 'hapus'])->name('user.hapus');

    // transaction
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/history', [TransaksiController::class, 'history'])->name('transaksi.history');
    Route::get('/transaksi_pembayaran/{id}', [TransaksiController::class, 'pembayaran'])->name('transaksi.pembayaran');
    Route::get('/transaksi_kredit/{id}', [TransaksiController::class, 'kredit'])->name('transaksi.kredit');

    route::get('/lunas', function () {
        return view('EU.transaction.lunas');
    });
    route::get('/kredit', function () {
        return view('EU.transaction.kredit');
    });
    route::get('/belumbayar', function () {
        return view('EU.transaction.bb');
    });
});

//  client
route::middleware(['client', 'employee'])->group(function () {
    //group-chats
    Route::get('/groupchat', function () {
        return view('EU.chat.index');
    });

    Route::get('/edit_profile', [EUController::class, 'editprofile'])->name('storeEU.edit_profile');
    Route::get('/show_profile', [EUController::class, 'showprofile'])->name('storeEU.show_profile');
    Route::get('/update_profile', [EUController::class, 'updateprofile'])->name('storeEU.update_profile');
    Route::get('/hapus_profile', [EUController::class, 'hapusprofile'])->name('storeEU.hapus_profile');

    // transaction
    Route::get('/pembayaran', function () {
        return view('EU.transaction.pembayaran');
    });

    // transaction
    Route::get('/cart', [TransaksiController::class])->name('cart.index');
    Route::post('/cart/increase', [TransaksiController::class])->name('cart.increase');

    // Route::post('/transaksi/hapus/{id}', [TransaksiController::class,'hapus'])->name('transaksi.hapus');
    // Route::get('/cart', [TransaksiController::class, 'cart'])->name('transaksi.cart');
    Route::resource('/cart', CartController::class);
    // Route::post('/produk_cart/{$id}', [CartController::class,'delete'])->name('cart.delete');
});


// role admin
Route::middleware('admin')->group(function () {
    Route::resource('/dashboard', DashboardController::class);

    //services
    Route::resource('services', ServicesController::class);
    Route::POST('jenislayanan', [JenisLayananController::class, 'store'])->name('jenislayanan.store');
    Route::GET('jenislayanan/{id}/hapus', [JenisLayananController::class, 'hapus'])->name('jenislayanan.hapus');
    Route::GET('services/{id}/hapus', [ServicesController::class, 'hapus'])->name('services.hapus');
    Route::get('id_services', [ServicesController::class, 'id_services']);
    Route::get('/service-ilustrasi', [ServicesController::class, 'ilustrasi'])->name('services.ilustrasi');
    Route::get('/service-ilustrasi/{id}/edit', [ServicesController::class, 'ilustrasi_edit'])->name('services.ilustrasi_edit');
    Route::put('/service-ilustrasi/{id}/update', [ServicesController::class, 'ilustrasi_update'])->name('services.ilustrasi_update');

    //blog
    Route::get('blog/{id}/hapus', [BlogController::class, 'hapus'])->name('blog.hapus');
    Route::post('segmen', [SegmenController::class, 'store'])->name('segmen.store');
    Route::get('segmen/{id}/hapus', [SegmenController::class, 'hapus'])->name('segmen.hapus');

    //store
    Route::get('/store/{id}/hapus', [ProdukController::class, 'hapus'])->name('store.hapus');

    //role
    Route::post('role', [RoleController::class, 'store'])->name('role.store');
    Route::get('role/{id}/hapus', [RoleController::class, 'hapus'])->name('role.hapus');


    //member
    Route::resource('member', MemberController::class);
    Route::get('member/{id}/hapus', [MemberController::class, 'hapus'])->name('member.hapus');

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
    Route::get('/portfolio/{id}/hapus', [PortofolioController::class, 'hapus'])->name('portfolio.hapus');
    Route::get('/portofolio-ilustrasi', [PortofolioController::class, 'ilustrasi_index'])->name('portofolio.ilustrasi');
    Route::get('/portofolio-ilustrasi/edit/{id}', [PortofolioController::class, 'ilustrasi_edit'])->name('portofolio.edit_ilustrasi');
    Route::put('/portofolio-ilustrasi/update/{id}', [PortofolioController::class, 'ilustrasi_update'])->name('portofolio.update_ilustrasi');

    //notif
    Route::post('/read', [NotificationController::class, 'read'])->name('read');
    Route::get('/read_chat/{notifId}', [NotificationController::class, 'read_chat'])->name('read.chat');

    // request user
    Route::resource('requestuser', requestuserController::class );
});
