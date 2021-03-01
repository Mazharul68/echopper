<?php

namespace App\Http\Controllers\Frontend;


use carbon\carbon;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\shipDivision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CardController extends Controller
{
  //Add to Card with Ajax
  public function AddTocardStore( request $request,$id){

    if(Session::has('coupon')){
      Session::forget('coupon');
    }

    $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                 'name' => $request->product_name,
                 'qty' => $request->quantity,
                 'price' => $product->selling_price,
                 'weight' => 1,
                 'options' => [
                   'image' => $product->product_thambnail,
                   'color' => $request->color,
                   'size' => $request->size,
                  ],

                 ]);

                 return response()->json(['success' =>'successfully Add On you Cart ' ]);
        }else {
            Cart::add([
                'id' => $id,
                 'name' => $request->product_name,
                 'qty' => $request->quantity,
                 'price' => $product->discount_price,
                 'weight' => 1,
                 'options' => [
                  'image' => $product->product_thambnail,
                  'color' => $request->color,
                  'size' => $request->size,
                 ],

                ]);
                 return response()->json(['success' =>'successfully Add On you Cart ']);
    }

  }

  //product Mini Cart Section
  public function ProdMiniCart(){

    $carts = Cart::content();
    $cartQty = Cart::count();
    $cartTotal = Cart::total();
    return response()->json(array(
      'carts'=>$carts,
      'cartQty' => $cartQty,
      'cartTotal' => round($cartTotal),
   ));

  }
  //miniCart PRoduct Remove

  public function miniprodremove($rowId){
    Cart::remove($rowId);
    return response()->json(['success' =>'successfully Product Remove ']);
  }

  // Add To Wishlist
  public function AddtoWishlist(Request $request, $product_id){


    if(Auth::check()){

      $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
      if(!$exists){
        Wishlist::insert([
          'user_id'=> Auth::id(),
          'product_id'=> $product_id,
          'created_at'=> Carbon::now(),
        ]);
        return response()->json(['success' =>'Successfully Wishlist Added ']);
      }else{
        return response()->json(['error' =>'Already Wishlist Exist!']);
      }
    }else{
        return response()->json(['error' =>'At First Login Your Account ']);

    }
  }

  /////////////////////////////// MyCart Page///////////////////////////////////

  public function mycart(){
    return view('user.mycart');
  }
  // My Cart Product
  public function getCartProd(){

      $carts = Cart::content();
      $cartQty = Cart::count();
      $cartTotal = Cart::total();
      return response()->json(array(
        'carts'=>$carts,
        'cartQty' => $cartQty,
        'cartTotal' => round($cartTotal),
    ));

    }

    //Cart Remove

    public function Cartremove($rowId){
      Cart::remove($rowId);
      if(Session::has('coupon')){
        Session::forget('coupon');
       }

      return response()->json(['success' =>'successfully Product Remove ']);
    }

    // CartIncrement
    public function CartIncrement($rowId){

      $row = Cart::get($rowId);
      Cart::update($rowId, $row->qty + 1);
      // Coupon Apply
      if(Session::has('coupon')){

        $coupon_name = Session::get('coupon')['coupon_name'];
        $coupon = Coupon::where('coupon_name',$coupon_name)->first();

        Session::put('coupon',[
            'coupon_name' => $coupon->coupon_name,
            'coupon_discount' => $coupon->coupon_discount,
            'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
            'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)

        ]);
       }
      return response()->json('Increment');
    }

    // CartDecrement
    public function CartDecrement($rowId){


      $row = Cart::get($rowId);
      if($row ->qty == 1){
        return response()->json('Not Increment');
      }else{
        Cart::update($rowId, $row->qty - 1);
        //Coupon Apply
        if(Session::has('coupon')){

          $coupon_name = Session::get('coupon')['coupon_name'];
          $coupon = Coupon::where('coupon_name',$coupon_name)->first();

          Session::put('coupon',[
            'coupon_name' => $coupon->coupon_name,
            'coupon_discount' => $coupon->coupon_discount,
            'discount_amount' => round(Cart::total()* $coupon->coupon_discount/100),
            'total_amount' => round(Cart::total() - Cart::total()* $coupon->coupon_discount/100)

          ]);
         }
        return response()->json('Increment');
      }

    }

                // Coupon Apply Start

    public function ApplyCoupon(Request $request){

      $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=', Carbon::now()->format('Y-m-d'))->first();
      if($coupon){
        Session::put('coupon',[
          'coupon_name' => $coupon->coupon_name,
          'coupon_discount' => $coupon->coupon_discount,
          'discount_amount' => round(Cart::total()* $coupon->coupon_discount/100),
          'total_amount' => round(Cart::total() - Cart::total()* $coupon->coupon_discount/100)

        ]);
        return response()->json(array(

            'validity' => true,
        'success' =>'Coupon applied'
    ));
      }else{
        return response()->json(['error' =>'Coupon Invalid']);
      }
    }

    // Coupon Calculation
    public function CouponCalculation(){
      if(Session::has('coupon')){

        return response()->json(array(
          'subtotal'=> Cart::total(),
          'coupon_name' => Session()->get('coupon')['coupon_name'],
          'coupon_discount' => Session()->get('coupon')['coupon_discount'],
          'discount_amount' => Session()->get('coupon')['discount_amount'],
          'total_amount' => Session()->get('coupon')['total_amount'],
       ));
      }else{
        return response()->json(array(
          'total'=> Cart::total(),

       ));

      }

    }

    // Coupon Remove

    public function CouponRemove(){

      Session::forget('coupon');
      return response()->json(['success' =>'successfully Coupon Remove ']);

    }

    // User Checkout
    public function UserCheckout(){
      if(Auth::check()){
        if(Cart::total() > 0 ){
          $carts = Cart::content();
          $cartQty = Cart::count();
          $cartTotal = Cart::total();
          $divisions = shipDivision::orderBy('division_name','ASC')->get();
          return view('frontend.checkout',compact('carts','cartQty','cartTotal','divisions'));
        }else{
          $notification=array(
            'message'=>'Shopping Now',
            'alert-type'=>'error'
             );
            return Redirect()->to('/')->with($notification);
        }
      }else{
        $notification=array(
          'message'=>'please At First Your Login',
          'alert-type'=>'error'
           );
          return Redirect()->route('login')->with($notification);
      }
    }
}
