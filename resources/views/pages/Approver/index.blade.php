@extends('layouts.frontend')
@section('title', 'Halaman Dashboard')
@section('contents')
<div class="page-heading">
    <h3>Approve</h3>
</div>
@if (session()->has('success'))
        <div class="alert alert-success" role="alert" id="success">
            {{ session('success') }}
        </div>
@endif
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
                                    <th>Nomor HP</th>
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
                                        <form action="{{route('action-approve',$order->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" name="Approve-action" value="reject" class="btn btn-danger rounded-pill" title="REJECT"><i class="bi bi-x-circle"></i></button>
                                            @if ($order->status == "REJECT")
                                                <button type="submit" name="Approve-action" value="delete" class="btn btn-danger rounded-pill" title="DELETE"><i class="bi bi-trash"></i></button>
                                                <button type="submit" name="Approve-action" value="waiting" class="btn btn-warning rounded-pill" title="PENDING"><i class="bi bi-hourglass-split"></i></button>
                                            @else
                                                @if ($order->status == "APPROVED 1")
                                                    {{-- biarkan kosong --}}
                                                @else
                                                    <button type="submit" name="Approve-action" value="approve1" class="btn btn-success rounded-pill" title="APPROVE"><i class="bi bi-check2-circle"></i></button>
                                                @endif
                                            @endif
                                            
                                            @if ($order->status == "APPROVED 1")
                                                <button type="submit" name="Approve-action" value="message" class="btn btn-primary rounded-pill" title="MESSAGE TO DRIVER"><i class="bi bi-chat-dots"></i></button>
                                            @endif
                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection