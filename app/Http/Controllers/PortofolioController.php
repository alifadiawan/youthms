<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\PortofolioPic;
use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $porto = Portofolio::paginate(4);
        $pic = PortofolioPic::all();
        return view('Admin.portofolio.index', compact('porto', 'pic'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.portofolio.create-portofolio');
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

        return redirect('/portfolio');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $porto = Portofolio::find($id);
        $pic = $porto->portofoliopic;
        return view('Admin.portofolio.edit-portofolio', compact('porto', 'pic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        
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
        // code...
    }
}
