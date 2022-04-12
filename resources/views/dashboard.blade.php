@extends('layouts.body')

@section('title','Dashboard')

@section('main')

<div class="row">
@if (auth()->user()->role->id != 3)
    
  <div class="col-md-6">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Latest Members</h3>

          <div class="card-tools">
            <span class="badge badge-{{ \App\Configuration::where('key','cardColor')->first()->value }}">{{ $latestUsers->count() }} New Members</span>
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="users-list clearfix">
            @foreach ($latestUsers as $user)
                <li>
                    <img src="{{ $user->picture_url }}" alt="User Image" width="100px" height="100px">
                    <a class="users-list-name" href='{{ url("/user/view/{$user->id}") }}'>{{ $user->name }}</a>
                    <span class="users-list-date">{{ $user->created->diffForHumans() }}</span>
                </li>
            @endforeach
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.card-body -->
        @if (auth()->user()->role->id == 1)
        <div class="card-footer text-center">
            <a href="{{ url('/user') }}">View All Users</a>
          </div>
        @endif
        <!-- /.card-footer -->
      </div>
  </div>

  <div class="col-md-6">
    <x-chart.element id="dashboard-user-stats" title="Registered Users Statistics" />
  </div>
@endif
    

</div>
    
@endsection