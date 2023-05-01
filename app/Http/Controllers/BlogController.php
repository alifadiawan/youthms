<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Segmen;
use Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::all();
        return view('Admin.blog.index', compact('data'));
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
        //
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
        $message = [
            'required' => ':attribute isi woi',
            'min' => ':attribute minimal :min karakter cuyh',
            'max' => ':attribute maximal :max karakter cuyh',
        ];

        $this->validate($request, [
            'id_artikel' => 'required | min:6 | numeric',
            'judul' => 'required',
            'tanggal' => 'required',
            'segmen_id' => 'required',
            'isi' => 'required | min:7',
        ], $message);

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

            //simpan ke database
            $data=Blog::find($id);
            $data->update([
                'id_artikel' => $request->id_artikel,
                'judul' => $request->judul,
                'tanggal' => $request->tanggal,
                'segmen_id' => $request->segmen_id,
                'isi' => $content,
            ]);
            Session::flash('berhasil', 'Artikel Berhasil Diupdate !!');
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
        return redirect('blog')->with('hapus', 'Artikel Berhasil Dihapus!!');
    }
}
