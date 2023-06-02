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
use App\Models\Cart;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //untuk EU
        $layanan = JenisLayanan::with('services.produk')->get();

        // mencari services
        $services = Services::all();

        // produk populer di limit maximal 5
        $product = Produk::paginate(5);

        // mencari produk yang palign banyak diminati di tabel transaksi detail
        $produkpopuler = TransaksiDetail::select('produk_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('produk_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->pluck('produk_id');

        // mencari id produk yang banyak di minati di tabel produk 
        $populer = produk::whereIn('id', $produkpopuler)->with(['services', 'services.jenis_layanan'])->get();

        // inisialisasi $layanan & $populer
        $compact = ['layanan', 'populer'];

        // pengkondisian jika admin maka masuk view admin, jika selain admin / owner maka dilempar ke view EU store
        if (auth()->check()) {
            $role = auth()->user()->role->role;
            $uid = auth()->user()->id;

            $m = member::where('user_id', $uid);
            $mid = $m->pluck('id')->first();
            $member = $m->get();

            $cart = cart::where('member_id', $mid)->get();
            $admin = ['admin', 'owner'];

            if (in_array($role, $admin)) {
                return view('Admin.store.index', compact('product', 'services'));
            } else {
                $compact = array_merge($compact, ['uid', 'member', 'cart']);
                // $produk = cart::where('produk_id',$productId)->get();
                return view('EU.store.index', compact($compact));
            }
        } else {
            return view('EU.store.index', compact($compact));
        }
    }

    public function getQuantity($productId)
    {
        $quantity = Cart::where('produk_id', $productId)->value('quantity');
        return response()->json(['quantity' => $quantity]);
    }

    public function updateQuantity(Request $request, $productId)
    {

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()], 400);
        }

        $cart = Cart::where('produk_id', $productId)->first();
        if (!$cart) {
            return response()->json(['success' => false, 'message' => 'Cart not found'], 404);
        }

        // $cart->quantity = $request->quantity;
        $cart->quantity = $request->input('quantity');

        $cart->save();

        return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
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
        // mencari id jenis layanan melalui $type
        $layanan = JenisLayanan::all();
        $jenis_layanan =  JenisLayanan::where('layanan', $type)->first();

        // mencari services di suatu jenis layanan
        $services = $jenis_layanan->services;

        // mencari seluruh data produk didalam seluruh data services di suatu jenis layanan
        foreach ($services as $s) {
            foreach ($s->produk as $serv) {
                $pr[$serv->id] = $serv->id;
                $z[$serv->id] = $serv;
            }
        }
        $produk = produk::wherein('id', $pr)->get();

        // inisialiasi compact
        $compact = ['layanan', 'produk', 'jenis_layanan', 'cart'];

        // mengecek apakah user telah login
        if (auth()->check()) {
            // cek user & member
            $user = auth()->user()->id;
            // $member = member::where('user_id', $user)->get();
            $m = member::where('user_id', $user);
            $mid = $m->pluck('id')->first();
            $member = $m->get();
            // mengecek keranjang 
            $cart = cart::where('member_id', $mid)->get();
            $compact = array_merge($compact, ['user', 'member']);
        }

        return view('EU.store.show', compact($compact));
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
