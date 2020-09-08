@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->

        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/select2/select2.min.css')}}">
        <link href="{{ asset('public/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"
              type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/editors/quill/quill.snow.css') }}">

        <!--  END CUSTOM STYLE FILE  -->
    @endpush

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>@if ($action=='INSERT') Create a new Package @else Update  Package @endif</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area simple-pills">
                            <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                                <li class="nav-item dropdown ">
                                    <a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#"
                                       role="button"
                                       aria-haspopup="true" aria-expanded="false">Packages
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" id="pills-profile-tab"
                                           href="{{url('package/create')}}">Module Package</a>
                                        <a class="dropdown-item active" id="pills-profile-tab2"
                                           href="{{url('create-cat')}}">Category Package</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" href="{{url('all-package/create')}}"
                                      >All Package</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-profile2" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    @if ($action=='INSERT')
                                        <form class="mb-4" id="form" method="POST" action="{{ url('package') }}"
                                              enctype="multipart/form-data">
                                            @else
                                                <form class="mb-4" method="POST" enctype="multipart/form-data"
                                                      action="{{ route('package.update',$package->id) }}">
                                                    @method('PUT')
                                                    @endif
                                                    @csrf
                                                    <div class="widget-content widget-content-area">

                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">package
                                                                        Name</label>
                                                                    <input
                                                                        class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                                        type="text" name="name"
                                                                        value="{{ ((!empty($package->name)) ? $package->name :old('name')) }}"
                                                                        placeholder="Enter package Name">
                                                                    @if ($errors->has('name'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $errors->first('name') }}</strong>
                                                                 </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">package
                                                                        Price</label>
                                                                    <input
                                                                        class="form-control form-control-sm {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                                                        type="text" name="price"
                                                                        value="{{ ((!empty($package->price)) ? $package->price :old('price')) }}"
                                                                        placeholder="Enter package price">
                                                                    @if ($errors->has('price'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $errors->first('price') }}</strong>
                                                                 </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Content
                                                                        Count</label>
                                                                    <input
                                                                        class="form-control form-control-sm {{ $errors->has('content_count') ? ' is-invalid' : '' }}"
                                                                        type="number" name="content_count"
                                                                        value="{{ ((!empty($package->content_count)) ? $package->content_count :old('content_count')) }}"
                                                                        placeholder="Enter Content Count">
                                                                    @if ($errors->has('content_count'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $errors->first('content_count') }}</strong>
                                                                 </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10" id="cat" >
                                                                <div class="form-group">
                                                                    <label
                                                                        for="exampleFormControlInput1">category</label>
                                                                    <select required
                                                                        class="basic form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"
                                                                        name="category_id" id="category_id">
                                                                        <option value="">--Choose Option--</option>
                                                                        @foreach($category as $key => $value)
                                                                            <option value="{{ $value->cat_id }}"
                                                                                {{ (!empty(old('category_id')) && old('category_id')==$value->cat_id)?'selected':'' }}
                                                                                {{ (!empty($package->category_id) && $package->category_id==$value->cat_id)?'selected':'' }}
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
                                                            <div class="col-md-10">
                                                                <div class="row col-md-12">
                                                                    <label for="exampleFormControlInput1">Select Time Duration method</label>

                                                                </div>
                                                                <div class="row col-md-12">
                                                                    <div class="n-chk">
                                                                        <label class="new-control new-radio new-radio-text radio-classic-info">
                                                                            <input type="radio" id="day"  value="day" class="new-control-input" name="custom-radio-4">
                                                                            <span class="new-control-indicator"></span><span class="new-radio-content">Day</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="n-chk">
                                                                        <label class="new-control new-radio new-radio-text radio-classic-info">
                                                                            <input type="radio" id="month" value="month" class="new-control-input" name="custom-radio-4">
                                                                            <span class="new-control-indicator"></span><span class="new-radio-content">Month</span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="n-chk">
                                                                        <label class="new-control new-radio new-radio-text radio-classic-info">
                                                                            <input type="radio" id="year" value="year" class="new-control-input" name="custom-radio-4">
                                                                            <span class="new-control-indicator"></span><span class="new-radio-content">Year</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Count Duration</label>
                                                                    <input
                                                                        class="form-control form-control-sm {{ $errors->has('count_duration') ? ' is-invalid' : '' }}"
                                                                        type="number" name="count_duration" readonly id="count_duration"
                                                                        value="{{ ((!empty($package->count_duration)) ? $package->count_duration :old('count_duration')) }}"
                                                                        placeholder="Enter Content Count">
                                                                    @if ($errors->has('count_duration'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $errors->first('count_duration') }}</strong>
                                                                 </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="container" id="package_module">

                                                                <div id="basic"
                                                                     class="row layout-spacing layout-top-spacing">
                                                                    <div class="col-lg-12">
                                                                        <div class="statbox widget box box-shadow">
                                                                            <div class="widget-header">
                                                                                <div class="row">
                                                                                    <div
                                                                                        class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                                                        <h4> Detail </h4>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="widget-content widget-content-area">
                                                                                <div class="editor-container">

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
                                                        {{ ((!empty($package->detail)) ? $package->detail :old('detail')) }}
                                                </textarea>
                                                        </div>

                                                        <div class="col-xl-12 text-right">
                                                            <button class="btn btn-primary">
                                                                <span>
                                                                @if ($action=='INSERT')
                                                                        Create package
                                                                    @else
                                                                        Update package
                                                                    @endif
                                                                </span>
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
        <script>
            $('input[type=radio][name=custom-radio-4]').change(function() {
                $('#count_duration').attr('readonly',false);
            });
        </script>
    @endpush

@endsection
