<?php

namespace App\Http\Controllers;

use App\Models\landingpage;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function illustration()
     {   
         return view('Admin.landing_page.illustration');
     }
 
 
     public function data()
     {   
         return view('Admin.landing_page.data');
     }
 
     
     public function text()
     {   
        $text = landingpage::all();
         return view('Admin.landing_page.text' , compact('text'));
     }
 

    public function index()
    {   
        return view('Admin.landing_page.landing-page');
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

    public function edit_text($id)
    {
        return view('Admin.landing_page.edit-text');
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
