@extends('pages.layouts.app')
@section('title', 'Trang Chủ')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if (isset($slide))
                        <div class="col-lg-12 col-md-12 hero__item set-bg" data-setbg="{{ url($slide->image) }}">
                            <div class="hero__text">
                                {{-- <span class="hero__category">{{ $slide->category->name }}</span> --}}
                                <div class="hero_content">
                                    {!! $slide->contents !!}
                                </div>
                                <div class="hero_content">
                                    <h2 style="max-width: 100%; white-space: normal; ">{!! $slide->title !!}</h2>
                                    <p>{!! $slide->sub_title !!}</p>
                                </div>

                                <a href="{{ $slide->link }}" class="primary-btn">{{ trans('page.shop_now') }}
                                    <span></span></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section Begin -->
    <section class="categories featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title">
                        <h2>{{ trans('page.list_category') }}</h2>
                    </div>
                    <div class="categories__slider owl-carousel">
                        @if (isset($categories))
                            @foreach ($categories as $item)
                                <div class="col-lg-3 my-3">
                                    <div class="categories__item shadow set-bg" data-setbg="{{ url($item->image) }}">
                                        <h5><a class="shadow"
                                                href="{{ url('category/' . $item->slug) }}">{{ $item->name }}</a></h5>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ trans('page.product_new') }}</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @if (isset($categories))
                                @foreach ($categories as $item)
                                    <li data-filter=".{{ $item->slug }}">{{ $item->name }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @if ($featured_products)
                    @foreach ($featured_products as $item)
                        <div
                            class="col-lg-3 col-md-4 col-sm-6 mix @foreach ($item->categories as $items) {{ $items->category->slug }} @endforeach">
                            @include('pages.layouts.product', ['product' => $item])
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

@endsection
