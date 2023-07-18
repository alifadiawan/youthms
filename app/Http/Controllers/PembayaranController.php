<?php

namespace App\Http\Controllers;

use App\Models\gateaway;
use App\Models\Pembayaran;
use App\Models\Member;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use App\Models\bank;
use App\Models\ewallet;
use App\Models\request_user;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use App\Notifications\TransaksiNotification;
use Illuminate\Support\Facades\Notification;
use Dompdf\Dompdf;

class PembayaranController extends Controller
{
    public function PDF(Request $Request)
    {
        // return $Request;
        $pembayaran = Pembayaran::find($Request->id);
        $auth = auth()->user();
        $cek_user = $auth->role->role;

        $data = [
            'pembayaran' => $pembayaran,
            'title' => 'print pdf',
        ];

        $pdf = new Dompdf();
        $pdf->loadHTML(view('EU.transaction.detaildownload', ['pembayaran' => $pembayaran]));
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        $pdf->stream();
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $auth = auth()->user();
        $cek_user = $auth->role->role;
        $pembayaran = [];
        if ($cek_user == 'admin') {
            $pembayaran = Pembayaran::all();
            $compact = ['pembayaran'];
            return view('Admin.transaction.bukti', compact($compact));
        } elseif ($cek_user == 'client') {
            // cek id member yang cocok dengan user_id
            $cek_member = $auth->member;

            // cek transaksi yang sama di kolom member id
            $cek_transaksi = Transaksi::where('member_id', $cek_member->id)->get();
            foreach ($cek_transaksi as $ck) {
                $cek_pembayaran = Pembayaran::where('transaksi_id', $ck->id)->get();

                if ($cek_pembayaran->isNotEmpty()) {
                    $pembayaran[] = $cek_pembayaran;
                }
            }
            $compact = ['cek_transaksi', 'pembayaran'];
            return view('EU.transaction.listpembayaran', compact($compact));
        }
    }

    public function pembayaran($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today  = today();
        $t = date('d-m-Y', strtotime($today));
        // return $t;

        // mencari data user & member
        $user = auth()->user()->id;
        $member = Member::where('user_id', $user)->pluck('id')->first();

        // mencari transaksi id dengan menggunakkan id member
        // $gateaway = gateaway::all();
        $bank = Bank::all();
        $ewallet = ewallet::all();


        $tid = $id;
        $transaksi = Transaksi::where('id', $tid)->get();

        // mencari detail transaksi id dengan $trxid
        $detail = TransaksiDetail::where('transaksi_id', $tid)->get();

        // menghitung total produk serta jumlah total
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }

        // mencari biaya admin serta harga setelah admin
        $admin = $total * 0.11;
        $grandtotal = $total + $admin;

        $cek_kredit = Request_user::where('transaksi_id', $tid)->first();

        $compact = ['detail', 'total', 'grandtotal', 'admin', 'tid', 'transaksi', 'bank', 'ewallet', 'cek_kredit'];
        return view('EU.transaction.pembayaran', compact($compact));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function cara(request $request, $nama)
    {
        // return $id;
        // return $nama;
        $tid = $request->transaksi_id;
        $transaksi = Transaksi::where('id', $tid)->get();
        $bank = Bank::where('nama', $nama)->get();
        $ewallet = Ewallet::where('nama', $nama)->get();

        $compact = ['bank', 'ewallet', 'transaksi', 'nama'];
        return view('EU.transaction.cara', compact($compact));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $file = $request->file('bukti');
        // sleep(3);
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = './bukti_transfer/';
        $file->move($tujuan_upload, $nama_file);

        $tid = $request->transaksi_id;
        $transaksi = Transaksi::find($tid);
        $bank = Bank::where('nama', $request->bank)->first();
        $wallet = Ewallet::where('nama', $request->wallet)->first();

        $request_user = request_user::where('transaksi_id', $tid)->first();

        $pembayaran_data = [
            'transaksi_id' => $tid,
            'status' => "checking",
            'bukti_tf' => $nama_file,
            'total_bayar' => 0,

        ];
        if ($request_user) {
            $pembayaran_data['unique_code'] = $transaksi->unique_code;
            $pembayaran_data['request_user_id'] = $request_user->id;

            $cek_p = Pembayaran::where('transaksi_id', $tid)->where('request_user_id', $request_user->id)->first();
            if ($cek_p) {
                $pembayaran_data['pembayaran_ke'] =  $cek_p->pembayaran_ke + 1;
            } else {
                $transaksi->update(['unique_code' => $transaksi->unique_code . 'K']);
                $pembayaran_data['pembayaran_ke'] = 1;
            }
        } else {
            $pembayaran_data['unique_code'] = $transaksi->unique_code . 'L';
        }

        if ($bank) {
            $pembayaran_data['bank_id'] = $bank->id;
        } elseif ($wallet) {
            $pembayaran_data['ewallet_id'] = $wallet->id;
        }

        $pembayaran = Pembayaran::all();
        // if ($pembayaran->contains('transaksi_id', $tid) && $pembayaran->request_user_id->isempty()) {
        //     $duplicate = $pembayaran->where('transaksi_id', $tid);
        //     $old = $duplicate->sortByDesc('created_at')->pop();
        //     $old->delete();
        // }

        // if ($request) {
        // }


        Pembayaran::create($pembayaran_data);

        notify()->success('Pembayaran Anda Akan Kami Proses !');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Pembayaran Baru Telah Masuk !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('transaksi.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        // return view('EU.history.index', $tid);
        return redirect()->route('transaksi.show', $tid);
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     */

    public function show(Pembayaran $pembayaran, Request $Request)
    {
        $auth = auth()->user();
        $cek_user = $auth->role->role;
        $tid = $pembayaran->transaksi_id;

        $cek_kredit = $pembayaran->with('request_user')->get();
        $compact = ['pembayaran', 'cek_kredit'];
        if ($cek_user == 'client') {
            // return view('EU.transaction.detaildownload', compact($compact));
            return view('EU.transaction.detailpembayaran', compact($compact));
        } elseif ($cek_user == 'admin') {


            return view('Admin.transaction.detailbukti', compact($compact));
        }
    }

    // public function detail_kredit(Transaksi $id)
    // {
    //     // return $id;
    //     // $requser = request_user::where('transaksi_id', $tid)->with('pembayaran')->first();
    //     return view('Admin.transaction.detail_kredit', compact('requser'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {


        $request_user = Request_user::where('transaksi_id', $pembayaran->transaksi_id)->first();
        $transaksi = Transaksi::find($pembayaran->transaksi_id);
        $total_bayar = $request->total_bayar;
        $total_lunas = $transaksi->total;
        if ($total_bayar) {
            $p['request_user_id'] = $request_user->id;
            $transaksi->update([
                'total_bayar' => $transaksi->total_bayar + $total_bayar
            ]);
        } else {
            $transaksi->update(['total_bayar' => $total_lunas]);
        }
        $status = $request->status;

        $p = [
            'status' => $status,
            'note_admin' => $request->note,
            'total_bayar' => $request->total_bayar
        ];
        $pembayaran->update($p);
        $tid = $pembayaran->transaksi_id;
        $transaksi = Transaksi::where('id', $tid)->first();

        // mengirim notifikasi
        $user = $pembayaran->transaksi->member->user;
        if ($pembayaran->status == 'checked') {
            $message = "Pembayaranmu Telah Masuk\nSilahkan Hubungi Admin\nUntuk Info Lebih Lanjut";
        } else {
            $message = "Pembayaranmu Telah Ditolak, Maaf :(";
        }
        $notification = new TransaksiNotification($message);
        $notification->setUrl(route('transaksi.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect()->route('pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
