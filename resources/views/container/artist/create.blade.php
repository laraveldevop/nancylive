@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!-- BEGIN PAGE LEVEL STYLES -->

        <link href="{{ asset('public/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
              type="text/css"/>
        <link rel="stylesheet" type="text/css"
              href="{{ asset('public/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/croppie.min.css') }}">
        <!-- END PAGE LEVEL STYLES -->

    @endpush
    <div id="loading"></div>
    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>@if ($action=='INSERT') Add a new Artist @else Update  Artist @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('artist') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST" enctype="multipart/form-data"
                                          action="{{ route('artist.update',$artist->id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">artist</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('artist_name') ? ' is-invalid' : '' }}"
                                                                type="text" name="artist_name"
                                                                value="{{ ((!empty($artist->artist_name)) ? $artist->artist_name :old('artist_name')) }}"
                                                                placeholder="Enter artist Name">
                                                            @if ($errors->has('artist_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('artist_name') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">About</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('about') ? ' is-invalid' : '' }}"
                                                                type="text" name="about"
                                                                value="{{ ((!empty($artist->about)) ? $artist->about :old('about')) }}"
                                                                placeholder="Enter about">
                                                            @if ($errors->has('about'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('about') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Email</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                                type="email" name="email"
                                                                value="{{ ((!empty($artist->email)) ? $artist->email :old('email')) }}"
                                                                placeholder="Enter Email">
                                                            @if ($errors->has('email'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('email') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Phone</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                                                type="tel" name="phone"
                                                                value="{{ ((!empty($artist->phone)) ? $artist->phone :old('phone')) }}"
                                                                placeholder="Enter Phone">
                                                            @if ($errors->has('phone'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('phone') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">artist Image</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('image_data') ? ' is-invalid' : '' }}"
                                                                type="file" name="image" id="upload_image"
                                                                value="">
                                                            @if ($errors->has('image_data'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('image_data') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                        @if ($action=='UPDATE')
                                                            <img id="preview_old_image"
                                                                 src="{{ ((!empty($artist->image)) ? asset('public/storage/'.$artist->image) :old('image')) }}">
                                                        @endif
                                                        <div id="pre-view" class="col-md-6" style="display: none">

                                                            <div id="image-preview">

                                                            </div>
                                                            <a class="btn btn-success crop_image">Crop & Upload
                                                                Image</a>
                                                        </div>
                                                        <input type="hidden" name="image_data"
                                                               value="{{old('image_data')}}">

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Upload Video</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                                type="file" name="video" id="video"
                                                                value="{{ ((!empty($artist->video)) ? $artist->video :old('video')) }}">
                                                        </div>
                                                        @if ($action=='UPDATE')
                                                            <div class="video" id="preview_old_video">
                                                                <video class="thevideo" width="300px" loop>
                                                                    <source
                                                                        src="{{ ((!empty($artist->video)) ?asset('public/storage/'. $artist->video) :old('video')) }}"
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
                                                            <label for="exampleFormControlInput1">City</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                                type="text" name="city"
                                                                value="{{ ((!empty($artist->city)) ? $artist->city :old('city')) }}"
                                                                placeholder="Enter Loaction">
                                                            @if ($errors->has('city'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('city') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Firm Address</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('firm_address') ? ' is-invalid' : '' }}"
                                                                type="text" name="firm_address"
                                                                value="{{ ((!empty($artist->firm_address)) ? $artist->firm_address :old('firm_address')) }}"
                                                                placeholder="Enter Firm Address">
                                                            @if ($errors->has('firm_address'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('firm_address') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Facebook Link</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('facebook') ? ' is-invalid' : '' }}"
                                                                type="text" name="facebook"
                                                                value="{{ ((!empty($artist->facebook)) ? $artist->facebook :old('facebook')) }}"
                                                                placeholder="Enter Facebook Link">
                                                            @if ($errors->has('facebook'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('facebook') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Instagram Link</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('instagram') ? ' is-invalid' : '' }}"
                                                                type="text" name="instagram"
                                                                value="{{ ((!empty($artist->instagram)) ? $artist->instagram :old('instagram')) }}"
                                                                placeholder="Enter Instagram Link">
                                                            @if ($errors->has('instagram'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('instagram') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Youtube Link</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('youtube') ? ' is-invalid' : '' }}"
                                                                type="text" name="youtube"
                                                                value="{{ ((!empty($artist->youtube)) ? $artist->youtube :old('youtube')) }}"
                                                                placeholder="Enter Youtube Link">
                                                            @if ($errors->has('youtube'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('youtube') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
                                                    <div class="statbox widget box box-shadow">
                                                        <div class="widget-header">
                                                            <div class="row col-md-12">
                                                                <div class="col-md-6" style="margin-top: 24px">
                                                                    <h4>Multiple Image Upload</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1">Give
                                                                            Rate </label>
                                                                        <input id="demo_vertical" type="text"
                                                                               value="{{ ((!empty($artist->rate)) ? $artist->rate :old('demo_vertical')) }}"
                                                                               readonly name="demo_vertical">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="widget-content widget-content-area">
                                                                <div class="custom-file-container"
                                                                     data-upload-id="mySecondImage">
                                                                    <label>Upload (Allow Multiple) <a
                                                                            href="javascript:void(0)"
                                                                            class="custom-file-container__image-clear"
                                                                            title="Clear Image">x</a></label>
                                                                    <label class="custom-file-container__custom-file">
                                                                        <input type="file" name="files[]" id="files"
                                                                               class="custom-file-container__custom-file__custom-file-input"
                                                                               multiple>
                                                                        <span
                                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                                    </label>

                                                                    <div class="custom-file-container__image-preview">
                                                                    </div>
                                                                    @if($action == 'UPDATE')
                                                                    <div class="custom-file-container__image-preview_extra" id="img_load">
                                                                        @foreach($image as $value)
                                                                            <input type="hidden" value="{{$value->id}}" id="image_id_{{$value->id}}">
                                                                            <div class="custom-file-container_im"
                                                                                 style="background-image: url('{{asset('public/storage/'.$value->image)}}');">
                                                                            <span id="{{$value->id}}"
                                                                                  class="custom-file-container__image-multi">
                                                                                <span
                                                                                    class="custom-file-container__image-multi_icon">×</span>
                                                                            </span>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 text-right">
                                                        <button class="btn btn-primary" id="submit"><span>
                                                            @if ($action=='INSERT')
                                                                    Add Artist
                                                                @else
                                                                    Update Artist
                                                                @endif</span>
                                                        </button>

                                                    </div>
                                                </div>
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
        <script src="{{ asset('public/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
        <script>
            //Second upload
            var secondUpload = new FileUploadWithPreview('mySecondImage')

        </script>
        <script>
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
        <script src="{{ asset('public/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('public/plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js') }}"></script>
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

                $('#video').on('change', function () {
                    $('#preview_old_video').css('display', 'none');
                });

                $image_crop = $('#image-preview').croppie({
                    enableExif: true,
                    viewport: {
                        width: 200,
                        height: 200,
                        type: 'square'
                    },
                    boundary: {
                        width: 300,
                        height: 300
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

                        $.ajax({
                            url: '{{ route("image_crop.uploadArtist") }}',
                            type: 'post',
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                            data: {"image": response},
                            dataType: "json",
                            success: function (data) {
                                $('input[name=image_data]').val(data.path);
                                $('#pre-view').css('display', 'none');
                            }
                        });
                    });
                });

            });
            @if($action == 'UPDATE')
            @foreach($image as $item)
            $('#{{$item->id}}').on('click',function (){

                var img= $('input[id=image_id_{{$value->id}}]').val();

                console.log(img);
                $.ajax({
                    url: '{{ route("image_crop.deleteImage") }}',
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
            @endif
        </script>
    @endpush
@endsection
