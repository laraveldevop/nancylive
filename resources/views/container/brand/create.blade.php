@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
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
                                    <h4>@if ($action=='INSERT') Create a new Brand @else Update  Brand @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('brand') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST"  enctype="multipart/form-data"
                                          action="{{ route('brand.update',$brand->id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">brand</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('brand_name') ? ' is-invalid' : '' }}"
                                                            type="text" name="brand_name"
                                                            value="{{ ((!empty($brand->brand_name)) ? $brand->brand_name :old('brand_name')) }}"
                                                            placeholder="Enter brand Name">
                                                        @if ($errors->has('brand_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('brand_name') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">brand Image</label>
                                                        <input type="file"
                                                               class="form-control form-control-sm"
                                                               name="image">

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Add brand
                                                        @else
                                                            Update brand
                                                        @endif</span>
                                                </button>

                                            </div>
                                        </div>

                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    @push('artist_script')
        <script src="{{asset('plugins/select2/select2.min.js') }}"></script>
        <script src="{{asset('plugins/select2/custom-select2.js') }}"></script>
    @endpush
@endsection
