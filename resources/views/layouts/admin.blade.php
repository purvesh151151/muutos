<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Muutos') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Favicon
  ============================================ -->
  <link rel="apple-touch-icon" href="{{ asset('public/backend/default/favicon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('public/backend/default/favicon.png') }}">


  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/backend/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  {{-- <link rel="stylesheet" href="{{ asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('public/backend/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->
  
  <link rel="stylesheet" href="{{ asset('public/backend/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  {{-- <link rel="stylesheet" href="{{ asset('backend/bower_components/morris.js/morris.css') }}"> --}}
  <!-- jvectormap -->
  {{-- <link rel="stylesheet" href="{{ asset('backend/bower_components/jvectormap/jquery-jvectormap.css') }}"> --}}
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('public/backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

  <!-- jQuery 3 -->
  <script src="{{ asset('public/backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
<style type="text/css">
  .m-0 {
    margin-top: 0;
    margin-bottom: 0;
  }
  .dataTables_filter{
    float: right;
  }
  .dataTables_paginate{
    float: right;
  }
  .listinfimgthumb{
    width: 40px;
    height: 40px;
    border-radius: 25px;
  }
  .content-header .container-fluid{
    padding-right: 0px;
    padding-left: 0px;
  }
  .content-header .container-fluid .col-sm-6 .col-md-12{
        padding-right: 0px;
  }
  .content-header .container-fluid .col-sm-6 .col-md-12 .label{
    margin-bottom: 0px;
  }
  .content-header .container-fluid .col-sm-6 h3{
    font-size: 28px;
  }
  .dataTables_filter label input{
    margin-left: 6px;
  }
</style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('includes.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
               @yield('pagetitle')
            </div><!-- /.col -->
            <div class="col-sm-6">
              @yield('breadcrum')
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        @include('includes.success')
        @include('includes.error')
        @yield('content')
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    {{-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div> --}}
    <strong>{{ __('messages.copyright') }}</strong>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/js/bootbox.min.js')}}"></script>
<!-- Morris.js charts -->
{{-- <script src="{{ asset('backend/bower_components/raphael/raphael.min.js') }}"></script> --}}
{{-- <script src="{{ asset('backend/bower_components/morris.js/morris.min.js') }}"></script> --}}
<!-- Sparkline -->
{{-- <script src="{{ asset('backend/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script> --}}
<!-- jvectormap -->
{{-- <script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script> --}}
{{-- <script src="{{ asset('backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> --}}
<!-- jQuery Knob Chart -->
{{-- <script src="{{ asset('backend/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script> --}}
<!-- daterangepicker -->
<script src="{{ asset('public/backend/bower_components/moment/min/moment.min.js') }}"></script>
{{-- <script src="{{ asset('public/backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script> --}}
<!-- datepicker -->
<script src="{{ asset('public/backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('public/backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('public/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('public/backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('public/backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('public/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
{{-- <script src="{{ asset('backend/dist/js/pages/dashboard.js') }}"></script> --}}
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/backend/dist/js/demo.js') }}"></script>
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
<script type="text/javascript">
  $(function () {
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      endDate: '+0d'
    })
  });
</script>
<script type="text/javascript">
  $(function () {
    $('.startdatepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      startDate: '+0d'
    })
  });
</script>
<script type="text/javascript">
  $(function () {
    // var date = new Date();
    // var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    // $( '.alldatepicker' ).datepicker( 'setDate', 0 );
    $('.alldatepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      // setDate: today,
    })

  });
  // $(".alldatepicker").datepicker("setDate", "-0d");
</script>
<script type="text/javascript">
   $(document).ready(function(){      
    $(".onlynumbervalid").keypress(function(event){
        var keycode = event.which;
        if (!(keycode >= 48 && keycode <= 57)) {
            event.preventDefault();
        }
    });
 });
</script>
@yield('custom_js')

</body>
</html>
