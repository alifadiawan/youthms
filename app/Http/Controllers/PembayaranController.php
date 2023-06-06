<?php

namespace App\Http\Controllers;

use App\Models\gateaway;
use App\Models\Pembayaran;
use App\Models\Member;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
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
        $gateaway = gateaway::all();

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

        $compact = ['detail', 'total', 'grandtotal', 'admin', 'tid', 't', 'transaksi', 'gateaway'];
        return view('EU.transaction.pembayaran', compact($compact));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function cara(request $request, $id)
    {
        // return $id;
        $tid = $request->transaksi_id;
        $transaksi = Transaksi::where('id', $tid)->get();
        $gateaway = gateaway::where('id', $id)->get();
        // return $tid;
        // return $transaksi;

        $compact = ['gateaway', 'transaksi'];
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
        $gateaway = $request->gid;
        // return $gateaway;

        pembayaran::create([
            'transaksi_id' => $tid,
            'status' => $request->status,
            'bukti_tf' => $nama_file,
            'gateaways_id' => $gateaway,
        ]);

        notify()->success('Pembayaran Anda Akan Kami Proses !');
        // return redirect()->back();
        return redirect()->route('transaksi.show', $tid);
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
        $transaksi = transaksi::where('id', $tid)->get();
        $detail = transaksidetail::where('transaksi_id', $tid)->get();
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }
        // mencari biaya admin serta harga setelah admin
        $admin = $total * 0.11;
        $grandtotal = $total + $admin;

        $compact = ['pembayaran', 'transaksi', 'detail','total','admin','grandtotal'];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }
}
