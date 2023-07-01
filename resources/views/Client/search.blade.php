<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Components</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    {{-- <link href="{{ asset('assets/plugins/node-waves/waves.css')}}" rel="stylesheet" /> --}}

    <!-- Animation Css -->
    {{-- <link href="{{ asset('assets/plugins/animate-css/animate.css')}}" rel="stylesheet" /> --}}


    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/themes/all-themes.css') }}" rel="stylesheet" />
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
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Component</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <div class=" navbar-right navbar-brand">
                    <form  action="{{ route('search') }}" method="GET" class="form-inline">
                        <input class="form-control mr-sm-2" type="search"  name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
                      </form>
                    </div>
            </div>
        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar" style="width: 200px;">
            <div class="menu">
                <ul class="list">
                    <li class="header">Components</li>
                    @forelse ($components as $comp)
                        <li class=" {{ Request::is('/show') ? 'active open' : '' }}">
                            <a href="{{ route('show', $comp->id) }}">
                                {{ $comp->title }}
                            </a>
                        </li>
                    @empty
                    <h3>Data not Found</h3>
                    @endforelse
                </ul>
            </div>
        </aside>
    </section>
    <section class="content" style="margin-left: 200px;">
        <div class="container-fluid">
            @forelse ($categorytype as $card)
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="body">
                                <h5>Title</h5>
                                @if (!empty($card->title))
                                    <h2> {!! $card->title !!} </h2>
                                @else
                                    <pre>No Data Found</pre>
                                @endif
                                <hr>
                                <h5>Description</h5>
                                @if (!empty($card->description))
                                    <p> {!! $card->description !!} </p>
                                @else
                                    <pre>No Data Found</pre>
                                @endif
                                <hr>
                                <h5>Click here </h5>
                                <a href="javascript:void(0)" class="btn btn-info btn-sm outputshow" id="showOutput"
                                    data-id="{{ $card->id }}">Output</a>
                                <hr>
                                <h5>Html Code</h5>
                                @if (!empty($card->html))
                                    <pre> {{ $card->html }} </pre>
                                @else
                                    <pre>No Data Found</pre>
                                @endif
                                <hr>
                                <h5>Css Code</h5>
                                @if (!empty($card->css))
                                    <pre> {{ $card->css }} </pre>
                                @else
                                    <pre>No Data Found</pre>
                                @endif
                                <hr>
                                <h5>Java Script Code</h5>
                                @if (!empty($card->javascript))
                                    <pre> {{ $card->javascript }} </pre>
                                @else
                                    <pre>No Data Found</pre>
                                @endif
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Data Not Found</h2>
            @endforelse
    </section>

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            
            <div class="modal-content">
               
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Modal title</h4>   
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </div>
                <div class="modal-body">
                    <div class="editor">
                        <textarea class="htmlCode" id="html-code" hidden></textarea>
                        <textarea class="cssCode" id="css-code" hidden></textarea>
                        <textarea class="jsCode" id="js-code" hidden></textarea>
                        <iframe id="output" allowfullscreen frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('assets/js/demo.js') }}"></script>

    <script>
        $(document).on("click", "#showOutput", async function() {
            var id = $(this).attr("data-id");
            $('#defaultModal').modal('show');
            let url = '{{ route('show.data') }}'
            console.log(url);
            await $.ajax({
                url: url + '/' + id,
                type: 'Get',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    // $('.htmlCode').html('');
                    // $('.cssCode').html('');
                    // $('.jsCode').html('');
                    let htmlCode = response.html;
                    let cssCode = response.css;
                    let jsCode = response.javascript;
                    $('.htmlCode').html(htmlCode);
                    $('.cssCode').html(cssCode);
                    $('.jsCode').html(jsCode);
                }
            });
            myFunction();
        });

        // $('#defaultModal').on('hidden.bs.modal', function() {
        //     location.reload();
        // });
    </script>
    <script type="text/javascript">
        function myFunction() {
            let htmlcode = document.querySelector("#html-code").value;
            let csscode = document.querySelector("#css-code").value;
            let jscode = document.querySelector("#js-code").value;
            let output = document.getElementById("output");
            output.contentDocument.body.innerHTML = htmlcode + `<style>${csscode}</style>`;
            output.contentWindow.eval(jscode);
        }
    </script>

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
</style>


</html>
