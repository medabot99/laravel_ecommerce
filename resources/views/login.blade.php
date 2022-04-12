@extends('layouts.master')

@section('title','Login')

@section('body')

<body class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="{{ url('/') }}">
            <img src="{{ asset(\App\Configuration::where('key','logo')->first()->value) }}" width="100px" height="100px" />
          </a>
        </div>
        <div class="card-body login-card-body">
          <p class="login-box-msg">Login</p>
           @include('layouts.alert')
          <form action="{{ url('/login') }}" method="post">
            @csrf
            <div class="input-group mb-3" id="username">
              <input type="text" class="form-control" name="username" placeholder="Username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3" id="password">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <a href="{{ url('/register') }}" class="text-center">Register</a>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center mt-2 mb-3">
            <a href="{{ route('facebook.login') }}" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="{{ route('google.login') }}" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="{{ url('/forgot_password') }}">I forgot my password</a>
          </p>

        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
<!-- /.login-box -->

@endsection
