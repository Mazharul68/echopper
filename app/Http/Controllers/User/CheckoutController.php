<?php

namespace App\Http\Controllers\User;

use App\Models\shipThana;
use App\Models\shipDistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    //Checkout With Ajax
    public function GetDistrictCheckout($division_id){

        $ship = shipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);
    }
    // Checkout With Ajax Thana
    public function GetThanaCheckout($district_id){

        $ship = shipThana::where('district_id',$district_id)->orderBy('thana_name','ASC')->get();
        return json_encode($ship);
    }
    // User Checkout Store
    public function UserCheckoutStore(Request $request){

    $data = array();
    $data['shipping_name']= $request->shipping_name ;
    $data['shipping_email']= $request->shipping_email ;
    $data['shipping_phone']= $request->shipping_phone;
    $data['post_code']= $request->post_code;
    $data['division_id']= $request->division_id;
    $data['district_id']= $request->district_id;
    $data['thana_id']= $request->thana_id;
    $data['notes']= $request->notes;
    $cartTotal = Cart::total();
    $carts = Cart::content();

    if (Session::has('coupon')) {
        $total_amount = Session::get('coupon')['total_amount'];
    }else {
        $total_amount = round(Cart::total());
    }

    if($request->payment_method == 'stripe'){

         return view('frontend.payment.stripe',compact('data','cartTotal','carts'));

        }elseif($request->payment_method == 'sslHost'){
            return view('frontend.payment.sslpayment',compact('data','total_amount','carts'));

        }elseif($request->payment_method == 'ssleasy'){
            return view('frontend.payment.ssleasy',compact('data','total_amount','carts'));
        }
        else{
            echo "else a assce";
        }
     }
}
