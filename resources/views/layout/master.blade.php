<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Quản Trị Trang Web </title>

    <!-- Bootstrap -->
    <link href="{{ asset("admin_asset/vendors/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

    <!-- NProgress -->
    <link href="{{ asset("admin_asset/vendors/nprogress/nprogress.css")}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset("admin_asset/vendors/iCheck/skins/flat/green.css") }}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset("admin_asset/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css") }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset("admin_asset/vendors/jqvmap/dist/jqvmap.min.css") }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset("admin_asset/vendors/bootstrap-daterangepicker/daterangepicker.css") }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset("admin_asset/build/css/custom.min.css") }}" rel="stylesheet">
    <link href="{{ asset("admin_asset/css/style.css") }}" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        @include('layout.slidebar')

        <!-- top navigation -->
       @include('layout.header')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
           @yield("content-main")
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset("admin_asset/vendors/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("admin_asset/vendors/bootstrap/dist/js/bootstrap.min.js") }}"></script>

Now in fontawesome 5 you can deliver a cached version of JS over Https.

<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
<!-- FastClick -->
<script src="{{ asset("admin_asset/vendors/fastclick/lib/fastclick.js") }}"></script>
<!-- NProgress -->
<script src="{{ asset("admin_asset/vendors/nprogress/nprogress.js") }}"></script>
<!-- Chart.js -->
<script src="{{ asset("admin_asset/vendors/Chart.js/dist/Chart.min.js") }}"></script>
<!-- gauge.js -->
<script src="{{ asset("admin_asset/vendors/gauge.js/dist/gauge.min.js") }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset("admin_asset/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js") }}"></script>
<!-- iCheck -->
<script src="{{ asset("admin_asset/vendors/iCheck/icheck.min.js") }}"></script>
<!-- Skycons -->
<script src="{{ asset("admin_asset/vendors/skycons/skycons.js") }}"></script>
<!-- Flot -->
<script src="{{ asset("admin_asset/vendors/Flot/jquery.flot.js") }}"></script>
<script src="{{ asset("admin_asset/vendors/Flot/jquery.flot.pie.js") }}"></script>
<script src="{{ asset("admin_asset/vendors/Flot/jquery.flot.time.js") }}"></script>
<script src="{{ asset("admin_asset/vendors/Flot/jquery.flot.stack.js") }}"></script>
<script src="{{ asset("admin_asset/vendors/Flot/jquery.flot.resize.js") }}"></script>
<!-- Flot plugins -->
<script src="{{ asset("admin_asset/vendors/flot.orderbars/js/jquery.flot.orderBars.js") }}"></script>
<script src="{{ asset("admin_asset/vendors/flot-spline/js/jquery.flot.spline.min.js") }}"}></script>
<script src="{{ asset("admin_asset/vendors/flot.curvedlines/curvedLines.js") }}"></script>
<!-- DateJS -->
<script src="{{ asset("admin_asset/vendors/DateJS/build/date.js") }}"></script>
<!-- JQVMap -->
<script src="{{ asset("admin_asset/vendors/jqvmap/dist/jquery.vmap.js") }}"></script>
<script src="{{ asset("admin_asset/vendors/jqvmap/dist/maps/jquery.vmap.world.js")}}"></script>
<script src="{{ asset("admin_asset/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js") }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset("admin_asset/vendors/moment/min/moment.min.js") }}"></script>
<script src="{{ asset("admin_asset/vendors/bootstrap-daterangepicker/daterangepicker.js") }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset("admin_asset/build/js/custom.min.js") }}"></script>
<script src="{{ asset("admin_asset/ckeditor/ckeditor.js") }}"></script>


<script>
    CKEDITOR.replace( 'pro_content');
    $( document ).ready(function() {
        $("#viewOrderDetail").click(function() {
            //alert("hello");
            var url  = $(this).attr( "data-links" );
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('.modal-body .table > tbody').append(data.html);
                    //alert(data.html);
                }



    });

    });
    });
</script>
</body>
</html>
