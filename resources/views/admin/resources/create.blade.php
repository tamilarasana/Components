@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>categorytype Create</h2>
                </div>
                <div class="body">

                    <form method="POST" action="{{ route('resources.store') }}" id="form_advanced_validation"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group form-float">
                            <div class="col-sm-12">
                                <label for="body" class="form-label">Select Title</label>
                                <select class="form-control show-tick" name="category_id" required>
                                    <option value="">-- Please select --</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>
                            <div class="col-sm-12">
                                <label class="form-label"> Category Type</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Title" name="category_type"
                                            required>
                                    </div>
                                </div>
                            </div>

                        <div class="col-sm-12">
                            <label for="body" class="form-label">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" name="description" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="col-sm-12">
                                <label for="body" class="form-label">Attachment</label>
                                <input type="file" class="form-control " name="resourceimg[]" multiple required>
                            </div>
                        </div>
                     

                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        <a href="{{ route('resources.index') }}" class="btn btn-danger waves-effect">cancel</a>
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
