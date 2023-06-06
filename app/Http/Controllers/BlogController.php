<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Segmen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $today = date('Y-m-d');
        // $action = 'get-populer';

        $Sweek = carbon::now()->subweek();
        $Eweek = carbon::now();
        $get = 'populer';

        $populer = Blog::orderBy('visitor', 'desc')->get();
        $weekly = Blog::whereBetween('created_at', [$Sweek, $Eweek])->orwhereBetween('updated_at', [$Sweek, $Eweek])->get();
        $terpilih = Blog::whereHas('segmen', function ($query){
            $query->where('id', 3);
        })->get();
        // $terpilih = blog::where()->get();        //pending

        $segmen = Segmen::all();
        $sekarang = carbon::now();
        $lastweek = carbon::now()->subweek();
        $atas = Blog::where('id', '=', 1)->get();
        // return $atas;
        $recently_uploaded = Blog::orderBy('created_at', 'desc')->take(3)->get();
        // return $recently_uploaded;
        $recently_lastweek = Blog::whereDate('created_at', '<=', $lastweek)->take(4)->get();
        // return $terpilih;

        $compact = ['populer', 'weekly',  'terpilih', 'segmen', 'recently_uploaded', 'recently_lastweek','get', 'atas'];

        $segmen = Segmen::all();
        $data = Blog::paginate(5);
        $pag = Blog::paginate(5);
        if (auth()->check()) {
            $u = auth()->user()->role->role;
            $admin = ['admin', 'owner'];
            if (in_array($u, $admin)) {
                return view('Admin.blog.index', compact('segmen', 'data'));
            }else{
                return view('EU.blog.index', compact($compact));
            }
        } else {
            // return redirect()->route('blogs.type');
            return view('EU.blog.index', compact($compact));
        }
    }

    public function type($type)
    {
        // return $request;
        // $get = $request->get;
        // return $get; 
        $today = date('Y-m-d');
        // $action = 'get-populer';

        $Sweek = carbon::now()->subweek();
        $Eweek = carbon::now();

        // $blog = blog::all();
        if ($type == 'populer') {
            // code...
            $populer = Blog::orderBy('visitor', 'desc')->get();
            $blog = $populer;
        } 
        elseif ($type == 'weekly') {
            // code...
            $weekly = Blog::whereBetween('created_at', [$Sweek, $Eweek])->orwhereBetween('updated_at', [$Sweek, $Eweek])->get();
            $blog = $weekly;
        } 
        elseif ($type == 'terpilih') {
            // code...
            $terpilih = Blog::whereHas('segmen', function ($query){
                $query->where('segmen', 'PEMROGRAMMAN');
            })->get();
            $blog = $terpilih;
        }
        

        // return $terpilih;
        // $terpilih = blog::where()->get();        //pending

        // $compact = ['populer', 'weekly', 'terpilih'];

        return view('EU.Blog.type', compact('blog', 'type'))->render();
    }

    public function show(Blog $blog)
    {
        // return $blog;
        return view('Admin.blog.detail', compact('blog'));
    }

    public function showtype($type)
    {
        $type = strtolower(str_replace('_', ' ', $type));
        // return $type;
        $blog = Blog::whereHas('segmen', function ($query) use ($type) {
            $query->where('segmen', $type);
        })->get();
        // return $blog;
        return view('EU.blog.', compact('blog'));
    }

    public function detail(Request $request, Blog $blog)
    {
        $ip = $request->ip();
        $visitor = Blog::find($blog->id);
        $visitor->increment('visitor');
        $visitor->save();
        $rekom = Blog::where('segmen_id' , $blog->segmen_id)->take(4)->get();
        return view('EU.blog.show', compact('blog', 'visitor', 'rekom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $segmen = Segmen::all();
        return view('Admin.blog.add', compact('segmen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //insert id artikel
        $blog = Blog::count();
        $currentNumber = $blog;
        $nextNumber = str_pad(++$currentNumber, 5, '0', STR_PAD_LEFT); // "00002"

        //insert tanggal sekarang
        $tanggal = date('Y-m-d');

        //proses image dari summernote
        $content = $request->isi;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        //ambil info file
        $file = $request->file('foto');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        $tujuan_upload = './blog/';
        $file->move($tujuan_upload,$nama_file);

        //simpan ke db
        $blog = Blog::create([
            'id_artikel' => $nextNumber,
            'judul' =>  $request->judul,
            'segmen_id' =>  $request->segmen_id,
            'users_id' => auth()->user()->id,
            'foto' => $nama_file,
            'isi' => $content,
        ]);

        notify()->success('Artikel Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Artikel Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('blogs.show', ['blog' => $blog->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('blogs');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $segmen = Segmen::all();
        $data = Blog::find($blog->id);
        return view('Admin.blog.edit', compact('data', 'segmen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        //insert tanggal sekarang
        $tanggal = date('Y-m-d');

        //proses image dari summernote
        $content = $request->isi;
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | libxml_use_internal_errors(true));
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            if (strpos($data, ';') === false) {
                continue;
            }
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        if ($request->foto != '') {
            //hapus foto lama
            File::delete('./blog/'.$blog->foto);

            //ambil info file
            $file = $request->file('foto');
            //rename
            $nama_file = time()."_".$file->getClientOriginalName();

            $tujuan_upload = './blog/';
            $file->move($tujuan_upload,$nama_file);
            // return $nama_file;

            //simpan ke db
            $blog->update([
                'judul' =>  $request->judul,
                'segmen_id' =>  $request->segmen_id,
                'users_id' => auth()->user()->id,
                'foto' => $nama_file,
                'isi' => $content,
            ]);
            // return $blog;
        } else {
            //simpan ke db
            $blog->update([
                'judul' =>  $request->judul,
                'segmen_id' =>  $request->segmen_id,
                'users_id' => $request->users_id,
                'foto' => $blog->foto,
                'isi' => $content,
            ]);
        }
        notify()->success($request->judul . ' Berhasil Diubah !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = $request->judul . " Berhasil Diubah !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('blogs.show', ['blog' => $blog->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('blogs/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function hapus($id)
    {
        $data = Blog::find($id);
        $data->delete();
        notify()->success('Artikel Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Artikel Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('blogs.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('blogs')->with('hapus', 'Artikel Berhasil Dihapus!!');
    }
}
