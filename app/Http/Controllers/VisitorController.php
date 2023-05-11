<?php

namespace App\Http\Controllers;

use App\Models\visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();
        $visitor = visitor::firstOrCreate(['ip_address' => $ip]);
        $visitor->increment('visits');
        $visitor->save();

        $visitors = visitor::count();

        return view('welcome', compact('visitors'));
    }
}
