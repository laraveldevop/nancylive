@extends('layouts.app')
@section('content')

    @push('artist_style')
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/table/datatable/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/table/datatable/dt-global_style.css') }}">
        <link href="{{ asset('public/assets/css/elements/miscellaneous.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/assets/css/users/user-profile.css') }}" rel="stylesheet" type="text/css" />


    @endpush

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        @if(session()->has('delete'))
            <div class="col-md-10">
                <div  class="alert alert-outline-danger mt-lg-2 mb-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                    <strong>{{ session()->get('delete') }}</strong>
                </div>
            </div>
        @endif
        @if(session()->has('message'))
            <div class="col-md-10">
                <div  class="alert alert-outline-primary mt-lg-2 mb-4" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            </div>
        @endif
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                    <div class="widget-content widget-content-area br-6">
                        <div
                            class="col-xl-12 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center align-self-center">
                            <div class="d-flex justify-content-sm-end justify-content-center">
                                <a href="{{ url('product/create') }}" class="btn btn-light-warning">
                                    <svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-user-plus">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                    </svg>
                                </a>

                                <div class="switch align-self-center">

                                </div>
                            </div>


                        </div>
                        <div class="table-responsive mb-4 mt-4">

                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Product Name</th>
                                    <th>Brand Name</th>
                                    <th>Price</th>
                                    <th>Action</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($product as $item)
                                    <span hidden>{{$product_im=\App\ProductImage::where('product_id',$item->id)->first()}}</span>

                                    <tr>
                                        <td class="text-center">
                                            <span><img style="height: 50px; width: 50px" src="{{ asset(!empty($product_im->image)?'public/storage/'.$product_im->image:'assets/img/profile-9.jpg')}}" class="rounded-circle profile-img" alt="avatar"></span>
                                        </td>
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->brand_name}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            <div class="action-btn">
                                                <a title="edit" href="{{ url('product/'.$item->id. '/edit')}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-edit-2 edit">
                                                        <path
                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                    </svg>
                                                </a>

                                                <button title="delete" type="button" class="btn btn-dark  rounded-circle" data-toggle="modal" data-target="#standardModal" >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                         height="24"
                                                         viewBox="0 0 24 24" fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round"
                                                         class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </button>
                                                <span class="sub-switch">
                                            <label class="switch s-outline s-outline-primary">
                                                <input class="searchType" type="checkbox"
                                                       {{ ($item->token == 0)? '':  'checked' }}  name="token"
                                                       id="{{$item->id}}" value="{{ $item->token}}">
                                                <span class="slider round"></span>
                                            </label>
                                            </span>
                                                <a
                                                    class="btn btn-sm btn-outline-primary rounded-circle-vertical-pills-icon"
                                                    data-toggle="modal" data-target=".model_{{$item->id}}">
                                                    <b>View</b>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!! $product->render() !!}

                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Modal -->

    <div class="modal fade modal-notification" id="standardModal" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" id="standardModalLabel">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="icon-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                    </div>
                    <p class="modal-text">Are You Sure!</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Not Sure</button>
                    <button type="submit" id="delete" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#loginModal">Yes</button>

                </div>
            </div>
        </div>
    </div>

    @foreach($product as $key=>$value)
        {{--Model For View--}}
        <span hidden>{{$product_im=\App\ProductImage::where('product_id',$value->id)->first()}}</span>

        <div class="modal fade model_{{$value->id}} " tabindex="-1" role="dialog"
             aria-labelledby="myExtraLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myExtraLargeModalLabel">Product Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="layout-px-spacing">

                            <div class="row layout-spacing">

                                <!-- Content -->
                                <div class="col-xl-6 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

                                    <div class="user-profile layout-spacing">
                                        <div class="widget-content widget-content-area">
                                            <div class="d-flex justify-content-between">
                                                <h3 class="">Product</h3>
                                                <a href="{{ url('product/'.$value->id. '/edit')}}" class="mt-2 edit-profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                                            </div>
                                            <div class="text-center user-info">
                                                <img  style="height: 250px; width: 250px;"  src="{{ asset(!empty($product_im->image)?'public/storage/'.$product_im->image:'assets/img/profile-9.jpg')}}" alt="avatar">
                                                <p class="">{{$value->product_name}}</p>
                                            </div>
                                            <div class="user-info-list">

                                                <div class="">
                                                    <ul class="contacts-block list-unstyled">
                                                        <li class="contacts-block__item">
                                                            <b>Brand: </b> {{$value->brand_name}}
                                                        </li>
                                                        <li class="contacts-block__item">
                                                            <b>Sponsor: </b> {{$value->sponsor_name}}
                                                        </li>
                                                        <li class="contacts-block__item">
                                                            <b>Price: </b> {{$value->price}}
                                                        </li>
                                                        <li class="contacts-block__item">
                                                            <b>Quantity: </b> {{$value->quantity}}
                                                        </li>

                                                        <li class="contacts-block__item">
                                                            <b>Mobile: </b> {{$value->mobile}}
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
                                    <div class="bio layout-spacing ">
                                        <div class="widget-content widget-content-area">
                                            <h3 class="">Detail</h3>
                                            {!! $value->detail !!}

                                        <div class="video" id="preview_old_video">
                                            <video class="thevideo" width="300px" loop>
                                                <source
                                                    src="{{ ((!empty($value->video)) ?asset('public/storage/'. $value->video) :old('video')) }}"
                                                    type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    </div>
                </div>
            </div>
        </div>

        {{--End Model For View--}}

        <!-- Modal -->
        <div class="modal fade login-modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header" id="loginModalLabel">
                        <h4 class="modal-title">Give me Password!</h4>
                    </div>
                    <div class="modal-body">
                        <form class="mt-0" action="{{ route('product.destroy',$value->id) }}" method="post" >
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input name="password" type="password" class="form-control mb-4 "   placeholder="Password">
                            </div>

                            <button type="submit"  class="btn btn-primary mt-2 mb-2 btn-block">OK</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    @endforeach
    {{-- End Model --}}

    <!--  END CONTENT AREA  -->
    @push('artist_script')

        <script>

            $('.searchType').on('change', function () {
                // alert($(this).attr('id'));
                var id = $(this).attr('id');
                var val = $(this).val();
                // alert(val);
                $.ajax({
                    type: "POST",
                    url: '{{ url('/product_ads') }}',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"id": id, 'val': val},
                    success: function (data) {
                        if ($('#' + id).val() == 1) {
                            // alert('not');
                            $('#' + id).val(0);

                        } else {
                            // alert('else');
                            $('#' + id).val(1);
                        }
                        alert('Update Successfully')
                    },
                    error: function () {
                        alert('Something is Problem in Updating');
                    },
                    complete: function () {
                        // alert('it completed');
                    }
                });
            });
        </script>
        <script src="{{ asset('public/plugins/table/datatable/datatables.js') }}"></script>
        <script>
            $('#zero-config').DataTable({
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7
            });

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

    @endpush
@endsection
