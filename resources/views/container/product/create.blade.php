@extends('layouts.app')
@section('content')
    @push('artist_style')
        <link href="{{asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/select2/select2.min.css')}}">
        <link href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
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
                                    <h4>@if ($action=='INSERT') Create a new Document @else Update  Document @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('product') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST"  enctype="multipart/form-data"
                                          action="{{ route('product.update',$product->id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Category</label>
                                                            <select
                                                                class="basic form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                                                name="category_id" id="category_id">
                                                                <option >Choose Category</option>
                                                                @foreach($category as $key => $value)
                                                                    <option value="{{ $value->cat_id }}"
                                                                        {{ (!empty(old('category_id')) && old('category_id')==$value->cat_id)?'selected':'' }}
                                                                        {{ (!empty($product->cat_id) && $product->cat_id==$value->cat_id)?'selected':'' }}
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Name</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('product_name') ? ' is-invalid' : '' }}"
                                                                type="text" name="product_name"
                                                                value="{{ ((!empty($product->product_name)) ? $product->product_name :old('product_name')) }}"
                                                                placeholder="Enter Name">
                                                            @if ($errors->has('product_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('product_name') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Price</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                                type="text" name="price"
                                                                value="{{ ((!empty($product->price)) ? $product->price :old('price')) }}"
                                                                placeholder="Enter price">
                                                            @if ($errors->has('price'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('price') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Quantity</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                                                type="text" name="quantity"
                                                                value="{{ ((!empty($product->quantity)) ? $product->quantity :old('quantity')) }}"
                                                                placeholder="Enter quantity">
                                                            @if ($errors->has('quantity'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('quantity') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Video</label>
                                                            <input type="file"
                                                                   class="form-control form-control-sm {{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                                   name="video">
                                                            @if ($errors->has('video'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('video') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Detail</label>
                                                            <textarea
                                                                class="form-control form-control-sm {{ $errors->has('detail') ? ' is-invalid' : '' }}"
                                                                name="detail"
                                                                placeholder="About">
                                                                {{ ((!empty($product->detail)) ? $product->detail :old('detail')) }}
                                                            </textarea>
                                                            @if ($errors->has('detail'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('detail') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-header">
                                                            <div class="row col-md-12">
                                                                <div class="col-md-12" style="margin-top: 24px">
                                                                    <h4>Multiple Image Upload</h4>
                                                                </div>
                                                            </div>

                                                            <div class="widget-content widget-content-area">
                                                                <div class="custom-file-container" data-upload-id="mySecondImage">

                                                                    <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                    <label class="custom-file-container__custom-file" >
                                                                        <input type="file" name="files[]" class="custom-file-container__custom-file__custom-file-input" multiple
                                                                               @if($action == 'INSERT') required @endif>
                                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                    </label>
                                                                    <div class="custom-file-container__image-preview"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Create Document
                                                        @else
                                                            Update Document
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
        <script src="{{asset('assets/js/scrollspyNav.js') }}"></script>
        <script src="{{asset('plugins/select2/select2.min.js') }}"></script>
        <script src="{{asset('plugins/select2/custom-select2.js') }}"></script>
        <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
        <script>
            //Second upload
            var secondUpload = new FileUploadWithPreview('mySecondImage')

        </script>
    @endpush
@endsection