@extends('layouts.body')

@section('title','Change Password')

@section('main')

<div class="row">

    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>

                <h2 class="panel-title">Change Your Password</h2>
            </header>
            <div class="panel-body">
                @if($errors->any())
                    <x-alert type="danger" header="Error" :message="$errors" />
                @endif
                @if (session()->has('success'))
                    <x-alert type="success" header="Success" :message="session()->get('success')" />
                @endif
                <form class="form-horizontal form-bordered" action={{ url("/password") }} method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputPassword">Old Password</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-key"></i></span>
                                </span>
                                <input type="password" name="old_password" required class="form-control" placeholder="Old Password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputPassword">New Password</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-key"></i></span>
                                </span>
                                <input type="password" name="password" required class="form-control" placeholder="New Password">
                            </div>
                            <span class="help-block">At least 6 characters.</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputPassword">Confirm Password</label>
                        <div class="col-md-6">
                            <div class="input-group input-group-icon">
                                <span class="input-group-addon">
                                    <span class="icon"><i class="fa fa-key"></i></span>
                                </span>
                                <input type="password" name="password_confirmation" required class="form-control" placeholder="Password">
                            </div>
                            <span class="help-block">At least 6 characters.</span>
                        </div>
                    </div>

                    <button type="submit" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-save"></i> Change</button>

                    <button type="reset" class="mb-xs mt-xs mr-xs btn btn-default"><i class="fa fa-refresh"></i> Reset</button>
            
                </form>
            </div>
        </section>

    </div>

</div>
    
@endsection