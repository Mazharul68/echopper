@extends('layouts.frontend_master')

@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Change image</li>
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
        <h3 class="text-center"><span class="danger">Hi....</span><strong class="text-warning">{{ Auth::user()->name }}</strong> Change Your Profile picture</h3>

      <div class="card-body">
        <form action="{{route('update_image')}}" method="POST" enctype="multipart/form-data">

            @csrf 

            <input type="hidden" name="old_image" value="{{ (Auth::user()->image) }}">

            <div class="form-group">
                <label for="fname"><h4>New Image</h4></label>
            <input type="file" class="form-control" name="image" id="fname">

            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-success">Upload image</button>
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
