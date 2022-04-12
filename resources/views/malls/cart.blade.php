@extends('layouts.fashi')

@section('title', 'Cart')

@section('body')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ route('mall') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('shop_all') }}">Shop</a>
                    <span>@yield('title')</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th class="p-name">Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <!--<th><i class="ti-close"></i></th>-->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                                <tr>
                                    <td class="cart-pic first-row"><img src='{{ asset("storage/{$cart->product->photos->first()->source}") }}' alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{ $cart->product->name }}</h5>
                                    </td>
                                    <td class="p-price first-row">RM {{ $cart->product->price }}</td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty" data-product="{{ $cart->product->id }}">
                                                <form id="update_cart_form_{{ $cart->product->id }}" action='{{ route("carts.update", ["cart" => $cart->id]) }}' method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" id="quantity_cart_{{ $cart->product->id }}" value='{{ $cart->quantity }}' onchange="this.form.submit()" name="quantity" onkeyup="this.form.submit()">
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">{{ $cart->product->price * $cart->quantity }}</td>
                                    <!--<td class="close-td first-row"><i class="ti-close"></i></td>-->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="{{ route('shop_all') }}" class="primary-btn continue-shop">Continue shopping</a>
                            <!-- <a href="#" class="primary-btn up-cart">Update cart</a> -->
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span>RM {{ $sum }}</span></li>
                                <li class="cart-total">Total <span>RM {{ $sum }}</span></li>
                            </ul>
                            <a href='{{ route("checkout", ['amount' => $sum]) }}' class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->


@endsection