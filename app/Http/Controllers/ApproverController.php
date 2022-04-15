<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ApproverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['idadmin','idtransport','iddriver','idapprover'])->orderBy('id', 'DESC')->paginate(5)->onEachSide(1)->withQueryString();
        return view('pages.Approver.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function action(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        switch ($request->input('Approve-action')){
            case 'reject':
                $order->update([
                    'status' => 'REJECT'
                ]);
                return back()->with('success','Permintaan Peminjaman telah Ditolak');
            case 'approve1':
                $order->update([
                    'status' => 'APPROVED 1'
                ]);
                return back()->with('success','Permintaan Peminjaman telah Disetujui');
            case 'approve2':
                $order->update([
                    'status' => 'APPROVED 2'
                ]);
                return back()->with('success','Terima Kasih Selamat Bertemu');
            case 'waiting':
                $order->update([
                    'status' => 'PENDING'
                ]);
                return back()->with('success','Permintaan dalam proses');
            case 'message':
                $driver = Driver::query()->where('id','=',$order->id_driver)->firstOrFail();
                $link = url('/approver/link/'.$order->id);
                $text = 'Hai, '.$driver->name.' Kami Dari Sekawan Media Transportasi Berhubung ada pesanan dengan anda sebagai drivernya, apakah anda bersedia menjadi Driver Pada '.date("F j, Y",strtotime($order->awal_pinjam)).' hingga '.date("F j, Y",strtotime($order->akhir_pinjam)).' jika anda bersedia silahkan link berikut '.$link;
                $wa = 'https://api.whatsapp.com/send?phone='.$driver->NomorHp.'&text='.$text;
                return Redirect::away($wa);
            case 'delete':
                $order->delete();
                return back()->with('success','Order Dihapus');
        }
    }

    public function driverlink($id){
        $order = Order::find($id);
        return view('pages.Approver.approve',compact('order'));
    }
}