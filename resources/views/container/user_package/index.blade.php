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
                                    <th>User </th>
                                    <th>Mobile</th>
                                    <th>Package Name</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($userPackage as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <img alt="avatar" class="img-fluid rounded-circle" src="{{ asset(!empty($item->image)?'public/storage/'.$item->image:'')}}">
                                                </div>
                                                <p class="align-self-center mb-0 admin-name"> {{$item->u_name}} </p>
                                            </div>
                                        </td>
                                        <td>{{$item->mobile}}</td>
                                        <td>{{$item->name}}</td>
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


    @endpush
@endsection
