@extends('layouts.master')

@section('body')

<body class="hold-transition sidebar-mini {{ \App\Configuration::where('key','theme')->first()->value == 'dark' ? 'dark-mode' : null }} layout-fixed layout-navbar-fixed layout-footer-fixed" id="theme-body">
    <div class="wrapper">

      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset(\App\Configuration::where('key','logo')->first()->value) }}" alt='{{ \App\Configuration::where("key","appName")->first()->value }}Logo' height="60" width="60">
      </div>

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-{{ \App\Configuration::where('key','navbarColor')->first()->value }} navbar-light" id="navbar-body">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/logout') }}" role="button">
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-{{ \App\Configuration::where('key','theme')->first()->value }}-{{ \App\Configuration::where('key','sidebarColor')->first()->value }} elevation-4" id="sidebar-body">
        <!-- Brand Logo -->
        <a href="{{ url('/dashboard') }}" class="brand-link">
          <img src='{{ asset(\App\Configuration::where('key','logo')->first()->value) }}' alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-{{ \App\Configuration::where('key','appName')->first()->value }}">{{ \App\Configuration::where('key','appName')->first()->value }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src='{{ auth()->user()->picture_url }}' class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="{{ url('/profile') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : null }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
              </li>
              @if (auth()->user()->role->id ==1)
                <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('user.*') ? 'active' : null }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href='{{ url("/user/create") }}' class="nav-link {{ Route::is('user.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Register New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a href='{{ url("/user/excel") }}' class="nav-link {{ Route::is('user.excel') ? 'active' : null }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Import Excel</p>
                          </a>
                      </li>
                        <li class="nav-item">
                            <a href='{{ url("/user") }}' class="nav-link {{ Route::is('user.display') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a href='{{ url("/config") }}' class="nav-link {{ Route::is('configuration') ? 'active' : null }}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                      Configuration
                  </p>
                  </a>
                </li>
                @endif
                @if (auth()->user()->role->id == 2)
                  <li class="nav-item">
                    <a href="#" class="nav-link {{ Route::is('categories.*') ? 'active' : null }}">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        Categories
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href='{{ route("categories.create") }}' class="nav-link {{ Route::is('categories.create') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href='{{ route("categories.index") }}' class="nav-link {{ Route::is('categories.index') ? 'active' : null }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link {{ Route::is('products.*') ? 'active' : null }}">
                  <i class="nav-icon fas fa-shopping-cart"></i>
                  <p>
                      Products
                      <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href='{{ route("products.create") }}' class="nav-link {{ Route::is('products.create') ? 'active' : null }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>New</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href='{{ route("products.index") }}' class="nav-link {{ Route::is('products.index') ? 'active' : null }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Lists</p>
                          </a>
                      </li>
                  </ul>
                  </li>
                  <li class="nav-item">
                    <a href='{{ route("feedbacks.index") }}' class="nav-link {{ Route::is('feedbacks.index') ? 'active' : null }}">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Feedbacks
                    </p>
                    </a>
                  </li>
              @endif
              <li class="nav-item">
                <a href="{{ route('orders.index') }}" class="nav-link {{ Route::is('orders.index') ? 'active' : null }}">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Orders
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('shop_all') }}" class="nav-link {{ Route::is('shop_all') ? 'active' : null }}">
                    <i class="nav-icon fas fa-suitcase"></i>
                    <p>
                        Shops
                    </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            @include('layouts.alert')
            @yield('main')
          </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href='{{ url("/") }}'>{{ \App\Configuration::where('key','appName')->first()->value }}</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->

@endsection
