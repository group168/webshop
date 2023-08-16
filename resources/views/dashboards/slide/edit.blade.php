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
                        <li class="breadcrumb-item"><a href="{{ route('product') }}"><i class="fas fa-archive"></i> User</a>
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
                    <div class="row">
                        <div class="col-12 text-center">
                            <h4 class="m-1 text-primary">SỬA SLIDES</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body table-border-style">
                    <form action="{{ route('update-sliders', ['id' => $slider->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group fill">
                                    <label for="title">Tiêu đề</label>
                                    <input name="title" type="text" class="form-control" id="title"
                                        value="{{ $slider->title }}">
                                </div>
                                <div class="form-group fill">
                                    <label for="sub_title">Tiêu đề con</label>
                                    <input name="sub_title" type="text" class="form-control" id="sub_title"
                                        value="{{ $slider->sub_title }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill">
                                    <label for="category_id">Tên danh mục</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value=""></option>
                                        @if ($category)
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group fill">
                                    <label for="link">Link</label>
                                    <input type="text" name="link" class="form-control" id="link"
                                        value="{{ $item->link }}" aria-describedby="Link" placeholder="Link">
                                    <small class="form-text text-muted"></small>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Hình ảnh</label>
                                    <div class="custom-file">
                                        <input name="image" type="file" class="custom-file-input" id="image"
                                            accept="image/*">
                                        <label class="custom-file-label" for="image">Choose file...</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group fill">
                                    <div class="col-12 text-center">
                                        <div id="upload-demo"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center p-2">
                            <button class="btn btn-light btn-submit mx-4 ld-over" type="submit">Update<div
                                    class="ld ld-ring ld-spin"></div>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection
@section('script')
    <script>
        var resize = $('#upload-demo').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: {
                width: 600,
                height: 300,
                type: 'square' //square
            },
            boundary: {
                width: 650,
                height: 350
            }
        });
        $('#image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                resize.croppie('bind', {
                    url: e.target.result
                }).then(function() {});
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
