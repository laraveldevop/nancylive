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
                                    <h4>Send Notification</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('notification') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST"  enctype="multipart/form-data"
                                          action="{{ url('notification/sendOfferNotification') }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Title</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('title') ? ' is-invalid' : '' }}"
                                                            type="text" name="title"
                                                            placeholder="Enter Title">
                                                        @if ($errors->has('title'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('title') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Message</label>
                                                        <textarea rows="10"
                                                            class="form-control form-control-sm {{ $errors->has('message') ? ' is-invalid' : '' }}" name="message">

                                                        </textarea>
                                                        @if ($errors->has('message'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('message') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>



                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Image</label>
                                                        <input type="file"
                                                               class="form-control form-control-sm"
                                                               name="image">

                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Video</label>
                                                        <input type="file"
                                                               class="form-control form-control-sm"
                                                               name="video">

                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">External Link</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('external_link') ? ' is-invalid' : '' }}"
                                                            type="text" name="external_link"
                                                            placeholder="Enter External Link">
                                                        @if ($errors->has('external_link'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('external_link') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Send notification
                                                        @else
                                                            Update notification
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
        <script src="{{asset('plugins/select2/select2.min.js') }}"></script>
        <script src="{{asset('plugins/select2/custom-select2.js') }}"></script>
    @endpush
@endsection
