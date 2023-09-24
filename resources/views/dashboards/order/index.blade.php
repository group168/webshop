@extends('dashboards.layouts.app')
@section('title', 'Dashboard')
@section('style')

@endsection
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">{{ $title }}</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboards') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item active text-light"><b>{{ $title }}</b></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row pb-3">
                        <div class="col-md-12 col-12 text-center position-relative">
                            <b>
                                <h4 class="m-1 text-primary">DANH SÁCH ĐƠN HÀNG</h4>
                            </b>
                            {{--                            <div id="add-product" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true"> --}}
                            {{--                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document"> --}}
                            {{--                                    <div class="modal-content"> --}}
                            {{--                                        <div class="modal-header"> --}}
                            {{--                                            <h5 class="modal-title" id="exampleModalCenterTitle">Thêm Sản Phẩm</h5> --}}
                            {{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> --}}
                            {{--                                        </div> --}}
                            {{--                                        <div class="modal-body ld-over" id="add-form"> --}}
                            {{--                                            <div class="ld ld-ring ld-spin"></div> --}}
                            {{--                                            <form action="" method="post"> --}}
                            {{--                                                <div class="row"> --}}
                            {{--                                                    <div class="col-md-12"> --}}
                            {{--                                                        <div class="form-group fill"> --}}
                            {{--                                                            <label for="product_name">Tên sản phẩm</label> --}}
                            {{--                                                            <input type="text" name="name" class="form-control" id="product_name" aria-describedby="Tên sản phẩm" placeholder="Tên sản phẩm"> --}}
                            {{--                                                            <small id="product_name" class="form-text text-muted"></small> --}}
                            {{--                                                        </div> --}}
                            {{--                                                        <div class="form-group fill"> --}}
                            {{--                                                            <label for="product_price">Giá sản phẩm</label> --}}
                            {{--                                                            <input type="number" name="price" value="0" class="form-control" id="product_price" aria-describedby="Giá sản phẩm" placeholder="Giá sản phẩm"> --}}
                            {{--                                                            <small class="form-text text-muted"></small> --}}
                            {{--                                                        </div> --}}
                            {{--                                                        <div class="form-group fill"> --}}
                            {{--                                                            <label for="product_unit">Đơn vị tính</label> --}}
                            {{--                                                            <input type="text" name="unit" class="form-control" id="product_unit" aria-describedby="Đơn vị tính" placeholder="Đơn vị tính"> --}}
                            {{--                                                            <small class="form-text text-muted"></small> --}}
                            {{--                                                        </div> --}}
                            {{--                                                        <div class="form-group fill"> --}}
                            {{--                                                            <label for="product_count">Số lượng</label> --}}
                            {{--                                                            <input type="number" name="count" value="0" class="form-control" id="product_count" aria-describedby="Số lượng" placeholder="Số lượng"> --}}
                            {{--                                                            <small class="form-text text-muted"></small> --}}
                            {{--                                                        </div> --}}
                            {{--                                                        <div class="form-group"> --}}
                            {{--                                                            <label for="product_description">Mô tả</label> --}}
                            {{--                                                            <textarea class="form-control" id="product_description" rows="3"></textarea> --}}
                            {{--                                                        </div> --}}
                            {{--                                                        <div class="form-group"> --}}
                            {{--                                                            <label for="product_description">Hình ảnh</label> --}}
                            {{--                                                            <div class="custom-file"> --}}
                            {{--                                                                <input type="file" class="custom-file-input" id="image" accept="image/*"> --}}
                            {{--                                                                <label class="custom-file-label" for="image">Choose file...</label> --}}
                            {{--                                                                <div class="invalid-feedback"></div> --}}
                            {{--                                                            </div> --}}
                            {{--                                                        </div> --}}
                            {{--                                                    </div> --}}
                            {{--                                                    <div class="col-md-12"> --}}
                            {{--                                                        <div class="form-group fill"> --}}
                            {{--                                                            <div class="col-12 text-center"> --}}
                            {{--                                                                <div id="upload-demo"></div> --}}
                            {{--                                                            </div> --}}
                            {{--                                                        </div> --}}
                            {{--                                                    </div> --}}
                            {{--                                                </div> --}}
                            {{--                                            </form> --}}
                            {{--                                        </div> --}}
                            {{--                                        <div class="modal-footer d-flex justify-content-center p-2"> --}}
                            {{--                                            <button type="button" id="add" class="btn  btn-primary">Thêm</button> --}}
                            {{--                                        </div> --}}
                            {{--                                    </div> --}}
                            {{--                                </div> --}}
                            {{--                            </div> --}}
                            {{--                            <button type="button" class="btn btn-primary btn-icon has-ripple" style="z-index: 1000; position: absolute; right: 15px; top: 0;" data-toggle="modal" data-target="#add-product"><i class="fas fa-plus"></i><span class="ripple ripple-animate" style="height: 174.078px; width: 174.078px; animation-duration: 0.7s; animation-timing-function: linear; background: rgb(255, 255, 255); opacity: 0.4; top: -66.031px; left: -0.359125px;"></span></button> --}}
                        </div>
                    </div>
                    <div class="row d-flex flex-direction-row p-1">
                        <div class="col-md-12 col-12">
                            <div class="d-md-flex flex-direction-row justify-content-end w-100">
                                <div class="mx-md-2 col-xs-12">
                                    <div class="d-flex flex-row align-items-center">
                                        <b style="min-width: 100px; white-space: nowrap;">Sắp Xếp Theo</b>
                                        <select name="sort" id="sort" data-type="product"
                                            data-content="table-content" data-route-data="{{ route('product') }}"
                                            class="sort form-control">
                                            {{-- <option value=""></option> --}}
                                            <option value="id" data-sort="asc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'id' && Session::get('sort-products') == 'asc' ? 'selected' : '' }}>
                                                ID tăng
                                            </option>
                                            <option value="id" data-sort="desc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'id' && Session::get('sort-products') == 'desc' ? 'selected' : '' }}>
                                                ID giảm
                                            </option>
                                            <option value="name" data-sort="asc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'name' && Session::get('sort-products') == 'asc' ? 'selected' : '' }}>
                                                Tên A-Z
                                            </option>
                                            <option value="name" data-sort="desc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'name' && Session::get('sort-products') == 'desc' ? 'selected' : '' }}>
                                                Tên Z-A
                                            </option>
                                            <option value="cost_price" data-sort="asc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'cost_price' && Session::get('sort-products') == 'asc' ? 'selected' : '' }}>
                                                Giá tăng
                                            </option>
                                            <option value="cost_price" data-sort="desc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'cost_price' && Session::get('sort-products') == 'desc' ? 'selected' : '' }}>
                                                Giá giảm
                                            </option>
                                            <option value="count" data-sort="asc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'count' && Session::get('sort-products') == 'asc' ? 'selected' : '' }}>
                                                Số lượng tăng
                                            </option>
                                            <option value="count" data-sort="desc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'count' && Session::get('sort-products') == 'desc' ? 'selected' : '' }}>
                                                Số lượng giảm
                                            </option>
                                            <option value="created_at" data-sort="asc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'created_at' && Session::get('sort-products') == 'asc' ? 'selected' : '' }}>
                                                Cũ nhất
                                            </option>
                                            <option value="created_at" data-sort="desc"
                                                {{ Session::has('sort-product') && Session::get('sort-product') == 'created_at' && Session::get('sort-products') == 'desc' ? 'selected' : '' }}>
                                                Mới nhất
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mx-md-2 col-xs-12">
                                    <div class="d-flex flex-row align-items-center">
                                        <b style="min-width: 100px; white-space: nowrap;">Số Dòng</b>
                                        <select name="limit" id="limit" data-route-data="{{ route('product') }}"
                                            class="limit form-control">
                                            <option value="10" {{ !Session::has('limit') ? 'selected' : '' }}></option>
                                            <option value="5"
                                                {{ Session::has('limit') && Session::get('limit') == 5 ? 'selected' : '' }}>
                                                5
                                            </option>
                                            <option value="10"
                                                {{ Session::has('limit') && Session::get('limit') == 10 ? 'selected' : '' }}>
                                                10
                                            </option>
                                            <option value="20"
                                                {{ Session::has('limit') && Session::get('limit') == 20 ? 'selected' : '' }}>
                                                20
                                            </option>
                                            <option value="30"
                                                {{ Session::has('limit') && Session::get('limit') == 30 ? 'selected' : '' }}>
                                                30
                                            </option>
                                            <option value="40"
                                                {{ Session::has('limit') && Session::get('limit') == 40 ? 'selected' : '' }}>
                                                40
                                            </option>
                                            <option value="50"
                                                {{ Session::has('limit') && Session::get('limit') == 50 ? 'selected' : '' }}>
                                                50
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mx-md-2 col-xs-12">
                                    <div class="d-flex flex-row align-items-center">
                                        <b style="min-width: 100px; white-space: nowrap;">Tìm kiếm:</b>
                                        <input type="text" value="" class="form-control search-table"
                                            data-route="{{ route('search-product') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="table-body" class="ld-over">
                    <div class="ld ld-ring ld-spin"></div>
                    <div id="table-content">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th class="d-flex align-items-center">
                                                <div class="icheck-primary d-inline">
                                                    <input class="icheck" type="checkbox" id="check-all">
                                                    <label for="check-all"><b></b></label>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger ld-over" id="delete-all"
                                                    data-route="{{ route('delete-products') }}"
                                                    data-route-data="{{ route('product') }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <div class="ld ld-ring ld-spin"></div>
                                                </button>
                                            </th>
                                            <th>ID</th>
                                            <th>Khách Hàng</th>
                                            <th>Sản Phẩm</th>
                                            <th>Tổng Tiền</th>
                                            <th>Trạng Thái</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($lists))
                                            @foreach ($lists as $item)
                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary d-inline">
                                                            <input class="icheck ichecks" name="id[]"
                                                                value="{{ $item->id }}" type="checkbox"
                                                                id="check-{{ $item->id }}">
                                                            <label
                                                                for="check-{{ $item->id }}"><b>{{ $item->id }}</b></label>
                                                        </div>
                                                    </td>
                                                    <td style="white-space: normal; max-width: 300px;">
                                                        <b>{{ $item->id }}</b>
                                                    </td>
                                                    <td>
                                                        <b>{{ $item->user->name }}</b>
                                                    </td>
                                                    <td style="white-space: normal;">
                                                        <ul class="mb-0 pl-2">
                                                            @if (isset($item->address) && $item->address != null)
                                                                <li>
                                                                    Người nhận:
                                                                    <b>{{ $item->address->customer_name }}</b>
                                                                </li>
                                                                <li>
                                                                    Điện Thoại:
                                                                    <b>{{ $item->address->phone }}</b>
                                                                </li>
                                                                <li>
                                                                    Địa chỉ:
                                                                    <b>{{ $item->address->address }},
                                                                        {{ $item->address->ward }},
                                                                        {{ $item->address->district }},
                                                                        {{ $item->address->province }}</b>
                                                                </li>
                                                                <li>
                                                                    Email:
                                                                    <b>{{ $item->address->email }}</b>
                                                                </li>
                                                            @endif
                                                            @if (isset($item->products) && $item->products != null && $item->products->count() > 0)
                                                                @foreach ($item->products as $p)
                                                                    <li>
                                                                        <a target="_blank"
                                                                            href="{{ url('product/' . $p->product->slug) }}">{{ $p->product_name }}</a>
                                                                        x {{ $p->quantity }}
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <h4>{{ number_format($item->total) }} {{ trans('page.currency') }}
                                                        </h4>
                                                    </td>
                                                    <td>
                                                        {{-- <div class="btn btn-sm btn" style="background: #0c5460">
                                                            {!! trans(config('status.order')[$item->status]) !!}
                                                        </div> --}}
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-primary dropdown-toggle {!! trans(config('status.status')[$item->status]) !!}"
                                                                type="button" data-toggle="dropdown">
                                                                {!! trans(config('status.orders')[$item->status]) !!}
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" name="status">
                                                                @foreach (config('status.orders') as $status => $status_text)
                                                                    <li>
                                                                        <a href="{{ route('change_status', ['id' => $item->id, 'status' => $status]) }}"
                                                                            class="update-status"
                                                                            data-status="{{ $status }}"
                                                                            data-url="{{ route('change_status', ['id' => $item->id, 'status' => $status]) }}">
                                                                            {{ $status_text }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <button type="button"
                                                            class="btn btn-icon btn-danger action_delete ld-over rounded"
                                                            data-url="{{ route('delete-order', ['id' => $item->id]) }}">
                                                            <i class="fas fa-trash-alt"></i>
                                                            <div class="ld ld-ring ld-spin"></div>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row my-2">
                                <div class="col-md-12">
                                    {{ $lists->links('pagination.custom') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/ajax/order_ajax.js') }}"></script>

@endsection
