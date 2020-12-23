@extends('layouts.app')
@section('content')

    @push('artist_style')
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/table/datatable/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/table/datatable/dt-global_style.css') }}">
        <link href="{{ asset('public/assets/css/elements/miscellaneous.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('public/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"
              type="text/css"/>
    @endpush

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">

        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="widget-content searchable-container list">
                        <div class="widget-content widget-content-area icon-pill">

                            <ul class="nav nav-pills mb-3 mt-3" id="icon-pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="icon-pills-home-tab" data-toggle="pill"
                                       href="#icon-pills-home" role="tab" aria-controls="icon-pills-home"
                                       aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-download-cloud">
                                            <polyline points="8 17 12 21 16 17"></polyline>
                                            <line x1="12" y1="12" x2="12" y2="21"></line>
                                            <path d="M20.88 18.09A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.29"></path>
                                        </svg>
                                        Download</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="icon-pills-home-tab" data-toggle="pill"
                                       href="#icon-pills-history" role="tab" aria-controls="icon-pills-home"
                                       aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>
                                        History</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="icon-pills-tabContent">
                                <div class="tab-pane fade show active" id="icon-pills-home" role="tabpanel"
                                     aria-labelledby="icon-pills-home-tab">
                                    <div class="layout-px-spacing">

                                        <div class="row layout-top-spacing">

                                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                <div class="widget-content widget-content-area br-6">
                                                    <div class="table-responsive mb-4 mt-4">
                                                        <table id="zero-config" class="table table-hover"
                                                               style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th>User Name</th>
                                                                <th>Referral Code</th>
                                                                <th>Business Name</th>
                                                                <th>Email</th>
                                                                <th>Mobile</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>

                                                            @foreach($user as $item)
                                                                <tr>
                                                                    <td>{{$item->name}}</td>
                                                                    <td>{{$item->referral_code}}</td>
                                                                    <td>{{$item->business_name}}</td>
                                                                    <td>{{$item->email}}</td>
                                                                    <td>{{$item->mobile}}</td>
                                                                    <td>
                                                                        <a class="checkout"
                                                                           id="{{$item->referral_code}}"
                                                                           data-seq="paid"> <span
                                                                                class="badge outline-badge-info shadow-none">{{$item->status}}</span></a>
                                                                    </td>

                                                                    <td>
                                                                        <a name="{{$item->referral_code}}"
                                                                           class="btn btn-sm btn-outline-secondary rounded-circle-vertical-pills-icon model_{{$item->referral_code}}"
                                                                           data-toggle="modal"
                                                                           data-target=".open_model">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 stroke="currentColor"
                                                                                 stroke-width="2" stroke-linecap="round"
                                                                                 stroke-linejoin="round"
                                                                                 class="feather feather-eye">
                                                                                <path
                                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                                <circle cx="12" cy="12" r="3"></circle>
                                                                            </svg>
                                                                        </a></td>
                                                                </tr>

                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="icon-pills-history" role="tabpanel"
                                     aria-labelledby="icon-pills-home-tab">
                                    <div class="layout-px-spacing">

                                        <div class="row layout-top-spacing">

                                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                <div class="widget-content widget-content-area br-6">
                                                    <div class="table-responsive mb-4 mt-4">
                                                        <table id="zero-config" class="table table-hover"
                                                               style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th>User Name</th>
                                                                <th>Referral Code</th>
                                                                <th>Business Name</th>
                                                                <th>Email</th>
                                                                <th>Mobile</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($history as $item)
                                                                <tr>
                                                                    <td>{{$item->name}}</td>
                                                                    <td>{{$item->referral_code}}</td>
                                                                    <td>{{$item->business_name}}</td>
                                                                    <td>{{$item->email}}</td>
                                                                    <td>{{$item->mobile}}</td>
                                                                    <td>
                                                                        <a> <span
                                                                                class="badge outline-badge-info shadow-none">{{$item->status}}</span></a>
                                                                    </td>

                                                                    <td>
                                                                        <a name="{{$item->referral_code}}"
                                                                           class="btn btn-sm btn-outline-secondary rounded-circle-vertical-pills-icon model_history_{{$item->referral_code}}"
                                                                           data-toggle="modal"
                                                                           data-target=".open_model">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="24" height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 stroke="currentColor"
                                                                                 stroke-width="2" stroke-linecap="round"
                                                                                 stroke-linejoin="round"
                                                                                 class="feather feather-eye">
                                                                                <path
                                                                                    d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                                                <circle cx="12" cy="12" r="3"></circle>
                                                                            </svg>
                                                                        </a></td>
                                                                </tr>

                                                            @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{--    Model --}}
    <div class="modal fade open_model" tabindex="-1" role="dialog"
         aria-labelledby="myExtraLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Users Details</h5>
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-4">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Business Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Total profit</th>
                            </tr>
                            </thead>
                            <tbody id="view_data">

                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                </div>
            </div>
        </div>
    </div>

    {{--  End   Model --}}
    <!--  END CONTENT AREA  -->
    @push('artist_script')
        <script>
            $('a.checkout').on('click', function () {
                var referral_code = $(this).attr('id');
                var status = $(this).data('seq');

                $.ajax({
                    url: '{{ route("referral_code.Update_status") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"referral_code": referral_code, 'status': status},
                    dataType: "json",
                    success: function (data) {
                        location.reload();
                    }
                });
            });
        </script>
        <script>
            @foreach($user as $item)
            $('.model_{{$item->referral_code}}').on('click', function () {
                var referral_code = $(this).attr('name');
                // alert(order_id);
                $.ajax({
                    url: '{{ route("view_data.view_referral_code") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {'data': referral_code},
                    dataType: "json",
                    success: function (data) {
                        $('#view_data').html(data)
                    }
                });
            });
            @endforeach
            @foreach($history as $item)
            $('.model_history_{{$item->referral_code}}').on('click', function () {
                var referral_code = $(this).attr('name');
                // alert(order_id);
                $.ajax({
                    url: '{{ route("view_data.view_referral_history_code") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {'data': referral_code},
                    dataType: "json",
                    success: function (data) {
                        $('#view_data').html(data)
                    }
                });
            });
            @endforeach

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
                "lengthMenu": [2, 10, 20, 50],
                "pageLength": 2
            });
        </script>


    @endpush
@endsection
