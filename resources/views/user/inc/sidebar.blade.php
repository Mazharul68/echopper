


<div class="card" style="width: 18rem;">


     <img src="{{asset (Auth::user()->image) }}" class="card-img-top" style="border-radius: 50%;" height="100%;" width="100%;" alt="img">

  <ul class="list-group list-group-flush">
    <a href="{{route('user.dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>

    <a href="{{route('my-orders')}}" class="btn btn-danger btn-sm btn-block">My Orders</a>
    <a href="{{route('return-orders')}}" class="btn btn-danger btn-sm btn-block">Return Order</a>
    <a href="{{route('cancel-orders')}}" class="btn btn-danger btn-sm btn-block">Cancel Order</a>

    <a href="{{route('user_image')}}" class="btn btn-primary btn-sm btn-block">Update Image</a>
    <a href="{{route('update_password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>


    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick  ="event.preventDefault();
    document.getElementById('logout-form').submit();">LOGOUT</a>

  </ul>
</div>



<!--
<div class="card" style="width: 18rem;">


   <img src="{{asset (Auth::user()->image) }}" class="card-img-top" style="border-radius: 50%;" height="100%;" width="100%;" alt="img">

  <ul class="list-group list-group-flush">
    <a href="{{route('user.dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
    <a href="{{route('user_image')}}" class="btn btn-primary btn-sm btn-block">Update Image</a>
    <a href="{{route('update_password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>

    <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick  ="event.preventDefault();
    document.getElementById('logout-form').submit();">Logout</a>

  </ul>
</div> -->
