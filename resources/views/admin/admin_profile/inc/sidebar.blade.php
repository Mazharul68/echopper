

<div class="card" style="width: 18rem;">

     <img src="{{asset (Auth::user()->image) }}" class="card-img-top" style="border-radius: 50%;" height="100%;" width="100%;" alt="img">

  <ul class="list-group list-group-flush">
    <a href="{{route('admin.dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
    <a href="{{route('image_update')}}" class="btn btn-primary btn-sm btn-block">Update Image</a>
    <a href="{{route('change_password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>

    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick  ="event.preventDefault();
    document.getElementById('logout-form').submit();">LOGOUT</a>
  </ul>
</div>
