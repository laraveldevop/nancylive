@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!-- BEGIN PAGE LEVEL STYLES -->

        <link href="{{ asset('public/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
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
                                    <h4>@if ($action=='INSERT') Add a new Sponsor @else Update  Sponsor @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('sponsor') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST" enctype="multipart/form-data"
                                          action="{{ route('sponsor.update',$sponsor->id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">sponsor</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('sponsor_name') ? ' is-invalid' : '' }}"
                                                                type="text" name="sponsor_name" id="name"
                                                                value="{{ ((!empty($sponsor->sponsor_name)) ? $sponsor->sponsor_name :old('sponsor_name')) }}"
                                                                placeholder="Enter sponsor Name">
                                                            @if ($errors->has('sponsor_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('sponsor_name') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">About</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('about') ? ' is-invalid' : '' }}"
                                                                type="text" name="about" id="about"
                                                                value="{{ ((!empty($sponsor->about)) ? $sponsor->about :old('about')) }}"
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
                                                                type="email" name="email" id="email"
                                                                value="{{ ((!empty($sponsor->email)) ? $sponsor->email :old('email')) }}"
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
                                                                type="tel" name="phone" id="phone"
                                                                value="{{ ((!empty($sponsor->phone)) ? $sponsor->phone :old('phone')) }}"
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
                                                            <label for="exampleFormControlInput1">sponsor Image</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('image_data') ? ' is-invalid' : '' }}"
                                                                type="file" name="image" id="upload_image" accept="image/png,image/jpg,image/jpeg"
                                                                value="{{ ((!empty($sponsor->image)) ? $sponsor->image :old('image')) }}">
                                                            @if ($errors->has('image_data'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('image_data') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                        @if ($action=='UPDATE')
                                                            <img id="preview_old_image" style="height: 200px; width: 200px;"
                                                                 src="{{ ((!empty($sponsor->image)) ? asset('public/storage/'.$sponsor->image) :old('image')) }}">
                                                        @endif
                                                        <div  id="pre-view"  class="col-md-6" style="display: none">

                                                            <div id="image-preview">

                                                            </div>
                                                            <a class="btn btn-success crop_image">Crop & Upload Image</a>
                                                        </div>
                                                        <input type="hidden" name="image_data"   value="{{old('image_data')}}">

                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Upload Video</label>
                                                            <input id="video"
                                                                class="form-control form-control-sm {{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                                type="file" name="video" accept="video/mp4,video/x-m4v,video/avi,video/mpvge"
                                                                value="{{ ((!empty($sponsor->video)) ? $sponsor->video :old('video')) }}">
                                                        </div>
                                                        @if ($action=='UPDATE')
                                                            <div class="video" id="preview_old_video">
                                                                <video class="thevideo" width="300px" loop>
                                                                    <source
                                                                        src="{{ ((!empty($sponsor->video)) ?asset('public/storage/'. $sponsor->video) :old('video')) }}"
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
                                                                type="text" name="city" id="city"
                                                                value="{{ ((!empty($sponsor->city)) ? $sponsor->city :old('city')) }}"
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
                                                                type="text" name="firm_address" id="address"
                                                                value="{{ ((!empty($sponsor->firm_address)) ? $sponsor->firm_address :old('firm_address')) }}"
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
                                                                type="text" name="facebook" id="fb"
                                                                value="{{ ((!empty($sponsor->facebook)) ? $sponsor->facebook :old('facebook')) }}"
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
                                                                type="text" name="instagram" id="insta"
                                                                value="{{ ((!empty($sponsor->instagram)) ? $sponsor->instagram :old('instagram')) }}"
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
                                                                type="text" name="youtube" id="yt"
                                                                value="{{ ((!empty($sponsor->youtube)) ? $sponsor->youtube :old('youtube')) }}"
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
                                                            </div>
                                                            <div class="widget-content widget-content-area">
                                                                <div class="custom-file-container" data-upload-id="mySecondImage">
                                                                    <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                    <label class="custom-file-container__custom-file" >
                                                                        <input type="file" name="files[]" accept="image/png,image/jpg,image/jpeg" class="custom-file-container__custom-file__custom-file-input" multiple>
                                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                    </label>
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
                                                </div>
                                                    <div class="col-xl-12 text-right">
                                                        <button class="btn btn-primary" id="submit"><span>
                                                            @if ($action=='INSERT')
                                                                    Add Sponsor
                                                                @else
                                                                    Update Sponsor
                                                                @endif</span>
                                                        </button>

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

                // validation
                $('#name').on('input', function() {
                    var input=$(this);
                    var is_name=input.val();
                    if(is_name){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#about').on('input', function() {
                    var input=$(this);
                    var is_name=input.val();
                    if(is_name){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#city').on('input', function() {
                    var input=$(this);
                    var is_name=input.val();
                    if(is_name){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#address').on('input', function() {
                    var input=$(this);
                    var is_name=input.val();
                    if(is_name){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#email').on('input', function() {
                    var input=$(this);
                    var re = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    var is_email=re.test(input.val());
                    if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#phone').on('input', function() {
                    var input=$(this);
                    var re = /^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/;
                    var is_email=re.test(input.val());
                    if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#fb').on('input', function() {
                    var input=$(this);
                    var re = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
                    var is_email=re.test(input.val());
                    if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#insta').on('input', function() {
                    var input=$(this);
                    var re = /^(https?:\/\/)?(www\.)?instagram.com\/[a-zA-Z0-9(\.\?)?]/;
                    var is_email=re.test(input.val());
                    if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });
                $('#yt').on('input', function() {
                    var input=$(this);
                    var re = /^(http(s)?:\/\/)?((w){3}.)?youtu(be|.be)?(\.com)?\/.+/;
                    var is_email=re.test(input.val());
                    if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                    else{input.removeClass("is-valid").addClass("is-invalid");}
                });

                $('#video').change(function (){
                    $('#video').removeClass("is-invalid").addClass("is-valid");
                });
                $('#upload_image').change(function (){
                    $('#upload_image').removeClass("is-invalid").addClass("is-valid");
                });

                // end-validation

                $('#submit').on('click', function (){
                    var spinner = $('#loading');
                    spinner.show();
                });
                $('#upload_image').on('change', function (){
                    $('#pre-view').css('display','');
                    $('#preview_old_image').css('display','none');
                });

                $('#video').on('change', function (){
                    $('#preview_old_video').css('display','none');
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
                    var spinner = $('#loading');
                    spinner.show();
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: 'original'
                    }).then(function (response) {
                        var token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '{{ route("image_crop.uploadSponsor") }}',
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

            @if($action == 'UPDATE')
            @foreach($image as $item)
            $('#{{$item->id}}').on('click',function (){

                var img= $('input[id=image_id_{{$value->id}}]').val();

                console.log(img);
                $.ajax({
                    url: '{{ route("image_crop.deleteSponsorImage") }}',
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
