@extends('layouts.frontend')
@section('title', 'Edit User')

@section('contents')
<div class="page-heading">
    <h3>User &raquo; {{$user->name}}</h3>
</div>
    <!-- Basic Horizontal form layout section start -->
    @if ($errors->any())
    <div class="alert alert-danger" role="alert" id="success">
        Data Tidak Valid
    </div>
    @endif
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('store-user',$user->id)}}" class="form form-horizontal" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Fullname</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="name"
                                                placeholder="Full Name" value="{{$user->name}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="email-id" class="form-control" name="email"
                                                placeholder="Email" value="{{$user->email}}">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Roles</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="roles" class="form-control">
                                                <option value="{{$user->roles}}">{{$user->roles}}</option>
                                                <option disabled>-------------------------------</option>
                                                <option value="ADMIN">ADMIN</option>
                                                <option value="APPROVER">APPROVER</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Change</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection