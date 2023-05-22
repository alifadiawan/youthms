<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Segmen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Session;

class BlogController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $segmen = Segmen::all();
        $data = Blog::paginate(5);
        return view('Admin.blog.index', compact('data','segmen'));
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
 
        foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
           $path = public_path() . $image_name;
           file_put_contents($path, $imgeData);
           
           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
        }
 
        $content = $dom->saveHTML();

        //simpan ke db
        $blog = Blog::create([
            'id_artikel' => $nextNumber,
            'judul' =>  $request->judul,
            'tanggal' =>  $tanggal,
            'segmen_id' =>  $request->segmen_id,
            'users_id' => auth()->user()->id,
            'isi' => $content,
        ]);

        notify()->success('Artikel Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Artikel Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('blog.show', ['blog' => $blog->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $data = Blog::find($blog->id);
        return view('Admin.blog.detail', compact('data'));
    }

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
        //insert tanggal sekarang
        $tanggal = date('Y-m-d');

        //proses image dari summernote
        $content = $request->isi;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
 
        foreach($imageFile as $item => $image){
           $data = $image->getAttribute('src');
           list($type, $data) = explode(';', $data);
           list(, $data)      = explode(',', $data);
           $imgeData = base64_decode($data);
           $image_name= "/upload/" . time().$item.'.png';
           $path = public_path() . $image_name;
           file_put_contents($path, $imgeData);
           
           $image->removeAttribute('src');
           $image->setAttribute('src', $image_name);
        }
 
        $content = $dom->saveHTML();

            //simpan ke db
            $data=Blog::find($id);
            $data->update([
                'id_artikel' => $request->id_artikel,
                'judul' =>  $request->judul,
                'tanggal' =>  $tanggal,
                'segmen_id' =>  $request->segmen_id,
                'users_id' => $request->users_id,
                'isi' => $content,
            ]);
            notify()->success('Artikel Berhasil Diubah !!');
            // mengirim notifikasi
            $user = Auth::user();
            $message = "Artikel Berhasil Diubah !!";
            $notification = new NewMessageNotification($message);
            $notification->setUrl(route('blog.show', ['blog' => $data->id])); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);
            return redirect('blog/'.$id);
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
        $user = Auth::user();
        $message = "Artikel Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('blog.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('blog')->with('hapus', 'Artikel Berhasil Dihapus!!');
    }
}
