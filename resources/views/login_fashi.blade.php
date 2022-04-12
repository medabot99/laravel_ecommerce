@extends('layouts.fashi')

@section('title', 'Login')

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
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>
                    @include('layouts.alert')
                    <form action="{{ url('/login') }}" method="post">
                        @csrf
                        <div class="group-input">
                            <label for="username">Username *</label>
                            <input type="text" id="username" required name="username">
                        </div>
                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" id="pass" required name="password">
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input type="checkbox" name="remember" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="{{ url('/forgot_password') }}" class="forget-pass">Forget your Password</a>
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">Sign In</button>
                    </form>
                    <div class="switch-login">
                        <a href="{{ route('register') }}" class="or-login">Or Create An Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection