@extends('superadmin.layouts.supermaster')
@section('content')
    <div class="block-header">
        <h2>Categorytype Table</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    {{-- <button class="btn btn-success ">Create</button> --}}
                    <h2>
                        Categorytype Tables
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
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorytype as $user)
                                    <tr>
                                        <td>{{ $user->category->title }}</td>
                                        <td>{{ $user->title }}</td>
                                         @if($user->status == 1)
                                         <td>Active</td>
                                       @else
                                         <td>Deactive</td>
                                       @endif
                                        <td>
                                            <a href="{{ route('superadmincategorytype.show', $user->id) }}"
                                                class="btn btn-success btn-sm">Validation</a>
                                        </td>
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
@endsection
