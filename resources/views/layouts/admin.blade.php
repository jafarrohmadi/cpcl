<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CPCL</title>

    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet"/>
    <link href="{{ asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ asset('main/css/style.css')}}" rel="stylesheet">
    <!-- Date picker plugins css -->
     <link href="{{ asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <script src="{{ asset('main/js/modernizr-3.6.0.min.js')}}"></script>
    <link href="{{ asset('assets/plugins/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
    @yield('styles')
</head>

<body class="v-light vertical-nav fix-header fix-sidebar">
<div id="preloader">
    <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/>
        </svg>
    </div>
</div>
<div class="main-wrapper">
    <div class="header">
        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{url('/')}}">
                    <b>
                        <img src="{{asset('assets/images/logo.png')}}" alt=""> </b>
                    <span class="brand-title">
                            <img src="{{asset('assets/images/logo-text.png')}}" alt="">
                        </span>
                </a>
            </div>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
            </div>
        </div>
        <div class="header-content">
            <div class="header-left">
                <ul>
                    <li class="icons position-relative">
                        <a href="javascript:void(0)">
                            <i class="icon-magnifier f-s-16"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header-right">
                <ul>

                    <li class="icons">
                        <a href="javascript:void(0)">
                            <i class="mdi mdi-account f-s-20" aria-hidden="true"></i>
                        </a>
                        <div class="drop-down dropdown-profile animated bounceInDown">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="#"
                                           onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                            <i class="icon-power">

                                            </i>
                                            <span>{{ trans('global.logout') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="nk-sidebar">
        <div class="nk-nav-scroll">
            <div class="nav-user">
                <img src="../../assets/images/users/1.jpg" alt="" class="rounded-circle">
                <h5>John Doe</h5>
                <p>UI Developer</p>
            </div>
            @include('partials.menu')

        </div>
        <!-- #/ nk nav scroll -->
    </div>

    <div class="content-body">
        @yield('content')
    </div>

    <div class="footer">
        <div class="copyright">
            <p>Copyright CPCL &copy;  2021, by <a href="https://kucingcoding.com" target="_blank">kucingcoding.com</a></p>
        </div>
    </div>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<!-- Common JS -->
<script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
<!-- Custom script -->
<script src="{{ asset('main/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2-init.js')}}"></script>
<script src="{{ asset('assets/plugins/tables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js') }}"></script>

<!-- Color Picker Plugin JavaScript -->
<script src="{{ asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{ asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

<script src="{{ asset('assets/plugins/sweetalert/js/sweetalert.min.js')}}"></script>
@yield('scripts')
<script>
    // MAterial Date picker
    $('#start_date').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#end_date').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
</script>
</body>

</html>
