@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link href="{{asset('public/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('public/plugins/select2/select2.min.css')}}">
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
                                    <h4>User Profile</h4>
                                </div>
                            </div>
                        </div>
                        <form class="mb-4" method="POST" enctype="multipart/form-data" action="{{ route('users.update',$user->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="widget-content widget-content-area">

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Name</label>
                                            <input
                                                class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                type="text" name="name"
                                                value="{{ ((!empty($user->name)) ? $user->name :old('name')) }}"
                                                placeholder="Enter Name">
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('name') }}</strong>
                                                             </span>
                                            @endif
                                        </div>
                                    </div>



                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input type="text"  value="{{ ((!empty($user->email)) ? $user->email :old('email')) }}"
                                                   class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                   name="email">
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('email') }}</strong>
                                                             </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Mobile</label>
                                            <input
                                                class="form-control form-control-sm {{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                                type="text" name="mobile"  value="{{ ((!empty($user->mobile)) ? $user->mobile :old('mobile')) }}"
                                                placeholder="Enter Mobile Number">
                                            @if ($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('mobile') }}</strong>
                                                             </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Password</label>
                                            <input
                                                class="form-control form-control-sm {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                type="password" name="password"
                                                placeholder="Enter password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('password') }}</strong>
                                                             </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Confirm Password</label>
                                            <input id="password-confirm" type="password" class="form-control form-control-sm" name="password_confirmation"  autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Image</label>
                                            <input type="file" accept="image/png,image/jpg,image/jpeg"
                                                   class="form-control form-control-sm"
                                                   name="image">
                                        </div>
                                        <img id="preview_old_image" style="height: 100px; "
                                             src="{{ asset((!empty($user->image)) ? 'public/storage/'.$user->image : 'public/assets/img/boy-2.png') }}">

                                    </div>




                                </div>


                                <div class="col-xl-12 text-right">
                                    <button class="btn btn-primary">
                                        <span>Update Profile</span>
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
        <script src="{{asset('public/plugins/select2/select2.min.js') }}"></script>
        <script src="{{asset('public/plugins/select2/custom-select2.js') }}"></script>
    @endpush
@endsection
