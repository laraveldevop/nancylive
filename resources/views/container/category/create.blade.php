@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->
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
                                    <h4>@if ($action=='INSERT') Create a new Category @else Update  Category @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('category') }}" id="myform"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST" enctype="multipart/form-data"
                                          action="{{ route('category.update',$category->cat_id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="col-md-10" style="margin-left: 50px">
                                                    <div class="row col-md-12">
                                                        @foreach($module as $key => $value)
                                                            <div class="n-chk">
                                                                <label
                                                                    class="new-control new-radio new-radio-text radio-classic-info">
                                                                    <input type="radio" id="{{ $value->module_name }}"
                                                                           value="{{ $value->id }}"
                                                                           class="new-control-input"
                                                                           {{ (!empty(old('module_id')) && old('module_id')==$value->id)?'checked':'' }}
                                                                           {{ (!empty($category->module_id) && $category->module_id==$value->id)?'checked':'' }}
                                                                           name="module_id">
                                                                    <span
                                                                        class="new-control-indicator"></span><span
                                                                        class="new-radio-content">{{ $value->module_name }} Category</span>
                                                                </label>
                                                            </div>
                                                        @endforeach
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
                                                        <input type="file" id="upload_image" disabled
                                                               class="form-control form-control-sm {{ $errors->has('image_data') ? ' is-invalid' : '' }}" accept="image/png,image/jpg,image/jpeg"
                                                               name="cat_image">
                                                        <input type="hidden" name="image_data"
                                                               value="{{old('image_data')}}">
                                                        @if ($errors->has('image_data'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('image_data') }}</strong>
                                                             </span>
                                                        @endif

                                                    </div>

                                                    @if ($action=='UPDATE')

                                                        <img id="preview_old_image" style="height: 200px; width: 400px;"
                                                             src="{{ ((!empty($category->cat_image)) ? asset('public/storage/'.$category->cat_image) :old('cat_image')) }}">

                                                    @endif
                                                    <div id="pre-view" class="col-md-6" style="display: none">

                                                        <div id="image-preview">

                                                        </div>
                                                        <a class="btn btn-success crop_image">Crop & Upload Image</a>
                                                    </div>


                                                </div>
                                            </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary" id="submit"><span>
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
        <script src="{{ asset('public/js/croppie.js') }}"></script>
        <script type="text/javascript">

            $(document).ready(function () {



                $('#submit').on('click', function (){
                    var spinner = $('#loading');
                    spinner.show();
                });

                $('#upload_image').on('change', function () {
                    $('#pre-view').css('display', '');
                    $('#preview_old_image').css('display', 'none');
                });
                $("input[name=module_id]:radio").on('click',function () {
                    $('#upload_image').removeAttr('disabled')
                    if ($('input[id=video]:checked').val() == "1") {
                        $image_crop = $('#image-preview').croppie({
                            enableExif: true,
                            viewport: {
                                width: 400,
                                height: 200,
                                type: 'landscape'
                            },
                            boundary: {
                                width: 400,
                                height: 400
                            }
                        });
                    }
                    else {
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
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: 'original'
                    }).then(function (response) {
                        var token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '{{ route("image_crop.uploadCategory") }}',
                            type: 'post',
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                            data: {"image": response, _token: token},
                            dataType: "json",
                            success: function (data) {
                                $('input[name=image_data]').val(data.path);
                                $('#pre-view').css('display', 'none');
                            }
                        });
                    });
                });

            });
        </script>
    @endpush
@endsection
