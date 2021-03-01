@extends('layouts.admin_master')

@section('admin_content')

 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">E-shooper</a>
        <span class="breadcrumb-item active">Edit-Image</span>
      </nav>

  <div class="sl-pagebody">
    <div class="row row-sm">
      <div class="col-sm-6">

@include('admin.admin_profile.inc.sidebar')
</div>
 <div class="col-sm-6">
    <div class="card">
        <h3 class="text-center"><span class="danger">Hi....</span><strong class="text-warning">{{ Auth::user()->name }}</strong> Change Your Profile picture</h3>

      <div class="card-body">
        <form action="{{route('store_image')}}" method="POST" enctype="multipart/form-data">

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

    </div><!-- row -->
  </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->

@endsection