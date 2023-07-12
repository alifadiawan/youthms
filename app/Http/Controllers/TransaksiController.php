<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Services;
use App\Models\TransaksiDetail;
use App\Models\Pembayaran;
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
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mencari data user & member
        $auth = auth()->user();
        $user_role = $auth->role->role;
        $user = $auth->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari role
        $user_role = $auth->role->role;

        // mencari status transaksi
        $trx = Transaksi::latest()->paginate(13);
        // nyoba termin sedang berlangsung & termin yang di decline

        $kredit = [];
        $pending = [];
        $utang = [];
        $lunas = [];
        $declined = [];
        $checking = [];
        $denied = [];

        $kredit = [];
        $pending = [];
        $utang = [];
        $lunas = [];
        $declined = [];
        $checking = [];


        // pengkondisian jika role user = client, akan terlempar ke history index
        $requestUser = request_user::all();
        $pembayaran = pembayaran::all();

        if ($user_role == 'client') {
            $all = Transaksi::where('member_id', $member)->latest()->get();

            foreach ($all as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                $pemb = $pembayaran->where('transaksi_id', $t->id)->first();
                // $pemb = $pembayaran->where('transaksi_id', $t->id)->first();
                // return 'oke';
                if ($t->total_bayar == 0  && $pemb && $pemb->status == "checking") {
                    $checking[] = $t;
                } elseif ($t->total_bayar == 0  && $pemb && $pemb->status == "declined") {
                    $utang[] = $t;
                } elseif ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "pending") {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                } elseif ($t->total_bayar >= $t->total && $req && $req->status == "accept") {
                    $lunas[] = $t;
                } elseif ($t->total_bayar >= $t->total && $pemb && $pemb->status == "checked") {
                    $lunas[] = $t;
                }
            }

            // denied
            $ux = collect($denied)->pluck('id')->toArray();

            // checking
            $uc = collect($checking)->pluck('id')->toArray();

            // belum bayar
            $uu = collect($utang)->pluck('id')->toarray();

            // kredit ongoing
            $uk = collect($kredit)->pluck('id')->toarray();

            // kredit pending
            $up = collect($pending)->pluck('id')->toarray();

            // kredit decline
            $ud = collect($declined)->pluck('id')->toarray();
            // $ud = $declined;

            foreach ($all as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                $pemb = $pembayaran->where('transaksi_id', $t->id)->first();
                if ($t->total_bayar == 0  && $pemb && $pemb->status == "checking") {
                    $checking[] = $t;
                } elseif ($t->total_bayar == 0  && $pemb && $pemb->status == "declined") {
                    $utang[] = $t;
                } elseif ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "pending") {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                } elseif ($t->total_bayar >= $t->total && $req && $req->status == "accept") {
                    $lunas[] = $t;
                } elseif ($t->total_bayar >= $t->total && $pemb && $pemb->status == "checked") {
                    $lunas[] = $t;
                }
            }

            // checking
            $uc = collect($checking)->pluck('id')->toArray();

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
            $ul = collect($lunas)->pluck('id')->toarray();

            $status = ['utang', 'kredit', 'lunas', 'pending', 'declined', 'all'];
            $stts = ['uu', 'uk', 'ul', 'up', 'ud', 'uc'];
            $compact = [$status, $stts];
            return view('EU.history.index', compact($compact));
        } else {

            $trnsk = transaksi::all();
            foreach ($trnsk as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                $pemb = $pembayaran->where('transaksi_id', $t->id)->first();
                // return 'oke';
                if ($t->total_bayar == 0  && $pemb && $pemb->status == "checking") {
                    $checking[] = $t;
                } elseif ($t->total_bayar == 0  && $pemb && $pemb->status == "declined") {
                    $utang[] = $t;
                } elseif ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "pending") {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                } elseif ($t->total_bayar >= $t->total && !$req) {
                    $lunas[] = $t;
                } elseif ($t->total_bayar >= $t->total && $req && $req->status == "accept") {
                    $lunas[] = $t;
                }
            }
            $uc = collect($checking)->pluck('id')->toArray();
            $ul = collect($lunas)->pluck('id')->toArray();
            $uu = collect($utang)->pluck('id')->toArray();
            $uk = collect($kredit)->pluck('id')->toArray();
            $up = collect($pending)->pluck('id')->toArray();
            $ud = collect($declined)->pluck('id')->toArray();
            // $compact = array_merge($compact, [$uu, $ul, $uk, $up, $ud]);
            $staff_super = ['admin', 'owner'];
            $staff = ['programmer', 'ui/ux', 'sekretariat', 'reborn'];
            $compact = ['staff_super', 'staff', 'trx', 'uu', 'ul', 'uk', 'up', 'ud', 'uc'];

            return view('Admin.transaction.index', compact($compact));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $today = today();
        $today = date("Y-m-d H:i:s");


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
            'tanggal_transaksi' => $today,
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
        return redirect()->route('pembayaran.pembayaran', $trxid)->with($compact);
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
        $user_role = $auth->role->role;
        $member = member::where('user_id', $user)->pluck('id')->first();


        $tid = [];
        $tid = $transaksi->id;
        $trxid = $tid;
        $trx = transaksi::where('id', $transaksi->id)->get();
        $pembayaran = pembayaran::where('transaksi_id', $tid)->get();

        // mencari request user, jika melakukan kredit
        $requser = null;
        $requser = request_user::where('transaksi_id', $trxid)->with('pembayaran')->get();



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


        $compact = ['detail', 'total', 'grandtotal', 'admin', 'trx', 'requser', 'pembayaran'];

        $selisih = 0;
        $total_bayar_user = 0;
        if (!$requser->isEmpty()) {
            foreach ($requser as $r) {
                // mencari  tanggal mulai & tanggal selesai
                $tglmulai = carbon::parse($r->tanggal_mulai);
                $tglselesai = carbon::parse($r->jatuh_tempo);
                foreach ($r->pembayaran as $p) {
                    $cek[] = $total_bayar_user += $p->total_bayar;
                }
            }
            // mencari total harga di transaksi 
            $total_harga = Transaksi::find($trxid);

            // mencari selisih tanggal  
            $selisih = $tglmulai->diffInDays($tglselesai);
            $total_kekurangan =  $total_harga->total - $total_bayar_user;
            $transaksi_kredit = ['total_kekurangan', 'total_bayar_user'];
            array_push($compact, $transaksi_kredit);
        }

        $role = auth()->user()->role->role;
        $requestUser = request_user::all();


        $kredit = [];
        $pending = [];
        $utang = [];
        $lunas = [];
        $declined = [];
        $checking = [];
        $denied = [];

        $pembayaran_loop = pembayaran::all();

        // bayar 
        if ($user_role == 'client') {

            $all = transaksi::where('member_id', $member)->get();

            foreach ($all as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                $pemb = $pembayaran_loop->where('transaksi_id', $t->id)->first();

                // return 'oke';
                if ($t->total_bayar == 0  && $pemb && $pemb->status == "checking") {
                    $checking[] = $t;
                } elseif ($t->total_bayar == 0  && $pemb && $pemb->status == "declined") {
                    $utang[] = $t;
                } elseif ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "pending") {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                } elseif ($t->total_bayar >= $t->total && !$req) {
                    $lunas[] = $t;
                } elseif ($t->total_bayar >= $t->total && $req && $req->status == "accept") {
                    $lunas[] = $t;
                }
            }

            $EU_checking = collect($checking)->pluck('id')->toArray();
            $EU_denied = collect($denied)->pluck('id')->toArray();
            $EU_lunas = collect($lunas)->pluck('id')->toArray();
            $EU_utang = collect($utang)->pluck('id')->toArray();
            $EU_kredit = collect($kredit)->pluck('id')->toArray();
            $EU_pending = collect($pending)->pluck('id')->toArray();
            $EU_declined = collect($declined)->pluck('id')->toArray();

            $status_EU = ['EU_utang', 'EU_kredit', 'EU_lunas', 'EU_declined', 'EU_denied', 'EU_pending', 'EU_checking', 'selisih'];
            return view('EU.transaction.detail', compact($compact, $status_EU));
        } else {
            $all = transaksi::all();

            foreach ($all as $t) {
                $req = $requestUser->where('transaksi_id', $t->id)->first();
                $pemb = $pembayaran_loop->where('transaksi_id', $t->id)->first();

                // return 'oke';
                if ($t->total_bayar == 0  && $pemb && $pemb->status == "checking") {
                    $checking[] = $t;
                } elseif ($t->total_bayar == 0  && $pemb && $pemb->status == "declined") {
                    $utang[] = $t;
                } elseif ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $kredit[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "pending") {
                    $pending[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                    $declined[] = $t;
                } elseif ($t->total_bayar == 0 && !$req) {
                    $utang[] = $t;
                } elseif ($t->total_bayar >= $t->total && !$req) {
                    $lunas[] = $t;
                } elseif ($t->total_bayar >= $t->total && $req && $req->status == "accept") {
                    $lunas[] = $t;
                }
                $adm_lunas = collect($lunas)->pluck('id')->toArray();
            }
            $adm_checking = collect($checking)->pluck('id')->toArray();
            $adm_denied = collect($denied)->pluck('id')->toArray();
            $adm_utang = collect($utang)->pluck('id')->toArray();
            $adm_kredit = collect($kredit)->pluck('id')->toArray();
            $adm_pending = collect($pending)->pluck('id')->toArray();
            $adm_declined = collect($declined)->pluck('id')->toArray();


            $status_EU = ['EU_utang', 'EU_kredit', 'EU_lunas', 'EU_declined', 'EU_denied', 'EU_pending', 'EU_checking', 'selisih'];
            return view('EU.transaction.detail', compact($compact, $status_EU));
        }
    }

    public function kredit(request $r)
    {

        $validator = validator::make($r->all(), [
            'nama_pemesan' => 'required',
            'tanggal_mulai' => 'required',
            'jatuh_tempo' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'mohon diisi semua kolom');
        }
        // tambahen alert / notif agar semua kolom harus diisi  

        // return $r;
        $transaksi = Transaksi::find($r->transaksi_id);
        $request_user = request_user::create([
            'nama_pemesan' => $r->nama_pemesan,
            'tanggal_mulai' => $r->tanggal_mulai,
            'jatuh_tempo' => $r->jatuh_tempo,
            'deskripsi' => $r->deskripsi,
            'status' => $r->status,
            'transaksi_id' => $r->transaksi_id
        ]);


        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Ajuan Kredit Baru !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('requestuser.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        return redirect()->route('requestuser.index', ['trxid' => $r->transaksi_id]);
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

    // type bank
    public function bank()
    {
        # code...
    }
}
