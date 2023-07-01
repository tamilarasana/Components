@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>categorytype Create</h2>
                </div>
                <div class="body">

                    <form method="POST" action="{{ route('categorytype.store') }}" id="form_advanced_validation"
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
                            <label class="form-label"> Title</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Title" name="title"
                                        required>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group form-float">
                                <label class="form-label"> Title</label>
                                <input type="text" class="form-control form-line" name="title" required>
                        </div> --}}
                        <div class="col-sm-12">
                            <label for="body" class="form-label">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" name="description" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group form-float">
                            <div class="col-sm-12">
                                <label for="body" class="form-label">Attachment</label>
                                <input type="file" class="form-control " name="categorytype_img" required>
                            </div>
                        </div> --}}
                        <div class="col-sm-12">
                            <label for="body" class="form-label">Html</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="10" name="html" class="ckeditor form-control no-resize" placeholder="Please type what you want..."></textarea>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group form-float">
                            <label for="body" class="form-label">Html</label>
                            <textarea  name="html" class="ckeditor form-control" id="tinymce" required></textarea>
                            <textarea  name="html"  class=" form-control form-line" required></textarea>
                        </div> --}}
                        <div class="col-sm-12">
                            <label for="body" class="form-label">Css</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="10" name="css" class="form-control no-resize ckeditor" placeholder="Please type what you want..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label for="body" class="form-label">Java Script</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="10" name="javascript" class="form-control no-resize ckeditor" placeholder="Please type what you want..."></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        <a href="{{ route('categorytype.index') }}" class="btn btn-danger waves-effect">cancel</a>
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
