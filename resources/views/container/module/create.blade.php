@extends('layouts.app')
@section('content')

    <!--  BEGIN CONTENT AREA  -->

    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>@if ($action=='INSERT') Create a new Module @else Update  Module @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('module') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST"
                                          action="{{ route('module.update',$module->id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">

                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">module</label>
                                                        <input
                                                            class="form-control form-control-sm {{ $errors->has('module_name') ? ' is-invalid' : '' }}"
                                                            type="text" name="module_name"
                                                            value="{{ ((!empty($module->module_name)) ? $module->module_name :old('module_name')) }}"
                                                            placeholder="Enter module Name">
                                                        @if ($errors->has('module_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('module_name') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>


                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label for="exampleFormControlInput1">module Detail</label>
                                                        <textarea name="detail" placeholder="About Module"
                                                                  class="form-control form-control-sm {{ $errors->has('detail') ? ' is-invalid' : '' }}">
                                                            {{ ((!empty($module->detail)) ? $module->detail :old('detail')) }}</textarea>
                                                        @if ($errors->has('module_name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('module_name') }}</strong>
                                                             </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Create module
                                                        @else
                                                            Update module
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

@endsection
