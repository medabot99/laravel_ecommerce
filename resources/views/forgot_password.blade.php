@extends('layouts.master')

@section('title','Forgot Password')

@section('body')

<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}">{{ \App\Configuration::where('key','appName')->first()->value }}</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
          @include('layouts.alert')
          <form action="{{ url('/forgot_password') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          <p class="mt-3 mb-1">
            <a href="{{ url('/login') }}">Login</a>
          </p>
          <p class="mb-0">
            <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
<!-- /.login-box -->

@endsection