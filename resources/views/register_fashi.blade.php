@extends('layouts.fashi')

@section('title', 'Register')

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
                    <div class="register-form">
                        <h2>Register</h2>
                        @include('layouts.alert')
                        <form action="{{ url('/register') }}" method="post">
                            @csrf
                            <div class="group-input">
                                <label for="username">Username *</label>
                                <input type="text" id="username" name="username" required>
                            </div>
                            <div class="group-input">
                                <label for="email">Email Address *</label>
                                <input type="email" id="username" name="email" required>
                            </div>
                            <div class="group-input">
                                <label for="name">Name *</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="pass" name="password">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="text" id="con-pass" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{ route('login') }}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    


@endsection