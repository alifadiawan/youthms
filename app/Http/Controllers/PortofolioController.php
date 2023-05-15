<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Auth::user();
        $notifications = $users->unreadNotifications;

        return view('Admin.portofolio.index', compact('notifications'));
    }
    public function test()
    {
        $users = Auth::user();
        $notifications = $users->unreadNotifications;

        return view('Admin.portofolio.edit-portofolio', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Auth::user();
        $notifications = $users->unreadNotifications;

        return view('Admin.portofolio.create-portofolio', compact('notifications'));
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
    public function show(portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(portofolio $portofolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, portofolio $portofolio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(portofolio $portofolio)
    {
        //
    }
}
