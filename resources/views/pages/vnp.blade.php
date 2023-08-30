@extends('pages.layouts.app')
@section('title', 'Trang Chủ')
@section('content')
    <div class="col-lg-3">
        <div class="header__cart">
            <a class="my-cart1"></i> <span class="count_cart"></span></a>
        </div>
    </div>
    <div id="vnp" class="ws-over close">
        <div class="ws-container">
            <div class="ws-modal">
                <div class="close-modal"></div>
                <div class="ws-title">Mã QR</div>
                <div class="ws-body">
                    {{ $qrCode }}
                </div>
                {{-- <div id="cart-content">
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Tìm phần tử có class "my-cart1"
        var myCartElement = document.querySelector('.my-cart1');

        // Tạo sự kiện nhấn chuột giả lập
        var clickEvent = new MouseEvent('click', {
            bubbles: true,
            cancelable: true,
            view: window
        });

        // Kích hoạt sự kiện click trên phần tử "my-cart1"
        myCartElement.dispatchEvent(clickEvent);
    </script>
@endsection
