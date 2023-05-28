<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Services;
use App\Models\TransaksiDetail;
use App\Models\Member;
//untuk notif
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\visitor;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
    }

    public function history()
    {
        // mencari data user & member
        $auth = auth()->user();
        $user_role = $auth->role->role;
        $user = $auth->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari status transaksi
        // $transaksi = Transaksi::all();
        $transaksi = Transaksi::paginate(5);
        $Q_utang = transaksi::where('total_bayar', 0);
        $Q_kredit = transaksi::whereColumn('total', '>', 'total_bayar')->where('total_bayar', '>', '0');
        $Q_lunas = transaksi::where(function ($lunas) {
            $lunas->whereColumn('total', '<', 'total_bayar')->orWhereColumn('total_bayar', 'total');
        });
        $uu = $Q_utang->get()->pluck('id')->toarray();
        $uk = $Q_kredit->get()->pluck('id')->toarray();
        $ul = $Q_lunas->get()->pluck('id')->toarray();
        // return $ul;

        // jenis role
        $staff_super = ['admin', 'owner'];
        $staff = ['programmer', 'ui/ux', 'sekretariat', 'reborn'];
        $stts = ['uu', 'uk', 'ul'];
        $compact = ['staff_super', 'staff', $stts, 'transaksi'];

        // pengkondisian jika role user = client, akan terlempar ke history index
        if ($user_role == 'client') {
            $all = transaksi::where('member_id', $member)->get();
            $utang = $Q_utang->where('member_id', $member)->get();
            $kredit = $Q_kredit->where('member_id', $member)->get();
            $lunas = $Q_lunas->where('member_id', $member)->get();

            $uu = $Q_utang->get()->pluck('id')->toarray();
            $uk = $Q_kredit->get()->pluck('id')->toarray();
            $ul = $Q_lunas->get()->pluck('id')->toarray();

            $status = ['utang', 'kredit', 'lunas', 'all'];
            $stts = ['uu', 'uk', 'ul'];
            $compact = array_merge($compact, $status, $stts);
            return view('EU.history.index', compact($compact));
        }
        return view('Admin.transaction.index', compact($compact));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // return 'create coyh';
        // timezone di asia/jakarta
        date_default_timezone_set('Asia/Jakarta');

        // $today = today();
        // $today = date("Y-m-d H:i:s");


        // mencari data user & member
        $user = auth()->user()->id;54/
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari harga total & admin
        $harga = $request->total;
        $admin = $harga * 0.11;
        $grandtotal = $harga + $admin;

        // membuat sebuah struk transaksi
        $trx = transaksi::create([
            // 'tanggal' => $today,
            'member_id' => $request->member_id,
            'total_bayar' => 0,
            'total' => $grandtotal,
        ]);


        // mencari id transaksi yang telah dibuat
        $trxid = $trx->id;
        $transaksi = transaksi::where('id', $trxid)->first();

        //mencari sebuah keranjang di user
        $cart = cart::where('member_id', $member)->get();

        // looping semua produk yang telah dibeli lalu dimasukkan ke tabel transaksi detail
        foreach ($cart as $c) {
            $trxdetail[] = [
                'transaksi_id' => $trxid,
                'produk_id' => $c->produk_id,
                'quantity' => $c->quantity,
                'subtotal' => $c->quantity * $c->produk->harga,
            ];
        }
        TransaksiDetail::insert($trxdetail);

        // setelah produk / looping habis maka suatu keranjang di bersihkan 
        cart::where('member_id', $member)->delete();

        // mencari produk di transaksi detail, serta menghitung harganya
        $total = 0;
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }

        // compact suatu variabel
        $compact = ['detail', 'total', 'transaksi'];

        // melempar ke fungsi pembayaran
        return redirect()->route('transaksi.pembayaran')->with($compact);
    }


    public function pembayaran()
    {
        // return 'mamah pengen tidur :(';

        // mencari data user & member
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari transaksi id dengan menggunakkan id member
        $trxid = transaksi::where('member_id', $member)->latest()->value('id');

        // mencari detail transaksi id dengan $trxid
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();

        // menghitung total produk serta jumlah total
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }

        // mencari biaya admin serta harga setelah admin
        $admin = $total * 0.11;
        $grandtotal = $total + $admin;


        $compact = ['detail', 'total', 'grandtotal', 'admin'];
        return view('EU.transaction.pembayaran', compact($compact));
    }

    public function bayar()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {

        $user = auth()->user()->id;
        $user_role = auth()->user()->role->role;
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari status transaksi
        $utang = transaksi::where('total_bayar', 0);
        $kredit = transaksi::whereColumn('total', '>', 'total_bayar')->where('total_bayar', '>', '0');
        $lunas = transaksi::where(function ($lunas) {
            $lunas->whereColumn('total', '<', 'total_bayar')->orWhereColumn('total_bayar', 'total');
        });

        $c_utang = $utang->where('member_id', $member)->get();
        $c_kredit = $kredit->where('member_id', $member)->get();
        $c_lunas = $lunas->where('member_id', $member)->get();

        $tid = [];
        $tid = $transaksi->id;
        $trxid = $tid;
        $trx = transaksi::where('id', $transaksi->id)->get();

        // mencari detail transaksi id dengan $trxid
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();
        // menghitung total produk serta jumlah total
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }

        // mencari biaya admin serta harga setelah admin
        $admin = $total * 0.11;
        $grandtotal = $total + $admin;


        // return $EU_lunas;

        $status = ['EU_utang', 'EU_kredit', 'EU_lunas'];
        $compact = ['detail', 'total', 'grandtotal', 'admin', $status, 'trx'];


        // bayar 
        if ($user_role == 'client') {
            $EU_utang = $utang->where('member_id', $member)->pluck('id')->toArray();
            $EU_kredit = $kredit->where('member_id', $member)->pluck('id')->toArray();
            $EU_lunas = $lunas->where('member_id', $member)->pluck('id')->toArray();

            // return $EU_lunas;
            $status_EU = ['EU_utang', 'EU_kredit', 'EU_lunas'];
            return view('EU.transaction.bb', compact($compact, $status_EU));
            //     return view('EU.transaction.cash', compact($compact));
        }

        $adm_utang = transaksi::where('total_bayar', 0)->pluck('id')->toArray();
        $adm_kredit = transaksi::whereColumn('total', '>', 'total_bayar')->where('total_bayar', '>', '0')->pluck('id')->toArray();
        $adm_lunas = transaksi::where(function ($lunas) {
            $lunas->whereColumn('total', '<', 'total_bayar')->orWhereColumn('total_bayar', 'total');
        })->pluck('id')->toArray();
        // return $adm_kredit;

        $status = ['adm_utang', 'adm_kredit', 'adm_lunas'];
        $compact = ['detail', 'total', 'grandtotal', 'admin', $status];

        return view('Admin.transaction.detail', compact($compact));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
    }
}
