<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Components</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/themes/all-themes.css') }}" rel="stylesheet" />

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
                <a  class="btn btn-sm " style="background-color:#ffe484" href="{{ route('login') }}">LOGIN </a>
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
                        {{-- <p class="btn btn-sm " style="background-color:#ffe484" >{{ auth()->user()->name }}</p> --}}
                        <a  class="btn btn-sm " style="background-color: #FFFFFF"href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
                @endauth
               
            {{-- </div> --}}

        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar" style="width: 200px;">
            <div class="menu">
                <ul class="list">
                    <li class="header">Components</li>
                    @forelse ($resources as $comp)
                        <li class=" {{ Request::is('/show') ? 'active open' : '' }}">
                            <a href="{{ route('resourceshow', $comp->id) }}">
                                {{ $comp->title }}
                            </a>
                        </li>
                    @empty
                    <h4>Data not Found</h4>
                    @endforelse
                </ul>
            </div>
        </aside>
    </section>
    <section class="content" style="margin-left: 200px;">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <h1 class="mb-3 fw-semibold">Build fast, responsive sites with&nbsp;Component</h1>
                            <p class="lead mb-4">
                                Powerful, extensible, and feature-packed frontend toolkit. Build and customize with
                                Sass, utilize prebuilt grid system and components, and bring projects to life with
                                powerful JavaScript plugins.
                            </p>
                            <p>Get started with Component
                                Component is a powerful, feature-packed frontend toolkit. Build anything—from prototype
                                to production—in minutes.</p>
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>
</body>
<style>
    iframe {
        width: 100%;
        height: 360px;
        padding: 10px;
        border: none !important;
        outline: none !important;
        margin: 0px !important;
    }

    .modal-body {
        height: 360px;
        width: auto;
        position: relative;
    }

    #output {
        overflow: hidden;
        height: 100%;
        width: 100;
        position: absolute;
        top: 0px;
        left: 0px;
        right: 2rem;
        bottom: 0px;
    }

    .theme-red .navbar {
        background-color: #6197d5 !important;
    }

    .theme-red .sidebar .menu .list li.active> :first-child i,
    .theme-red .sidebar .menu .list li.active> :first-child span {
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
