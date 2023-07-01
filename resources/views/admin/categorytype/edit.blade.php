@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>categorytype Create</h2>
                </div>
                <div class="body">
                  
                    <form  method="POST" action="{{ route('categorytype.update', $categorytype->id) }}"  id="form_advanced_validation"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{ method_field('PATCH') }}
                        <div class="form-group form-float">
                            <label for="body" class="form-label">Select Title</label>
                        <div class="col-sm-12">
                            <select class="form-control show-tick" name="category_id" required>
                                @foreach ($category as $cat)
                                <option {{ $categorytype->category_id === $cat->id ? 'selected' : '' }}
                                    value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="form-group form-float">
                            <input type="text" class="form-control" name="title" value="{{$categorytype->title}}" required>
                            <label class="form-label">Category / Title</label>
                        </div>
                        <div class="form-group form-float">
                            <label for="body" class="form-label">Description</label>
                            <textarea  name="description" class=" form-control" required>{{ $categorytype->description}}</textarea>
                        </div>
                
                        {{-- <div class="form-group form-float">
                            <label for="body" class="form-label">Attachment</label>
                                <input type="file" class="form-control" name="categorytype_img"  >
                            <img src="{{ asset('storage/' . $categorytype->categorytype_img) }}" width="80" hight="80"
                                        alt="Card Image" title="Card Image" />
                        </div> --}}
                        <div class="col-sm-12">
                            <label for="body" class="form-label">Html</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea  rows="10" name="html" class="form-control no-resize ckeditor"  required>{{ $categorytype->html }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label for="body" class="form-label">Css Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="10" name="css" class="form-control no-resize ckeditor" id="css-code " >{{ $categorytype->css  }}</textarea>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-sm-12">
                            <label for="body" class="form-label">Java Script Code</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="8" name="javascript" class="form-control no-resize ckeditor" id="css-code" >{{ $categorytype->javascript  }}</textarea>
                                </div>
                            </div>
                        </div>
                                               
                            {{-- <textarea  name="javascript" class=" ckeditor form-control" id="tinymce" required>{{ $categorytype->javascript}}</textarea> --}}
                        
                        <button class="btn btn-primary waves-effect" type="submit">Submit</button>
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
