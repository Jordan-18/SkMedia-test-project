@extends('layouts.frontend')
@section('title', 'Halaman User')
    
@section('contents')
<div class="page-heading">
    <h3>Users Table</h3>
</div>
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert" id="success">
            {{ session('success') }}
        </div>
    @endif
    <!-- Hoverable rows start -->
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        <p>Result {{ $users->total()}} </p>
                    </div>
                    <div class="card-content">
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Create_at</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="text-bold-500">{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-bold-500">{{$user->roles}}</td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>
                                            <form action="{{route('delete-user',$user->id)}}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger rounded-pill" title="DELETE"><i class="bi bi-trash2"></i></button>
                                                <a href="{{route('edit-user',$user->slug)}}" class="btn btn-secondary rounded-pill" title="EDIT"><i class="bi bi-person-bounding-box"></i></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-3">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hoverable rows end -->
    
@endsection