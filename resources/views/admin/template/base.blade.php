<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Xeloro - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <div class="header-border"></div>
        @include('admin.template.sections.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.template.sections.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('content')
            <!-- End Page-content -->

            @include('admin.template.sections.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>


    <!-- Sparkline Js-->
    <script src="{{ asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Js-->
    <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

    <!-- Chart Custom Js-->
    <script src="{{ asset('assets/pages/knob-chart-demo.js') }}"></script>


    <!-- Morris Js-->
    <script src="{{ asset('assets/plugins/morris-js/morris.min.js') }}"></script>

    <!-- Raphael Js-->
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('assets/pages/dashboard-demo.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>

</body>

</html>
