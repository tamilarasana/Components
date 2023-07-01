<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Components</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('assets/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('assets/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
    
    {{-- <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" /> --}}

    <link href="{{ asset('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script> 
      <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


</head>
<body class="theme-red">
    <!-- Page Loader -->
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
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Component</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                {{ Auth::user()->name }}
                            </a>
                                <div class="dropdown-menu" style="top: 83px; "  >
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>

                    </li>
                    <!-- #END# Tasks -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <aside id="leftsidebar" class="sidebar" style="width: 200px;">
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class=" {{ Request::is('superadmincategories') ? 'active open' : ''}}">
                        <a href="{{ route('superadmincategories.index') }}">
                            <i class="material-icons">home</i>
                            <span>Category</span>
                        </a>
                    </li>
                    <li class=" {{ Request::is('superadmincategorytype') ? 'active open' : ''}}">
                        <a href="{{ route('superadmincategorytype.index') }}">
                            <i class="material-icons">apps</i>
                            <span>Components</span>
                        </a>
                    </li>
                    <li class=" {{ Request::is('superadminresources') ? 'active open' : ''}}">
                        <a href="{{ route('superadminresources.index') }}">
                            <i class="material-icons">apps</i>
                            <span>Resources</span>
                        </a>
                    </li>
        
                </ul>
            </div>
        </aside> 
    </section>
    <section class="content" style="margin-left: 200px;">
    {{-- <section class="content"> --}}
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('assets/plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
   
    <script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>

    <script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
    <script src="{{asset('assets/js/admin.js')}}"></script>
    <script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>

      <!-- JQuery Steps Plugin Js -->
      <script src="{{asset('assets/plugins/jquery-steps/jquery.steps.js')}}"></script>
  
      <script src="{{asset('assets/plugins/node-waves/waves.js')}}"></script>
  
      <!-- Custom Js -->
      <script src="{{asset('assets/js/pages/forms/form-wizard.js')}}"></script>

      <script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('assets/js/admin.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{ ('assets/js/demo.js')}}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 

    @yield('scripts');


</body>


</html>
