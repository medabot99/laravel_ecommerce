@extends('layouts.fashi')

@section('title', 'Shop')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('mall') }}"><i class="fa fa-home"></i> Home</a>
                    <span>@yield('title')</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">
                        @foreach ($categories as $ctgry)
                            <li><a href='{{ route("shop_category", ["category" => $ctgry->id]) }}'>{{ $ctgry->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <form action="{{ route('shop_filter') }}" method="post">
                                @csrf
                                <div class="select-option">
                                    <select class="sorting" name="sort" onchange="this.form.submit()">
                                        <option value="default" {{ isset($sort) && $sort == "default" ? "selected" : null }}>Default</option>
                                        <option value="price_low_high" {{ isset($sort) && $sort == "price_low_high" ? "selected" : null }}>Price (Low-High)</option>
                                        <option value="price_high_low" {{ isset($sort) && $sort == "price_high_low" ? "selected" : null }}>Price (High-Low)</option>
                                    </select>
                                    <select class="p-show" name="limit" onchange="this.form.submit()">
                                        <option value="9" {{ isset($limit) && $limit == "9" ? "selected" : null }}>Show: 9</option>
                                        <option value="18" {{ isset($limit) && $limit == "18" ? "selected" : null }}>Show: 18</option>
                                        <option value="36" {{ isset($limit) && $limit == "36" ? "selected" : null }}>Show: 36</option>
                                        <option value="72" {{ isset($limit) && $limit == "72" ? "selected" : null }}>Show: 72</option>
                                        <option value="all" {{ isset($limit) && $limit == "all" ? "selected" : null }}>Show: All</option>
                                    </select>
                                    @if ($cat)
                                        <input type="hidden" name="cat" value="{{ $category->id }}" />
                                    @endif
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>Show 1-{{ isset($limit) && $limit != "all" && $limit < $products->count() ? $limit :  $products->count() }} Of {{ $products->count() }} Product</p>
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src='{{ asset("storage/{$product->photos->first()->source}") }}' alt="">
                                        <div class="sale pp-sale">Sale</div>
                                        <!--
                                            <div class="icon">
                                                <i class="icon_heart_alt"></i>
                                            </div>
                                        -->
                                        <ul>
                                            @if (Auth::check())
                                                <li class="w-icon active"><a href='{{ route("carts.create", ["product" => $product->id]) }}'><i class="icon_bag_alt"></i></a></li>
                                            @endif
                                            <!--
                                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                            -->
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            @foreach ($product->categories as $ct)
                                                {{ $ct->name }}
                                            @endforeach
                                        </div>
                                        <a href="#">
                                            <h5>{{ $product->name }}</h5>
                                        </a>
                                        <div class="product-price">
                                            RM {{ $product->price }}
                                            <!--
                                                <span>$35.00</span>
                                            -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

@endsection