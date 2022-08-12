<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="{{ asset('css/admin-lte.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">



    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
    @yield('css')



</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        {{-- navbar start --}}
        @include('layouts.admin.component._navbar')
        {{-- navbar end --}}
        {{-- sidebar start --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light">Enews</span>
            </a>
            <div class="sidebar">

                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="{{ route('dashboard') }}" class="d-block"><i class="fa fa-far-alert"></i> Dashboard</a>
                    </div>
                </div> --}}
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @include('layouts.admin.component._sidebar')
                    </ul>
                </nav>
            </div>

        </aside>
        {{-- sidebar end --}}

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        @include('layouts.admin.component._title')
                        @include('layouts.admin.component._breadcrumb')
                    </div>
                    @include('layouts.admin.component._success')

                </div>
            </div>


            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

        </div>

        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

    </div>


    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('js/admin-lte.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/bs-custom-file-input/bs-customf-file-input.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')
    <script>
        CKEDITOR.replace( 'content' );
        $(document).ready(function() {

        });
    </script>

</body>

</html>
