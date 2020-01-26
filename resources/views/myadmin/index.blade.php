<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Asrama</title>
    <link href="{{ URL::asset('template/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <link href="{{ URL::asset('template/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('template/gentelella/build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        @include('myadmin.side_nav')

        @include('myadmin.top_nav')

        <div class="right_col" role="main" style="height:100%; !important"> 
          @yield('content')
        </div>  

      </div>

        @include('myadmin.footer')

    </div>

    <script src="{{ URL::asset('template/amcharts4/core.js')}}"></script>
    <script src="{{ URL::asset('template/amcharts4/charts.js')}}"></script>
    <script src="{{ URL::asset('template/amcharts4/themes/animated.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/iCheck/icheck.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/skycons/skycons.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/DateJS/build/date.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/build/js/custom.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ URL::asset('template/gentelella/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

  </body>
</html>
