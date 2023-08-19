<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Ashok Leyland! @yield('title')</title>
    <script src="{{ asset('admincss/js/jquery-min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admincss/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admincss/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <script src="{{ asset('admincss/js/form_validation.js') }}"></script>
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admincss/images/favicon.png') }}" />
    <link href="{{ asset('admincss/css/toastr.min.css') }}" rel="stylesheet">
    <!-- Toastr Css  -->
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuorWcaZQX549v-nRkklIBo6_Rm1eMrNM&callback=initMap"></script>
    <style>
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('images/loading.gif') center no-repeat #fff;
        }
    </style>
</head>

<body>

    <!-- Paste this code after body tag -->
    <div class="loader"></div>
    <div class="loader" style="display: none;" id="ajaxLoader"></div>
    <!-- Ends -->
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="#">
                        <img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05" height="37.88" /></a>
                    <a class="navbar-brand brand-logo-mini" href="#">
                        <img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05"
                            height="37.88" /></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
                                <i class="fa fa-user fa-1x" aria-hidden="true"></i> {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    <i class="fa fa-lock"></i>
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    {{ method_field('POST') }}
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="horizontal-menu-toggle">
                        <span class="fa fa-bars"></span>
                    </button>
                </div>
                <div class="container">
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg navbar-light" style="background: #00A6D7;">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item ">

                                @if (Auth::user()->role == 'admin')
                                <a class="nav-link" href="{{ url('admin') }}">
                                    <i class="fa fa-home"></i> <!-- Font Awesome icon for home -->
                                    <span class="menu-title"><b>Home</b></span>
                                </a> 
                                @endif
                                @if (Auth::user()->role == 'tl')
                                    <a class="nav-link" href="{{ url('team-leader') }}">
                                        <i class="fa fa-home"></i> <!-- Font Awesome icon for home -->
                                        <span class="menu-title"><b>HOME</b></span>
                                    </a>
                                @endif

                            </li>
                            @if (Auth::user()->role != 'admin')
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('complaint-list')}}">
                                    <i class="fa fa-list"></i> <!-- Font Awesome icon for home -->
                                    <span class="menu-title"><b>Complaint List</b></span>
                                </a>
                            </li>
                            @endif

                            @if (Auth::user()->role == 'admin')
                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('admin/uploadcase')}}">
                                    <i class="fa fa-upload"></i> <!-- Font Awesome icon for Upload File -->
                                    <span class="menu-title"><b>Upload File</b></span>
                                </a>
                            </li>
                            @endif

                            <li class="nav-item ">
                                <a class="nav-link" href="{{url('ams-export-file')}}">
                                    <i class="fa fa-file"></i> <!-- Font Awesome icon for Report -->
                                    <span class="menu-title"><b>Report</b></span>
                                </a>
                            </li>

                            @if (Auth::user()->role == 'tl')
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i><b> Agents</b>
                                        <i class="fa fa-angle-down" style="margin-left: 5px;"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('team-leader/create') }}">Create
                                            Agents</a>
                                        <a class="dropdown-item" href="{{ url('team-leader/agent') }}">Agents
                                            List</a>
                                    </div>
                                </li>
                            @endif

                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Master</b>
                                        <i class="fa fa-angle-down" style="margin-left: 5px;"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('pre-stage-reason') }}">Pre - Approval
                                            Stage - Delay Reason</a>
                                        <a class="dropdown-item" href="{{ url('repair-stage-reason') }}">Repair Stage
                                            - Delay Reason</a>
                                        <a class="dropdown-item" href="{{ url('post-approval-stage') }}">Post
                                            Approval Stage - Delay Reason</a>
                                        <a class="dropdown-item" href="{{ url('major-minor-tat') }}">Major Minor
                                            TAT</a>
                                    </div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                @section('bodycontent')
                @show
            </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="w-100 clearfix">
                @php $curYear = date("Y"); @endphp
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                    {{ $curYear }}
                    <a href="#">Cogent E-services Pvt.Ltd</a>. All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->

    <script src="{{ asset('admincss/vendors/js/vendor.bundle.base.js') }}"></script>

    <!-- Toastr Js -->
    <script type="text/javascript" src="{{ asset('admincss/js/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}";
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
    <link rel="stylesheet" href="{{ asset('admincss/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admincss/datatable/css/buttons.dataTables.min.css') }}" />
    <script type="text/javascript" src="{{ asset('admincss/datatable/js/jquery-1.12.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admincss/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admincss/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admincss/datatable/js/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admincss/datatable/js/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admincss/datatable/js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admincss/datatable/js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admincss/datapicker/js/jquery.datetimepicker.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admincss/datapicker/css/jquery.datetimepicker.min.css') }}">
    <script type="text/javascript">
        $(document).ready(function() {

            $("#slide-toggle").click(function() {
                $(".box").animate({
                    width: "toggle"
                });
            });
            $('#order-listing').DataTable({
                dom: 'Bfrtip',
                "language": {
                    "paginate": {
                        "previous": "<",
                        "next": ">"
                    }
                },
                buttons: [{
                    extend: 'excel',
                    text: 'Excel',
                    className: 'exportExcel',
                    filename: '@yield('title')',
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        }
                    }
                }]
            });

        });
    </script>

    <script>
        $(window).load(function() {
            $('.loader').fadeOut();
        });
    </script>
</body>

</html>
<style>
    .box-header {
        color: #eee;
        display: block;
        padding: 0px;
        position: relative;
        background-color: #19aec4;
    }

    .line_box {
        border: 1px solid #0089DA;
        padding: 20px;
    }

    .checkbox label,
    .radio label {
        min-height: 20px;
        padding-left: 8px;
        margin-bottom: 0;
        font-weight: 400;
        cursor: pointer;
    }

    .wpsp-gender-field .radio {
        display: inline-block;
        margin: 5px 0 8px;
    }

    .radio {
        padding-left: 20px;
    }
</style>

<style>
    .form-control {
        display: block;
        width: 100%;
        height: 24px;
        padding: 1px 7px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        font-weight: 400;
    }

    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 0px;
        font-weight: 500;
        margin-top: 2px;
    }

    .form-group {
        margin-bottom: 2px;
    }

    .shivv {
        padding: 4px;
    }

    .fatch {
        font-weight: 500 !important;
    }
</style>
