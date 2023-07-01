@extends('superadmin.layouts.supermaster')
@section('content')
    <div class="block-header">
        <h2>Resources Table</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Resources Tables</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Category</th>                          
                                    <th>Category Type</th>                          
                                    <th>Status</th>
                                    <th>Description</th>                          
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resource as $user)
                                <tr>
                                    <td>{{ $user->category->title }}</td>
                                    <td>{{ $user->category_type }}</td>
                                      @if($user->status == 1)
                                         <td>Active</td>
                                       @else
                                         <td>Deactive</td>
                                       @endif
                                    <td>{{ Str::limit($user->description, 10) }}</td> 
                                  
                                    <td>                                    
                                        <form  method="POST">
                                        <a href="{{ route('superadminresources.edit', $user->id) }}" class="btn btn-info btn-sm">Show</a>
                                            @csrf
                                        </form>
                                    </td>                       
                                    {{-- <td><a href="{{ route(' superadminresources.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a></td> --}}
                                    <!--<td> <input data-id="{{$user->id}}" class="toggle-class onChange" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}></td>-->
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
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.onChange').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0; 
                var id= $(this).attr("data-id");
                console.log(status);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: "{{ route('changeResourceStatus') }}" + '/' + id,
                    data: {'status': status, 'id': id},
                    success: function(data){
                      console.log(data.success)
                    }
                });
            });
        });
    </script>
@endsection

<style>
    .dataTables_wrapper .dt-buttons {
    float: left;
    display: none;
}
</style>
