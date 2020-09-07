@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{ asset('public/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
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
                                    <h4>@if ($action=='INSERT') Create a new Package @else Update  Package @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('package') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST"  enctype="multipart/form-data"
                                          action="{{ route('package.update',$package->id) }}">
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
                                                            name="module_id" id="module_id">
                                                            <option value="">--Choose Option--</option>
                                                            @foreach($module as $key => $value)
                                                                <option value="{{ $value->id }}"
                                                                    {{ (!empty(old('module_id')) && old('module_id')==$value->id)?'selected':'' }}
                                                                    {{ (!empty($package->module_id) && $package->module_id==$value->id)?'selected':'' }}
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
                                                        <label for="exampleFormControlInput1">package Name</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                            type="text" name="name"
                                                            value="{{ ((!empty($package->name)) ? $package->name :old('name')) }}"
                                                            placeholder="Enter package Name">
                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('name') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">package Price</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                            type="text" name="price"
                                                            value="{{ ((!empty($package->price)) ? $package->price :old('price')) }}"
                                                            placeholder="Enter package price">
                                                        @if ($errors->has('price'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('price') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">category</label>
                                                        <select
                                                            class="basic form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                                            name="category_id" id="category_id">
                                                            <option value="">--Choose Option--</option>
                                                            @foreach($category as $key => $value)
                                                                <option value="{{ $value->cat_id }}"
                                                                    {{ (!empty(old('category_id')) && old('category_id')==$value->cat_id)?'selected':'' }}
                                                                    {{ (!empty($package->category_id) && $package->category_id==$value->cat_id)?'selected':'' }}
                                                                >{{ $value->cat_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('category_id'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('category_id') }}</strong>
                                                             </span>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Content Count</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('content_count') ? ' is-invalid' : '' }}"
                                                            type="number" name="content_count"
                                                            value="{{ ((!empty($package->content_count)) ? $package->content_count :old('content_count')) }}"
                                                            placeholder="Enter Content Count">
                                                        @if ($errors->has('content_count'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('content_count') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Create package
                                                        @else
                                                            Update package
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
