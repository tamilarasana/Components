@extends('superadmin.layouts.supermaster')
@section('content')
    <div class="block-header">
        <h2>categorytype Table</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
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
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Description</th>                          
                                    <th>Status</th>                          
                                    <th>Action</th>                          

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $user)
                                    <tr>
                                        <td>{{ $user->title }}</td>
                                        <td>{{ $user->categorytype }}</td>
                                        <td>{{ Str::limit($user->description, 10) }}</td> 
                                         @if($user->status == 1)
                                         <td>Active</td>
                                       @else
                                         <td>Deactive</td>
                                       @endif   
                                       <td>
                                        <a href="{{ route('superadmincategories.edit', $user->id) }}"
                                            class="btn btn-success btn-sm">Edit</a>
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
