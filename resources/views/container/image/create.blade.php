@extends('layouts.app')
@section('content')
    @push('artist_style')
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link rel="stylesheet" href="{{ asset('public/css/croppie.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/select2/select2.min.css')}}">
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
                                    <h4>@if ($action=='INSERT') Create a Image @else Update  Image @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" action="{{ url('image') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST" enctype="multipart/form-data"
                                          action="{{ route('image.update',$image->id) }}">
                                        @method('PUT')
                                        @endif
                                        @csrf
                                        <div class="widget-content widget-content-area">

                                            <div class="row">
                                                <div class="col-md-4" style="border-right:1px solid #ddd;">
                                                    <div id="image-preview"></div>
                                                </div>
                                                <div class="col-md-4"
                                                     style="padding:75px; border-right:1px solid #ddd;">
                                                    <p><label>Select Image</label></p>
                                                    <input type="file" name="upload_image" id="upload_image"/>
                                                    <br/>
                                                    <br/>
                                                    <button class="btn btn-success crop_image">Crop & Upload Image
                                                    </button>
                                                </div>
                                                {{--                                                <div class="col-md-4" style="padding:75px;background-color: #333">--}}
                                                {{--                                                    <div id="uploaded_image" align="center"></div>--}}

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
        <script src="{{ asset('public/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('public/plugins/select2/custom-select2.js') }}"></script>
        <script src="{{ asset('public/js/croppie.js') }}"></script>
        <script type="text/javascript">

            $(document).ready(function () {

                $image_crop = $('#image-preview').croppie({
                    enableExif: true,
                    viewport: {
                        width: 300,
                        height: 150,
                        type: 'square'
                    },
                    boundary: {
                        width: 300,
                        height: 300
                    }
                });
                console.log($image_crop);

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
                        var _token = $('input[name=_token]').val();
                        $.ajax({
                            url: '{{ route("image_crop.upload") }}',
                            type: 'post',
                            data: {"image": response, _token: _token},
                            dataType: "json",
                            success: function (data) {

                            }
                        });
                    });
                });

            });
        </script>
    @endpush
@endsection
