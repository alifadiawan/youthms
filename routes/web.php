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
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\PaketController;
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
route::get('/flip', function () {
    return view('EU.transaction.flip');
});
route::get('/invoice', function () {
    return view('EU.transaction.alphastude');
});

Route::get('/back', function () {
    return redirect()->back();
})->name('return.back');


Route::get('testdownload', function () {
    return view('EU.transaction.detaildownload');
});


//group chat
Route::get('/group-chat', [GroupChatController::class, 'index'])->name('gc.index');

//send
Route::post('/group-chat/send-message', [GroupChatController::class, 'sendMessage'])->name('gc.send');

//add group
Route::post('/group-chat/store', [GroupChatController::class, 'store'])->name('gc.store');

//show group
Route::get('/group-chat/{group}', [GroupChatController::class, 'showMessage'])->name('gc.show');

//add
Route::post('/group-chat/{group}/add-users', [GroupChatController::class, 'addUser'])->name('gc.users.add');
Route::post('/group-chat/{group}/add-admin', [GroupChatController::class, 'addAdmin'])->name('gc.admin.add');

//remove
Route::post('/group-chat/{group}/remove-users', [GroupChatController::class, 'removeUser'])->name('gc.users.remove');
Route::post('/group-chat/{group}/remove-admin', [GroupChatController::class, 'removeAdmin'])->name('gc.admin.remove');

//load
Route::get('/group-chat/load/{group}', [GroupChatController::class, 'loadNewMessage'])->name('gc.load');

//group
Route::post('/group-chat/join', [GroupChatController::class, 'joinGroup'])->name('gc.join');
Route::post('/group-chat/{group}/left', [GroupChatController::class, 'leftGroup'])->name('gc.left');
Route::get('/group-chat/{group}/delete', [GroupChatController::class, 'removeGroup'])->name('gc.delete');




// route::get('/transaksi/acc', function () {
//     return view('Admin.transaction.acc');
// });
// route::get('/transaksi/acc/detail', function () {
//     return view('Admin.transaction.YesNo');
// });




//landing page
Route::get('/', [EUController::class, 'index'])->name('landingpageEU.index');

//history transaksi
Route::get('/history-transaction', function () {
    return view('EU.history.index');
});


//portfolio
Route::resource('portfolio', PortofolioController::class);
Route::get('/portfolio/{type}/show', [PortofolioController::class, 'showtype'])->name('portfolio.showtype');

//store
Route::resource('store', ProdukController::class);
Route::get('/store/{id}/showid', [ProdukController::class, 'showid'])->name('store.showid');
Route::get('/store/{type}/show', [ProdukController::class, 'showtype'])->name('store.showtype');

//blog
Route::resource('blogs', BlogController::class);
Route::get('blogs/type/{type}', [BlogController::class, 'type'])->name('blogs.type');
Route::get('blogs/weeklytrend', [BlogController::class, 'partials']);
Route::get('/blogs/detail/{blog}', [BlogController::class, 'detail'])->name('blogs.detail');
Route::get('/blogs/{type}/show', [BlogController::class, 'showtype'])->name('blogs.showtype');


//services
Route::resource('services', ServicesController::class);
Route::get('/services/detail/{services}', [ServicesController::class, 'show'])->name('services.show');

//paket
Route::resource('paket', PaketController::class);
Route::get('/paket/{paket}/hapus', [PaketController::class, 'hapus'])->name('paket.hapus');

//profile
Route::get('/profile', function () {
    return view('EU.user.index');
});

Route::get('/cara', function () {
    return view('EU.transaction.cara');
});

Route::get('/cara-wallet', function () {
    return view('EU.transaction.cara-wallet');
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

    //forgot
    Route::get('/forgot-password', [PasswordController::class, 'forgotIndex'])->name('password.index');
    Route::post('/forgot-password', [PasswordController::class, 'forgotPassword'])->name('password.forgot');
    Route::get('/reset-password', [PasswordController::class, 'resetIndex'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');

    Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle']);
    Route::get('callback/google', [SocialiteController::class, 'handleCallback']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('/filter', [UserController::class, 'filterUsers'])->name('user.filter');
    Route::get('user/{id}/hapus', [UserController::class, 'hapus'])->name('user.hapus');

    //notif
    Route::post('/read', [NotificationController::class, 'read'])->name('read');
    Route::get('/read_chat/{notifId}', [NotificationController::class, 'read_chat'])->name('read.chat');

    // transaction
    Route::resource('/transaksi', TransaksiController::class);
    Route::post('/transaksi_kredit', [TransaksiController::class, 'kredit'])->name('transaksi.kredit');

    Route::resource('transaksidetail', transaksidetailController::class);
    // Route::get('/history', [TransaksiController::class, 'history'])->name('transaksi.history');
    // Route::get('/transaksi_pembayaran/{id}', [TransaksiController::class, 'pembayaran'])->name('transaksi.pembayaran');

    Route::resource('pembayaran', pembayaranController::class);
    Route::get('/list_pembayaran', [pembayaranController::class, 'listpembayaran'])->name('pembayaran.list');
    Route::post('/history-pembayaran', [pembayaranController::class, 'PDF'])->name('pembayaran.pdf');
    Route::get('/transaksi_pembayaran/{id}', [pembayaranController::class, 'pembayaran'])->name('pembayaran.pembayaran');
    Route::get('/cara/{id}', [pembayaranController::class, 'cara'])->name('pembayaran.cara');
    Route::get('/transaksi/{id}/detail_kredit', [pembayaranController::class, 'detail_kredit'])->name('pembayaran.detail_kredit');

    // route::get('/lunas', function () {
    //     return view('EU.transaction.lunas');
    // });
    // route::get('/kredit', function () {
    //     return view('EU.transaction.kredit');
    // });
    // route::get('/belumbayar', function () {
    //     return view('EU.transaction.bb');
    // });

    Route::resource('requestuser', requestuserController::class);
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
    // Route::get('/pembayaran', function () {
    //     return view('EU.transaction.pembayaran');
    // });

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
    Route::resource('jenislayanan', JenisLayananController::class);
    Route::GET('jenislayanan/{id}/hapus', [JenisLayananController::class, 'hapus'])->name('jenislayanan.hapus');
    Route::GET('services/{id}/hapus', [ServicesController::class, 'hapus'])->name('services.hapus');
    Route::get('id_services', [ServicesController::class, 'id_services']);
    Route::get('/service-ilustrasi', [ServicesController::class, 'ilustrasi'])->name('services.ilustrasi');
    Route::get('/service-ilustrasi/{id}/edit', [ServicesController::class, 'ilustrasi_edit'])->name('services.ilustrasi_edit');
    Route::put('/service-ilustrasi/{id}/update', [ServicesController::class, 'ilustrasi_update'])->name('services.ilustrasi_update');

    //blog
    Route::get('blogs/{id}/hapus', [BlogController::class, 'hapus'])->name('blogs.hapus');
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
});
