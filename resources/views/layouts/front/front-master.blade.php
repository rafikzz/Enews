<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        document.getElementsByTagName("html")[0].className += " js";
    </script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    @isset($setting)
        <link rel="shortcut icon" href="{{ $setting->logo() }}" />
    @endisset
    <!-- Favicon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Typography CSS -->
    <link rel="stylesheet" href="{{ asset('css/typography.css') }}">
    <!-- Style CSS -->
    <link rel='stylesheet' href="{{ asset('css/phifi-style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <style>
        .pagination {
            text-align: center;
            display: inline-flex;
            text-align: center;
            padding-left: 0;
            list-style: none;
            padding: 0;
            margin:
        }

        .page-item.active .page-link {
            z-index: 1;
            color: #fff;
            -webkit-transition: all 0.5s ease-out 0s;
            -moz-transition: all 0.5s ease-out 0s;
            -ms-transition: all 0.5s ease-out 0s;
            -o-transition: all 0.5s ease-out 0s;
            transition: all 0.5s ease-out 0s;
            background: #f05c42;
            background-image: initial;
            background-position-x: initial;
            background-position-y: initial;
            background-size: initial;
            background-repeat-x: initial;
            background-repeat-y: initial;
            background-attachment: initial;
            background-origin: initial;
            background-clip: initial;
            background-color: rgb(240, 92, 66);
            border-color: #f05c42;
        }

        .page-item .page-link:hover {
            z-index: 2;
            color: #fff;
            text-decoration: none;
            background-color: #f05c42;
            border-color: #f05c42;
        }


        .page-item .page-link {
            position: relative;
            display: block;
            padding: 5px 17px;
            margin-left: 5px;
            color: #24262b;
            background-color: #fff;
            border: 1px solid #eeeeee;
            border-radius: 5px;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>

<body>
    <!-- loading -->
    {{-- <div id="loading">
        <div id="loading-center">
            <div class="load-img">
                <img src="{{ asset('image/noimgavialable.png') }}" alt="loader">
            </div>
        </div>
    </div> --}}
    <!-- loading End -->
    <!-- Header -->
    @include('layouts.front.components._header')
    <!-- Header End -->

    <!-- Banner -->
    <!-- Banner End -->
    <!-- Main Content Start -->
    <div class="main-content">
        @yield('content')


    </div>
    <!-- Main Content End -->
    <!-- Footer Start -->
    @include('layouts.front.components._footer')

    <!-- Footer End -->
    <!-- === back-to-top === -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </a>
    </div>
    <!-- === back-to-top End === -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
    <!-- jQuery  for scroll me js -->
    <script src='{{ asset('js/jquery-min.js') }}'></script>
    <!-- popper  -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!--  bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Appear JavaScript -->
    <script src="{{ asset('js/appear.js') }}"></script>
    <!-- Jquery-migrate JavaScript -->
    <script src='{{ asset('js/jquery-migrate.min.js') }}'></script>
    <!-- countdownTimer JavaScript -->
    <script src='{{ asset('js/jQuery.countdownTimer.min.js') }}'></script>
    <!-- Owl.carousel JavaScript -->
    <script src='{{ asset('js/owl.carousel.min.js') }}'></script>
    <!-- Countdown JavaScript -->
    <script src='{{ asset('js/countdown.js') }}'></script>
    <!-- Jquery.countTo JavaScript -->
    <script src='{{ asset('js/jquery.countTo.js') }}'></script>
    <!-- Magnific-popup JavaScript -->
    <script src='{{ asset('js/jquery.magnific-popup.min.js') }}'></script>
    <!-- Wow JavaScript -->
    <script src='{{ asset('js/wow.min.js') }}'></script>

    <!--  Custom JavaScript -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.popup-image').magnificPopup({
                type: 'image'
            });
        });
    </script>


</body>

</html>
