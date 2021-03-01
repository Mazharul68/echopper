<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
       <link rel="shortcut icon" href="{{ asset('frontend') }}/img/baby.jpg" type="image/x-icon">

        <title> @yield('title')</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">

	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/main.css">
	    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/blue.css">
	    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.carousel.css">
		<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.transitions.css">
		<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/animate.min.css">
		<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/rateit.css">
		<link rel="stylesheet" href="{{asset('frontend')}}/assets/css/bootstrap-select.min.css">




		<!-- Icons/Glyphs -->
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/lib/toastr/toastr.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

        <!-- Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- Stipe js -->
        <script src="https://js.stripe.com/v3/"></script>


	</head>
    <body class="cnt-home">


		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
                    <li><a href="#"><i class="icon fa fa-user"></i>

                        @if(session()->get('language')=='bangla')
                        আমার প্রোফাইল
                        @else
                        My account
                        @endif

                    </a></li>
                    <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>
                        @if(session()->get('language')=='bangla')
                        ইচ্ছেতালিকা
                        @else
                        Wishlist
                        @endif
                    </a></li>
                    <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>
                        @if(session()->get('language')=='bangla')
                        আমার কার্ট
                        @else
                        My Cart
                        @endif
                    </a></li>
                    <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>
                    @if(session()->get('language')=='bangla')
                      চেকআউট
                      @else
                        Checkout
                        @endif
                    </a></li>
					@auth

                    <li><a href="{{route('user.dashboard')}}"><i class="icon fa fa-lock"></i>
                        @if(session()->get('language')=='bangla')
                        আমার প্রোফাইল
                    @else
                    My Profile
                    @endif
                    </a></li>
					<li>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                   </form>
                  </li>
					@else
                    <li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>
                        @if(session()->get('language')=='bangla')
                        প্রবেশ করুন/ নিবন্ধন করুন
                        @else
                        login/regiester
                        @endif
                    </a></li>

					@endauth
				</ul>
			</div><!-- /.cnt-account -->



			<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					{{-- <li class="dropdown dropdown-small">
						<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">USD</a></li>
							<li><a href="#">INR</a></li>
							<li><a href="#">GBP</a></li>
						</ul>
					</li> --}}

					<li class="dropdown dropdown-small">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"> <i class="fa fa-envelope"></i> @if (session()->get('language') == 'bangla') ই-মেইল
                             @else e-mail @endif</span><b class="caret"></b></a>
						<ul class="dropdown-menu">
                            <li><a href="">eng.mazharul2@gmail.com</a></li>
						</ul>
                    </li>

                    <li class="dropdown dropdown-small">
                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value"> @if (session()->get('language') == 'bangla') ভাষা পরিবর্তন করুন @else Language @endif</span><b class="caret"></b></a>
						<ul class="dropdown-menu">

                            @if (session()->get('language') == 'bangla')
                            <li><a href="{{route ('english.language') }}">English</a></li>
                            @else
                            <li><a href="{{route ('bangla.language') }}">বাংলা</a></li>
                            @endif
						</ul>
					</li>
				</ul><!-- /.list-unstyled -->
			</div><!-- /.cnt-cart -->
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ============================================== TOP MENU : END ============================================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
	<a href="{{url('/')}}">
        <img src="{{asset('frontend')}}/assets/images/logo.png" alt="">
	</a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <form>
        <div class="control-group">

            <ul class="categories-filter animate-dropdown">
                <li class="dropdown">

                    <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">
                        @if (session()->get('language') == 'bangla')
                        ক্যাটাগরি
                        @else
                        Categories
                        @endif
                        <b class="caret"></b></a>

                        @php
                       $categories = App\models\category::orderBy('category_name_en','ASC')->get();
                     @endphp

                    <ul class="dropdown-menu" role="menu" >
                        @foreach ($categories as $category)
                        <li class="menu-header">
                            @if (session()->get('language') == 'bangla') {{ $category->category_name_bn }}
                            @else
                            {{ $category->category_name_en }}
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <input class="search-field" placeholder="
            @if(session()->get('language')=='bangla')
            অনুসন্ধান করুন
            @else
            Search here...
            @endif
            " />

            <a class="search-button" href="#" ></a>

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->
</div><!-- /.top-search-holder -->

	<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
					<!-- ======== SHOPPING CART DROPDOWN =================== -->

	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
            <div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count" id="CartQyt"></span></div>
				<div class="total-price-basket">
					<span class="lbl">
                        @if(session()->get('language')== 'bangla')
                        কার্ট -
                        @else
                        cart -
                        @endif
                    </span>
					<span class="total-price">
						<span class="sign"> ৳ </span><span class="value" id="CartSubtotal"></span>
					</span>
				</div>


		    </div>
		</a>
		<ul class="dropdown-menu">

			<li>
                <!-- Mini Cart start With Ajax -->
                <div id="miniCart">

                </div>
				<!--End Mini Cart start With Ajax -->
			<hr>

			<div class="clearfix cart-total">
				<div class="pull-right">

					<span class="text">
                        @if(session()->get('language')== 'bangla')
                        সাব-টোটাল =
                        @else
                        Sub Total =
                        @endif
                    </span><span class='price' id="CartSubtotal"></span>

				</div>
				<div class="clearfix"></div>

				<a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
			</div><!-- /.cart-total-->


		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->

	<!-- ============================================== NAVBAR ============================================== -->
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
<div class="nav-bg-class">
  <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer">
	  <ul class="nav navbar-nav">
		<li class="active dropdown yamm-fw">
			<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                @if(session()->get('language')== 'bangla')
                হোম
                @else
                Home
                @endif
            </a>
        </li>

        @php
            $categories = App\models\category::orderBy('category_name_en','ASC')->get();
        @endphp

    @foreach ($categories as $category)
	 <li class="dropdown yamm mega-menu">

        @if (session()->get('language') == 'bangla')

        <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name_bn }}</a>

        @else
             <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name_en }}</a>
        @endif

         <ul class="dropdown-menu container">
             <li>
                <div class="yamm-content ">
                   <div class="row">
                        @php
                        $subcategories = App\models\subcategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                        @endphp

                    @foreach ($subcategories as $subcat)
                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                            @if (session()->get('language')== 'bangla')
                            <a href=""><h2 class="title">{{ $subcat->subcategory_name_bn }}</h2></a>
                            @else
                            <a href=""><h2 class="title">{{ $subcat->subcategory_name_en }}</h2></a>
                            @endif

                            @php
                                 $subsubcategories = App\models\Subsubcategory::where('subcategory_id',$subcat->id)->orderBy('subsubcategory_name_en')->get();
                            @endphp
                            <ul class="links">
                            @foreach ($subsubcategories as $subsubcat)
                                  <li>
                                    @if(session()->get('language')=='bangla')
                                      <a href="#">{{ $subsubcat->subsubcategory_name_bn }}</a>
                                    @else
                                       <a href="#">{{ $subsubcat->subsubcategory_name_en }}</a>
                                    @endif
                                    </li>
                            @endforeach
                            </ul>
                        </div><!-- /.col -->
                    @endforeach

                       <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                           <img class="img-responsive" src="{{asset('frontend')}}/assets/images/banners/top-menu-banner.jpg" alt="">
                       </div><!-- /.yamm-content -->
                   </div>
                </div>
            </li>
		</ul>
    </li>
  @endforeach

     {{-- <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
            <ul class="dropdown-menu pages">
            <li>
                <div class="yamm-content">
                <div class="row">
                    <div class="col-xs-12 col-menu">
                        <ul class="links">
                            <li><a href="home.html">Home</a></li>
                        </ul>
                        </div>
                        </div>
                    </div>
                </li>
            </ul>
    </li> --}}
    <li class="dropdown  navbar-right special-menu"><a href="#">
        @if(session()->get('language')== 'bangla')
        আজকের ছাড় !
        @else
        Todays offer
        @endif
    </a></li>
  </ul><!-- /.navbar-nav -->
		               <div class="clearfix"></div>
                	</div><!-- /.nav-outer -->
                </div><!-- /.navbar-collapse -->
            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->
</div><!-- /.header-nav -->
<!-- ============================================== NAVBAR : END ============================================== -->

</header>

<!-- ============================================== HEADER : END ============================================== -->


  @yield('content')

<!--   Brands_include Here -->
	@include('frontend.inc.brand')


<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
        <ul class="toggle-footer" style="">
            <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>+(888) 123-4567<br>+(888) 456-7890</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <span><a href="#">flipmart@themesground.com</a></span>
                </div>
            </li>

            </ul>
    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                <li><a href="#" title="About us">Order History</a></li>
                <li><a href="#" title="faq">FAQ</a></li>
                <li><a href="#" title="Popular Searches">Specials</a></li>
                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                          <li class="first"><a title="Your Account" href="#">About us</a></li>
                <li><a title="Information" href="#">Customer Service</a></li>
                <li><a title="Addresses" href="#">Company</a></li>
                <li><a title="Addresses" href="#">Investor Relations</a></li>
                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                <li><a href="#" title="Blog">Blog</a></li>
                <li><a href="#" title="Company">Company</a></li>
                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                  <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                  <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                  <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                  <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                  <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                  <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                  <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="{{asset('frontend')}}/assets/images/payments/1.png" alt=""></li>
                        <li><img src="{{asset('frontend')}}/assets/images/payments/2.png" alt=""></li>
                        <li><img src="{{asset('frontend')}}/assets/images/payments/3.png" alt=""></li>
                        <li><img src="{{asset('frontend')}}/assets/images/payments/4.png" alt=""></li>
                        <li><img src="{{asset('frontend')}}/assets/images/payments/5.png" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>
<!-- ============================================================= FOOTER : END============================================================= -->

{{-- ==================Product Card Modal========================== --}}
<!-- Modal -->
<div class="modal fade" id="carmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel" style="display: inline">Product Nane: <strong id="pname"></strong></h5>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 30px;" id="closeModal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 16rem">
                    <img src="" class="card-img-top" id="pimage" style="height: 200px;">
                </div>

            </div>
            <div class="col-md-4">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-info">Price : <strong class="text-success">৳ <span id="pprice"></span></strong>
                    <del id="oldprice"></del></li>
                    <li class="list-group-item list-group-item-info">product Code : <strong id="pcode"></strong></li>
                    <li class="list-group-item list-group-item-info">Category : <strong id="pcategory"></strong></li>
                    <li class="list-group-item list-group-item-info">Brand : <strong id="pbrand"></strong></li>
                    <li class="list-group-item list-group-item-info">Stock :

                    <span class="badge badge-pill" id="availble" style="background: green; color: white;"></span>
                    <span class="badge badge-pill" style="background: red; color:white;" id="stockout"></span>
                </li>

                  </ul>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="color">Select Color</label>
                    <select id="color" class="form-control" name="color">


                    </select>
                </div>
                <div class="form-group" id="sizearea">
                    <label for="size">Select size</label>
                    <select id="size" class="form-control" name="size">


                    </select>
                </div>
                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <select class="form-control">
                        <input type="number" class="form-control" id="qty" value="1" min="1">

                    </select>
                </div>
                <input type="hidden" id="product_id">
                <button type="submit" class="btn btn-success" onclick="addToCart()">Add To Card</button>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

	<!-- For demo purposes – can be removed on production -->


	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="{{asset('frontend')}}/assets/js/jquery-1.11.1.min.js"></script>

	<script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>

	<script src="{{asset('frontend')}}/assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>

	<script src="{{asset('frontend')}}/assets/js/echo.min.js"></script>
	<script src="{{asset('frontend')}}/assets/js/jquery.easing-1.3.min.js"></script>
	<script src="{{asset('frontend')}}/assets/js/bootstrap-slider.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/jquery.rateit.min.js"></script>
    <script type="{{asset('frontend')}}/text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/bootstrap-select.min.js"></script>
    <script src="{{asset('frontend')}}/assets/js/wow.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('frontend') }}/assets/js/sweetalert2@8.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.79/jquery.form-validator.min.js" integrity="sha512-7+hQkXGIswtBWoGbyajZqqrC8sa3OYW+gJw5FzW/XzU/lq6kScphPSlj4AyJb91MjPkQc+mPQ3bZ90c/dcUO5w==" crossorigin="anonymous"></script>

    <script>
        $.validate({
            lang: 'en'
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://kit.fontawesome.com/042b6d566d.js" crossorigin="anonymous"></script>
    <script src="{{asset('frontend')}}/assets/js/scripts.js"></script>


     <!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();
    obj.post_code = $('#post_code').val();
    obj.division_id = $('#division_id').val();
    obj.district_id = $('#district_id').val();
    obj.thana_id = $('#thana_id').val();
    obj.notes = $('#notes').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>


<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>



    <!-- Start Prodct view with Modal -->
	<script>

		@if(Session::has('message'))

        var type ="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                toastr.info(" {{Session::get('message')}} ");
                break;

            case 'success':
                toastr.success(" {{Session::get('message')}} ");
                break;

            case 'warning':
                toastr.warning(" {{Session::get('message')}} ");
                break;

            case 'error':
                toastr.error(" {{Session::get('message')}} ");
                break;
        }
    @endif
    </script>

    <script type="text/javascript">
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function ProductView(id){
        $.ajax({
            type:'GET',
            url:'/product/view/modal/'+id,
            dataType:'json',
            success:function(data){
                $('#pname').text(data.product.product_name_en);
                $('#price').text(data.product.selling_price);
                $('#pcode').text(data.product.product_code);
                $('#pcategory').text(data.product.category.category_name_en);
                $('#pbrand').text(data.product.brand.brand_name_en);
                $('#pimage').attr('src','/'+data.product.product_thambnail);
                $('#product_id').val(id);
                $('#qty').val(1);

                //Product Price Start
                if(data.product.discount_price == null)
                {
                    $('#pprice').text('');
                    $('#oldprice').text('');
                    $('#pprice').text(data.product.selling_price);
                }else{
                    $('#pprice').text(data.product.discount_price);
                    $('#oldprice').text(data.product.selling_price);
                }
                // Product Price End

                //Product Stock Start
                if(data.product.product_qty > 0){

                    $('#availble').text('');
                    $('#stockout').text('');
                    $('#availble').text('availble');
                }else{
                    $('#availble').text('');
                    $('#stockout').text('');
                    $('#stockout').text('stockout');
                }
                // Product Stock End
                //color Show
                $('select[name="color"]').empty();
                $.each(data.color_en,function(key,value){
                    $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>')
                })

                //Size Show
                $('select[name="size"]').empty();
                $.each(data.size_en,function(key,value){
                    $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>')
                    if(data.size_en == ""){
                        $('#sizearea').hide();
                    }else{
                        $('#sizearea').show();
                    }
                })
            }
        })
    }
    // End Product with modal End
    // Start Add to Cart
    function addToCart(){
        var product_name = $('#pname').text();
       var id = $('#product_id').val();
       var color = $('#color option:selected').text();
       var size = $('#size option:selected').text();
       var quantity = $('#qty').val();

       $.ajax({
           type: "POST",
           dataType: 'json',
           data:{
               color:color,
               size:size,
               quantity:quantity,
               product_name:product_name
           },
           url:"/add/data/store/"+id,
           success:function(data){
            miniCart();

            $('#closeModal').click();

            //  start message
            const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 9000
                      })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
                    //  end message

           }
       })

    }

    // End Add to Cart
    </script>

    <script>
         function miniCart(){
        $.ajax({
            type:'GET',
            url:'/product/mini/cart',
            dataType:'json',
            success:function(response){
                $('span[id="CartSubtotal"]').text(response.cartTotal);
                $('#CartQyt').text(response.cartQty);
                var miniCart = ""
                $.each(response.carts,function(key,value){
                    miniCart += `<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="detail.html"><img src="/${value.options.image}"></a>
							</div>
						</div>
						<div class="col-xs-7">

							<h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
							<div class="price">${value.price} * ${value.qty} ৳</div>
						</div>
						<div class="col-xs-1 action">
							<button type="submit" id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fa fa-trash"></i></button>
						</div>
					</div>
				</div><!-- /.cart-item -->
				<div class="clearfix"></div> <hr>`
                });
                $('#miniCart').html(miniCart);
            }
        })
    }
    miniCart();
    // Mini Cart Remove Start
    function minicartRemove(rowId){

        $.ajax({
            type:'GET',
            url:'/minicart/product/remove/'+rowId,
            dataType:'json',
            success:function(data){
                miniCart();
                //  start message
            const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 9000
                      })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
                    //  end message
            }
        });
    }
    // Mini Cart Remove Start
    </script>
    <!--Add To Wishlist -->
    <script>
        function AddToWishlist(product_id){

       $.ajax({
           type: "POST",
           dataType: 'json',
           url:"/add-to/wishlist/"+product_id,
           success:function(data){
            //  start message
            const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 6000
                      })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
                    //  end message

           }
       })

    }
    </script>

    {{-- //Wishlist- Page Start Here --}}

    <script>
        function Wishlist(){
       $.ajax({
           type:'GET',
           url:"{{ url('/user/get-wishlist-product') }}",
           dataType:'json',
           success:function(response){
               var rows = ""
               $.each(response,function(key,value){
                                rows += `<tr>
                                    <td class="col-md-2"><img src="/${value.product.product_thambnail}" alt="imga"></td>
                                    <td class="col-md-7">
                                        <div class="product-name">${value.product.product_name_en}<a href="#"></a></div>


                                        <div class="price">
                                            ${value.product.discount_price == null
                                            ? `$${value.product.selling_price}`
                                            :
                                            `$${value.product.discount_price}<span>$${value.product.selling_price}</span>`
                                            }

                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <button type="button" title="Add Cart" class="btn-upper btn btn-primary" data-toggle="modal" data-target="#carmodal" id="${value.product_id}" onclick="ProductView(this.id)">Add to cart</button>
                                    </td>
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" id="${value.id}" onclick="wishlistremove(this.id)"><i class="fa fa-trash" title="delete"></i></button>
                                    </td>
                                </tr>`
               });
               $('#wishlist').html(rows);
           }
       })
    }
    Wishlist();
    // Wishlist Remove Start
    function wishlistremove(id){
        $.ajax({
            type:'GET',
            url:"{{ url('/user/wishlist-remove/') }}/"+id,
            dataType:'json',
            success:function(data){
                Wishlist();
                //  start message
            const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 9000
                      })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
                    //  end message
            }
        });
    }
    // Wishlist Remove End
    </script>

    {{-- ==========================My Cart Page Start Here============================= --}}

    <script>
        function cart(){
       $.ajax({
           type:'GET',
           url:"{{ url('/get-cart-product') }}",
           dataType:'json',
           success:function(response){
               var rows = ""
               $.each(response.carts,function(key,value){
                                rows += `<tr>
                                    <td class="col-md-2"><img src="/${value.options.image}" style="width:150px; height:120px;"></td>
                                    <td class="col-md-2">
                                        <div class="product-name">${value.name}<a href="#"></a></div>

                                        <div class="price">
                                            $${value.price}

                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                    <strong>${value.options.color}</strong>
                                    </td>

                                    <td class="col-md-2">
                                    ${value.options.size ==null
                                    ?`<span>.....   </span>`
                                    :
                                    `<strong>${value.options.size}</strong>`
                                    }
                                    </td>
                                    <td class="col-md-2">
                                    <button class="btn btn-primary btn-sm" id="${value.rowId}" onclick="CartIncrement(this.id)">+</button>
                                     <input type="text" value="${value.qty}" min="1" max="100" style="width:25px;" disabled>

                                     ${value.qty > 1
                                     ? `<button class="btn btn-danger btn-sm" id="${value.rowId}" onclick="CartDecrement(this.id)">-</button>`
                                     : `<button class="btn btn-danger btn-sm" disabled>-</button>`
                                     }

                                    </td>

                                    <td class="col-md-1">
                                    <strong>৳ ${value.subtotal}</strong>
                                    </td>

                                    <td class="col-md-1 close-btn">
                                        <button type="submit" id="${value.rowId}" onclick="Cartremove(this.id)"><i class="fa fa-trash" title="delete"></i></button>
                                    </td>
                                </tr>`
               });
               $('#mycart').html(rows);
           }
       })
    }
    cart();
    // Cart Remove Start
    function Cartremove(id){
        $.ajax({
            type:'GET',
            url:"{{ url('/cart-remove/') }}/"+id,
            dataType:'json',
            success:function(data){
                couponcalculation();
                $('#CouponField').show();
                $('#coupon_name').val('');
                cart();
                miniCart();
                //  start message
            const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 6000
                      })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
                    //  end message
            }
        });
    }
    // Wishlist Remove End

    // Cart Increment Start Here
    function CartIncrement(rowId){
        $.ajax({
            type:'GET',
            url:"{{ url('/cart-increment/') }}/"+rowId,
            dataType:'json',
            success:function(data){
                // CartDecrement();
                couponcalculation();
                cart();
                miniCart();
            }
        });
    }

    // Cart Increment end Here

     // Cart Decrement Start Here
     function CartDecrement(rowId){
        $.ajax({
            type:'GET',
            url:"{{ url('/cart-decrement/') }}/"+rowId,
            dataType:'json',
            success:function(data){
                // CartDecrement();
                couponcalculation();
                cart();
                miniCart();
            }
        });
    }
    // Cart Decrement end Here
    </script>
    {{-- ==========================My Cart Page end Here============================= --}}

    {{-- ================Coupon Apply Start Here====================== --}}

    <script>
        function ApplyCoupon(){
            var coupon_name = $('#coupon_name').val();
            $.ajax({
            type:'POST',
            dataType:'json',
            data:{coupon_name:coupon_name},
            url:"{{ url('/coupon-apply') }}",
            success:function(data){
                couponcalculation();
                if(data.validity == true){
                $('#CouponField').hide();
                }
                // $('#CouponField').css("display","none");

                 //  start message
            const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 6000
                      })
                     if($.isEmptyObject(data.error)){
                        $('#coupon_name').val('');
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                        $('#coupon_name').val('');
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
                    //  end message
            }
         });
        }
        function couponcalculation(){
            $.ajax({
            type:'GET',
            url:"{{ url('/coupon-calculation') }}",
            dataType:'json',
            success:function(data){
                if(data.total){
                    $('#couponcalfield').html(`
                            <tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal<span class="inner-left-md">৳ ${data.total}</span>
                                    </div>

                                    <div class="cart-grand-total">
                                        Grand Total<span class="inner-left-md">৳ ${data.total}</span>
                                    </div>
                                </th>

                            </tr>`)
                }else{
                    $('#couponcalfield').html(
                            `<tr>
                                <th>
                                    <div class="cart-sub-total">
                                        Subtotal :<span class="inner-left-md">$${data.subtotal}</span>
                                    </div>

                                    <div class="cart-sub-total">
                                        Coupon Name :<span class="inner-left-md"> ${data.coupon_name}</span>
                                        <button type="submit" onclick="CouponRemove()"><i class="fa fa-times"></i></button>
                                    </div>

                                    <div class="cart-sub-total">
                                        Discount :<span class="inner-left-md">৳ - ${data.discount_amount}</span>
                                    </div>

                                    <div class="cart-grand-total">
                                        Grand Total :<span class="inner-left-md">৳ ${data.total_amount}</span>
                                    </div>
                                </th>
                            </tr>`)
                }
            }
        });
        }
        couponcalculation();
    </script>
{{-- // =================== Coupon Remove Start =================== --}}
    <script>
        function CouponRemove(){
            $.ajax({
            type:'GET',
            url:"{{ url('/coupon-remove') }}",
            dataType:'json',
            success:function(data){
                couponcalculation();
                 $('#CouponField').show();
                 // $('#CouponField').css("display","");
                 $('#coupon_name').val('');

                     //  start message
            const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 6000
                      })
                     if($.isEmptyObject(data.error)){
                          Toast.fire({
                            type: 'success',
                            title: data.success
                          })
                     }else{
                           Toast.fire({
                              type: 'error',
                              title: data.error
                          })
					 }
                    //  end message

            }
        });

        }
    </script>

    {{-- ================Coupon Apply End Here====================== --}}



</body>
</html>
