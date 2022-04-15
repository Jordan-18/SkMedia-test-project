@extends('layouts.frontend')
@section('title', 'Halaman Dashboard')
@section('contents')
<div class="page-heading">
    <h3>Penyewaan Transport</h3>
</div>
@if (session()->has('success'))
        <div class="alert alert-success" role="alert" id="success">
            {{ session('success') }}
        </div>
@endif
<a href="{{route('create-order')}}" class="btn icon icon-left btn-primary mb-3"><i class="bi bi-plus-circle-dotted"></i> Order</a>
<section class="section">
    <div class="row" id="table-hover-row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Orders</h4>
                </div>
                <div class="card-content">
                    <!-- table hover -->
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Nomor</th>
                                    <th>Admin</th>
                                    <th>Kendaraan</th>
                                    <th>Driver</th>
                                    <th>Approver</th>
                                    <th>Awal Pinjam</th>
                                    <th>Pengembalian</th>
                                    <th>Status</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->nomor}}</td>
                                    <td>{{$order->idadmin->name  ?? 'None'}}</td>
                                    <td>{{$order->idtransport->name ?? 'None'}}</td>
                                    <td>{{$order->iddriver->name ?? 'None'}}</td>
                                    <td>{{$order->idapprover->name ?? 'None'}}</td>
                                    <td>{{date("F j, Y H:m:s",strtotime($order->awal_pinjam))}}</td>
                                    <td>{{date("F j, Y H:m:s",strtotime($order->akhir_pinjam))}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>
                                        <form action="{{route('delete-order',$order->id)}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger rounded-pill" title="DELETE"><i class="bi bi-trash2"></i></button>
                                            <a href="{{route('edit-order',$order->id)}}" class="btn btn-secondary rounded-pill" title="EDIT"><i class="bi bi-person-bounding-box"></i></i></a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <p>Result {{ $events->total()}} </p>
                    <div class="d-flex justify-content-center">
                        {{ $points->links() }}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection