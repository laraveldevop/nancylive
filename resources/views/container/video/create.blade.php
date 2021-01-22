@extends('layouts.app')
@section('content')
    @push('video_style')

        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/forms/switches.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/editors/quill/quill.snow.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/croppie.min.css') }}">


    @endpush
    <div id="loading"></div>
    <div id="content" class="main-content">
        <div class="container">
            <div class="row layout-top-spacing">
                <div class="col-lg-12 col-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>  @if ($action=='INSERT') Create a new Video @else Update  Video @endif</h4>
                                </div>
                            </div>
                        </div>
                        @if ($action=='INSERT')
                            <form class="mb-4" method="POST" id="form" action="{{ url('video') }}"
                                  enctype="multipart/form-data">
                                @else
                                    <form class="mb-4" method="POST" id="form" enctype="multipart/form-data"
                                          action="{{ route('video.update',$video->id) }}">
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
                                                                class="basic form-control {{ $errors->has('cat_id') ? ' is-invalid' : '' }}"
                                                                name="cat_id" id="cat_id">
                                                                <option value="">--Select Option--</option>
                                                                @foreach($category as $key => $value)
                                                                    <option value="{{ $value->cat_id }}"
                                                                        {{ (!empty(old('cat_id')) && old('cat_id')==$value->cat_id)?'selected':'' }}
                                                                        {{ (!empty($video->cat_id) && $video->cat_id==$value->cat_id)?'selected':'' }}
                                                                    >{{ $value->cat_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('cat_id'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('cat_id') }}</strong>
                                                             </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Artist</label>
                                                            <select
                                                                class="basic form-control {{ $errors->has('artist_id') ? ' is-invalid' : '' }}"
                                                                name="artist_id" id="artist_id">
                                                                <option value="">--Select Artist--</option>
                                                                @foreach($artist as $key => $value)
                                                                    <option value="{{ $value->id }}"
                                                                        {{ (!empty(old('artist_id')) && old('artist_id')==$value->id)?'selected':'' }}
                                                                        {{ (!empty($video->artist_id) && $video->artist_id==$value->id)?'selected':'' }}
                                                                    >{{ $value->artist_name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('artist_id'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('artist_id') }}</strong>
                                                             </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Title</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('video_name') ? ' is-invalid' : '' }}"
                                                                type="text" name="video_name" id="video_name"
                                                                value="{{ ((!empty($video->video_name)) ? $video->video_name :old('video_name')) }}"
                                                                placeholder="Enter video Name">
                                                            @if ($errors->has('video_name'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('video_name') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Video Upload
                                                                Option</label>
                                                            <select name="video_type" id="video_type"
                                                                    class="form-control {{ $errors->has('video_type') ? ' is-invalid' : '' }}">
                                                                <option value="">Select Option</option>
                                                                <option
                                                                    value="server_url" {{ (!empty($video->url) && $video->url != null)?'selected':'' }} {{ (!empty(old('video_type')) && old('video_type')=='server_url')?'selected':'' }}>
                                                                    Server URL
                                                                </option>
                                                                <option
                                                                    value="local" {{ (!empty($video->video) && $video->video != null)?'selected':'' }} {{ (!empty(old('video_type')) && old('video_type')=='local')?'selected':'' }}>
                                                                    Browse From Computer
                                                                </option>
                                                            </select>
                                                            @if ($errors->has('video_type'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('video_type') }}</strong>
                                                             </span>
                                                            @endif

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row col-md-12">
                                                    <div class="col-md-12">
                                                        <div class="form-group" id="video_local_display">

                                                        </div>
                                                        @if ($action=='UPDATE')
                                                            <div class="video" id="preview_old_video">
                                                                <video class="thevideo" width="300px" loop>
                                                                    <source
                                                                        src="{{ ((!empty($video->video)) ?asset('public/storage/'. $video->video) :old('video')) }}"
                                                                        type="video/ogg">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            </div>
                                                        @endif
                                                        <input type="hidden" name="video_file_name" id="video_file_name"
                                                               value="{{old('video_file_name')}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Video Is Free OR
                                                                Payable</label>
                                                            <select name="price_type" id="price_type"
                                                                    class="form-control {{ $errors->has('price_type') ? ' is-invalid' : '' }}">
                                                                <option value="">Select Option</option>
                                                                <option
                                                                    value="free" @if($action=='UPDATE') {{ (empty($video->price) && $video->price == null)?'selected':'' }} @endif {{ (!empty(old('price_type')) && old('price_type')=='free')?'selected':'' }}>
                                                                    It's Free
                                                                </option>
                                                                <option
                                                                    value="payable"  {{ (!empty($video->price) && $video->price != null)?'selected':'' }}  {{ (!empty(old('price_type')) && old('price_type')=='payable')?'selected':'' }}>
                                                                    It's Payable
                                                                </option>
                                                            </select>
                                                            @if ($errors->has('price_type'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('price_type') }}</strong>
                                                             </span>
                                                            @endif

                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group" id="price">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row col-md-12">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1"> Thumbnail
                                                                Image</label>
                                                            <input
                                                                class="form-control form-control-sm {{ $errors->has('image') ? ' is-invalid' : '' }}"
                                                                type="file" name="image" id="upload_image" accept="image/png,image/jpg,image/jpeg"
                                                                value="{{ ((!empty($video->image)) ? $video->image :old('image')) }}">
                                                            @if ($errors->has('image'))
                                                                <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('image') }}</strong>
                                                             </span>
                                                            @endif
                                                        </div>
                                                        @if ($action=='UPDATE')
                                                            <img id="preview_old_image" style="height: 200px; width: 400px;"
                                                                 src="{{ ((!empty($video->image)) ? asset('public/storage/'.$video->image) :old('image')) }}">
                                                        @endif
                                                        <div  id="pre-view"  class="col-md-6" style="display: none">

                                                            <div id="image-preview">

                                                            </div>
                                                            <a class="btn btn-success crop_image">Crop & Upload Image</a>
                                                        </div>
                                                        <input type="hidden" name="image_data"   value="{{old('image_data')}}">
                                                    </div>
                                                    <div class="col-md-3" style="margin-top: 40px;">
                                                        <label>Add To Advertise</label>
                                                    </div>
                                                    <div class="col-md-3" style="margin-top: 40px;">
                                                        <span class="sub-switch">
                                                            <label
                                                                class="switch s-outline s-outline-primary  mb-4 mr-2">
                                                                <input type="checkbox"
                                                                       {{ ((!empty($video->token)) ? 'checked' :old('token')) }}  name="token">
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
                                                                            <h4> Detail </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content widget-content-area">
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
                                                        {{ ((!empty($video->detail)) ? $video->detail :old('detail')) }}
                                                </textarea>

                                            </div>

                                            <div class="col-xl-12 text-right">
                                                <button type="submit" id="insert" class="btn btn-primary"><span>
                                                            @if ($action=='INSERT')
                                                            Add Video
                                                        @else
                                                            Update Video
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

    @push('video_script')
        <script src="{{ asset('public/js/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('public/js/additional-methods.min.js')}}"></script>
        <script>
            $('#insert').on('click', function (){
                var spinner = $('#loading');
                spinner.show();
            });

            $('#price_type').change(function () {
                var type = $("#price_type").val();

                if (type === "payable") {
                    $("#price").html('<label for="exampleFormControlInput1">Price</label>\n' +
                        '                                                        <input\n' +
                        '                                                            class="form-control form-control-sm {{ $errors->has('price') ? ' is-invalid' : '' }}"\n' +
                        '                                                            type="text" id="price" name="price" \n' +
                        '                                                            value="{{ ((!empty($video->price)) ? $video->price :old('price')) }}"\n' +
                        '                                                            placeholder="Enter Your Price">\n' +
                        '                                                        @if ($errors->has('price'))\n' +
                        '                                                            <span class="invalid-feedback" role="alert">\n' +
                        '                                                                  <strong >{{ $errors->first('price') }}</strong>\n' +
                        '                                                             </span>\n' +
                        '                                                        @endif')
                } else {
                    $("#price").html('');
                }
            });

            $("#price_type").trigger('change');
            $("#video_type").change(function () {

                var type = $("#video_type").val();

                if (type === "local") {

                    $("#video_local_display").html(' <label for="exampleFormControlInput1">Add Video</label>\n' +
                        '                                                            <input\n' +
                        '                                                                class="form-control form-control-sm {{ $errors->has('video') ? ' is-invalid' : '' }}"\n' +
                        '                                                                type="file" name="video" id="video" accept="video/mp4,video/x-m4v,video/avi,video/mpvge" onchange="handleFileSelect(event)" \n' +
                        '                                                                value="{{ ((!empty($video->video)) ? $video->video :old('video')) }}">\n' +
                        '                                                            @if ($errors->has('video'))\n' +
                        '                                                                <span class="invalid-feedback" role="alert">\n' +
                        '                                                                  <strong class="text-danger">{{ $errors->first('video') }}</strong>\n' +
                        '                                                             </span>\n' +
                        '                                                            @endif
                            <br><div class="progress br-30">\n' +
                        '                                                <div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">0%</div>\n' +
                        '                                            </div>\n' +
                        ' <div class="msg"></div><br> <a class="btn btn-success video_submit">Upload</a>');
                } else {
                    $('#video_file_name').val('');
                    $('#video_local_display').html(' <label for="exampleFormControlInput1">Video URL</label>\n' +
                        '                                                            <input\n' +
                        '                                                                class="form-control form-control-sm {{ $errors->has('url') ? ' is-invalid' : '' }}"\n' +
                        '                                                                type="text" name="url" id="url" required placeholder="Enter Video URL"\n' +
                        '                                                                value="{{ ((!empty($video->url)) ? $video->url :old('url')) }}">\n' +
                        '                                                            @if ($errors->has('url'))\n' +
                        '                                                                <span class="invalid-feedback" role="alert">\n' +
                        '                                                                  <strong>{{ $errors->first('url') }}</strong>\n' +
                        '                                                             </span>\n' +
                        '                                                            @endif');
                }


            });
            $("#video_type").trigger('change');
        </script>
        <script type="text/javascript">
            function handleFileSelect(evt) {
                var files = evt.target.files; // FileList object
                $('#insert').attr("disabled", true);

            }
        </script>
        <script src="{{ asset('public/plugins/select2/select2.min.js') }}"></script>
        <script src="{{ asset('public/plugins/select2/custom-select2.js') }}"></script>
        <script>

            // validation
            $('#video_name').on('input', function() {
                var input=$(this);
                var is_name=input.val();
                if(is_name){input.removeClass("is-invalid").addClass("is-valid");}
                else{input.removeClass("is-valid").addClass("is-invalid");}
            });


            $('#url').on('input', function() {
                var input=$(this);
                var re = /^(http(s)?:\/\/)?((w){3}.)?youtu(be|.be)?(\.com)?\/.+/;
                var is_email=re.test(input.val());
                if(is_email){input.removeClass("is-invalid").addClass("is-valid");}
                else{input.removeClass("is-valid").addClass("is-invalid");}
            });


            $('#video').change(function (){
                $('#video').removeClass("is-invalid").addClass("is-valid");
            });
            $('#upload_image').change(function (){
                $('#upload_image').removeClass("is-invalid").addClass("is-valid");
            });

            // end-validation


            var figure = $(".video");
            var vid = $("video");

            [].forEach.call(figure, function (item) {
                item.addEventListener('mouseover', hoverVideo, false);
                item.addEventListener('mouseout', hideVideo, false);
            });

            function hoverVideo(e) {
                $('.thevideo')[0].play();
            }

            function hideVideo(e) {
                $('.thevideo')[0].pause();
            }
        </script>
        <script>
            @if ($action == 'INSERT')
            $(document).ready(function () {
                $('#form').validate({

                    rules: {
                        video: {

                            required: true,
                            extension: "mp4|mov|ogg|webm|qt"

                        },
                    },
                    messages: {
                        video: {
                            required: "<span class='text-danger'>Please provide a video file</span>",
                            extension: "<span class='text-danger'>only video file allowed</span>"

                        },
                    },

                });
            });
            @endif
            $(document).on('click','.video_submit',function(e) {
                    $('#insert').attr("disabled", false);
                    $('.progress-bar').css('width', '0');
                    $('.msg').text('');
                    var video_local = $('#video_local').val();
                    var fileInput = document.getElementById('video');
                    var filePath = fileInput.value;
                    var allowedExtensions = /(\.mp4)$/i;
                    if (!allowedExtensions.exec(filePath)) {
                        alert('Please upload file having video only.');
                        fileInput.value = '';
                        return;
                    }
                    var formData = new FormData();
                    formData.append('video_local', $('#video')[0].files[0])
                    $('.video_submit').css("pointer-events", 'none',"cursor",'default');
                    $('.msg').text('Uploading in progress...');
                    $.ajax({
                        url: '{{ url('/videoDownload') }}',
                        data: formData,
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        // this part is progress bar
                        xhr: function () {
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function (evt) {
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    percentComplete = parseInt(percentComplete * 100);
                                    $('.progress-bar').text(percentComplete + '%');
                                    $('.progress-bar').css('width', percentComplete + '%');
                                }
                            }, false);
                            return xhr;
                        },
                        success: function (data) {
                            alert('Upload successfully..');
                            $('#video_file_name').val(data);
                            $('.msg').text("File uploaded successfully!!");

                        },
                        error: function () {
                            alert('Something is Problem in Updating');
                        },
                    });
                });

        </script>
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
        <script src="{{ asset('public/js/croppie.js') }}"></script>
        <script type="text/javascript">

            $(document).ready(function () {

                $('#upload_image').on('change', function (){
                    $('#pre-view').css('display','');
                    $('#preview_old_image').css('display','none');
                });

                $('#video').on('change', function (){
                    $('#preview_old_video').css('display','none');
                });

                $image_crop = $('#image-preview').croppie({
                    enableExif: true,
                    viewport: {
                        width: 400,
                        height: 200,
                        type: 'landscape'
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

                $('.crop_image').on('click',function (event) {
                    var spinner = $('#loading');
                    spinner.show();
                    $image_crop.croppie('result', {
                        type: 'canvas',
                        size: 'original'
                    }).then(function (response) {
                        var token = $('meta[name="csrf-token"]').attr('content');
                        $.ajax({
                            url: '{{ route("image_crop.uploadVideo") }}',
                            type: 'post',
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                            data: {"image": response, _token: token},
                            dataType: "json",
                            success: function (data) {
                                $('input[name=image_data]').val(data.path);
                                $('#pre-view').css('display','none');
                                spinner.hide();
                            }
                        });
                    });
                });

            });
        </script>
    @endpush
@endsection

