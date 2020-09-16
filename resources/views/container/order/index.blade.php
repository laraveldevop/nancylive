@extends('layouts.app')
@section('content')

    @push('artist_style')
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/table/datatable/datatables.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/plugins/table/datatable/dt-global_style.css') }}">
        <link href="{{ asset('public/assets/css/elements/miscellaneous.css') }}" rel="stylesheet" type="text/css"/>

    @endpush

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>date</th>
                                    <th>status</th>
                                    <th class="no-content">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($order as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn @if($item->status == 'pending')btn-outline-danger @elseif($item->status == 'shipping') btn-outline-primary @else btn-outline-success @endif">{{$item->status}}</button>
                                                <button type="button"
                                                        class="btn @if($item->status == 'pending')btn-outline-danger @elseif($item->status == 'shipping') btn-outline-primary @else btn-outline-success @endif dropdown-toggle dropdown-toggle-split"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                         class="feather feather-chevron-down">
                                                        <polyline points="6 9 12 15 18 9"></polyline>
                                                    </svg>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" id="pending_{{$item->id}}" data-seq='pending' href="javascript:void(0);">Pending</a>
                                                    <a class="dropdown-item" id="shipping_{{$item->id}}" data-seq='shipping' href="javascript:void(0);">Shipping</a>
                                                    <a class="dropdown-item" id="complete_{{$item->id}}" data-seq='complete' href="javascript:void(0);">Complete</a>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <a
                                                    class="btn btn-sm btn-outline-secondary rounded-circle-vertical-pills-icon"
                                                    data-toggle="modal" data-target=".model_{{$item->user_id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-eye">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                                <b>View</b>
                                            </a>
                                        </td>
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
    @foreach($order as $item)
    <div class="modal fade model_{{$item->user_id}}" tabindex="-1" role="dialog"
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
                                <th>Product Name</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <span hidden>{{$tot = 0}}</span>
                            @foreach($products as $value)
                                @if($value->user_id == $item->user_id)
                                    <tr>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->business_name}}</td>
                                        <td>{{$value->mobile}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->address}}</td>
                                        <td>{{$value->city}}</td>
                                        <td>{{$value->product_name}}</td>
                                        <td>{{$value->total}}</td>

                                    </tr>
                                    <span hidden>{{$tot +=$value->total}}</span>
                                @endif
                            @endforeach

                            <tr>
                                <td colspan="7">total</td>
                                <td>{{$tot}}</td>
                            </tr>
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
    @endforeach


    <!--  END CONTENT AREA  -->
    @push('artist_script')

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
        </script>

        <script>
            @foreach($order as $item)
            $('#pending_{{$item->id}}').on('click', function (){
                var data = $(this).data('seq');
                var user_id = ({{$item->user_id}});
                // alert(order_id);
                $.ajax({
                    url: '{{ route("add_status.Update_status") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"data": data,'user_id': user_id},
                    dataType: "json",
                    success: function (data) {
                        location.reload();
                    }
                });
            });
            $('#shipping_{{$item->id}}').on('click', function (){
                var data = $(this).data('seq');
                var user_id = ({{$item->user_id}});
                // alert(order_id);
                $.ajax({
                    url: '{{ route("add_status.Update_status") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"data": data,'user_id': user_id},
                    dataType: "json",
                    success: function (data) {
                        location.reload();
                    }
                });
            });
            $('#complete_{{$item->id}}').on('click', function (){
                var data = $(this).data('seq');
                var user_id = ({{$item->user_id}});
                // alert(order_id);
                $.ajax({
                    url: '{{ route("add_status.Update_status") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"data": data,'user_id': user_id},
                    dataType: "json",
                    success: function (data) {
                        location.reload();
                    }
                });
            });

            @endforeach
        </script>
    @endpush
@endsection
