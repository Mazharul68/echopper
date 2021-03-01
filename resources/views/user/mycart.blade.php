@extends('layouts.frontend_master')

@section('content')
@section('title') @if(session()->get('language')== 'bangla')  আমার কার্ট @else My Cart @endif
  @endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="shopping-cart">
				<div class="shopping-cart-table">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Image</th>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-15p">Color</th>
                                    <th class="wd-15p">Size</th>
                                    <th class="wd-15p">Quantity</th>
                                    <th class="wd-15p">subtotal</th>
                                    <th class="wd-10p">remove</th>
                                </tr>
                            </thead>
                            <tbody id="mycart">
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 estimate-ship-tax">

                    @if(Session::has('coupon'))

                    @else
                    <table class="table" id="CouponField">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input" placeholder="Your Coupon.." id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right">
                                            <button type="submit" class="btn-upper btn btn-primary" onclick="ApplyCoupon()">APPLY COUPON</button>

                                        </div>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                    @endif
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-6 col-sm-12 cart-shopping-total">
                    <table class="table">
                        <thead id="couponcalfield">


                        </thead><!-- /thead -->
                        <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                                            <span class="">Checkout with multiples address!</span>
                                        </div>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
    </div><!-- /.container -->
</div><!-- /.body-content -->
{{-- @include('frontend.inc.brand') --}}


  @endsection
