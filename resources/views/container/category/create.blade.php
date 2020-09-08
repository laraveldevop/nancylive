@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->

        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/select2/select2.min.css')}}">
        <!--  END CUSTOM STYLE FILE  -->
    @endpush

    <!--  BEGIN CONTENT AREA  -->

    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>@if ($action=='INSERT') Create a new Category @else Update  Category @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('category') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST"  enctype="multipart/form-data"
                                          action="{{ route('category.update',$category->cat_id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Module</label>
                                                        <select
                                                            class="basic form-control {{ $errors->has('module_id') ? ' is-invalid' : '' }}"
                                                            name="module_id" id="module_id" required>
                                                            <option value="">--Choose Option--</option>
                                                            @foreach($module as $key => $value)
                                                                <option value="{{ $value->id }}"
                                                                    {{ (!empty(old('module_id')) && old('module_id')==$value->id)?'selected':'' }}
                                                                    {{ (!empty($category->module_id) && $category->module_id==$value->id)?'selected':'' }}
                                                                >{{ $value->module_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('module_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('module_id') }}</strong>
                                                             </span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Category</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('cat_name') ? ' is-invalid' : '' }}"
                                                            type="text" name="cat_name"
                                                            value="{{ ((!empty($category->cat_name)) ? $category->cat_name :old('cat_name')) }}"
                                                            placeholder="Enter Category Name">
                                                        @if ($errors->has('cat_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('cat_name') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Category Image</label>
                                                        <input type="file"
                                                            class="form-control form-control-sm"
                                                             name="cat_image">

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Create category
                                                        @else
                                                            Update category
                                                        @endif</span>
                                                </button>

                                            </div>
                                        </div>
                                    </form>
{{--                            </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('artist_script')
        <script src="{{ asset('public/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('public/plugins/select2/custom-select2.js') }}"></script>
    @endpush
@endsection
