<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{route('dashboard')}}"><img src="{{url('assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            @guest
            <li class="sidebar-item">
                <a href="" class='sidebar-link'>
                    <i class="bi bi-house-door"></i>
                    <span>Home</span>
                </a>
            </li>  
            <li class="sidebar-item">
                <a href="{{route('login')}}" class='sidebar-link'>
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li>        
            @endguest  
            @auth
            <li class="sidebar-item {{ request()->is('/') ? 'active' : ''}}">
                <a href="{{route('dashboard')}}" class='sidebar-link'>
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>    
            @if (Auth::user()->roles == "ADMIN") 

            <li class="sidebar-item {{ request()->is(['user','users']) ? 'active' : ''}}  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-plus"></i>
                    <span>User</span>
                </a>
                <ul class="submenu {{ request()->is(['user','users']) ? 'active' : ''}}">
                    <li class="submenu-item {{ request()->is('user') ? 'active' : ''}}">
                        <a href="{{route('create-user')}}">Tambah User</a>
                    </li>
                    <li class="submenu-item {{ request()->is('users') ? 'active' : ''}}">
                        <a href="{{route('users')}}">List Users</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="" class='sidebar-link'>
                    <i class="bi bi-truck"></i>
                    <span>Sewa Kendaraan</span>
                </a>
            </li>
            @elseif (Auth::user()->roles == "APPROVER") 
            <li class="sidebar-item">
                <a href="" class='sidebar-link'>
                    <i class="bi bi-card-checklist"></i>
                    <span>Permintaan Persetujuan</span>
                    <span class="badge bg-danger">99+</span>
                </a>
            </li>

            @endif    
             
            <li class="sidebar-item">
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <a type="button" class='sidebar-link' data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        <i class="bi bi-box-arrow-left" ></i>
                        <span>Logout</span>
                    </a>
                </form>
            </li>        
            @endauth        
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
    <!-- Vertically Centered modal Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <p>
                        If you log out all sessions will be deleted and you have to enter your data again to login
                    </p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>