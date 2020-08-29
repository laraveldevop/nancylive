@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}">
        <!-- END PAGE LEVEL STYLES -->
    @endpush
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
                                                                type="text" name="sponsor_name"
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
                                                                type="text" name="about"
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
                                                                type="email" name="email"
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
                                                                type="tel" name="phone"
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
                                                                class="form-control form-control-sm {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                                type="file" name="image"
                                                                value="{{ ((!empty($sponsor->image)) ? $sponsor->image :old('image')) }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Upload Video</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('video') ? ' is-invalid' : '' }}"
                                                                type="file" name="video"
                                                                value="{{ ((!empty($sponsor->video)) ? $sponsor->video :old('video')) }}">
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
                                                                type="text" name="firm_address"
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
                                                                type="text" name="facebook"
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
                                                                type="text" name="instagram"
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
                                                                type="text" name="youtube"
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
                                                                        <input type="file" name="files[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                    </label>
                                                                    <div class="custom-file-container__image-preview"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 text-right">
                                                        <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                                    Add Sponsor
                                                                @else
                                                                    Update Sponsor
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
        <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
        <script src="{{ asset('plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
        <script>
            //Second upload
            var secondUpload = new FileUploadWithPreview('mySecondImage')

        </script>
        <script src="{{ asset('plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap-touchspin/custom-bootstrap-touchspin.js') }}"></script>
    @endpush
@endsection
