@extends('layouts.app')
@section('content')

    @push('artist_style')
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/select2/select2.min.css') }}">
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
                                    <h4>@if ($action=='INSERT') Create a new Role @else Update  Role @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('sub-role') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST"
                                          action="{{ route('sub-role.update',$subRole->role_id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">

                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">Role</label>
                                                        <select name="role[]" class="form-control tagging {{ $errors->has('role') ? ' is-invalid' : '' }}" multiple="multiple">
                                                        </select>
                                                        @if ($errors->has('role'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('role') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>


                                            </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Create Role
                                                        @else
                                                            Update Role
                                                        @endif</span>
                                                </button>

                                            </div>
                                        </div>
                                    </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('artist_script')
        <script src="{{ asset('public/assets/js/scrollspyNav.js') }}"></script>

        <script src="{{ asset('public/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('public/plugins/select2/custom-select2.js') }}"></script>
    @endpush

@endsection
