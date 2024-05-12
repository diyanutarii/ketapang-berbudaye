<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="Dian Utari" name="author" />
    <meta content="Sistem Informasi Kebudayaan Kabupaten Ketapang" name="description" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> {{ $title }} - {{ env('APP_NAME') }}</title>

    <!-- App favicon -->
    <x-favicon></x-favicon>

    <!-- Datatables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alerts css -->
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Dropify css -->
    <link href="{{ asset('assets/plugins/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />

    @stack('style')
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

    <!-- Datatables  -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>

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

    <!-- Sweet Alerts Js-->
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    <!--dropify-->
    <script src="{{ asset('assets/plugins/dropify/dropify.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    <script>
        // Ajax CSRF Token
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        @if (App::isLocale('id'))
            $('.datatable').DataTable({
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                },
                "language": {
                    "search": "Pencarian",
                    "infoEmpty": "Data Belum Tersedia",
                    "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
                    "emptyTable": "Data Belum Tersedia",
                    "lengthMenu": "Tampilkan _MENU_ Baris",
                    "zeroRecords": "Data Tidak Ditemukan",
                    "infoFiltered": "(Hasil pencarian dari _MAX_ data)",
                    "processing": "Sedang Memproses...",
                    "paginate": {
                        "first": "Pertama",
                        "previous": "<i class='mdi mdi-chevron-left'>",
                        "next": "<i class='mdi mdi-chevron-right'>",
                        "last": "Terakhir",
                    }
                },
            });

            var dropify = $('.dropify').dropify({
                messages: {
                    'default': 'Klik atau seret dan lepas untuk memasukkan file',
                    'replace': 'Klik atau seret dan lepas untuk mengganti file',
                    'remove': 'Hapus',
                    'error': 'Galat. Ukuran terlalu besar melebihi 2MB atau tipe file tidak didukung'
                }
            });
        @else
            $('.datatable').DataTable({
                "drawCallback": function() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                },
                "language": {
                    "paginate": {
                        "previous": "<i class='mdi mdi-chevron-left'>",
                        "next": "<i class='mdi mdi-chevron-right'>",
                    }
                },
            });

            var dropify = $('.dropify').dropify({
                messages: {
                    'default': 'Click or drag and drop a file',
                    'replace': 'Click or drag and drop to replace',
                    'remove': 'Remove',
                    'error': 'Error. The file is either not square, larger than 2 MB or not an acceptable file type'
                }
            });
        @endif

        dropify.on("dropify.afterClear", function() {
            $("#hiddenPhoto").val("");
            $("#hiddenImage").val("");
        });
    </script>

    @if (env('AJAX') == true)
        @stack('script')
    @endif
</body>

</html>
