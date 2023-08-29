<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ url('lg.png') }}" type="image/x-icon">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('page/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('page/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('page/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('page/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('page/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('page/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('page/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('page/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('plugins/sweetalert2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('plugins/toastr.min.css') }}">
    @yield('css')
    {{--    <link rel="stylesheet" href="{{ url('css/jquery.modal.min.css') }}"> --}}
</head>

<body>
    <!-- Page Preloder -->
    {{--    <div id="preloder"> --}}
    {{--        <div class="loader"> --}}
    {{--            <div class="header__logo"> --}}
    {{--                <a href="{{ route('home') }}"><img src="{{ url('lg.png') }}" alt=""></a> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    @include('pages.layouts.header')
    @yield('content')
    @include('pages.layouts.footer')
    <div id="cart" class="ws-over close">
        <div class="ws-container">
            <div class="ws-modal">
                <div class="close-modal"></div>
                <div class="ws-title">Giỏ Hàng</div>
                <div class="ws-body">
                    <div class="ws-loading close">
                        <img src="{{ url('images/loading.gif') }}" alt="" width="40px" height="40px">
                    </div>
                    <div id="cart-content">

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    <div id="loading" class="ws-over open"> --}}
    {{--        <div class="ws-container"> --}}
    {{--            <div class="loader"> --}}
    {{--                <div class="header__logo"> --}}
    {{--                    <a href="{{ route('home') }}"><img src="{{ url('lg.png') }}" alt=""></a> --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    <script src="{{ url('page/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('page/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('page/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('page/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('page/js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('page/js/mixitup.min.js') }}"></script>
    <script src="{{ url('page/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('page/js/popper.min.js') }}"></script>
    <script src="{{ url('page/js/main.js') }}"></script>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>

    <script src="{{ url('plugins/sweetalert2.min.js') }}"></script>
    <script src="{{ url('plugins/toastr.min.js') }}"></script>
    @include('pages.customjs')
    @yield('script')
</body>

</html>
