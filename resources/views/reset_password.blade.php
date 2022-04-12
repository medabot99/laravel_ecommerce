@extends('layouts.master')

@section('title','Reset Password')

@section('body')

<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}">{{ \App\Configuration::where('key','appName')->first()->value }}</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
          @include('layouts.alert')
          <form action="{{ url('/reset_password') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Change password</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          <p class="mt-3 mb-1">
            <a href="{{ url('/login') }}">Login</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
@endsection