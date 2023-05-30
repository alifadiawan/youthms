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
use App\Models\request_user;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\visitor;
use Illuminate\Support\Facades\Validator;

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
        $user_role = $auth->roles->pluck('role')->toArray();
        $user = $auth->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari role
        $user_role = $auth->roles->pluck('role')->toarray();

        // mencari status transaksi
        $trx = Transaksi::paginate(5);
        $Q_utang = transaksi::where('total_bayar', 0);
        $Q_kredit = transaksi::whereColumn('total', '>', 'total_bayar')->where('total_bayar', '>', '0');
        $Q_lunas = transaksi::where(function ($lunas) {
            $lunas->whereColumn('total', '<', 'total_bayar')->orWhereColumn('total_bayar', 'total');
        });

        // nyoba termin sedang berlangsung & termin yang di decline


        $kredit = [];
        $pending = [];
        $declined = [];
        $utang = [];



        // pengkondisian jika role user = client, akan terlempar ke history index
        $requestUser = request_user::all();
        if (in_array('client', $user_role)) {

            $all = transaksi::where('member_id', $member)->get();

            foreach ($all as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                // return 'oke';
                if ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == null) {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                }
            }
            // $utang = $Q_utang->where('member_id', $member)->get();
            // $kredit = $Q_kredit->where('member_id', $member)->get();

            // $uu = $Q_utang->get()->pluck('id')->toarray();
            // $uk = $Q_kredit->get()->pluck('id')->toarray();

            // belum bayar
            $uu = collect($utang)->pluck('id')->toarray();

            // kredit ongoing
            $uk = collect($kredit)->pluck('id')->toarray();

            // kredit pending
            $up = collect($pending)->pluck('id')->toarray();

            // kredit decline
            $ud = collect($declined)->pluck('id')->toarray();
            // $ud = $declined;

            // lunas
            $lunas = $Q_lunas->where('member_id', $member)->get();
            $ul = $Q_lunas->get()->pluck('id')->toarray();



            $status = ['utang', 'kredit', 'lunas', 'all'];
            $stts = ['uu', 'uk', 'ul', 'up', 'ud'];
            $compact = [$status, $stts];
            return view('EU.history.index', compact($compact));
        } else {

            $trnsk = transaksi::all();
            foreach ($trnsk as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                // return 'oke';
                if ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == null) {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                }
            }
            $ul = $Q_lunas->get()->pluck('id')->toArray();
            $uu = collect($utang)->pluck('id')->toArray();
            $uk = collect($kredit)->pluck('id')->toArray();
            $up = collect($pending)->pluck('id')->toArray();
            $ud = collect($declined)->pluck('id')->toArray();
            // $compact = array_merge($compact, [$uu, $ul, $uk, $up, $ud]);
            $staff_super = ['admin', 'owner'];
            $staff = ['programmer', 'ui/ux', 'sekretariat', 'reborn'];
            $compact = ['staff_super', 'staff', 'trx', 'uu', 'ul', 'uk', 'up', 'ud'];

            return view('Admin.transaction.index', compact($compact));
        }


        // // jenis role
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
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari harga total & admin
        $harga = $request->total;
        $admin = $harga * 0.11;
        $grandtotal = $harga + $admin;

        // kode unik
        $pre = 'YMS';
        $unik = mt_rand(1000000, 9999999);
        $kode = $pre . $unik;

        // membuat sebuah struk transaksi
        $trx = transaksi::create([
            // 'tanggal' => $today,
            'unique_code' => $kode,
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
        return redirect()->route('transaksi.pembayaran', $trxid)->with($compact);
    }


    public function pembayaran($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today = today();
        $t = $today->format('Y-m-d');
        // return $today;

        // mencari data user & member
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari transaksi id dengan menggunakkan id member
        $trxid = transaksi::where('member_id', $member)->latest()->value('id');
        $tid = $id;

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

        $compact = ['detail', 'total', 'grandtotal', 'admin', 'tid', 't'];
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

        $auth = auth()->user();
        $user = $auth->id;
        $user_role = $auth->roles->pluck('role')->toArray();
        $member = member::where('user_id', $user)->pluck('id')->first();

        $lunas = transaksi::where(function ($lunas) {
            $lunas->whereColumn('total', '<', 'total_bayar')->orWhereColumn('total_bayar', 'total');
        });

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

        $role = auth()->user()->roles->pluck('role')->toArray();
        $requestUser = request_user::all();

        // bayar 
        if (in_array('client', $user_role)) {

            $all = transaksi::where('member_id', $member)->get();

            foreach ($all as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                // return 'oke';
                if ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == null) {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                }
            }


            $EU_lunas = $lunas->where('member_id', $member)->pluck('id')->toArray();
            $EU_utang = collect($utang)->pluck('id')->toArray();
            $EU_kredit = collect($kredit)->pluck('id')->toArray();
            $EU_pending = collect($pending)->pluck('id')->toArray();
            $EU_declined = collect($declined)->pluck('id')->toArray();

            // return $EU_lunas;
            $status_EU = ['EU_utang', 'EU_kredit', 'EU_lunas', 'EU_declined', 'EU_pending'];
            return view('EU.transaction.detail', compact($compact, $status_EU));
            //     return view('EU.transaction.cash', compact($compact));
        } else {
            $all = transaksi::all();

            foreach ($all as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                // return 'oke';
                if ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == null) {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                }
            }
            $adm_lunas = transaksi::where(function ($lunas) {
                $lunas->whereColumn('total', '<', 'total_bayar')->orWhereColumn('total_bayar', 'total');
            })->pluck('id')->toArray();
            $adm_utang = collect($utang)->pluck('id')->toArray();
            $adm_kredit = collect($kredit)->pluck('id')->toArray();
            $adm_pending = collect($pending)->pluck('id')->toArray();
            $adm_declined = collect($declined)->pluck('id')->toArray();

            $status = ['adm_utang', 'adm_kredit', 'adm_lunas', 'adm_pending', 'adm_declined'];
            $compact = ['detail', 'total', 'grandtotal', 'admin', $status];

            return view('Admin.transaction.detail', compact($compact));
        }
    }

    public function kredit(request $r)
    {

        $validator = validator::make($r->all(), [
            'nama_pemesan' => 'required',
            'tanggal_mulai' => 'required',
            'jatuh_tempo' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'mohon diisi semua kolom');
        }
        // tambahen alert / notif agar semua kolom harus diisi  

        $trxid = $r->transaksi_id;
        $req_user = request_user::create([
            'nama_pemesan' => $r->nama_pemesan,
            'tanggal_mulai' => $r->tanggal_mulai,
            'jatuh_tempo' => $r->jatuh_tempo,
            'deskripsi' => $r->deskripsi,
            'status' => $r->status,
            'transaksi_id' => $r->transaksi_id
        ]);


        return redirect()->route('requestuser.index', ['trxid' => $trxid]);
    }

    // public function pending()
    // {
    //     $auth = auth()->user();
    //     $user = $auth->id;
    //     $member = member::where('user_id', $user)->get();

    //     $trx = transaksi::where('member_id', $member)->where('transaksi_id', $trxid)->get();
    //     $compact = ['trx'];
    //     return view('EU.transaction.kredit', compact($compact));
    // }

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
