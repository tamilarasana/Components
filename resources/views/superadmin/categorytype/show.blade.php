@extends('superadmin.layouts.supermaster')
@section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ $categorytype->category->title }}
                    </h2>
                </div>
                <div class="body">
                
                    <div class="col-sm-12">
                        <label for="body" class="form-label">Html Code</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="8" name="css" class="form-control no-resize"id="html-code" disabled>{!! $categorytype->html !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="body" class="form-label">Css Code</label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="5" name="css" class="form-control no-resize" id="css-code" disabled>{!! $categorytype->css !!}</textarea>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-sm-12">
                        <label for="body" class="form-label">Java Script Code</label></label>
                        <div class="form-group">
                            <div class="form-line">
                                <textarea rows="7"  class="form-control no-resize "  id="js-code" disabled>{!! $categorytype->javascript !!}</textarea>
                            </div>
                        </div>
                    </div>
                        <div >
                                <iframe name="css" width="100%" height="200%" id="output"></iframe>
                        </div>
                    
                         <label for="title" class="form-label">Active/InActive</label>
                         <div class="form-group form-float">
                            <!--<div class="form-line">-->
                                 <input data-id="{{$categorytype->id}}" class="toggle-class onChange" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $categorytype->status ? 'checked' : '' }}>
                            <!--</div>-->
                        </div>
                 
                    {{-- <div class="form-group form-float">
                        <label for="body" class="form-label">Java Script Code</label>
                        <textarea class="form-control" id="js-code">{!! $categorytype->javascript !!}</textarea>
                    </div>
                    <hr> --}}
                    
                  
                    {{-- <div class="form-group ">
                        <label  class="form-label">Out Put</label>
                        <iframe   class="form-control" id="output"></iframe>
                    </div> --}}

                    <div class="mt-4">
                        <button type="button" class="btn btn-info" id="clickbutton">Check Output</button>
                        <a href="{{ route('superadmincategorytype.index') }}" class="btn btn-danger">Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
   

    @endsection
    @section('scripts')
    
    <script type="text/javascript">
            let htmlCode = document.querySelector("#html-code");
            let cssCode = document.querySelector("#css-code");
            let jsCode = document.querySelector("#js-code");
            let output = document.querySelector("#output");
            let button = document.querySelector("#clickbutton");
            button.addEventListener("click", () => {
            localStorage.setItem('htmlCode',htmlCode.value);
		    localStorage.setItem('cssCode',cssCode.value);
		    localStorage.setItem('jsCode',jsCode.value);
		    output.contentDocument.body.innerHTML = localStorage.htmlCode+`<style>${localStorage.cssCode}</style>`;
		    output.contentWindow.eval(localStorage.jsCode);
            // console.log(output);
            })
            
    
    </script>
    
     <script>
        $(document).ready(function() {
            $('.onChange').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var id= $(this).attr("data-id");
                // var user_id = $(this).data('id');
                console.log(status);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('userChangeStatus') }}" + '/' + id,
                    data: {'status': status, 'id': id},
                    success: function(data){
                      console.log(data.success)
                    }
                });
            });
        });
    </script>
    <style>
        .dataTables_wrapper .dt-buttons {
        float: left;
        display: none;
    }
    iframe {
        width: 100%;
        height: 100%;
        border: none !important;
        outline: none !important;
    }
    </style>

    {{-- <style>
    iframe {
        width: 100%;
        height: 100%;
        border: none !important;
        outline: none !important;
        background-color: gray;
    }
</style> --}}
  
    @endsection
    
    
    
    
