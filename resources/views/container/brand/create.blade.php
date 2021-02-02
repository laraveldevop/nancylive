@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->

        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{ asset('public/css/croppie.min.css') }}">

        <!--  END CUSTOM STYLE FILE  -->
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
                                                            type="text" name="brand_name" id="brand_name"
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
                                                        <label for="exampleFormControlInput1">mobile</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                                            type="text" name="mobile" id="mobile"
                                                            value="{{ ((!empty($brand->mobile)) ? $brand->mobile :old('mobile')) }}"
                                                            placeholder="Enter mobile Number">
                                                        @if ($errors->has('mobile'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('mobile') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">brand Image</label>
                                                        <input type="file" id="upload_image" accept="image/png,image/jpg,image/jpeg"
                                                               class="form-control form-control-sm {{ $errors->has('image_data') ? ' is-invalid' : '' }}"
                                                               name="image">
                                                        @if ($errors->has('image_data'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('image_data') }}</strong>
                                                             </span>
                                                        @endif
                                                        @if ($errors->has('image'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('image_data') }}</strong>
                                                             </span>
                                                        @endif

                                                    </div>
                                                    @if ($action=='UPDATE')
                                                        <img id="preview_old_image" style="height: 200px; width: 200px;"
                                                             src="{{ ((!empty($brand->image)) ? asset('public/storage/'.$brand->image) :old('image')) }}">
                                                    @endif
                                                    <div  id="pre-view"  class="col-md-6" style="display: none">

                                                        <div id="image-preview">

                                                        </div>
                                                        <a class="btn btn-success crop_image">Crop & Upload Image</a>
                                                    </div>
                                                    <input type="hidden" name="image_data"   value="{{old('image_data')}}">

                                                </div>
                                            </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary" id="submit"><span>
                                                            @if ($action=='INSERT')
                                                            Add brand
                                                        @else
                                                            Update brand
                                                        @endif</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('artist_script')
        <script src="{{ asset('public/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('public/plugins/select2/custom-select2.js') }}"></script>
        <script src="{{ asset('public/js/croppie.js') }}"></script>
        <script type="text/javascript">

            $(document).ready(function () {

                // validation
                $('#brand_name').on('input', function() {
                    var input=$(this);
                    var is_name=input.val();
                    if(is_name){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#upload_image').change(function (){
                    $('#upload_image').removeClass("is-invalid").addClass("is-valid");
                });

                $('#submit').on('click', function (){
                    var spinner = $('#loading');
                    spinner.show();
                });

                $('#upload_image').on('change', function (){
                    $('#pre-view').css('display','');
                    $('#preview_old_image').css('display','none');
                });


                $image_crop = $('#image-preview').croppie({
                    enableExif: true,
                    viewport: {
                        width: 400,
                        height: 400,
                        type: 'square'
                    },
                    boundary: {
                        width: 500,
                        height: 500
                    }
                });

                $('#upload_image').change(function () {
                    var reader = new FileReader();

                    reader.onload = function (event) {
                        $image_crop.croppie('bind', {
                            url: event.target.result
                        }).then(function () {
                            console.log('jQuery bind complete');
                        });
                    }
                    reader.readAsDataURL(this.files[0]);
                });

                $('.crop_image').click(function (event) {
                    var spinner = $('#loading');
                    spinner.show();
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: 'original'
                    }).then(function (response) {
                        var token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '{{ route("image_crop.uploadBrand") }}',
                            type: 'post',
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                            data: {"image": response, _token: token},
                            dataType: "json",
                            success: function (data) {
                                $('input[name=image_data]').val(data.path);
                                $('#pre-view').css('display','none');
                                spinner.hide();
                            }
                        });
                    });
                });

            });
        </script>
    @endpush
@endsection
