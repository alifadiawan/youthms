<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Transaksi;
use App\Models\request_user;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiDetailController extends Controller
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
        $trx = Transaksi::paginate(5);
        // nyoba termin sedang berlangsung & termin yang di decline

        $kredit = [];
        $pending = [];
        $utang = [];
        $lunas = [];
        $declined = [];

        // pengkondisian jika role user = client, akan terlempar ke history index
        $requestUser = request_user::all();
        if ($user_role == 'client') {

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
                } elseif ($t->total_bayar >= $t->total && $req && $req->status == "accept") {
                    $lunas[] = $t;
                } elseif ($t->total_bayar >= $t->total && !$req) {
                    $lunas[] = $t;
                }
            }

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
                } elseif ($t->total_bayar >= $t->total && !$req) {
                    $lunas[] = $t;
                } elseif ($t->total_bayar >= $t->total && $req && $req->status == "accept") {
                    $lunas[] = $t;
                }
            }
            $ul = collect($lunas)->pluck('id')->toArray();
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
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransaksiDetail $transaksiDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TransaksiDetail $transaksiDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransaksiDetail $transaksiDetail)
    {
        //
    }
}
