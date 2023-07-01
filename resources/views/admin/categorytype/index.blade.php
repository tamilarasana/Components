@extends('layouts.master')
@section('content')
    <div class="block-header">
        <h2>categorytype Table</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="{{ route('categorytype.create') }}" class="btn btn-success  pull-right"
                        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                        Create
                    </a>
                    {{-- <button class="btn btn-success ">Create</button> --}}
                    <h2>
                        categorytype Tables
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Title</th>
                                    {{-- <th>Image</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorytype as $user)
                                    <tr>
                                        <td>{{ $user->category->title }}</td>
                                        <td>{{ $user->title }}</td>
                                        {{-- <td><img src="{{ asset('storage/' . $user->categorytype_img) }}" width="80"
                                                alt="Card Image" title="Card Image" /></td> --}}
                                        <td>
                                            <form action="{{ route('categorytype.destroy', $user->id) }}" method="POST">
                                                <a href="{{ route('categorytype.show', $user->id) }}"
                                                    class="btn btn-success btn-sm">Validation</a>
                                                <a href="{{ route('categorytype.edit', $user->id) }}"
                                                    class="btn btn-info btn-sm">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm  btn-danger">Delete</button>
                                                
                                                {{-- <a href="javascript:void(0)" class="btn btn-default btn-sm" id="showOutput" data-id="{{ $user->id }}">Validation</a> --}}
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    
@endsection
{{-- @section('scripts') --}}

{{-- <script>
	   $(document).on("click", "#showOutput", function() {
            var id = $(this).attr("data-id");
            $('#defaultModal').modal('show'); 
            // let output = document.getElementById("output");
             let url = '{{route('show.data')}}'
            $.ajax({
                url: url + '/' + id,
                type: 'Get',
                dataType: "JSON",
                data:{
                    "id":id,
                    "_token": "{{ csrf_token() }}"},
                success: function (response)
                {
                    $('.htmlCode').html('');
                    $('.cssCode').html('');
                    $('.jsCode').html('');

                    let htmlCode = response.html;
                    let cssCode =  '<style>'+response.css+'</style>';
                    let jsCode = response.javascript;
                    // let output = htmlCode+cssCode;
                   
                    $('.htmlCode').append(htmlCode);
                    $('.cssCode').append(cssCode);
                    $('.jsCode').append(jsCode);

                    // output.contentWindow.eval(jsCode);
                    
                    // console.log(output);
                }
            });   
        
      });
</script>
<script type="text/javascript">
        let htmlCode = document.querySelector("#html-code").value;
		let cssCode = document.querySelector("#css-code");
		let jsCode = document.querySelector("#js-code");
		let output = document.querySelector("#output");
		let button = document.querySelector("#clickbutton");

        button.addEventListener("click", () => {
           console.log(htmlCode);

        })

</script> --}}

{{-- <style>
    .dataTables_wrapper .dt-buttons {
        float: left;
        display: none;
    }
</style> --}}
{{-- @endsection --}}

