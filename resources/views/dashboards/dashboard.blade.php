@extends('dashboards.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard Analytics</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        {{--                <div class="col-lg-7 col-md-12"> --}}
        {{--                    <!-- support-section start --> --}}
        {{--                    <div class="row"> --}}
        {{--                        <div class="col-sm-6"> --}}
        {{--                            <div class="card support-bar overflow-hidden"> --}}
        {{--                                <div class="card-body pb-0"> --}}
        {{--                                    <h2 class="m-0">350</h2> --}}
        {{--                                    <span class="text-c-blue">Support Requests</span> --}}
        {{--                                    <p class="mb-3 mt-3">Total number of support requests that come in.</p> --}}
        {{--                                </div> --}}
        {{--                                <div id="support-chart"></div> --}}
        {{--                                <div class="card-footer bg-primary text-white"> --}}
        {{--                                    <div class="row text-center"> --}}
        {{--                                        <div class="col"> --}}
        {{--                                            <h4 class="m-0 text-white">10</h4> --}}
        {{--                                            <span>Open</span> --}}
        {{--                                        </div> --}}
        {{--                                        <div class="col"> --}}
        {{--                                            <h4 class="m-0 text-white">5</h4> --}}
        {{--                                            <span>Running</span> --}}
        {{--                                        </div> --}}
        {{--                                        <div class="col"> --}}
        {{--                                            <h4 class="m-0 text-white">3</h4> --}}
        {{--                                            <span>Solved</span> --}}
        {{--                                        </div> --}}
        {{--                                    </div> --}}
        {{--                                </div> --}}
        {{--                            </div> --}}
        {{--                        </div> --}}
        {{--                        <div class="col-sm-6"> --}}
        {{--                            <div class="card support-bar overflow-hidden"> --}}
        {{--                                <div class="card-body pb-0"> --}}
        {{--                                    <h2 class="m-0">350</h2> --}}
        {{--                                    <span class="text-c-green">Support Requests</span> --}}
        {{--                                    <p class="mb-3 mt-3">Total number of support requests that come in.</p> --}}
        {{--                                </div> --}}
        {{--                                <div id="support-chart1"></div> --}}
        {{--                                <div class="card-footer bg-success text-white"> --}}
        {{--                                    <div class="row text-center"> --}}
        {{--                                        <div class="col"> --}}
        {{--                                            <h4 class="m-0 text-white">10</h4> --}}
        {{--                                            <span>Open</span> --}}
        {{--                                        </div> --}}
        {{--                                        <div class="col"> --}}
        {{--                                            <h4 class="m-0 text-white">5</h4> --}}
        {{--                                            <span>Running</span> --}}
        {{--                                        </div> --}}
        {{--                                        <div class="col"> --}}
        {{--                                            <h4 class="m-0 text-white">3</h4> --}}
        {{--                                            <span>Solved</span> --}}
        {{--                                        </div> --}}
        {{--                                    </div> --}}
        {{--                                </div> --}}
        {{--                            </div> --}}
        {{--                        </div> --}}
        {{--                    </div> --}}
        {{--                    <!-- support-section end --> --}}
        {{--                </div> --}}
        <div class="col-lg-12 col-md-12">
            <!-- page statustic card start -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-yellow">{{ $total }}.000 {{ trans('page.currency') }}</h4>
                                    <h6 class="text-muted m-b-0">Tổng hóa đơn</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-bar-chart-2 f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-yellow">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0"></p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-green">290+</h4>
                                    <h6 class="text-muted m-b-0">Lượt Truy Cập</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-file-text f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-green">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0"></p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-up text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-red">{{ $count_cart }}</h4>
                                    <h6 class="text-muted m-b-0">Đơn Hàng</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-calendar f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-red">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0"></p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-down text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h4 class="text-c-blue">135</h4>
                                    <h6 class="text-muted m-b-0">Thanh Toán</h6>
                                </div>
                                <div class="col-4 text-right">
                                    <i class="feather icon-thumbs-down f-28"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-c-blue">
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <p class="text-white m-b-0"></p>
                                </div>
                                <div class="col-3 text-right">
                                    <i class="feather icon-trending-down text-white f-16"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page statustic card end -->
        </div>

    </div>
    <!-- [ Main Content ] end -->
@endsection
