<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use App\Models\ServicesIlls;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::paginate(5);
        $jenis_layanan = JenisLayanan::all();
        
        return view('Admin.services.index', compact('services', 'jenis_layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_layanan = JenisLayanan::all();
        
        return view('Admin.services.tambah', compact('jenis_layanan'));
    }

    public function ilustrasi()
    {
        $ills = ServicesIlls::all();
        return view('Admin.services.ilustrasi', compact('ills'));
    }

    public function ilustrasi_edit($id)
    {
        $ills = ServicesIlls::find($id);
        return view('Admin.services.edit-ilustrasi', compact('ills'));
    }

    public function ilustrasi_update(Request $request ,$id)
    {
        $ills = ServicesIlls::find($id);
        
        if ($request->hasFile('hero_ills')) {
            //hapus foto lama
            File::delete('./illustration/'.$ills->hero_ills);

            //ambil info file
            $file = $request->file('hero_ills');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './illustration/';
            $file->move($tujuan_upload,$nama_file);

            //simpan ke database
            $ills->hero_ills = $nama_file;   
        }

        if ($request->hasFile('ills1')) {
            //hapus foto lama
            File::delete('./illustration/'.$ills->ills1);

            //ambil info file
            $file = $request->file('ills1');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './illustration/';
            $file->move($tujuan_upload,$nama_file);
            $ills->ills1 = $nama_file;
        }

        if ($request->hasFile('ills2')) {
            //hapus foto lama
            File::delete('./illustration/'.$ills->ills2);

            //ambil info file
            $file = $request->file('ills2');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './illustration/';
            $file->move($tujuan_upload,$nama_file);
            $ills->ills2 = $nama_file;
        }

        if ($request->hasFile('ills3')) {
            //hapus foto lama
            File::delete('./illustration/'.$ills->ills3);

            //ambil info file
            $file = $request->file('ills3');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './illustration/';
            $file->move($tujuan_upload,$nama_file);
            $ills->ills3 = $nama_file;
        }

        $ills->hero_text = $request->hero_text;
        $ills->save();

        notify()->success('Ilustrasi Service Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = User::whereHas('roles', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Ilustrasi Service Berhasil Diupdate !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('services.ilustrasi')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/service-ilustrasi');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function id_services()
    {

    }

    public function store(Request $request)
    {
        $services = Services::count();
        $currentNumber = $services;
        $nextNumber = str_pad(++$currentNumber, 5, '0', STR_PAD_LEFT); // "00002"


        //ambil info file
        $file = $request->file('foto');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = './service/';
        $file->move($tujuan_upload,$nama_file);

        //insert data
        $servis = Services::create([
            'foto' => $nama_file,
            'id_service' => $nextNumber,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jenis_layanan_id' => $request->jenis_layanan_id,
        ]);

        notify()->success('Berhasil ditambahkan',$request->judul);
        // mengirim notifikasi
        $user = User::whereHas('roles', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Service Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('services.show', ['service'=> $servis->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        return redirect('services');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $services = Services::find($id);
        $jenis_layanan = JenisLayanan::find($id);
        
        return view('Admin.services.detail', compact('services', 'jenis_layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $services = Services::find($id);
        $jenis_layanan = JenisLayanan::all();
        
        return view('Admin.services.edit', compact('services', 'jenis_layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    { 
        if($request->foto != ''){
            //ganti foto

            //hapus foto lama
            $servis=Services::find($id);
            File::delete('./service/'.$servis->foto);

            //ambil info file
            $file = $request->file('foto');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './service/';
            $file->move($tujuan_upload,$nama_file);

            $servis->id_service = $request->id_service;
            $servis->judul = $request->judul;
            $servis->deskripsi = $request->deskripsi;
            $servis->jenis_layanan_id = $request->jenis_layanan_id;
            $servis->foto = $nama_file;
            $servis->save();

            notify()->success('Service '.$request->judul.' Berhasil Diupdate !!');
            // mengirim notifikasi
            $user = User::whereHas('roles', function ($query) {
                $query->whereIn('role', ['admin', 'owner']);
            })->get();
            $message = "Servis ".$request->judul." Berhasil Diupdate !!";
            $notification = new NewMessageNotification($message);
            $notification->setUrl(route('services.show', ['service'=> $servis->id])); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);

            return redirect('/services');
        }
        else {
            $servis = Services::find($id);
            $servis->id_service = $request->id_service;
            $servis->judul = $request->judul;
            $servis->deskripsi = $request->deskripsi;
            $servis->jenis_layanan_id = $request->jenis_layanan_id;

            notify()->success('Service '.$request->judul.' Berhasil Diupdate !!');
            // mengirim notifikasi
            $user = User::whereHas('roles', function ($query) {
                $query->whereIn('role', ['admin', 'owner']);
            })->get();
            $message = "Servis ".$request->judul." Berhasil Diupdate !!";
            $notification = new NewMessageNotification($message);
            $notification->setUrl(route('services.show', ['service'=> $servis->id])); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);

            return redirect('/services');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $services = Services::find($id);
        $services->delete();

        return redirect('/services');
    }

    public function hapus($id)
    {
        $services = Services::find($id);
        File::delete('./service/'.$services->foto);
        $services->delete();

        notify()->success('Layanan telah dihapus');
        // mengirim notifikasi
        $user = User::whereHas('roles', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Service Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('services.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/services');
    }
}
