@extends('layouts.app')


@section('content')
    @push('artist_style')
        <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/forms/theme-checkbox-radio.css') }}">
        <link href="{{ asset('public/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('public/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"
              type="text/css"/>
    @endpush
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
        <div class="widget-content widget-content-area simple-pills">
            <ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" href="{{url('package')}}">Module Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" href="{{url('cat-package')}}">Category Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" id="pills-contact-tab" href="{{url('all-package')}}">All Package</a>
                </li>


            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                     aria-labelledby="pills-profile-tab">
                    <div class="layout-px-spacing">
                        <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                            <div class="col-lg-12">
                                <div class="widget-content searchable-container list">

                                    <div class="row">
                                        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                                            <form class="form-inline my-2 my-lg-0">
                                                <div class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                    <input type="text" class="form-control product-search" id="input-search" placeholder="Search Contacts...">
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                                            <div class="d-flex justify-content-sm-end justify-content-center">
                                                <a href="{{ url('all-package/create') }}"> <svg  id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></a>

                                                <div class="switch align-self-center">

                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="searchable-items grid">
                                        <div class="items items-header-section">
                                            <div class="item-content">
                                                <div class="">
                                                    <div class="n-chk align-self-center text-center">
                                                        <label class="new-control new-checkbox checkbox-primary">
                                                            <input type="checkbox" class="new-control-input" id="contact-check-all">
                                                            <span class="new-control-indicator"></span>
                                                        </label>
                                                    </div>
                                                    <h4>package Image</h4>
                                                </div>
                                                <div class="user-email">
                                                    <h4>Name</h4>
                                                </div>
                                                <div class="user-email">
                                                    <h4>Module </h4>
                                                </div>


                                                <div class="action-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($package as $key=>$value)
                                            <div class="items">
                                                <div class="item-content" >
                                                    <div class="user-profile">
                                                        <div class="n-chk align-self-center text-center">
                                                            <label class="new-control new-checkbox checkbox-primary">
                                                                <input type="checkbox" class="new-control-input contact-chkbox">
                                                                <span class="new-control-indicator"></span>
                                                            </label>
                                                        </div>
                                                        <img width="100px"  src="{{ asset(!empty($value->image)?'public/storage/'.$value->image:'public/assets/img/squer_placeholder.png')}}" alt="avatar">

                                                    </div>
                                                    <div class="user-email">
                                                        <p class="info-title">package Name: </p>
                                                        <p class="usr-email-addr"
                                                           data-email="{{ $value->name }}">{{ $value->name }}</p>
                                                    </div>
                                                    <div class="user-email">
                                                        <p class="info-title">Module: </p>
                                                        <p class="usr-email-addr"
                                                           data-email="{{ $value->price }}">{{ $value->price }}</p>
                                                    </div>


                                                    <div class="action-btn">
                                                        <a href="{{ url('all-package/'.$value->id. '/edit')}}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>

                                                        <button type="button" class="btn btn-dark  rounded-circle" data-toggle="modal" data-target="#standardModal_{{$value->id}}" >
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
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                {!! $package->render() !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    @foreach($package as $key=>$value)

        <!-- Modal -->
    <div class="modal fade modal-notification" id="standardModal_{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="standardModalLabel" aria-hidden="true">
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
                    <button type="submit" id="delete" class="btn btn-primary" data-toggle="modal" data-dismiss="modal" data-target="#loginModal{{$value->id}}">Yes</button>

                </div>
            </div>
        </div>
    </div>


        <!-- Modal -->
        <div class="modal fade login-modal" id="loginModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header" id="loginModalLabel">
                        <h4 class="modal-title">Give me Password!</h4>
                    </div>
                    <div class="modal-body">
                        <form class="mt-0" action="{{ route('all-package.destroy',$value->id) }}" method="post" >
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
    <!--  END CONTENT AREA  -->
    @push('artist_script')
        <script src="{{ asset('public/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('public/assets/js/apps/contact.js') }}"></script>
    @endpush
@endsection
