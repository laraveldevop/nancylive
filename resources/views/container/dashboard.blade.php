<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Nency Beauty</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('public/assets/img/nency-beauty.png') }}"/>
    <link href="{{ asset('public/assets/css/loader.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('public/assets/js/loader.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/forms/switches.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/elements/alert.css') }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('public/assets/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN Sweetest Alert Style -->
    <link href="{{ asset('public/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('public/plugins/sweetalerts/promise-polyfill.js') }}"></script>
    <link href="{{ asset('public/plugins/sweetalerts/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/sweetalerts/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/components/custom-sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- END Sweetest Alert Style -->
    <link href="{{ asset('public/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('public/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/forms/theme-checkbox-radio.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/elements/alert.css') }}">
    <style>
        .btn-light {
            border-color: transparent;
        }
    </style>

    @stack('artist_style')
    @stack('video_style')
    <style type="text/css">
        #loading {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.75) url({{asset('public/assets/img/loading.gif')}}) no-repeat center center;
            z-index: 10000;
        }
    </style>
</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="{{url('/')}}">
                    <img src="{{ asset('public/assets/img/nency-beauty.png') }}" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="{{url('/')}}" class="nav-link"> Nancy Beauty </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">

            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="{{ asset('public/assets/img/boy-2.png') }}" alt="avatar">
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="">
                        <div class="dropdown-item">
                            <a href="{{ url('users')}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                My Profile</a>
                        </div>
                        {{--                        <div class="dropdown-item">--}}
                        {{--                            <a href="apps_mailbox.html">--}}
                        {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                        {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                        {{--                                     stroke-linejoin="round" class="feather feather-inbox">--}}
                        {{--                                    <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>--}}
                        {{--                                    <path--}}
                        {{--                                        d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>--}}
                        {{--                                </svg>--}}
                        {{--                                Inbox</a>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="dropdown-item">--}}
                        {{--                            <a href="auth_lockscreen.html">--}}
                        {{--                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                        {{--                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                        {{--                                     stroke-linejoin="round" class="feather feather-lock">--}}
                        {{--                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>--}}
                        {{--                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>--}}
                        {{--                                </svg>--}}
                        {{--                                Lock Screen</a>--}}
                        {{--                        </div>--}}
                        <div class="dropdown-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                Sign Out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span>
                                    @if(request()->is('home')) Home @endif
                                    @if(request()->is('category')) Category @endif
                                    @if(request()->is('artist')) Artist @endif
                                    @if(request()->is('video')) Video @endif
                                    @if(request()->is('pdf')) Documents @endif
                                    @if(request()->is('product')) Product @endif
                                    @if(request()->is('brand')) Brand @endif
                                    @if(request()->is('notification')) Notification @endif
                                    @if(request()->is('package')) Package @endif
                                    @if(request()->is('order')) Order @endif
                                    @if(request()->is('user-package')) Customers @endif
                                    @if(request()->is('sponsor')) Sponsor @endif
                                </span></li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
        {{--        <ul class="navbar-nav flex-row ml-auto ">--}}
        {{--            <li class="nav-item more-dropdown">--}}
        {{--                <div class="dropdown  custom-dropdown-icon">--}}
        {{--                    <a class="dropdown-toggle btn" href="#" role="button" id="customDropdown" data-toggle="dropdown"--}}
        {{--                       aria-haspopup="true" aria-expanded="false"><span>Settings</span>--}}
        {{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
        {{--                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
        {{--                             class="feather feather-chevron-down">--}}
        {{--                            <polyline points="6 9 12 15 18 9"></polyline>--}}
        {{--                        </svg>--}}
        {{--                    </a>--}}

        {{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">--}}
        {{--                        <a class="dropdown-item" data-value="Settings" href="javascript:void(0);">Settings</a>--}}
        {{--                        <a class="dropdown-item" data-value="Mail" href="javascript:void(0);">Mail</a>--}}
        {{--                        <a class="dropdown-item" data-value="Print" href="javascript:void(0);">Print</a>--}}
        {{--                        <a class="dropdown-item" data-value="Download" href="javascript:void(0);">Download</a>--}}
        {{--                        <a class="dropdown-item" data-value="Share" href="javascript:void(0);">Share</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </li>--}}
        {{--        </ul>--}}
    </header>
</div>
<!--  END NAVBAR  -->
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>

            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                    <a href="{{url('home')}}" data-active="{{ ((request()->is('home')) ? 'true' : 'false') }}"
                       aria-expanded="{{ ((request()->is('home')) ? 'true' : 'false') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Dashboard</span>
                        </div>

                    </a>
                </li>
                {{--                <li class="menu">--}}
                {{--                    <a href="{{ url('module') }}" data-active="{{ ((request()->is('module')) ? 'true' : 'false') }}"--}}
                {{--                       aria-expanded="{{ ((request()->is('module')) ? 'true' : 'false') }}" class="dropdown-toggle">--}}
                {{--                        <div class="">--}}
                {{--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
                {{--                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"--}}
                {{--                                 stroke-linejoin="round" class="feather feather-box">--}}
                {{--                                <path--}}
                {{--                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>--}}
                {{--                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>--}}
                {{--                                <line x1="12" y1="22.08" x2="12" y2="12"></line>--}}
                {{--                            </svg>--}}
                {{--                            <span>Module</span>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
                @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Category'))
                    <li class="menu">
                        <a href="{{ url('category') }}" data-active="{{ ((request()->is('category')) ? 'true' : 'false') }}"
                           aria-expanded="{{ ((request()->is('category')) ? 'true' : 'false') }}" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-layers">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span>Category</span>
                            </div>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Artist'))
                    <li class="menu">
                        <a href="#dashboard"
                           data-active="{{  ((request()->is('artist')) || (request()->is('video')) ? 'true' : 'false') }}"
                           data-toggle="collapse"
                           aria-expanded="{{ ((request()->is('artist')) || (request()->is('video')) ? 'true' : 'false') }}"
                           class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-video">
                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                                </svg>
                                <span>Videos </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{  ((request()->is('artist')) || (request()->is('video')) ? 'show' : '') }}"
                            id="dashboard" data-parent="#accordionExample">

                            <li class="{{ ((request()->is('artist')) ? 'active' : '') }}">
                                <a href="{{ url('artist') }}">

                                    Artist
                                </a>
                            </li>
                            <li class="{{ ((request()->is('video')) ? 'active' : '') }}">
                                <a href="{{ url('video') }}">

                                    Video

                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Magazine'))
                    <li class="menu">
                        <a href="#app" data-toggle="collapse"
                           aria-expanded="{{ ( (request()->is('pdf')) ? 'true' : 'false') }}"
                           data-active="{{ ( (request()->is('pdf'))  ? 'true' : 'false') }}"
                           class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-book-open">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                                </svg>
                                <span>PDF</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ((request()->is('pdf'))  ? 'show' : '') }}"
                            id="app" data-parent="#accordionExample">

                            <li class="{{ ((request()->is('pdf')) ? 'active' : '') }}">
                                <a href="{{ url('pdf') }}">Document </a>
                            </li>

                        </ul>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Product'))
                    <li class="menu">
                        <a href="#elements" data-toggle="collapse"
                           aria-expanded="{{ ((request()->is('product')) || (request()->is('brand')) || (request()->is('sponsor')) ? 'true' : 'false') }}"
                           data-active="{{ ((request()->is('product')) || (request()->is('brand')) || (request()->is('sponsor')) ? 'true' : 'false') }}"
                           class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-shopping-bag">
                                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                                </svg>
                                <span>Product</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-chevron-right">
                                    <polyline points="9 18 15 12 9 6"></polyline>
                                </svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled {{ ((request()->is('product')) || (request()->is('brand')) || (request()->is('sponsor'))   ? 'show' : '') }}"
                            id="elements" data-parent="#accordionExample">
                            <li class="{{ ((request()->is('brand')) ? 'active' : '') }}">
                                <a href="{{url('brand')}}"> Brand </a>
                            </li>
                            <li class="{{ ((request()->is('sponsor')) ? 'active' : '') }}">
                                <a href="{{url('sponsor')}}"> Sponsor </a>
                            </li>

                            <li class="{{ ((request()->is('product')) ? 'active' : '') }}">
                                <a href="{{url('product')}}"> Products </a>
                            </li>



                        </ul>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Admin'))
                    <li class="menu">
                        <a href="{{ url('notification') }}" data-active="{{ ((request()->is('notification')) ? 'true' : 'false') }}"
                           aria-expanded="{{ ((request()->is('notification')) ? 'true' : 'false') }}" class="dropdown-toggle">
                            <div class="">
                                <i class="far fa-bell"></i>
                                <span>Send Notification</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url('package') }}" data-active="{{ ((request()->is('package')) ? 'true' : 'false') }}"
                           aria-expanded="{{ ((request()->is('package')) ? 'true' : 'false') }}" class="dropdown-toggle">
                            <div class="">
                                <i class="far fa-bell"></i>
                                <span>Package</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url('user-package') }}" data-active="{{ ((request()->is('user-package')) ? 'true' : 'false') }}"
                           aria-expanded="{{ ((request()->is('user-package')) ? 'true' : 'false') }}" class="dropdown-toggle">
                            <div class="">
                                <i class="far fa-bell"></i>
                                <span>User Package</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url('order') }}" data-active="{{ ((request()->is('order')) ? 'true' : 'false') }}"
                           aria-expanded="{{ ((request()->is('order')) ? 'true' : 'false') }}" class="dropdown-toggle">
                            <div class="">
                                <i class="far fa-bell"></i>
                                <span>Order</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url('sub-role') }}" data-active="{{ ((request()->is('sub-role')) ? 'true' : 'false') }}"
                           aria-expanded="{{ ((request()->is('sub-role')) ? 'true' : 'false') }}" class="dropdown-toggle">
                            <div class="">
                                <i class="far fa-bell"></i>
                                <span>Sub Roles</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ url('user-role') }}" data-active="{{ ((request()->is('user-role')) ? 'true' : 'false') }}"
                           aria-expanded="{{ ((request()->is('user-role')) ? 'true' : 'false') }}" class="dropdown-toggle">
                            <div class="">
                                <i class="far fa-bell"></i>
                                <span>Users</span>
                            </div>
                        </a>
                    </li>

                @endif

            </ul>
            {{--            <div class="shadow-bottom"></div>--}}

        </nav>

    </div>
    <!--  END SIDEBAR  -->
    @yield('content')


</div>
<!-- END MAIN CONTAINER -->
<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('public/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('public/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('public/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
{{--<script src="{{ asset('public/plugins/blockui/jquery.blockUI.min.js') }}"></script>--}}
<script src="{{ asset('public/assets/js/app.js') }}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
</script>

<script src="{{ asset('public/plugins/highlight/highlight.pack.js') }}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{ asset('public/assets/js/scrollspyNav.js') }}"></script>

@stack('artist_script')

@stack('video_script')

<!-- BEGIN Sweetest Alert SCRIPT -->
<script src="{{ asset('public/plugins/sweetalerts/sweetalert2.min.js') }}"></script>
<script src="{{ asset('public/plugins/sweetalerts/custom-sweetalert.js') }}"></script>
<!-- END Sweetest Alert SCRIPT -->
</body>


</html>
