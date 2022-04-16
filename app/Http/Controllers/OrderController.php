<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Order;
use App\Models\Transport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['idadmin','idtransport','iddriver','idapprover'])->where('status','!=','DONE')->orderBy('id', 'DESC')->paginate(5)->onEachSide(1)->withQueryString();
        return view('pages.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $approvers = User::query()->where('roles','=','APPROVER')->orderBy('id', 'DESC')->paginate(6)->onEachSide(1)->withQueryString();
        $drivers = Driver::all();
        $transports = Transport::all();
        return view('pages.order.create', compact('drivers','transports','approvers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nomor' => 'required',
            'awal_pinjam' => 'required',
            'akhir_pinjam' => 'nullable',
            'id_transport' => 'required',
            'id_driver' => 'required',
            'id_approver' => 'required'
        ]);
        $bbm = Transport::find($validatedData['id_transport']);
        $validatedData['id_admin'] = Auth::user()->id;
        $validatedData['bbm_awal'] = $bbm->Jumlah_bbm;

        Order::create($validatedData);

        return back()->with('success','Pesanan Sudah Terdaftar Tunggu Konfirmasi Selanjutnya');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $approvers = User::query()->where('roles','=','APPROVER')->orderBy('id', 'DESC')->paginate(6)->onEachSide(1)->withQueryString();
        $drivers = Driver::all();
        $transports = Transport::all();
        $driver = Driver::query()->where('id','=',$order->id_driver)->firstOrFail();
        $transport = Transport::where('id','=',$order->id_transport)->firstOrFail();
        return view('pages.order.edit', compact('order','approvers','driver','transport','drivers','transports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'nomor' => 'required',
            'awal_pinjam' => 'required',
            'akhir_pinjam' => 'nullable',
            'id_transport' => 'required',
            'id_driver' => 'required',
            'id_approver' => 'required'
        ]);
        $bbm = Transport::find($validatedData['id_transport']);
        $validatedData['id_admin'] = Auth::user()->id;
        $validatedData['bbm_awal'] = $bbm->Jumlah_bbm;

        Order::find($id)->update($validatedData);

        return redirect()->route('index-order')->with('success','Data Order Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        $order->delete();

        return back()->with('success','Data Berhasil Dihapus');
    }
}
