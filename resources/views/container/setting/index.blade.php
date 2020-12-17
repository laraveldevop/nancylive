@extends('layouts.app')
@section('content')
    @push('artist_style')
        <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/forms/theme-checkbox-radio.css') }}">
        <link href="{{asset('public/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css"/>
    @endpush
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">
                <div id="tableSimple" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Settings</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <form class="mb-4" method="POST" enctype="multipart/form-data" action="{{ route('setting.update',$user->id) }}">
                                    @method('PUT')
                                    @csrf
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>Download</th>
                                        <th>Product</th>
                                        <th>Magazine</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><div class="form-group">
                                                <input class="form-control form-control-sm" name="download" value="{{ ((!empty($user->download)) ? $user->download :old('download')) }}" type="text">
                                                @if ($errors->has('download'))
                                                    <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('download') }}</strong>
                                                             </span>
                                                @endif
                                            </div></td>
                                        <td><div class="form-group"><input class="form-control form-control-sm" name="product" value="{{ ((!empty($user->product)) ? $user->product :old('product')) }}" type="text"></div></td>
                                        <td><div class="form-group"><input class="form-control form-control-sm" name="magazine" value="{{ ((!empty($user->magazine)) ? $user->magazine :old('magazine')) }}" type="text"></div></td>
                                        <td class="text-center">
                                            <div class="form-group">
                                                <button class="btn btn-secondary " href="">
                                           Save
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->
@endsection
