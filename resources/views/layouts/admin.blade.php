<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Muutos') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Muutos Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/backend/default/favicon.png') }}">

    <link href="{{ asset('public/backend/assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{ asset('public/backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('public/backend/assets/css/bootstrap.min.css') }}"  rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('public/backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    @if(\Session::has('locale'))
        @if(Session::get('locale') == 'ar')
            <link href="{{ asset('public/backend/assets/css/app-rtl.min.css') }}"  rel="stylesheet" type="text/css" />
        @else
            <!-- App Css-->
            <link href="{{ asset('public/backend/assets/css/app.min.css') }}"  rel="stylesheet" type="text/css" />
        @endif
    @else
         <link href="{{ asset('public/backend/assets/css/app.min.css') }}"  rel="stylesheet" type="text/css" />
    @endif
    <script src="{{ asset('public/backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <style type="text/css">
        .listinfimgthumb{
            width: 40px;
            height: 40px;
            border-radius: 25px;
        }
        body[data-layout=horizontal] .navbar-brand-box{
            background-color: #fff;
        }
    </style>
</head>

<body data-topbar="dark" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('includes.header')
        @include('includes.topnav')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                {{-- <h4 class="mb-0 font-size-18">Dashboard</h4> --}}
                                @yield('pagetitle') 
                                @yield('breadcrum')
                                    {{-- <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Amezia</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        @include('includes.success')
                        @include('includes.error')
                        @yield('content')                    
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Muutos.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Innovius Software
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- JAVASCRIPT -->
        {{-- <script src="{{ asset('public/backend/assets/libs/jquery/jquery.min.js') }}"></script> --}}
        <script src="{{ asset('public/backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/libs/node-waves/waves.min.js') }}"></script>

        <!--Morris Chart-->
        
        <script src="{{ asset('public/backend/assets/libs/morris.js/morris.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/libs/raphael/raphael.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/libs/metrojs/release/MetroJs.Full/MetroJs.min.js') }}"></script>
        
        <!-- Required datatable js -->
        <script src="{{ asset('public/backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('public/backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('public/backend/assets/js/pages/dashboard.init.js') }}"></script>
        
        <script src="{{ asset('public/backend/plugins/js/bootbox.min.js')}}"></script>

        <script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
        <script type="text/javascript">
          $(document).ready(function () {
            timer = setTimeout(function () {
              $('.alert-success').hide();
          }, 3000);
            timer = setTimeout(function () {
              $('.alert-danger').hide();
          }, 3000);

        });
        function confirm(url, name) {
            bootbox.confirm({
                title: '',
                message: '<h5><i class="fa fa-remove text-danger"></i>&nbsp;&nbsp;' + name + '</h5>',
                    buttons: {
                        cancel: {
                        label: '<i class="fa fa-times"></i> Cancel'
                    },
                    confirm: {
                        label: '<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result) {
                    if (result == true) {
                        window.location.replace(url);
                    }
                }
            });
        }
    </script>
</body>
</html>
