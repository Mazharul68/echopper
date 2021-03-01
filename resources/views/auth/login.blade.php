

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
        @error('banned')
        <h3 class="text-danger text-center">{{ $message }}</h3>
        @enderror
        <div class="sign-in-page">
    <div class="row">
                <!-- Sign-in -->
<div class="col-md-6 col-sm-6 sign-in">

    <h4 class="">Sign in</h4>
    <p class="">Hello, Welcome to your account.</p>
    <div class="social-sign-in outer-top-xs">
        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
    </div>
    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('login') }}">
         @csrf
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="email" value="{{ old('email') }}" placeholder="Email Address">

             @error('email')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" placeholder="Password" name="password">

            @error('password')
             <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
        @enderror

        </div>
        <div class="radio outer-xs">
            <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember me!

            </label>
            <a href="{{ route('password.request') }}" class="forgot-password pull-right">Forgot your Password?</a>
        </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
    </form>
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
    <h4 class="checkout-subtitle">Create a new account</h4>
    <p class="text title-tag-line">Create your new account.</p>

    <form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>

            <input type="email" name="email" value="{{ old('email') }}" class="form-control unicase-form-control text-input" id="exampleInputEmail2" placeholder="Email Address">

            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>

            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Name" name="name" value="{{ old('name') }}">

             @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>

            <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="phone" placeholder="Phone Number">

             @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>

            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Password" name="password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
         <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="confirm Password" name="password_confirmation">
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

         </div>
        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Register</button>
    </form>


</div>
<!-- create a new account -->
</div>
    </div>

    {{-- =================================End======================= --}}
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->




 {{-- <link rel="stylesheet" href="{{asset ('frontend') }}/logi/css/style.css">

<div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form">
          <h2 class="title">Sign in</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Email Address">
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="password">
          </div>
          <input type="submit" value="login" class="btn solid">
          <p class="social-text">Or sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="#" class="sign-up-form">
          <h2 class="title">Sign up</h2>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username">
          </div>

          <div class="input-field">
            <i class="fas fa-phone"></i>
            <input type="text" placeholder="Phone Number">
          </div>

          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" placeholder="Email">
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="password">
          </div>
          <input type="submit" value="sign up" class="btn solid">
          <p class="social-text">Or sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fa fa-facebook"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
        <h3>New Here ?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, blanditiis.</p>
        <button class="btn transparent" id="sign-up-btn">Sign up</button>
      </div>
      <img src="{{asset ('frontend') }}/login/img/rocket.svg" class="image" alt="">
    </div>
    <div class="panel right-panel">
      <div class="content">
      <h3>One of us?</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit, blanditiis.</p>
      <button class="btn transparent" id="sign-in-btn">Sign in</button>
    </div>
    <img src="{{asset ('frontend') }}/login/img/press.svg" class="image" alt="">
  </div>
  </div>
</div>

<script src="https://kit.fontawesome.com/042b6d566d.js" crossorigin="anonymous"></script>
<script src="{{asset ('frontend') }}/login/js/main.js"></script> --}}

 @endsection
