<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use carbon\carbon;

class CouponController extends Controller
{
    //Coupon
    public function Coupon(){
        $coupons =Coupon::orderBy('id','DESC')->get();
       return view('admin.coupon.create',compact('coupons'));
    }

    // Coupon Store
    public function CouponStore(Request $request){

        $request->validate([
            'coupon_name'=> 'required',
            'coupon_discount'=> 'required',
            'coupon_validity'=> 'required',

        ]);
        
    Coupon:: insert([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_discount' => $request->coupon_discount,
        'coupon_validity' => $request->coupon_validity,
        'created_at' => carbon::now(),
    ]);
    $notification=array(
        'message'=>'Coupon Insert Success',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
    }

    //Coupon edit
    public function CouponEdit($coupon_id){

        $coupon = Coupon::findOrFail($coupon_id);
        return view('admin.coupon.edit',compact('coupon'));
    }
    // Coupon Update
    public function CouponUpdate(Request $request){

        $coupon = $request->id;

        Coupon::findOrFail($coupon)->update([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_discount' => $request->coupon_discount,
        'coupon_validity' => $request->coupon_validity,
        'updated_at' => carbon::now(),
        ]);
        $notification=array(
            'message'=>'Coupon Update Success',
            'alert-type'=>'success'
             );
            return Redirect()->route('coupon')->with($notification);
    }

    // Coupon Delete
    public function CouponDelete($coupon_id){

        Coupon::findOrFail($coupon_id)->delete();

        $notification=array(
            'message'=>'Successfully delete Success',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
    
}
