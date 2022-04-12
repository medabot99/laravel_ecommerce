@extends('layouts.body')

@section('title','Profile')

@section('main')

<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" id="profile-picture-holder"
                 src="{{ auth()->user()->picture_url }}"
                 alt="User profile picture">
          </div>

          <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

          <p class="text-muted text-center">{{ auth()->user()->role->name }}</p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Last Update</b> <a class="float-right">{{ auth()->user()->updated->toFormattedDateString()  }}</a>
            </li>
            <li class="list-group-item">
              <b>Username</b> <a class="float-right">{{ auth()->user()->username  }}</a>
            </li>
            <li class="list-group-item">
              <b>Email</b> <a class="float-right">{{ auth()->user()->email  }}</a>
            </li>
          </ul>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-{{ \App\Configuration::where('key','cardColor')->first()->value }}">
        <div class="card-header">
          <h3 class="card-title">My Details</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong><i class="fa fa-user"></i> Username</strong>

          <p class="text-muted">
            {{ auth()->user()->username }}
          </p>

          <hr>

          <strong><i class="fa fa-user"></i> Name</strong>

          <p class="text-muted">{{ auth()->user()->name }}</p>

          <hr>

          <strong><i class="fa fa-home"></i> Address</strong>

          <p class="text-muted">{{ auth()->user()->address }}</p>

          <hr>

          <strong><i class="fa fa-phone"></i> Phone</strong>

          <p class="text-muted">{{ auth()->user()->phone }}</p>

          <hr>

          <strong><i class="fa fa-user-tag"></i> System Role</strong>

          <p class="text-muted">{{ auth()->user()->role->name }}</p>

          <hr>

          <strong><i class="fa fa fa-sync"></i> Last Update</strong>

          <p class="text-muted">{{ auth()->user()->updated->toFormattedDateString() }}</p>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <!-- <li class="nav-item"><a class="active nav-link" href="#timeline" data-toggle="tab">Activity</a></li> -->
            <li class="nav-item"><a class="active nav-link" href="#settings" data-toggle="tab">Settings</a></li>
            <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <!-- 
            <div class="active tab-pane" id="timeline">
              <div class="timeline timeline-inverse">
                <div class="time-label">
                  <span class="bg-danger">
                    10 Feb. 2014
                  </span>
                </div>

                <div>
                  <i class="fas fa-envelope bg-primary"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a href="#" class="btn btn-primary btn-sm">Read more</a>
                      <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                  </div>
                </div>

                <div>
                  <i class="fas fa-user bg-info"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </div>
                <div>
                  <i class="fas fa-comments bg-warning"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                    </div>
                  </div>
                </div>

                <div class="time-label">
                  <span class="bg-success">
                    3 Jan. 2014
                  </span>
                </div>

                <div>
                  <i class="fas fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                      <img src="https://placehold.it/150x100" alt="...">
                    </div>
                  </div>
                </div>
                <div>
                  <i class="far fa-clock bg-gray"></i>
                </div>
              </div>
            </div> -->

            <div class="active tab-pane" id="settings">
              <form action="{{ url('/profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-forms.input.flat type="text" id="username" placeholder="Username" required :value="auth()->user()->username"/>
                <x-forms.input.flat type="text" id="name" placeholder="Name" required :value="auth()->user()->name"/>
                <x-forms.input.flat type="email" id="email" placeholder="Email" required :value="auth()->user()->email"/>
                <x-forms.input.flat type="number" id="phone" placeholder="Phone" :value="auth()->user()->phone"/>
                <x-forms.textarea.flat id="address" placeholder="Address" :value="auth()->user()->address"/>
                <x-forms.file-input.element id="picture" label="Profile Picture (If empty, current one will be used)" placeholder="Upload Picture"/>
                <div class="row">
                    <div class="col-md-2">
                        <x-buttons.quick type="submit" placeholder="Save" color="success" icon="fa-save" size="xs"/>
                    </div>
                    <div class="col-md-2">
                        <x-buttons.quick type="reset" placeholder="Reset" color="default" icon="fa-sync" size="xs"/>
                    </div>
                </div>
              </form>
            </div>
            <!-- /.tab-pane -->

            <div class="tab-pane" id="password">
              <form action="{{ url('/password') }}" method="POST">
                @csrf
                @method('PUT')
                <x-forms.input.flat type="password" id="old_password" placeholder="Current Password" required/>
                <x-forms.input.flat type="password" id="password" placeholder="New Password" required/>
                <x-forms.input.flat type="password" id="password_confirmation" placeholder="Retype-type Password" required/>
                <div class="row">
                    <div class="col-md-2">
                        <x-buttons.quick type="submit" placeholder="Save" color="success" icon="fa-save" size="xs"/>
                    </div>
                    <div class="col-md-2">
                        <x-buttons.quick type="reset" placeholder="Reset" color="default" icon="fa-sync" size="xs"/>
                    </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

@endsection