<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Produk;
use App\Models\Services;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\TransaksiDetail;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //untuk EU
        $layanan = JenisLayanan::with('services.produk')->get();
        $cek = produk::doesnthave('cart')->pluck('id')->toarray();
        $cart = produk::has('cart')->get('id');
        $c = produk::wherein('id', $cart)->get('id');

        //untuk halaman admin
        $product = Produk::paginate(5);
        $services = Services::all();

        $produkpopuler = TransaksiDetail::select('produk_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('produk_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->pluck('produk_id');

        $populer = produk::whereIn('id', $produkpopuler)->with(['services','services.jenis_layanan'])->get();

        // return $populer;


        $compact = ['layanan', 'c', 'populer'];

        if (auth()->check()) {
            $u = auth()->user()->role->role;
            $admin = ['admin', 'owner'];
            if (in_array($u, $admin)) {
                return view('Admin.store.index', compact('product', 'services'));
            } else {
                $user = auth()->user()->id;
                $member = member::where('user_id', $user)->get();
                $compact = array_merge($compact, ['user', 'member']);
                return view('EU.store.index', compact($compact));
            }
        } else {
            return view('EU.store.index', compact($compact));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_services = Services::all();

        return view('Admin.store.tambah', compact('jenis_services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //ambil info file
        $file = $request->file('foto');
        //rename
        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = './produk/';
        $file->move($tujuan_upload, $nama_file);

        //insert data
        $produk = Produk::create([
            'foto' => $nama_file,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'services_id' => $request->services_id,
        ]);

        notify()->success('Berhasil Ditambahkan !!', $request->nama_produk,);
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = $request->nama_produk . " Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('store.showid', ['id' => $produk->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/store');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        // code...
    }

    public function showid($id)
    {
        $product = Produk::find($id);

        return view('Admin.store.detail', compact('product'));
    }

    public function showtype($type)
    {


        $layanan = JenisLayanan::all();
        $jenis_layanan =  JenisLayanan::where('layanan', $type)->first();

        $jl = JenisLayanan::where('layanan', $type)->first();
        $services = $jl->services;

        foreach ($services as $s) {
            foreach ($s->produk as $serv) {
                $pr[$serv->id] = $serv->id;
                $z[$serv->id] = $serv;
            }
        }
        $cek = produk::doesnthave('cart')->pluck('id')->toarray();
        $cart = produk::has('cart')->get('id');

        $irisan_produk = array_intersect_key($pr, array_flip($cek));
        $produk = produk::wherein('id', $pr)->get();
        $p = produk::wherein('id', $pr)->get('id');
        $c = produk::wherein('id', $cart)->get('id');

        $compact = ['layanan', 'produk', 'jenis_layanan', 'c'];
        if (auth()->check()) {
            $user = auth()->user()->id;
            $member = member::where('user_id', $user)->get();
            $compact = array_merge($compact, ['user', 'member']);
        }

        return view('EU.store.show', compact($compact));
        // else {
        // }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Produk::find($id);
        $services = Services::all();

        return view('Admin.store.edit', compact('product', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if ($request->hasFile('foto')) {
            //hapus foto lama
            File::delete('./produk/' . $produk->foto);

            //ambil info file
            $file = $request->file('foto');

            //rename
            $nama_file = time() . "_" . $file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './produk/';
            $file->move($tujuan_upload, $nama_file);
            $produk->foto = $nama_file;
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->services_id = $request->services_id;
        $produk->save();

        notify()->success($request->nama_produk . ' Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = $request->nama_produk . " Berhasil Diupdate !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('store.showid', ['id' => $produk->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/store');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }

    public function hapus($id)
    {
        $product = Produk::find($id);
        File::delete('./produk/' . $product->foto);
        $product->delete();

        notify()->success('Produk berhasil dihapus');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Produk Berhasil dihapus";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('store.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/store');
    }
}
