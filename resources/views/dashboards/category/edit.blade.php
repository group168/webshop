@extends('dashboards.layouts.app')
@section('title', 'Dashboard')
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
                        <li class="breadcrumb-item"><a href="{{ route('product') }}"><i class="fas fa-archive"></i> Category
                            </a></li>
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
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 class="m-1 text-primary">UPDATE CATEGORY</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body table-border-style">
                    <form action="" method="post" class="ld-over" id="edit-form" enctype="multipart/form-data">
                        <div class="ld ld-ring ld-spin"></div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group fill">
                                    <label for="name">Tên danh mục</label>
                                    <input type="text" id="category_name" name="category_name"
                                        value="{{ $category->name }}" class="form-control" aria-describedby="Tên sản phẩm"
                                        placeholder="Tên sản phẩm">
                                    <small class="form-text text-muted"></small>
                                </div>
                                <div class="form-group fill">
                                    <label for="cost_price">Mô Tả</label>
                                    <textarea class="form-control" id="category_description" rows="3">{{ $category->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="col-12">
                                    <h6 class="text-center"><b>Ảnh Chính</b></h6>
                                </div>
                                <div class="col-12 text-center ld-over" id="image-main">
                                    <div class="ld ld-ring ld-spin"></div>
                                    <div id="image-main-content" class="shadow" style="overflow: hidden; width: 100%;">
                                        <img src="{{ url($category->image) }}" alt="" class="w-100"
                                            id="demo-image">
                                    </div>
                                    <button type="button" style="margin-top: -20px;"
                                        class="btn btn-icon btn-success btn-edit-image-main ld-over">
                                        <i class="fas fa-pencil-alt"></i>
                                        <div class="ld ld-ring ld-spin"></div>
                                    </button>
                                </div>
                                <div class="col-12 text-center my-2">

                                </div>
                            </div>
                        </div>
                        <hr>
                    </form>
                    <div class="modal-footer d-flex justify-content-center p-2">
                        <button type="button" id="add-image" class="btn btn-primary btn-submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="EditImageMain" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa Ảnh Chính</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body ld-over" id="EditImageMainBody">
                    <div class="ld ld-ring ld-spin"></div>
                    <div class="form-group fill">
                        <div class="col-12 text-center">
                            {{-- <div id="demo-image-main"></div> --}}
                            <img src="" alt="" id="demo-image-main">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_image">Hình Ảnh</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="edit-image-main" accept="image/*">
                            <label class="custom-file-label" for="image">Choose file...</label>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-around p-2">
                    <button type="button" class="btn  btn-secondary btn-cancel" data-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary btn-upload-image-main" id="btn_update">Lưu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        //List Image
        let _this = '';
        let id_image = '';

        var resize_add = $('#demo-image-product').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: 600,
                height: 600,
                type: 'square' //square
            },
            boundary: {
                width: 650,
                height: 650
            }
        });
        $('#upload-image-product').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                resize_add.croppie('bind', {
                    url: e.target.result
                }).then(function() {});
            }
            reader.readAsDataURL(this.files[0]);
        });
        $("#add-image").click(function() {
            $('#add-image-form').addClass('running');
            resize_add.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(img) {
                let _token = $('meta[name="csrf-token"]').attr('content');
                let id = {{ $category->id }};
                $.ajax({
                    url: "{{ route('add-image-product') }}",
                    type: "POST",
                    data: {
                        _token: _token,
                        id: id,
                        image: img
                    },
                    success: function(data) {
                        $('#add-image-form').removeClass('running');
                        $("#add-product").modal('hide');
                        if (data == 1) {
                            toastr.clear()
                            toastr.success('Thêm thành công!');
                            $("#anh-san-pham").addClass('running');
                            $.ajax({
                                url: "{{ route('ajax-image-product') }}",
                                type: "POST",
                                data: {
                                    _token: _token,
                                    id: id,
                                },
                                success: function(data) {
                                    $("#anh-san-pham").removeClass('running');
                                    $("#danh-sach-anh-san-pham").html(data);
                                }
                            });
                        } else {
                            toastr.clear()
                            toastr.error('Sửa thất bại!');
                        }
                    }
                });
            });
        })
        $(".btn-delete-image").click(function() {
            _this = $(this);
            _this.addClass('running');
            id_image = _this.data('id');
            $('#DeleteImage').modal('show');
            _this.removeClass('running');
        })
        $(".btn-cancel").click(function() {
            _this.removeClass('running');
        })
        $(".close").click(function() {
            _this.removeClass('running');
        })
        $(".btn-action").click(function() {
            _this.addClass('running');
            $('#DeleteImage').modal('toggle');
            let _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('delete-image-product') }}",
                type: "POST",
                data: {
                    _token: _token,
                    id: id_image,
                },
                success: function(data) {
                    $(this).removeClass('running');
                    $("#add-product").modal('hide');
                    if (data == 1) {
                        _this.removeClass('running');
                        toastr.clear()
                        toastr.success('Xóa thành công!');
                        $("#anh-san-pham").addClass('running');
                        let id = {{ $category->id }};
                        $.ajax({
                            url: "{{ route('ajax-image-product') }}",
                            type: "POST",
                            data: {
                                _token: _token,
                                id: id,
                            },
                            success: function(data) {
                                $("#anh-san-pham").removeClass('running');
                                $("#danh-sach-anh-san-pham").html(data);
                            }
                        });
                    } else {
                        _this.removeClass('running');
                        toastr.clear()
                        toastr.error('Xóa thất bại!');
                    }
                },
                error: function() {
                    _this.removeClass('running');
                    toastr.clear()
                    toastr.error('Xóa thất bại!');
                }
            });
        })
        //End List Image

        // Image Main
        $(".btn-edit-image-main").click(function() {
            _thiss = $(this);
            _thiss.addClass('running');
            $('#EditImageMain').modal('show');
            _thiss.removeClass('running');
        });
        $(".btn-upload-image-main").click(function() {
            $("#EditImageMainBody").addClass('running');
            resize_main.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(img) {
                let _token = $('meta[name="csrf-token"]').attr('content');
                let id = {{ $category->id }};
                $.ajax({
                    url: "{{ route('edit-image-product') }}",
                    type: "POST",
                    data: {
                        _token: _token,
                        id: id,
                        image: img
                    },
                    success: function(data) {
                        $("#EditImageMainBody").removeClass('running');
                        _thiss.removeClass('running');
                        $('#EditImageMain').modal('hide');
                        if (data == 1) {
                            toastr.clear()
                            toastr.success('Sửa thành công!');
                            $("#image-main").addClass('running');
                            $.ajax({
                                url: "{{ route('ajax-image-product-main') }}",
                                type: "POST",
                                data: {
                                    _token: _token,
                                    id: id,
                                },
                                success: function(data) {
                                    $("#image-main").removeClass('running');
                                    $("#image-main-content").html(data);
                                }
                            });
                        } else {
                            toastr.clear()
                            toastr.error('Sửa thất bại!');
                            $("#image-main").removeClass('running');
                        }
                    }
                });
            });
        })
        var resize_main = $('#demo-image-main').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: 600,
                height: 600,
                type: 'square' //square
            },
            boundary: {
                width: 650,
                height: 650
            }
        });

        $('#edit-image-main').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                resize_main.croppie('bind', {
                    url: e.target.result
                }).then(function() {});
            }
            reader.readAsDataURL(this.files[0]);
        });
        // End Image Main
        $('.btn-old').on('click', function() {
            resize2.croppie('bind', {
                // url: e.target.result
                url: '{{ url($category->image) }}'
            }).then(function() {});
        });
        //
        $(".btn-submit").click(function(e) {

            var _this = $(this);
            if (_this.hasClass('running')) {
                e.preventDefault();
            } else {
                let id = {{ $category->id }};
                let name = $("#name").val();
                let cost_price = $("#cost_price").val();
                let sale_price = $("#sale_price").val();
                let description = $("#description").val();
                let unit = $("#unit").val();
                let info = $("#info").val();
                let count = $("#count").val();
                let status = 0;
                let categories = [];
                $('input.icheck[name ="category_id[]"]:checkbox:checked').each(function() {
                    categories.push($(this).val());
                });
                if ($('#status').is(':checked')) {
                    status = 1;
                }
                if (name == '') {
                    toastr.error('Chưa nhập tên Sản Phẩm!');
                }
                if (name != '') {
                    _this.addClass('running');
                    setTimeout(() => {
                        console.log("World!");
                    }, 2000);
                    let _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{ route('update-category') }}",
                        type: "POST",
                        data: {
                            _token: _token,
                            id: id,
                            category_name: category_name,
                            category_description: category_description
                        },
                        success: function(data) {
                            _this.removeClass('running');
                            if (data.status == 1) {
                                toastr.clear()
                                toastr.success(data.msg);
                                // location.reload();
                            }
                            if (data.status == -1) {
                                toastr.clear()
                                toastr.error(data.msg);
                            }
                            if (data.status == 0) {
                                toastr.clear()
                                let errors = data.errors;
                                $.each(errors, function(index, value) {
                                    toastr.error(value);
                                });
                            }
                        },
                        error: function(data) {
                            $('#edit-form').removeClass('running');
                            toastr.clear()
                            toastr.error("Lỗi! Không thể thêm sản phẩm.");
                        }
                    });
                }
            }

        });
    </script>
@endsection
