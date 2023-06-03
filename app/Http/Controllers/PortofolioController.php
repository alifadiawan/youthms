<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\PortofolioPic;
use App\Models\Services;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\PortoIlls;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::all();
        $layanan = JenisLayanan::all();
        $porto = Portofolio::paginate(6);
        $pic = PortofolioPic::all();
        if (auth()->check()) {
            $u = auth()->user()->role->role;
            $admin = ['admin', 'owner'];

            if (in_array($u, $admin)){
                return view('Admin.portofolio.index', compact('porto', 'pic', 'services', 'layanan'));
            }
            else{
                return view('EU.portofolio.index', compact('porto', 'pic', 'services', 'layanan'));
            }
        } 
        else {
            return view('EU.portofolio.index', compact('porto', 'pic', 'services', 'layanan'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Services::all();
        return view('Admin.portofolio.create-portofolio', compact('services'));
    }

    public function ilustrasi_index()
    {
        $ills = PortoIlls::all();
        return view('Admin.portofolio.ilustrasi', compact('ills'));
    }

    public function ilustrasi_edit($id)
    {
        $ills = PortoIlls::find($id);
        return view('Admin.portofolio.edit-ilustrasi', compact('ills'));
    }

    public function ilustrasi_update(Request $request ,$id)
    {
        $ills = PortoIlls::find($id);
        if ($request->hasFile('foto')) {
            //hapus foto lama
            File::delete('./illustration/'.$ills->foto);

            //ambil info file
            $file = $request->file('foto');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './illustration/';
            $file->move($tujuan_upload,$nama_file);

            //simpan ke database
            $ills->foto = $nama_file;   
        }
        $ills->text_head = $request->text_head;
        $ills->text_body = $request->text_body;
        $ills->save();

        notify()->success('Ilustrasi Portofolio Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Ilustrasi Portofolio Berhasil Diubah !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('portofolio.ilustrasi')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/portofolio-ilustrasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //ambil info file
        $file = $request->file('cover');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = './portofolio/';
        $file->move($tujuan_upload,$nama_file);

        //insert data
        $porto = Portofolio::create([
            'project' => $request->project,
            'deskripsi' => $request->deskripsi,
            'cover' => $nama_file,
            'services_id' => $request->services_id,
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            foreach ($foto as $f) {
                $tujuan_upload = './portofolio/';
                $f_name = time()."_".$f->getClientOriginalName();
                $f->move($tujuan_upload,$f_name);

                $pic = PortofolioPic::create([
                    'foto' => $f_name,
                    'portofolio_id' => $porto->id,
                ]);
            }
        }

        notify()->success('Portofolio Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Portofolio Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('portfolio.show', ['portfolio' => $porto->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/portfolio/'.$porto->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $porto = Portofolio::find($id);
        $pic = $porto->portofoliopic;
        if (auth()->check()) {
            $u = auth()->user()->role->role;
            $admin = ['admin', 'owner'];

            if (in_array($u, $admin)){
                return view('Admin.portofolio.show', compact('porto', 'pic'));
            }
            else{
                return view('EU.portofolio.show', compact('porto', 'pic'));
            }
        }
        else{
            return view('EU.portofolio.show', compact('porto', 'pic'));
        }

    }

    public function showtype($type)
    {
        // Ambil jenis layanan berdasarkan nama
        $jenis_layanan = JenisLayanan::where('layanan', $type)->first();
        $layanan = JenisLayanan::all();

        // Jika jenis layanan ditemukan
        if ($jenis_layanan) {
            // Ambil portofolio yang memiliki layanan terkait
            $porto = Portofolio::whereHas('services', function ($query) use ($jenis_layanan) {
                $query->where('jenis_layanan_id', $jenis_layanan->id);
            })->paginate(5);
        } else {
            // Jenis layanan tidak ditemukan, kembalikan ke halaman portofolio utama atau tampilkan pesan kesalahan
            return redirect()->route('portfolio.index');
        }

            $pic = PortofolioPic::all();
        // Kirim data jenis layanan dan portofolio ke view
        return view('Admin.portofolio.showtype', compact('layanan', 'type', 'porto', 'pic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $porto = Portofolio::find($id);
        $pic = $porto->portofoliopic;
        $services = Services::all();
        return view('Admin.portofolio.edit-portofolio', compact('porto', 'pic', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $portofolio = Portofolio::findOrFail($id);

        $portofolio->project = $request->project;
        $portofolio->deskripsi = $request->deskripsi;
        $portofolio->services_id = $request->services_id;

        if ($request->hasFile('cover')) {
            //hapus foto lama
            File::delete('./portofolio/'.$portofolio->cover);

            //ambil info file
            $file = $request->file('cover');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './portofolio/';
            $file->move($tujuan_upload,$nama_file);

            //simpan ke database
            $portofolio->cover = $nama_file;
        }

        $portofolio->save();

        if ($request->hasFile('foto')) {
            $pic = $request->file('foto');

            // Hapus screenshot yang lama
            foreach ($portofolio->portofoliopic as $p) {
                //hapus foto lama
                File::delete('./portofolio/'.$p->foto);
            }

            // Simpan screenshot yang baru
            foreach ($pic as $pics) {
                // Simpan relasi dengan project
                $tujuan_upload = './portofolio/';
                $p_name = time()."_".$pics->getClientOriginalName();
                $pics->move($tujuan_upload,$p_name);

                $p = PortofolioPic::create([
                    'foto' => $p_name,
                    'portofolio_id' => $portofolio->id,
                ]);
            }
        }

        notify()->success('Portofolio Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Portofolio Berhasil Diupdate !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('portfolio.show', ['portfolio' => $portofolio->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/portfolio/'.$portofolio->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portofolio $portofolio)
    {
        //
    }

    public function hapus($id)
    {
        // Menghapus data Portofolio berdasarkan ID
            $portofolio = Portofolio::findOrFail($id);
            
            // Hapus juga data PortofolioPic terkait
            foreach ($portofolio->portofoliopic as $pic) {
                //hapus foto lama
                File::delete('./portofolio/'.$pic->foto);
            }
            //hapus cover lama
            File::delete('./portofolio/'.$portofolio->cover);
            // Hapus data Portofolio dari database
            $portofolio->delete();

            // Redirect atau berikan respon sesuai kebutuhan Anda
            notify()->success('Portofolio Berhasil Dihapus !!');
            // mengirim notifikasi
            $user = User::whereHas('role', function ($query) {
                $query->whereIn('role', ['admin', 'owner']);
            })->get();
            $message = "Portofolio Berhasil Dihapus !!";
            $notification = new NewMessageNotification($message);
            $notification->setUrl(route('portfolio.index')); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);
            return redirect('/portfolio');
    }
}
