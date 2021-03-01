@extends('layouts.frontend_master')

@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Login</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
     <div class="sign-in-page">
       <div class="row">
        <div class="col-sm-6">

      @include('user.inc.sidebar')
       
  </div>
  <div class="col-sm-6">
    <div class="card">
        <h3 class="text-center"><span class="danger">Hi....</span><strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Password</h3>

      <div class="card-body">
        <form action="{{route('store_password')}}" method="POST">

            @csrf 

            <div class="form-group">
                <label for="name">Old Password</label>
            <input type="password" class="form-control" name="old_password" id="name" placeholder="Old Password">
            @error('old_password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="name">New Password</label>
            <input type="password" class="form-control" name="new_password" id="name" placeholder="New Password">

            @error('new_password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label for="name">confirm Password</label>
            <input type="password" class="form-control" name="confirmation_password" id="name" placeholder="Re-type Password">

            @error('confirmation_password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-success">Update Password</button>
            </div>
        </form>
        
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>

@endsection
