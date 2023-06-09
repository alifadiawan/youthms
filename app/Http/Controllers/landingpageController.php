<?php

namespace App\Http\Controllers;

use App\Models\LandingText;
use App\Models\LandingData;
use App\Models\LandingIllustration;
use App\Models\LandingPartner;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //landing illustration
    public function illustration()
    {   
        $illustration = LandingIllustration::all();
        $partner = LandingPartner::paginate(1);
    
        return view('Admin.landing_page.illustration', compact('illustration', 'partner'));
    }

    public function edit_illustration($id)
    {   
        $illustration = LandingIllustration::find($id);
    
        return view('Admin.landing_page.edit_illustration', compact('illustration'));
    }

    public function update_illustration(Request $request, $id)
    {
        //ganti foto

        //hapus foto lama
        $illustration=LandingIllustration::find($id);
        File::delete('./illustration/'.$illustration->illustration);

        //ambil info file
        $file = $request->file('illustration');

        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './illustration/';
        $file->move($tujuan_upload,$nama_file);

        //simpan ke database
        $illustration->illustration = $nama_file;
        $illustration->save();
        notify()->success('Illustration Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Illustration Berhasil Diupdate !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('landing.illustration')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('landing-page/illustration');
    }

    //landing partner
    public function create_partner()
    {
    
        return view('Admin.landing_page.create_partner');
    }

    public function store_partner(Request $request)
    {
        //ambil info file
        $file = $request->file('partner');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = './partner/';
        $file->move($tujuan_upload,$nama_file);

        //insert data
        LandingPartner::create([
            'partner' => $nama_file,
        ]);

        notify()->success('Partner Berhasil Ditambah !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Partner Berhasil Ditambah !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('landing.illustration')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('landing-page/illustration');
    }

    public function edit_partner($id)
    {   
        $partner = LandingPartner::find($id);
    
        return view('Admin.landing_page.edit_partner', compact('partner'));
    }

    public function update_partner(Request $request, $id)
    {
        //ganti foto

        //hapus foto lama
        $partner=LandingPartner::find($id);
        File::delete('./partner/'.$partner->partner);

        //ambil info file
        $file = $request->file('partner');

        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './partner/';
        $file->move($tujuan_upload,$nama_file);

        //simpan ke database
        $partner->partner = $nama_file;
        $partner->save();
        notify()->success('Partner Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Partner Berhasil Diupdate !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('landing.illustration')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('landing-page/illustration');
    }

    public function hapus_partner($id)
    {
        $partner = LandingPartner::find($id);
        File::delete('./partner/'.$partner->foto);
        $partner->delete();
        notify()->success('Partner Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Partner Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('landing.illustration')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('landing-page/illustration');
    }
 
    //landing data
    public function data()
    {   
        $data = LandingData::paginate(1);
    
        return view('Admin.landing_page.data', compact('data'));
    }

    public function create_data()
    {
    
        return view('Admin.landing_page.create_data');
    }

    public function store_data(Request $request)
    {
        //ambil info file
        $file = $request->file('foto');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = './testimonial/';
        $file->move($tujuan_upload,$nama_file);

        //insert data
        $landing = LandingData::create([
            'foto' => $nama_file,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'review' => $request->review,
        ]);

        notify()->success('Testimonial Berhasil Ditambah !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Testimonial Berhasil Ditambah !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('landing.data')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('landing-page/data');
    }

    public function edit_data($id)
    {
        $data = LandingData::find($id);
    
        return view('Admin.landing_page.edit_data', compact('data'));
    }

    public function update_data(Request $request, $id)
    {
        if ($request->foto != '') {
            //ganti foto

            //hapus foto lama
            $data=LandingData::find($id);
            File::delete('./testimonial/'.$data->foto);

            //ambil info file
            $file = $request->file('foto');

            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            //proses upload
            $tujuan_upload = './testimonial/';
            $file->move($tujuan_upload,$nama_file);

            //simpan ke database
            $data->foto = $nama_file;
            $data->nama = $request->nama;
            $data->jabatan = $request->jabatan;
            $data->review = $request->review;
            $data->save();
            notify()->success('Testimonial Berhasil Diupdate !!');
            // mengirim notifikasi
            $user = User::whereHas('role', function ($query) {
                $query->whereIn('role', ['admin', 'owner']);
            })->get();
            $message = "Testimonial Berhasil Diupdate !!";
            $notification = new NewMessageNotification($message);
            $notification->setUrl(route('landing.data')); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);
            return redirect('landing-page/data');
        }
        else{
            $data=LandingData::find($id);
            $data->nama = $request->nama;
            $data->jabatan = $request->jabatan;
            $data->review = $request->review;
            $data->save();
            notify()->success('Testimonial Berhasil Diupdate !!');
            // mengirim notifikasi
            $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
            $message = "Testimonial Berhasil Diupdate !!";
            $notification = new NewMessageNotification($message);
            $notification->setUrl(route('landing.data')); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);
            return redirect('landing-page/data');

        }
    }

    public function hapus_data($id)
    {
        $data = LandingData::find($id);
        File::delete('./testimonial/'.$data->foto);
        $data->delete();
        notify()->success('Testimonial Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Testimonial Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('landing.data')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('landing-page/data');
    }
 
    //landing text
    public function text()
    {   
        $text = landingText::all();
    
        return view('Admin.landing_page.text' , compact('text'));
    }
 
    public function edit_text($id)
    {
        $text = LandingText::find($id);
    
        return view('Admin.landing_page.edit_text', compact('text'));
    }

    public function update_text(Request $request, $id)
    {
        $text = LandingText::find($id);
        $input = $request->all();
        $text->update($input);
        notify()->success('Text Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Text Berhasil Diupdate !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('landing.text')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('landing-page/text');
    }

    //standard
    public function index()
    {   
        return view('landing-page');
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

     public function upload(Request $request)
     {
         $image = $request->file('image');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('images'), $imageName);
         return redirect('')->with('success', 'Image uploaded successfully.');
     }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
