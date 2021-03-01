@extends('layouts.frontend_master')

@section('content')
@section('title') @if(session()->get('language')== 'bangla') চেক আউট @else Checkout @endif
  @endsection
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
                <form class="register-form" action="{{ route('user.checkout.store') }}" method="post" role="form">
                    @csrf
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                    <!-- panel-heading -->
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle">Shipping Address?</h4>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
                                                        <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="shipping_name" placeholder="Full Name" data-validation="required" value="{{ Auth::user()->name }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                                                        <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="shipping_email" placeholder="Email Address" data-validation="required" value="{{ Auth::user()->email }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                                                        <input type="phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="shipping_phone" placeholder="Phone Number" data-validation="required" value="{{ Auth::user()->phone }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">Post Code</label>
                                                        <input type="text" class="form-control" name="post_code" placeholder="Post Code" data-validation="required">
                                                    </div>


                                            </div>
                                            <!-- already-registered-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">

                                                <div class="form-group">
                                                    <label class="form-control-label">Select Division:<span class="tx-denger">*</span></label>
                                                    <select class="form-control select2-show-search" data-placeholder="Select one" name="division_id" data-validation="required">

                                                    <option label="Choose One" ></option>
                                                    @foreach ($divisions as $item)
                                                    <option value="{{ $item->id }}">{{ucwords($item->division_name) }}</option>
                                                    @endforeach
                                                </select>
                                                    @error('division_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label">Select District:<span class="tx-denger">*</span></label>
                                                    <select class="form-control select2-show-search" data-placeholder="Select one" name="district_id" data-validation="required">

                                                    <option label="Choose One" ></option>
                                                </select>
                                                    @error('district_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-control-label">Select Thana:<span class="tx-denger">*</span></label>
                                                    <select class="form-control select2-show-search" data-placeholder="Select one" name="thana_id" data-validation="required">

                                                    <option label="Choose One" ></option>
                                                </select>
                                                    @error('thana_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Notes</label>
                                                    <textarea class="form-control" name="notes" id="" cols="30" rows="5" placeholder="Notes" data-validation="required"></textarea>
                                                </div>

                                            </div>
                                            <!-- already-registered-login -->
                                        </div>
                                    </div>
                                    <!-- panel-body  -->
                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->

                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>

                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach ($carts as $item)
                                            <li>
                                                <strong>Image :</strong>
                                                <img src="{{ asset($item->options->image) }}" style="width: 50px; hight: 50px;"> <br>
                                                <strong>Quantity :</strong>
                                                {{ $item->qty }} <br>
                                                <strong>Size :</strong>
                                                {{ $item->options->size }} <br>
                                                <strong>Color :</strong>
                                                {{ $item->options->color }} <hr>
                                            </li>
                                            @endforeach
                                            <li>
                                                @if(Session::has('coupon'))

                                                <strong>Sub-total :</strong> ৳ {{ $cartTotal }} <br>
                                                <strong>Coupon Name :</strong> {{ Session()->get('coupon')['coupon_name'] }} ({{ Session()->get('coupon')['coupon_discount'] }} %) <br>
                                                <strong>Coupon Discount :</strong> - {{ Session()->get('coupon')['discount_amount'] }} <br>
                                                <strong>Grand Total :</strong>৳ {{ Session()->get('coupon')['total_amount'] }}

                                                @else

                                                <strong>Sub-total :</strong> ৳ {{ $cartTotal }} <br>
                                                <strong>Grand Total :</strong>৳ {{ $cartTotal }}
                                                @endif
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 					<!-- checkout-progress-sidebar -->
                    </div>
                    <div class="col-md-12">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">

                                            <li>
                                                <input type="radio" name="payment_method" value="stripe">
                                                <label for="">Stripe</label>
                                                <img src="{{ asset('frontend') }}/assets/mas.png" height="50px">
                                            </li>

                                            <li>
                                                <input type="radio" name="payment_method" value="sslHost">
                                                <label for="">SSL HostedPayment</label>
                                                <img src="{{ asset('frontend') }}/assets/pay.png" height="50px">
                                            </li>

                                            <li>
                                                <input type="radio" name="payment_method" value="ssleasy">
                                                <label for="">SSl Easy HostedPaymet</label>
                                                <img src="{{ asset('frontend') }}/assets/mobile.png" height="50px">
                                            </li>
                                            <br>
                                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button pull-right">Payment Step</button>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 					<!-- checkout-progress-sidebar -->
                    </div>
                </form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	</div><!-- /container -->
</div><!-- /.body content -->

<script src="{{asset('backend')}}/custom-js/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
          if(division_id) {
              $.ajax({
                  url: "{{  url('/user/district-get/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    $('select[name="thana_id"]').empty();
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){

                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');

                        });

                  },

              });
          } else {
              alert('danger');
          }

      });
        // District Start
      $('select[name="district_id"]').on('change', function(){
          var district_id = $(this).val();
          if(district_id) {
              $.ajax({
                  url: "{{  url('/user/thana-get/ajax') }}/"+district_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="thana_id"]').empty();
                        $.each(data, function(key, value){

                            $('select[name="thana_id"]').append('<option value="'+ value.id +'">' + value.thana_name + '</option>');

                        });

                  },

              });
          } else {
              alert('danger');
          }

      });

    });
    </script>
@endsection
