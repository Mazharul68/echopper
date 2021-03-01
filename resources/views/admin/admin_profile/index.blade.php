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
    <h3 class="text-center"><span class="danger">Hi....</span><strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Profile </h3>
  <div class="card-body">
    <form action="{{route('update_data')}}" method="POST" enctype="multipart/form-data">

        @csrf 

        <div class="form-group">
            <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">

        @error('name')
        <span class="text-danger">{{ $message }}</span>
        @enderror

        </div>

        <div class="form-group">
            <label for="name">Email</label>
        <input type="text" class="form-control" name="email" id="name" value="{{Auth::user()->email}}">

        @error('email')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
        <label for="name">Phone Number</label>
        <input type="text" class="form-control" name="phone" id="name" value="{{Auth::user()->phone}}">
        @error('phone')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
         <div class="form-group">
            <button class="btn btn-success">Update_data</button>
        </div>
       </form>
     </div>
   </div>
</div>
  
    </div><!-- row -->
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection