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
                                    <th>Role</th>
{{--                                    <th>status</th>--}}
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($user as $item)
                                    <span style="display: none">{{ $value =$item->roles->first() }}</span>
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
{{--                                        <td>{{ $value['name']}}</td>--}}

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn @if($value['name'] == 'Admin')btn-outline-success @elseif('Disabled') btn-outline-danger @else btn-outline-primary @endif">{{!empty($value['name'])?$value['name']:'Disabled'}}</button>
                                                <button type="button"
                                                        class="btn @if($value['name'] == 'Admin')btn-outline-success @elseif('Disabled') btn-outline-danger @else btn-outline-primary @endif dropdown-toggle dropdown-toggle-split"
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
                                                    <a class="dropdown-item" id="admin_{{$item->id}}" data-seq='1' href="javascript:void(0);">Admin</a>
                                                    <a class="dropdown-item" id="artist_{{$item->id}}" data-seq='2' href="javascript:void(0);">Artist</a>
                                                    <a class="dropdown-item" id="product_{{$item->id}}" data-seq='3' href="javascript:void(0);">Product</a>
                                                    <a class="dropdown-item" id="magazine_{{$item->id}}" data-seq='4' href="javascript:void(0);">Magazine</a>
                                                </div>
                                            </div>

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
            @foreach($user as $item)
            $('#admin_{{$item->id}}').on('click', function (){
                var data = $(this).data('seq');
                var user_id = ({{$item->id}});
                // alert(order_id);
                $.ajax({
                    url: '{{ route("add_role.Update_role") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"data": data,'user_id': user_id},
                    dataType: "json",
                    success: function (data) {
                        // location.reload();
                    }
                });
            });
            $('#artist_{{$item->id}}').on('click', function (){
                var data = $(this).data('seq');
                var user_id = ({{$item->id}});
                // alert(order_id);
                $.ajax({
                    url: '{{ route("add_role.Update_role") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"data": data,'user_id': user_id},
                    dataType: "json",
                    success: function (data) {
                        // location.reload();
                    }
                });
            });
            $('#product_{{$item->id}}').on('click', function (){
                var data = $(this).data('seq');
                var user_id = ({{$item->id}});
                // alert(order_id);
                $.ajax({
                    url: '{{ route("add_role.Update_role") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"data": data,'user_id': user_id},
                    dataType: "json",
                    success: function (data) {
                        // location.reload();
                    }
                });
            });
            $('#magazine_{{$item->id}}').on('click', function (){
                var data = $(this).data('seq');
                var user_id = ({{$item->id}});
                // alert(order_id);
                $.ajax({
                    url: '{{ route("add_role.Update_role") }}',
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    data: {"data": data,'user_id': user_id},
                    dataType: "json",
                    success: function (data) {
                        // location.reload();
                    }
                });
            });

            @endforeach
        </script>
    @endpush
@endsection
