<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Produk::all();
        return view('Admin.store.index' , compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.store.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk_baru = $request->all();
        Produk::create($produk_baru);

        return redirect('/store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Produk::find($id);
        return view('Admin.store.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Produk::find($id);
        return view('Admin.store.edit' , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Produk::find($id);
        $input = $request->all();
        
        $product->fill($input)->save();

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
        $product->delete();

        return redirect('/store');

    }
}
