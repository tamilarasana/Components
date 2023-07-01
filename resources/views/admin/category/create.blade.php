@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Category Create</h2>
                </div>
                <div class="body">
                    <form  method="POST" action="{{ route('categories.store') }}"  id="form_advanced_validation" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <label for="title" class="form-label">Category / Title</label>
                            <div class="form-line">
                                <input type="text"  id="title" class="form-control" name="title" required>
                            </div>
                        </div>
                        <div class="form-group form-float">
                                <label for="categorytype" class="form-label">Select Title</label>
                                <select class="form-control show-tick" name="categorytype"  id="categorytype" required>
                                    <option value="">-- Please select --</option>
                                    <option value="components">Components</option>
                                    <option value="resources">Resources</option> 
                                </select>
                        </div>
                        <div class="form-group form-float">
                            <label for="description" class="form-label">Description</label>
                            <div class="form-line">
                                <textarea  name="description" id="description" class=" form-control" required></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">Submit</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-danger waves-effect">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .bootstrap-select .dropdown-toggle:focus {
            outline: none !important;
            outline: none !important;
            outline-offset: -2px;
        }
    </style>
@endsection
