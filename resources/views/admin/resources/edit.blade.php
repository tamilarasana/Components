@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>categorytype Create</h2>
                </div>
                <div class="body">

                    <form  action="{{ route('resources.update', $resource->id) }}" method="post" id="form_advanced_validation"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- {{ method_field('PATCH') }} --}}
                        <div class="form-group form-float">
                            <div class="col-sm-12">
                                <label for="body" class="form-label">Select Title</label>
                                <select class="form-control show-tick" name="category_id" required>
                                    @foreach ($category as $cat)
                                         <option {{ $resource->category_id === $cat->id ? 'selected' : '' }}
                                            value="{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-sm-12">
                            <label class="form-label"> Category Type</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Title" name="category_type" value="{{ ($resource->category_type) }}"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <label for="body" class="form-label">Description</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" name="description" class="form-control no-resize" placeholder="Please type what you want...">{{ $resource->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="col-sm-12">
                                <label for="body" class="form-label">Attachment</label>
                                <input type="file" class="form-control " name="resourceimg[]" multiple required>
                                @foreach ( $resource->images as $image)
                               
                                <img  src="{{ asset('storage/'.$image->resourceimg) }}" class="img-fluid img-thumbnail" alt="Image">&nbsp;
                                @endforeach

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
