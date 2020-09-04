@extends('layouts.app')
@section('content')
    @push('artist_style')
        <link href="{{ asset('public/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/forms/switches.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/editors/quill/quill.snow.css') }}">


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
                                    <h4>@if ($action=='INSERT') Create a new Document @else Update  Document @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('pdf') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST"  enctype="multipart/form-data"
                                          action="{{ route('pdf.update',$pdf->id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Category</label>
                                                            <select
                                                                class="basic form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                                                name="category_id" id="category_id">
                                                                <option >Choose Category</option>
                                                                @foreach($category as $key => $value)
                                                                    <option value="{{ $value->cat_id }}"
                                                                        {{ (!empty(old('category_id')) && old('category_id')==$value->cat_id)?'selected':'' }}
                                                                        {{ (!empty($pdf->cat_id) && $pdf->cat_id==$value->cat_id)?'selected':'' }}
                                                                    >{{ $value->cat_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('category_id'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('category_id') }}</strong>
                                                             </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Name</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('pdf_name') ? ' is-invalid' : '' }}"
                                                                type="text" name="pdf_name"
                                                                value="{{ ((!empty($pdf->pdf_name)) ? $pdf->pdf_name :old('pdf_name')) }}"
                                                                placeholder="Enter Name">
                                                            @if ($errors->has('pdf_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('pdf_name') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Price</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                                type="text" name="price"
                                                                value="{{ ((!empty($pdf->price)) ? $pdf->price :old('price')) }}"
                                                                placeholder="Enter price">
                                                            @if ($errors->has('price'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('price') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Attach File</label>
                                                            <input type="file"
                                                                   class="form-control form-control-sm {{ $errors->has('file') ? ' is-invalid' : '' }}"
                                                                   name="file">
                                                            @if ($errors->has('file'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('file') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="margin-top: 45px;">
                                                        <label>Add To Advertise</label>
                                                    </div>
                                                    <div class="col-md-2" style="margin-top: 45px;">
                                                        <span class="sub-switch">
                                                            <label class="switch s-outline s-outline-primary  mb-4 mr-2">
                                                                <input type="checkbox"
                                                                       {{ ((!empty($pdf->token)) ? 'checked' :old('token')) }}  name="token">
                                                                    <span class="slider round"></span>
                                                            </label>
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="container">

                                                    <div id="basic" class="row layout-spacing layout-top-spacing">
                                                        <div class="col-lg-12">
                                                            <div class="statbox widget box box-shadow">
                                                                <div class="widget-header">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                            <h4> Basic </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content widget-content-area">
                                                                    <div id="editor-container">

                                                                    </div>
                                                                    @if ($errors->has('detail'))
                                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('detail') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <textarea hidden id="detail" name="detail">
                                                        {{ ((!empty($pdf->detail)) ? $pdf->detail :old('detail')) }}
                                                </textarea>


                                            </div>


                                            <div class="col-xl-12 text-right">
                                                <button class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Create Document
                                                        @else
                                                            Update Document
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
        <script src="{{ asset('public/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('public/plugins/select2/custom-select2.js') }}"></script>
        <script src="{{ asset('public/plugins/editors/quill/quill.js') }}"></script>
        <script src="{{ asset('public/plugins/editors/quill/custom-quill.js') }}"></script>
        <script>
            $('.ql-editor').keyup(function () {
                var item = $(".ql-editor").html();
                $("#detail").val(item);

            });

        </script>
        @if ($action=='UPDATE')
            <script>
                var $item = $('#detail').val();
                $('.ql-editor').html($item);
            </script>
        @endif
    @endpush
@endsection
