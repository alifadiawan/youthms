<?php

namespace App\Http\Controllers;

use App\Models\Segmen;
use Illuminate\Http\Request;

class SegmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $input = $request->all();
        Segmen::create($input);
        notify()->success('Segmen Berhasil Ditambahkan !!');
        return redirect('blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(Segmen $segmen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Segmen $segmen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Segmen $segmen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Segmen $segmen)
    {
        //
    }

    public function hapus($id)
    {
        $segmen = Segmen::find($id);
        $segmen->delete();
        
        notify()->success('Segmen Telah Dihapus !!');
        return redirect()->back();
    }
}
