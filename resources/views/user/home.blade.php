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
        <h3 class="text-center"><span class="danger">Hi....</span><strong class="text-warning">{{ Auth::user()->name }}</strong> Update Your Profile</h3>

      <div class="card-body">
        <form action="{{route('update.profile')}}" method="POST">

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
                <button class="btn btn-success">Update</button>
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
