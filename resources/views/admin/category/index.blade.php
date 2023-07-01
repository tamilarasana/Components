@extends('layouts.master')
@section('content')
    <div class="block-header">
        <h2>Card Table</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <a href="{{ route('categories.create') }}" class="btn btn-success  pull-right"
                           style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">
                            Create
                </a>
                    {{-- <button class="btn btn-success ">Create</button> --}}
                    <h2>
                        Card  Tables
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>Name</th>                          
                                    <th>Category Type</th>                          
                                    <th>Description</th>                          
                                    <th>Action</th>                          
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $user)
                                <tr>
                                    <td>{{ $user->title }}</td>
                                    <td>{{ $user->categorytype }}</td>
                                    <td>{{ Str::limit($user->description, 30) }}<td>                                        <form action="{{ route('categories.destroy', $user->id) }}" method="POST">
                                        <a href="{{ route('categories.edit', $user->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm  btn-danger">Delete</button>
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
<style>
    .dataTables_wrapper .dt-buttons {
    float: left;
    display: none;
}
</style>