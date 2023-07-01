<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Components</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/node-waves/waves.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/animate-css/animate.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
</head>
<body class="theme-red">
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
 
    <div class="overlay"></div>
  
    <nav class="navbar">
        <div class="container-fluid">
            {{-- <div class="navbar-header"> --}}
                @guest
                <div class="navalign">
                   <a  class="btn btn-sm " style="background-color:#ffe484" href="{{ route('login') }}">Login </a>
                </div>
                @endauth
                 
                @if(auth()->user())
                <div class="navalign">
                    <div>
                        <a  class="btn btn-sm " style="background-color:#ffe484" href="{{ route('component', $name = "components") }}">Component</a>
                        <a  class="btn btn-sm" style="background-color: #FFFFFF" href="{{ route('resources', $name = "resources") }}">Resource</a>
                    </div>
                    <div>
                        <a class="btn btn-sm " style="background-color:#ffe484"
                        href="{{ route('home') }}">{{ auth()->user()->name }}</a>
                        {{-- <a class="btn btn-sm " style="background-color:#ffe484" >{{ auth()->user()->name }}</p> --}}
                        <a  class="btn btn-sm " style="background-color: #FFFFFF"href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
                @endauth
               
            {{-- </div> --}}
           

        </div>
    </nav>
    <section class="content" style="margin-left: 0%;">
        <div class="container-fluid">
            <h1 class="mb-3 fw-semibold">Build fast, responsive sites with&nbsp;Component</h1>
            <p class="lead mb-4">
                Powerful, extensible, and feature-packed frontend toolkit. Build and customize with Sass, utilize prebuilt grid system and components, and bring projects to life with powerful JavaScript plugins.
              </p>
              <p>Get started with Component
                Component is a powerful, feature-packed frontend toolkit. Build anything—from prototype to production—in minutes.</p>
            @yield('content')
        </div>
    </section>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <script src="{{ asset('assets/plugins/node-waves/waves.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{ asset('assets/js/pages/forms/form-validation.js')}}"></script>
    <script src="{{ asset('assets/js/admin.js')}}"></script>
    <script src="{{ asset('assets/js/demo.js')}}"></script>

    {{-- @yield('scripts') --}}
    

</body>
<style>
    .theme-red .navbar {
    background-color: #6197d5 !important;
}
.theme-red .sidebar .menu .list li.active > :first-child i, .theme-red .sidebar .menu .list li.active > :first-child span {
    color: #6197d5 !important;
} 

.navalign{
    display: flex;
    justify-content: space-between;
    width: 100%;
    margin-top: 9px;
}

</style>


</html>
