@extends('layouts.fashi')

@section('title', 'Home')

@section('body')

     <!-- Hero Section Begin -->
     <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg='{{ asset(\App\Configuration::where('key','carousel_1_image')->first()->value) }}'>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <!--
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>-->
                                @if (\App\Configuration::where('key','carousel_1_link')->first()->value == 0)
                                   <button class="primary-btn">Shop Now</button>
                                @else
                                    <a href='{{ route("shop_category", ["category" => \App\Configuration::where('key','carousel_1_image')->first()->value]) }}' class="primary-btn">Shop Now</a>
                                @endif

                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>20%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg='{{ asset(\App\Configuration::where('key','carousel_2_image')->first()->value) }}'>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <!--
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>-->
                                @if (\App\Configuration::where('key','carousel_2_link')->first()->value == 0)
                                    <button class="primary-btn">Shop Now</button>
                                @else
                                    <a href='{{ route("shop_category", ["category" => \App\Configuration::where('key','carousel_2_image')->first()->value]) }}' class="primary-btn">Shop Now</a>
                                @endif

                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>20%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg='{{ asset(\App\Configuration::where('key','carousel_3_image')->first()->value) }}'>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <!--
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>-->
                                @if (\App\Configuration::where('key','carousel_3_link')->first()->value == 0)
                                   <button class="primary-btn">Shop Now</button>
                                @else
                                    <a href='{{ route("shop_category", ["category" => \App\Configuration::where('key','carousel_3_image')->first()->value]) }}' class="primary-btn">Shop Now</a>
                                @endif

                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>20%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                @foreach (\App\Category::limit(3)->get() as $category)
                    <div class="col-lg-4">
                        <div class="single-banner">
                            <img src='{{ asset("storage/{$category->products->shuffle()->first()->photos->first()->source}") }}' alt="">
                            <div class="inner-text">
                                <h4>{{ $category->name }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    @foreach (\App\Category::limit(2)->get() as $category)
        <section class="women-banner spad">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="product-large set-bg" data-setbg='{{ asset("storage/{$category->products->shuffle()->first()->photos->first()->source}") }}'>
                            <h2>{{ $category->name }}</h2>
                            <a href='{{ route("shop_category", ["category" => $category->id]) }}'>Discover More</a>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-lg-1">
                        <div class="product-slider owl-carousel">
                            @foreach ($category->products->shuffle()->take(4) as $product)
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src='{{ asset("storage/{$product->photos->first()->source}") }}' alt="">
                                        <div class="sale">Sale</div>
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
                                            @foreach ($product->categories as $category)
                                                {{ $category->name }}
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
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <!-- Women Banner Section Begin -->
    <!--
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                        <h2>Women’s</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="product-slider owl-carousel">
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-1.jpg" alt="">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $14.00
                                    <span>$35.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-2.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Shoes</div>
                                <a href="#">
                                    <h5>Guangzhou sweater</h5>
                                </a>
                                <div class="product-price">
                                    $13.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-3.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="img/products/women-4.jpg" alt="">
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Towel</div>
                                <a href="#">
                                    <h5>Converse Shoes</h5>
                                </a>
                                <div class="product-price">
                                    $34.00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <!-- Women Banner Section End -->


@endsection
