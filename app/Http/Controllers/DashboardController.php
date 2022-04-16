<?php

namespace App\Http\Controllers;

use App\Exports\DataExport;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index(){
        $transports = DB::table('orders')
            ->join('transports','orders.id_transport','=','transports.id')
            ->select(
                'transports.name as name',
                DB::raw('COUNT(orders.id_transport) as y')
                )
            ->groupBy('transports.name')
            ->get();

        $drivers = DB::table('orders')
            ->join('drivers','orders.id_driver','=','drivers.id')
            ->select(
                'drivers.name as name',
                DB::raw('COUNT(orders.id_driver) as y')
                )
            ->groupBy('drivers.name')
            ->get();
        $admin = User::query()->where('roles','=','ADMIN')->count();
        $approver = User::query()->where('roles','=','APPROVER')->count();
        return view('pages.dashboard.index', compact('transports','drivers','admin','approver'));
    }

    public function exporttoexcel(){
        return Excel::download(new DataExport, 'OrderReport.xlsx');
    }
}
