@extends('layouts.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Category Create</h2>
                </div>
                <div class="body">
                  
                    <form  method="POST" action="{{ route('categories.update', $category->id) }}"  id="form_advanced_validation">
                        @csrf
                        @method('PUT')
                        {{ method_field('PATCH') }}

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="title" value="{{ $category->title }}"  required>
                                <label class="form-label">Category / Type</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label for="categorytype" class="form-label">Select Title</label>
                            <select class="form-control show-tick" name="categorytype"  id="categorytype" required>
                                <option value="">-- Please select --</option>
                                <option value="components"  @if ($category->categorytype == 'components') selected @endif>Components</option>
                                <option value="resources"  @if ($category->categorytype == 'resources') selected @endif> Resources</option> 
                            </select>
                    </div>
                      
                        <div class="form-group form-float">
                            <label for="body" class="form-label">Description</label>
                            <textarea  name="description" class=" form-control"  required>{{ $category->description }}</textarea>
                        </div>
                        
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
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
