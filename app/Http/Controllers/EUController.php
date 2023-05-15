<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\visitor;

class EUController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $visitor = visitor::firstOrCreate(['ip_address' => $ip]);
        $visitor->increment('visits');
        $visitor->save();


        return view('landing-page');
    }

    public function store()
    {
        return view('EU.store.index');
    }

    public function editing()
    {
        return view('EU.store.editing');
    }

    public function design()
    {
        return view('EU.store.design');
    }
}
