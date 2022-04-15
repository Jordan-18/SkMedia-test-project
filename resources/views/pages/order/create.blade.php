@extends('layouts.frontend')
@section('title', 'Halaman Dashboard')
@section('contents')
<div class="page-heading">
    <h3>Penyewaan Transport &raquo; Pesan Transport</h3>
</div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert" id="success">
            {{ session('success') }}
        </div>
    @elseif (session()->has('failed'))
        <div class="alert alert-danger" role="alert" id="success">
            Data Error
        </div> 
    @endif
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Order</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('store-order')}}" class="form form-vertical" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="first-name-icon">Nama Peminjam</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" name="name" placeholder="Input with icon left" id="first-name-icon">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="mobile-id-icon">Mobile</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Mobile" id="mobile-id-icon" name="nomor">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="form-group has-icon-left">
                                            <label for="email-id-icon">Awal Pinjam</label>
                                            <div class="position-relative">
                                                <input type="datetime-local" class="form-control" name="awal_pinjam">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-plus"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Akhir Pinjam</label>
                                            <div class="position-relative">
                                                <input type="datetime-local" class="form-control" name="akhir_pinjam">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Approver</label>
                                            <div class="position-relative">
                                                <select class="form-control" name="id_approver" id="approver">
                                                    <option>Select</option>
                                                    <option disabled>-----------------------------------------</option>
                                                    @foreach ($approvers as $approver)
                                                        <option value="{{$approver->id}}">{{$approver->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Tranport</label>
                                            <div class="position-relative">
                                                <input type="button" class="form-control bg-secondary text-white" value="Choose Transport" data-bs-toggle="modal" data-bs-target="#transportmodal">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-truck" style="color: white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">Driver</label>
                                            <div class="position-relative">
                                                <input type="button" class="form-control bg-secondary text-white" value="Choose Driver" data-bs-toggle="modal" data-bs-target="#drivermodal">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-lines-fill" style="color: white"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" hidden>
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">ID Driver</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="ID" id="id-transport" name="id_transport">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" hidden>
                                        <div class="form-group has-icon-left">
                                            <label for="password-id-icon">ID Transport</label>
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="ID" id="id-driver" name="id_driver">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Show Order</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row g-0 mb-3">
                            <div class="col-md-4">
                              <img src="https://cdn.pixabay.com/photo/2014/05/24/00/07/woven-cloth-352481__340.jpg" class="img-fluid rounded-start" id="img-transport">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title" id="name-transport">Transport</h5>
                                <p class="card-text" id="jenis-kendaraan">Jenis Kendaraan<p>
                              </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="col-md-4">
                              <img src="https://cdn.pixabay.com/photo/2014/05/24/00/07/woven-cloth-352481__340.jpg" class="img-fluid rounded-start" id="img-driver">
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <h5 class="card-title" id="name-driver">Driver</h5>
                                <p class="card-text" id="nomor-hp">Nomor HP</p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Transport Modal -->
<div class="modal fade" id="transportmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you Sure ?</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($transports as $transport)
                    <div class="col" >
                      <div class="card" onclick="transport('{{$transport->id}}','{{$transport->url}}','{{$transport->name}}','{{$transport->jenis_kendaraan}}')">
                        <img src="{{$transport->url}}" class="card-img-top" >
                        <div class="card-body">
                          <h5 class="card-title">{{$transport->name}}</h5>
                          <p class="card-text">{{$transport->jenis_kendaraan}}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal" id="close-transport">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Driver Modal -->
<div class="modal fade" id="drivermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Are you Sure ?
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($drivers as $driver)
                    <div class="col">
                      <div class="card" onclick="driver('{{$driver->id}}','{{$driver->url}}','{{$driver->name}}','{{$driver->NomorHp}}')">
                        <img src="{{$driver->url}}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{$driver->name}}</h5>
                          <p class="card-text">{{$driver->NomorHp}}</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal" id="close-driver">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection