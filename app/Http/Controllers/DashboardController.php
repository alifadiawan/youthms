<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\visitor;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $online_visitor = [
            'chart_title' => 'Visitor Counter',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\visitor',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'chart_color' =>  "51, 133, 255"
        ];
        $chart1 = new LaravelChart($online_visitor);

        $penjualan = [
            'chart_title' => 'Penjualan',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Transaksi',
            'group_by_field' => 'tanggal',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'chart_color' =>  "51, 133, 255"
        ];
        $chart2 = new LaravelChart($penjualan);

        
        $user = auth()->user()->role->role;
        // return $user;
        return view('Admin.dashboard', compact('chart1', 'chart2'));
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
