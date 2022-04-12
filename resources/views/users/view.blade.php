@extends('layouts.body')

@section('title','Profile')

@section('main')

<div class="row">

    <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header text-white"
               style='background: url({{ asset("dist/img/photo1.png") }}) center center;'>
            <h3 class="widget-user-username text-right">{{ $user->name }}</h3>
            <h5 class="widget-user-desc text-right">{{ $user->role->name }}</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle" src="{{ $user->picture_url }}" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{ $user->updated->toFormattedDateString()  }}</h5>
                  <span class="description-text">Last Update</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">{{ $user->username }}</h5>
                  <span class="description-text">Username</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">{{ $user->email }}</h5>
                  <span class="description-text">Email</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>

    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fa fa-user-circle"></i>&nbsp;Profile Details
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <dl class="row">
                <dt class="col-sm-4"><i class="fa fa-user"></i>&nbsp;Username</dt>
                <dd class="col-sm-8">{{ $user->username_display }}</dd>
                <dt class="col-sm-4"><i class="fa fa-user"></i>&nbsp;Name</dt>
                <dd class="col-sm-8">{{ $user->name }}</dd>
                <dt class="col-sm-4"><i class="fa fa-home"></i>&nbsp;Address</dt>
                <dd class="col-sm-8">{{ $user->address }}</dd>
                <dt class="col-sm-4"><i class="fa fa-phone"></i>&nbsp;Phone</dt>
                <dd class="col-sm-8">{{ $user->phone }}</dd>
                <dt class="col-sm-4"><i class="fa fa-user-tag"></i>&nbsp;System Role</dt>
                <dd class="col-sm-8">{{ $user->role->name }}</dd>
                <dt class="col-sm-4"><i class="fa fa-sync"></i>&nbsp;Last Update</dt>
                <dd class="col-sm-8">{{ $user->updated->toFormattedDateString() }}</dd>
              </dl>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

    </div>

</div>

@endsection