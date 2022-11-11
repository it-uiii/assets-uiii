<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="base-url" content="{{ url('/') }}">
    <title>General Service | {{ $title }}</title>

    {{-- icon --}}
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('logo/logo_bulet.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logo/logo_bulet.png') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome6/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- livewire-->
    @livewireStyles
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('img/loading.png') }}" height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('partials.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('logo/logo_bulet.png') }}" class="brand-image">
                <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            @include('partials.sidebar')
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
                                <li class="breadcrumb-item active">{{ $subtitle }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('container')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @include('partials.footer')
    </div>
    <!-- ./wrapper -->

    <script src="dist/js/adminlte.min.js"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>
    <!--livewire script-->
    @livewireScripts

    <script>
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link']],
            ],
            height: 500,
            popatmouse: true

        });

        $(document).ready(function() {
            $(".btn-success").click(function() {
                var lsthmtl = $(".clone").html();
                $(".increment").after(lsthmtl);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".hdtuto").remove();
            });

            $(document).on("change", "input", function(event) {
                $(this).attr('value', this.value);
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').html('');
                if ($(this).is(':radio')) {
                    $(this).parent().parent().siblings('.invalid-feedback').html('');
                }
            });

            $(document).on("change", "select", function(event) {
                const select = $(this).attr('value', this.value);
                $.each(this, function(key, item) {
                    if ($(item).val() == $(select).attr('value')) {
                        $(this).attr('selected', $(this).prop('selected'));
                    } else {
                        $(this).attr('selected', $(this).prop('selected'));
                    };
                });
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').html('');
                $(this).siblings('.select2').children('.selection').children('.select2-selection').css(
                    'border-color', '#e2e5e8');
            });

            $(document).on("change", "textarea", function(event) {
                $(this).html(event.target.value);
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').html('');
            });

        });

        $(function() {
            bsCustomFileInput.init();
            //Add text editor
            $('#compose-textarea').summernote()

        });
    </script>

    @if (session('success'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('danger'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('danger') }}");
        </script>
    @endif

    @if (session('warning'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true
                }
                toastr.error("{{ $error }}");
            </script>
        @endforeach
    @endif
    @yield('scripts')
</body>

</html>
