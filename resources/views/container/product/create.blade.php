@extends('layouts.app')
@section('content')
    @push('artist_style')

        <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
        <link href="{{ asset('public/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/editors/quill/quill.snow.css') }}">


    @endpush

    <!--  BEGIN CONTENT AREA  -->
    <div id="loading"></div>
    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>@if ($action=='INSERT') Create a new Product @else Update  Product @endif</h4>
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
                                                                <option value="">Choose Category</option>
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
                                                            <label for="exampleFormControlInput1">Brand</label>
                                                            <select
                                                                class="basic form-control {{ $errors->has('brand') ? ' is-invalid' : '' }}"
                                                                name="brand" id="brand">
                                                                <option value="">Choose Brand</option>
                                                                @foreach($brand as $key => $value)
                                                                    <option value="{{ $value->id }}"
                                                                        {{ (!empty(old('brand')) && old('brand')==$value->id)?'selected':'' }}
                                                                        {{ (!empty($product->brand) && $product->brand==$value->id)?'selected':'' }}
                                                                    >{{ $value->brand_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('brand'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('brand') }}</strong>
                                                             </span>
                                                            @endif

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Sponsor</label>
                                                            <select
                                                                class="basic form-control {{ $errors->has('sponsor_id') ? ' is-invalid' : '' }}"
                                                                name="sponsor_id" id="sponsor_id">
                                                                <option value="">Choose sponsor</option>
                                                                @foreach($sponsor as $key => $value)
                                                                    <option value="{{ $value->id }}"
                                                                        {{ (!empty(old('sponsor_id')) && old('sponsor_id')==$value->id)?'selected':'' }}
                                                                        {{ (!empty($product->sponsor_id) && $product->sponsor_id==$value->id)?'selected':'' }}
                                                                    >{{ $value->sponsor_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('sponsor_id'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('sponsor_id') }}</strong>
                                                             </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Name</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('product_name') ? ' is-invalid' : '' }}"
                                                                type="text" name="product_name" id="product_name"
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Mobile</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                                                type="text" name="mobile" id="mobile"
                                                                value="{{ ((!empty($product->mobile)) ? $product->mobile :old('mobile')) }}"
                                                                placeholder="Enter mobile Number">
                                                            @if ($errors->has('mobile'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('mobile') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Video</label>
                                                            <input type="file" id="video" accept="video/mp4,video/x-m4v,video/avi,video/mpvge"
                                                                   class="form-control form-control-sm {{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                                   name="video">
                                                            @if ($errors->has('video'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('video') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                        @if ($action=='UPDATE')
                                                            <div class="video" id="preview_old_video">
                                                                <video class="thevideo" width="300px" loop>
                                                                    <source
                                                                        src="{{ ((!empty($product->video)) ?asset('public/storage/'. $product->video) :old('video')) }}"
                                                                        type="video/ogg">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Price</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                                type="text" name="price" id="price"
                                                                value="{{ ((!empty($product->price)) ? $product->price :old('price')) }}"
                                                                placeholder="Enter price">
                                                            @if ($errors->has('price'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('price') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Quantity</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('quantity') ? ' is-invalid' : '' }}"
                                                                type="text" name="quantity" id="quantity"
                                                                value="{{ ((!empty($product->quantity)) ? $product->quantity :old('quantity')) }}"
                                                                placeholder="Enter quantity">
                                                            @if ($errors->has('quantity'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('quantity') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-3" style="margin-top: 30px;">
                                                        <label>Add To Advertise</label>
                                                    </div>
                                                    <div class="col-md-3" style="margin-top: 30px;">
                                                        <span class="sub-switch">
                                                            <label class="switch s-outline s-outline-primary  mb-4 mr-2">
                                                                <input type="checkbox"
                                                                       {{ ((!empty($product->token)) ? 'checked' :old('token')) }}  name="token">
                                                                    <span class="slider round"></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="container">

                                                    <div id="basic" class="row layout-spacing layout-top-spacing">
                                                        <div class="col-lg-12">
                                                            <div class="statbox widget box box-shadow">
                                                                <div class="widget-header">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                            <h4> Detail </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content widget-content-area">
                                                                    <div class="editor-container">

                                                                    </div>
                                                                    @if ($errors->has('detail'))
                                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('detail') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <textarea hidden id="detail" name="detail">
                                                        {{ ((!empty($product->detail)) ? $product->detail :old('detail')) }}
                                                </textarea>

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
                                                                        <input type="file" name="files[]" class="custom-file-container__custom-file__custom-file-input" accept="image/png,image/jpg,image/jpeg" multiple>
                                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>

                                                                    </label>
                                                                    @if ($errors->has('files'))
                                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('files') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                    <div class="custom-file-container__image-preview"></div>
                                                                    @if($action == 'UPDATE')
                                                                        <div class="custom-file-container__image-preview_extra" id="img_load">
                                                                            @foreach($image as $value)
                                                                                <input type="hidden" value="{{$value->id}}" id="image_id_{{$value->id}}">
                                                                                <div class="custom-file-container_im"
                                                                                     style="background-image: url('{{asset('public/storage/'.$value->image)}}');">
                                                                            <span id="{{$value->id}}"
                                                                                  class="custom-file-container__image-multi">
                                                                                <span
                                                                                    class="custom-file-container__image-multi_icon">??</span>
                                                                            </span>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary" id="submit"><span>
                                                            @if ($action=='INSERT')
                                                            Create Product
                                                        @else
                                                            Update Product
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
        <script src="{{ asset('public/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
        <script src="{{ asset('public/plugins/editors/quill/quill.js') }}"></script>
        <script src="{{ asset('public/plugins/editors/quill/custom-quill.js') }}"></script>
        <script>

            // validation
            $('#product_name').on('input', function() {
                var input=$(this);
                var is_name=input.val();
                if(is_name){input.removeClass("is-invalid").addClass("is-valid");}
                else{input.removeClass("is-valid").addClass("is-invalid");}
            });
            $('#price').on('input', function() {
                var input=$(this);
                var re = /^[0-9]+$/;
                var is_email=re.test(input.val());
                if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                else{input.removeClass("is-valid").addClass("is-invalid");}
            });
            $('#quantity').on('input', function() {
                var input=$(this);
                var re = /^[0-9]+$/;
                var is_email=re.test(input.val());
                if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                else{input.removeClass("is-valid").addClass("is-invalid");}
            });
            $('#mobile').on('input', function() {
                var input=$(this);
                var re = /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/;
                var is_email=re.test(input.val());
                if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                else{input.removeClass("is-valid").addClass("is-invalid");}
            });
            $('#video').change(function (){
                $('#video').removeClass("is-invalid").addClass("is-valid");
            });

            // end-validation

            var figure = $(".video");
            var vid = $("video");

            [].forEach.call(figure, function (item) {
                item.addEventListener('mouseover', hoverVideo, false);
                item.addEventListener('mouseout', hideVideo, false);
            });

            function hoverVideo(e) {
                $('.thevideo')[0].play();
            }

            function hideVideo(e) {
                $('.thevideo')[0].pause();
            }
        </script>
        <script>
            //Second upload
            var secondUpload = new FileUploadWithPreview('mySecondImage')

        </script>
        <script>
            $('.ql-editor').keyup(function () {
                var item = $(".ql-editor").html();
                $("#detail").val(item);

            });
            $('#submit').on('click', function (){
                var spinner = $('#loading');
                spinner.show();
            });
            $('#loading').on('click', function (){
                var spinner = $('#loading');
                spinner.hide();
            });
        </script>

        @if ($action=='UPDATE')
            <script>
                var $item = $('#detail').val();
                $('.ql-editor').html($item);

                @foreach($image as $item)
                $('#{{$item->id}}').on('click',function (){

                    var img= $('input[id=image_id_{{$value->id}}]').val();

                    console.log(img);
                    $.ajax({
                        url: '{{ route("image_crop.deleteProductImage") }}',
                        type: 'post',
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        data: {"image": img},
                        dataType: "json",
                        success: function (data) {
                            location.reload();

                        },
                        complete: function (data) {

                        }
                    });
                });
                @endforeach
            </script>
        @endif


    @endpush
@endsection
