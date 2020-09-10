@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!-- BEGIN PAGE LEVEL STYLES -->

        <link href="{{ asset('public/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
        <!-- END PAGE LEVEL STYLES -->
        <style>
            #videosList {
                max-width: 1400px;
                margin: 0 auto;
                padding: 0px 80px; }
            @media (max-width: 1250px) {
                #videosList {
                    padding: 0px 50px; } }
            @media (max-width: 900px) {
                #videosList {
                    padding: 60px 20px; } }
            #videosList .video {
                width: 50%;
                display: inline-block;
                float: left;
                position: relative;
                overflow: hidden; }
            @media (max-width: 500px) {
                #videosList .video {
                    width: 100%; } }
            #videosList .video .videoSlate {
                width: 100%;
                height: 0;
                padding: 60% 0 0 0;
                -webkit-transition: 5000ms 50ms;
                -moz-transition: 5000ms 50ms;
                transition: 5000ms 50ms; }
            #videosList .video .videoSlate:after {
                content: ' ';
                position: absolute;
                top: 0;
                left: 0;
                display: block;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.3);
                -webkit-transition: 500ms 50ms;
                -moz-transition: 500ms 50ms;
                transition: 500ms 50ms; }
            #videosList .video .videoSlate video {
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                position: absolute; }
            #videosList .video .videoListCopy {
                display: inline-block;
                text-align: center;
                width: 100%;
                z-index: 20; }

        </style>
    @endpush
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
                                                                class="form-control form-control-sm {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                                type="file" name="image"
                                                                value="">
                                                        </div>
                                                        <img src="{{ ((!empty($artist->image)) ?asset('public/storage/'. $artist->image ):old('image')) }}" width="150px" height="130px">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Upload Video</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                                type="file" name="video"
                                                                value="{{ ((!empty($artist->video)) ? $artist->video :old('video')) }}">
                                                        </div>
                                                        <div class="video">
                                                        <video class="thevideo"  width="300px" loop>
                                                            <source src="{{ ((!empty($artist->video)) ?asset('public/storage/'. $artist->video) :old('video')) }}" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                        </div>
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
                                                                        <label for="exampleFormControlInput1">Give Rate </label>
                                                                        <input id="demo_vertical" type="text" value="{{ ((!empty($artist->rate)) ? $artist->rate :old('demo_vertical')) }}" readonly name="demo_vertical">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="widget-content widget-content-area">
                                                            <div class="custom-file-container" data-upload-id="mySecondImage">
                                                                <label>Upload (Allow Multiple) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                <label class="custom-file-container__custom-file" >
                                                                    <input type="file" name="files[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                </label>
                                                                <div class="custom-file-container__image-preview" >
{{--                                                                    <div class="custom-file-container__image-multi-preview" data-upload-token="1jghnmeedlr40hknjbg4em" style="background-image: url('{{asset('public/assets/img/3.jpg')}}');">--}}
{{--                                                                         <span class="custom-file-container__image-multi-preview__single-image-clear">--}}
{{--                                                                            <span class="custom-file-container__image-multi-preview__single-image-clear__icon" data-upload-token="1jghnmeedlr40hknjbg4em">×</span>--}}
{{--                                                                         </span>--}}
{{--                                                                    </div>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 text-right">
                                                    <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                                Add Artist
                                                            @else
                                                                Update Artist
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
    @endpush
@endsection
