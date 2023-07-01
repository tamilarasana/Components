@extends('superadmin.layouts.supermaster')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Category Create</h2>
                </div>
                <div class="body">
                        <div class="form-group form-float">
                            <div class="col-sm-12">
                                <h5 > Title</h5>
                                <p >{{ ($category->title) }}</p>

                            </div>
                        </div>
                        <br><br>
                        <div class="col-sm-12">
                            <h5> Category Type</h5>
                                <p >{{ ($category->categorytype	) }}</p>
                            </div>

                        <div class="col-sm-12">
                            <h5>Description</h5>
                            <div class="form-group">
                                <div class="form-line">
                                    <p rows="4" name="description" class="form-control no-resize" placeholder="Please type what you want...">{{ $category->description }}</p>
                                </div>
                            </div>
                        </div>

                        <label for="title" class="form-label">Active/InActive</label>
                        <div class="form-group form-float">
                           <!--<div class="form-line">-->
                                <input data-id="{{$category->id}}" class="toggle-class onChange" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $category->status ? 'checked' : '' }}>
                           <!--</div>-->
                       </div>
                    

                        <a href="{{ route('superadmincategories.index') }}" class="btn btn-danger waves-effect">cancel</a>
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
                    url: "{{ route('changeCategoryStatus') }}" + '/' + id,
                    data: {'status': status, 'id': id},
                    success: function(data){
                      console.log(data.success)
                    }
                });
            });
        });
    </script>
@endsection
