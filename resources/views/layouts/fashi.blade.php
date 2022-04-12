<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ \App\Configuration::where("key","appName")->first()->value }} | @yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href={{ asset("libs/css/bootstrap.min.css") }} type="text/css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' type="text/css">
    <link rel="stylesheet" href='https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css' type="text/css">
    <link rel="stylesheet" href={{ asset("libs/css/elegant-icons.css") }} type="text/css">
    <link rel="stylesheet" href={{ asset("libs/css/owl.carousel.min.css") }} type="text/css">
    <link rel="stylesheet" href={{ asset("libs/css/nice-select.css") }} type="text/css">
    <link rel="stylesheet" href={{ asset("libs/css/jquery-ui.min.css") }} type="text/css">
    <link rel="stylesheet" href={{ asset("libs/css/slicknav.min.css") }} type="text/css">
    <link rel="stylesheet" href={{ asset("libs/css/style.css") }} type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-right">
                    @if (Auth::check())
                        <a href="{{ route('dashboard') }}" class="login-panel"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login-panel"><i class="fa fa-user"></i>Login</a>
                    @endif
                    <div class="top-social">
                        <a href="https://www.facebook.com/toffclothing/"><i class="ti-facebook"></i></a>
                        <a href="https://www.instagram.com/toffclo/"><i class="ti-instagram"></i></a>
                        <a href="{{ route('help') }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Help"><i class="bi bi-info-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                    {{-- <div class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top"> --}}
                        <div class="logo">
                            <a href="{{ route('shop_all') }}">
                                <img src="{{ asset(\App\Configuration::where('key','logo')->first()->value) }}" width="80px" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <form action='{{ route("shop_search") }}' class="input-group" method="POST">
                                @csrf
                                <input type="text" name="search" placeholder="What do you need?">
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    @if (Auth::check())
                        <div class="col-lg-3 text-right col-md-3">
                            <ul class="nav-right">
                                <li class="cart-icon"><a href="{{ route('carts.index') }}">
                                        <i class="icon_bag_alt"></i>
                                        <span>{{ auth()->user()->carts->sum('quantity') }}</span>
                                    </a>
                                    <div class="cart-hover">
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                   @foreach (auth()->user()->carts as $cart)
                                                        <tr>
                                                            <td class="si-pic"><img src='{{ asset("storage/{$cart->product->photos->first()->source}") }}' alt=""></td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>RM {{ $cart->product->price }} x {{ $cart->quantity }}</p>
                                                                    <h6>{{ $cart->product->name }}</h6>
                                                                </div>
                                                            </td>
                                                            <!--
                                                            <td class="si-close">
                                                                <i class="ti-close"></i>
                                                            </td>
                                                            -->
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="select-total">
                                            <span>total:</span>
                                            <h5>RM {{ \App\Cart::sum() }}</h5>
                                        </div>
                                        <div class="select-button">
                                            <a href="{{ route('carts.index') }}" class="primary-btn view-card">VIEW CARD</a>
                                            <a href='{{ route("checkout", ['amount' => \App\Cart::sum() ]) }}' class="primary-btn checkout-btn">CHECK OUT</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-price">RM {{ \App\Cart::sum() }}</li>
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All Categories</span>
                        <ul class="depart-hover">
                            @foreach (\App\Category::all() as $category)
                                <li><a href='{{ route("shop_category", ["category" => $category->id]) }}'>{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><a href="{{ route('mall') }}">Home</a></li>
                        <li><a href="{{ route('shop_all') }}">Shop</a></li>
                        <li><a href="#">Categories</a>
                            <ul class="dropdown">
                                @foreach (\App\Category::all() as $category)
                                    <li><a href='{{ route("shop_category", ["category" => $category->id]) }}'>{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    @yield('body')



    <!-- Partner Logo Section Begin -->
    <!--
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->
        -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="#"><img src='{{ asset("storage/".\App\Configuration::where("key","logo")->first()->value."") }}' alt=""></a>
                        </div>
                        <ul>
                            <li>Address: No.6, Lorong Pauh 3, Taman Pauh, PERMATANG PAUH, 13500, Penang, Malaysia</li>
                            <li>Phone: +60 11-11420239</li>
                            <li>Email: toffclothing04@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/toffclothing/"><i class="ti-facebook"></i></a>
                            <a href="https://www.instagram.com/toffclo/"><i class="ti-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="{{ route('dashboard') }}">My Account</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="{{ route('carts.index') }}">Shopping Cart</a></li>
                            <li><a href="{{ route('shop_all') }}">Shop</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="{{ route('dashboard') }}" target="_blank">{{ \App\Configuration::where("key","appName")->first()->value }}</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src='{{ asset("storage/libs/img/payment-method.png") }}' alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src={{ asset("libs/js/jquery-3.3.1.min.js") }}></script>
    <script src={{ asset("libs/s/bootstrap.min.js") }}></script>
    <script src={{ asset("libs/js/jquery-ui.min.js") }}></script>
    <script src={{ asset("libs/js/jquery.countdown.min.js") }}></script>
    <script src={{ asset("libs/js/jquery.nice-select.min.js") }}></script>
    <script src={{ asset("libs/js/jquery.zoom.min.js") }}></script>
    <script src={{ asset("libs/js/jquery.dd.min.js") }}></script>
    <script src={{ asset("libs/js/jquery.slicknav.js") }}></script>
    <script src={{ asset("libs/js/owl.carousel.min.js") }}></script>
    <script src={{ asset("libs/js/main.js") }}></script>
    <script>
        (function() {
            $('.inc.qtybtn').on('click', function(e){
                console.log($(this).parent().data('product'));
                const productId = $(this).parent().data('product');
                let inc_quantity = $("#quantity_cart_" + productId).val();
                $("#quantity_cart_" + productId).val(parseInt(inc_quantity) + 1);
                $("#update_cart_form_" + productId).submit();

            });
            $('.dec.qtybtn').on('click', function(e){
                console.log($(this).parent().data('product'));
                const productId = $(this).parent().data('product');
                let dec_quantity = $("#quantity_cart_" + productId).val();
                $("#quantity_cart_" + productId).val(parseInt(dec_quantity)- 1);
                $("#update_cart_form_" + productId).submit();
            });
        })();

      </script>
</body>

</html>
