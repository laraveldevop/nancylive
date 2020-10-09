@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->

        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/select2/select2.min.css')}}">
        <link href="{{ asset('public/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"
              type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/editors/quill/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/croppie.min.css') }}">

        <!--  END CUSTOM STYLE FILE  -->
    @endpush
    <div id="loading"></div>
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
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" href="{{url('package/create')}}">Module Package</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" href="{{ url('cat-package/create') }}">Category Package</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-contact-tab" href="{{url('all-package/create')}}">All Package</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                     aria-labelledby="pills-profile-tab">
                                    @if ($action=='INSERT')
                                        <form class="mb-4" id="form" method="POST" action="{{ url('all-package') }}"
                                              enctype="multipart/form-data">
                                            @else
                                                <form class="mb-4" method="POST" enctype="multipart/form-data"
                                                      action="{{ route('all-package.update',$allPackage->id) }}">
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
                                                                        value="{{ ((!empty($allPackage->name)) ? $allPackage->name :old('name')) }}"
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
                                                                        value="{{ ((!empty($allPackage->price)) ? $allPackage->price :old('price')) }}"
                                                                        placeholder="Enter package price">
                                                                    @if ($errors->has('price'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $errors->first('price') }}</strong>
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
                                                                        <input type="radio" id="day"
                                                                               {{ old('custom-radio-4')=="day" ? 'checked' : '' }}
                                                                               {{ (!empty($allPackage->time_method) && $allPackage->time_method=='day')?'checked':'' }}
                                                                               value="day" class="new-control-input" name="custom-radio-4">
                                                                        <span class="new-control-indicator"></span><span class="new-radio-content">Day</span>
                                                                    </label>
                                                                </div>
                                                                <div class="n-chk">
                                                                    <label class="new-control new-radio new-radio-text radio-classic-info">
                                                                        <input type="radio" id="month"
                                                                               {{ old('custom-radio-4')=="month" ? 'checked' : '' }}
                                                                               {{ (!empty($allPackage->time_method) && $allPackage->time_method=='month')?'checked':'' }}
                                                                               value="month" class="new-control-input" name="custom-radio-4">
                                                                        <span class="new-control-indicator"></span><span class="new-radio-content">Month</span>
                                                                    </label>
                                                                </div>
                                                                <div class="n-chk">
                                                                    <label class="new-control new-radio new-radio-text radio-classic-info">
                                                                        <input type="radio" id="year"
                                                                               {{ old('custom-radio-4')=="year" ? 'checked' : '' }}
                                                                               {{ (!empty($allPackage->time_method) && $allPackage->time_method=='year')?'checked':'' }}
                                                                               value="year" class="new-control-input" name="custom-radio-4">
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
                                                                        value="{{ ((!empty($allPackage->count_duration)) ? $allPackage->count_duration :old('count_duration')) }}"
                                                                        placeholder="Enter Day Or Month Or Year Count">
                                                                    @if ($errors->has('count_duration'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                      <strong>{{ $errors->first('count_duration') }}</strong>
                                                                 </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Package Image</label>
                                                                    <input type="file" id="upload_image"
                                                                           class="form-control form-control-sm"
                                                                           name="image">

                                                                    @if ($errors->has('image'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('image') }}</strong>
                                                             </span>
                                                                    @endif
                                                                </div>
                                                                @if ($action=='UPDATE')
                                                                    <img id="preview_old_image" style="height: 200px; width: 400px;"
                                                                         src="{{ ((!empty($allPackage->image)) ? asset('public/storage/'.$allPackage->image) :old('image')) }}">
                                                                @endif
                                                                <div  id="pre-view"  class="col-md-6" style="display: none">

                                                                    <div id="image-preview">

                                                                    </div>
                                                                    <a class="btn btn-success crop_image">Crop & Upload Image</a>
                                                                </div>
                                                                <input type="hidden" name="image_data"   value="{{old('image_data')}}">

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
                                                        {{ ((!empty($allPackage->detail)) ? $allPackage->detail :old('detail')) }}
                                                </textarea>
                                                        </div>

                                                        <div class="col-xl-12 text-right">
                                                            <button class="btn btn-primary" id="submit">
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
        <script src="{{ asset('public/js/croppie.js') }}"></script>

        <script>
            $('#submit').on('click', function (){
                var spinner = $('#loading');
                spinner.show();
            });
            $('.ql-editor').keyup(function () {
                var item = $(".ql-editor").html();
                $("#detail").val(item);
            });
        </script>

            <script>
                var $item = $('#detail').val();
                $('.ql-editor').html($item);

            </script>

        <script>
            $('input[type=radio][name=custom-radio-4]').change(function() {
                $('#count_duration').attr('readonly',false);
            });
        </script>
        <script type="text/javascript">

            $(document).ready(function () {

                $('#upload_image').on('change', function (){
                    $('#pre-view').css('display','');
                    $('#preview_old_image').css('display','none');
                });


                $image_crop = $('#image-preview').croppie({
                    enableExif: true,
                    viewport: {
                        width: 400,
                        height: 200,
                        type: 'square'
                    },
                    boundary: {
                        width: 400,
                        height: 400
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
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: 'original'
                    }).then(function (response) {
                        var token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '{{ route("image_crop.uploadPackage") }}',
                            type: 'post',
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                            data: {"image": response, _token: token},
                            dataType: "json",
                            success: function (data) {
                                $('input[name=image_data]').val(data.path);
                                $('#pre-view').css('display','none');
                            }
                        });
                    });
                });

            });
        </script>
    @endpush

@endsection
