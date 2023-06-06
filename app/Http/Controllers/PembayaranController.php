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
use Illuminate\Support\Facades\File;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
    }

    public function pembayaran($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today  = today();
        $t = date('d-m-Y', strtotime($today));
        // return $t;

        // mencari data user & member
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        // mencari transaksi id dengan menggunakkan id member
        // $gateaway = gateaway::all();
        $bank = bank::all();
        $ewallet = ewallet::all();


        $tid = $id;
        $transaksi = transaksi::where('id', $tid)->get();

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

        $compact = ['detail', 'total', 'grandtotal', 'admin', 'tid', 't', 'transaksi', 'bank', 'ewallet'];
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
        $bank = bank::where('nama', $nama)->get();
        $ewallet = ewallet::where('nama', $nama)->get();

        $compact = ['bank', 'ewallet', 'transaksi'];
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
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = './bukti_transfer/';
        $file->move($tujuan_upload, $nama_file);

        $tid = $request->transaksi_id;
        $transaksi = Transaksi::where('id', $tid)->get();
        $bank = bank::where('nama', $request->bank)->first();
        $wallet = ewallet::where('nama', $request->wallet)->first();
        // return $gateaway;

        $pembayaran_data = [
            'transaksi_id' => $tid,
            'status' => "checking",
            'bukti_tf' => $nama_file,
        ];

        if ($bank) {
            $pembayaran_data['bank_id'] = $bank->id;
        } elseif ($wallet) {
            $pembayaran_data['ewallet_id'] = $wallet->id;
        }


        pembayaran::create($pembayaran_data);

        notify()->success('Pembayaran Anda Akan Kami Proses !');
        // return view('EU.history.index', $tid);
        return redirect()->route('transaksi.show', $tid);
        // return redirect()->back();
    }

    public function listpembayaran()
    {
        $pembayaran = pembayaran::all();
        $compact = ['pembayaran'];
        return view('Admin.transaction.bukti', compact($compact));
    }


    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        // $pembayaran = pembayaran::where()->get();
        $tid = $pembayaran->transaksi_id;
        // return $pembayaran; 
        $pembayaran = $pembayaran->where('transaksi_id', $tid)->get();
        $transaksi = transaksi::where('id', $tid)->get();
        $detail = transaksidetail::where('transaksi_id', $tid)->get();
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }
        // mencari biaya admin serta harga setelah admin
        $admin = $total * 0.11;
        $grandtotal = $total + $admin;
        // return $admin;

        $compact = ['pembayaran', 'transaksi', 'detail', 'total', 'admin', 'grandtotal'];
        return view('Admin.transaction.detailbukti', compact($compact));
    }

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
        $p = $pembayaran->update([
            'status' => $request->status
        ]);

        $tid = $pembayaran->transaksi_id;
        $transaksi = transaksi::where('id', $tid)->first();
        $total = $transaksi->total;
        $transaksi->update([
            'total_bayar' => $total
        ]);

        return redirect()->route('pembayaran.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
