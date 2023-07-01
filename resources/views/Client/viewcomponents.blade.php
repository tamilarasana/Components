<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Components</title>
    <!-- Favicon-->
    {{-- <link rel="icon" href="assets/favicon.ico" type="image/x-icon"> --}}

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css"> --}}
    {{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css"> --}}

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/css/themes/all-themes.css') }}" rel="stylesheet" /> --}}

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
                        <a  class="btn btn-sm " style="background-color: #FFFFFF"href="{{ route('logout') }}">Logout</a>
                    </div>
                </div>
                @endauth
               
            {{-- </div> --}}

        </div>
    </nav>
</nav>
<section>
    <aside id="leftsidebar" class="sidebar" style="width: 200px;">
        <div class="menu">
            <ul class="list">
                <li class="header">Components</li>
                @forelse ($components as $comp)
                    <li class=" {{ Request::is('/show') ? 'active open' : '' }}">
                        <a href="{{ route('showcomponents', $comp->id) }}">
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
                            <a href="javascript:void(0)" class="btn btn-info btn-sm" id="showOutput"
                                data-id="{{ $card->id }}">Output</a>
                            <hr>
                            <h5>Html Code <button type="button" id="copy-btn" style="float:right;"
                                    onclick="myHtmlCopyFunction({{ $card->id }})">Copy text</button><span
                                    id="msg_{{ $card->id }}" style="color:green;"></span></h5>
                            @if (!empty($card->html))
                                <div>
                                    <pre class="text-content short-text" id="myInput_{{ $card->id }}">{{ $card->html }}</pre>
                                    <div>
                                        <button onclick="myFunction()" href="#" class="read-more"
                                            id="myBtn">Read more</button>
                                            <h5  style="float:right;">Added By: {!! $card->users->name !!}</h5>
                                    </div>
                                @else
                                    <pre>No Data Found </pre>
                            @endif
                        </div>
                        <hr>
                        <h5>Css Code <button type="button" id="copy-btn" style="float:right;"
                                onclick="myCssCopyFunction({{ $card->id }})">Copy text</button><span
                                id="Cssmsg_{{ $card->id }}" style="color:green;"></h5>
                        @if (!empty($card->css))
                            <div>
                                <pre class="text-content short-text " id="myCssInput_{{ $card->id }}">{{ $card->css }}</pre>
                                <div>
                                    <button onclick="myFunction()" href="#" class="read-more"
                                        id="myBtn">Read more</button>
                                        <h5  style="float:right;">Added By: {!! $card->users->name !!}</h5>
                                </div>
                            @else
                                <pre>No Data Found</pre>
                        @endif
                    </div>
                    <hr>
                    <h5>Java Script Code <button type="button" id="copy-btn" style="float:right"
                            onclick="myJsCopyFunction({{ $card->id }})">Copy text</button><span
                            id="Jsmsg_{{ $card->id }}" style="color: green;"></span></h5>
                    @if (!empty($card->javascript))
                        <div>
                            <pre class="text-content short-text" id="myJsInput_{{ $card->id }}"> {{ $card->javascript }} </pre>
                            <div>
                                <button onclick="myFunction()" class="read-more" href="#"
                                    id="myBtn">Read more</button>
                                    <h5  style="float:right;">Added By: {!! $card->users->name !!}</h5>
                            </div>
                        @else
                            <pre>No Data Found</pre>
                    @endif
                </div>
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
                <h4 class="modal-title" id="largeModalLabel"><span class="title"></span></h4>
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
{{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}
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
                let title = response.title
                let htmlCode = response.html;
                let cssCode = response.css;
                let jsCode = response.javascript;
                $('.htmlCode').html(htmlCode);
                $('.cssCode').html(cssCode);
                $('.jsCode').html(jsCode);
                $('.title').html(title)
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
<script type="text/javascript">
    function myHtmlCopyFunction(id) {
        var copy = document.getElementById(`myInput_${id}`).textContent;
        var msg = document.getElementById(`msg_${id}`);
        var textArea = document.createElement('textarea');
        textArea.textContent = copy;
        document.body.append(textArea);
        textArea.select();
        document.execCommand("copy");
        msg.innerHTML = "Copied Successfull"
        setTimeout(function() {
            msg.innerHTML = ''
        }, 7000);
    }

    function myCssCopyFunction(id) {
        const copyText = document.getElementById(`myCssInput_${id}`).textContent;
        const msg = document.getElementById(`Cssmsg_${id}`);
        const textArea = document.createElement('textarea');
        textArea.textContent = copyText;
        document.body.append(textArea);
        textArea.select();
        document.execCommand("copy");
        msg.innerHTML = "Copied Successfull"
        setTimeout(function() {
            msg.innerHTML = ''
        }, 7000)
    }

    function myJsCopyFunction(id) {
        const copyText = document.getElementById(`myJsInput_${id}`).textContent;
        const msg = document.getElementById(`Jsmsg_${id}`);
        const textArea = document.createElement('textarea');
        textArea.textContent = copyText;
        document.body.append(textArea);
        textArea.select();
        document.execCommand("copy");
        msg.innerHTML = "Copied Successfull"

        setTimeout(function() {
            msg.innerHTML = ''
        }, 7000)
    }
</script>
<script type="text/javascript">
    $(".read-more").on("click", function() {
        var $link = $(this);
        var $content = $link.parent().prev("pre.text-content");
        var linkText = $link.text();
        $content.toggleClass("short-text, full-text");
        $link.text(getShowLinkText(linkText));
        return false;
    });

    function getShowLinkText(currentText) {
        var newText = '';
        if (currentText.toUpperCase() === "READ MORE") {
            newText = "Read Less";
        } else {
            newText = "Read More";
        }

        return newText;
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

button#myBtn {
    border: none;
    background: none;
    color: blue;
    padding-left: 20px;
}

.short-text {
    overflow: hidden;
    height: 12em;
}

.full-text {
    height: auto;
}

textarea {
    opacity: 0
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
