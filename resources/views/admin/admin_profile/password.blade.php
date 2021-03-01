@extends('layouts.admin_master')

@section('admin_content')

 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-shooper</a>
        <span class="breadcrumb-item active">Profile</span>
      </nav>

  <div class="sl-pagebody">
    <div class="row row-sm">
      <div class="col-sm-6">

@include('admin.admin_profile.inc.sidebar')
</div>

 <div class="col-sm-6">
    <div class="card">
        <h3 class="text-center"><span class="danger">Hi....</span><strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Password</h3>

      <div class="card-body">
        <form action="{{route('change_password')}}" method="POST">

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
  
    </div><!-- row -->
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection