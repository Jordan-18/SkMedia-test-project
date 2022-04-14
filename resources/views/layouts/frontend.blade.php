<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap.css')}}">
    
<link rel="stylesheet" href="{{url('/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{url('/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{url('/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{url('/assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('components.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            @yield('contents')
            @include('components.footer')
        </div>
    </div>

    
    <script src="{{url('/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap.bundle.min.js')}}"></script>
    
    <script src="{{url('/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{url('/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{url('/assets/js/mazer.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{url('/assets/js/main.js')}}"></script>
</body>

</html>