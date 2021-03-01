<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use PDF;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserOrderController extends Controller
{
    // User Orders
    public function MyOrders(){
        $orders = Order::where('user_id', Auth::id())->orderBy('id','DESC')->get();

        return view('user.order.orders',compact('orders'));
    }

    //User Return Order
    public function ReturnOrder(){
       $orders = Order::where('user_id', Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();

       return view('user.order.return-order',compact('orders'));
   }
    //User Cancel Order
    public function CancelOrder(){
       $orders = Order::where('user_id', Auth::id())->where('status','Cancel')->orderBy('id','DESC')->get();

       return view('user.order.cancel-order',compact('orders'));
   }
    // User Order View

    public function OrderView($order_id){

      $order = Order::with('division','district','thana','user')->where('id', $order_id)->where('user_id',Auth::id())->first();
      $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

      return view('user.order.order-show',compact('order','orderItems'));
    }


 // Order Invoice Download

 public function OrderDownload ($order_id){

    $order = Order::with('division','district','thana','user')->where('id', $order_id)->where('user_id',Auth::id())->first();
      $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();


      $pdf = PDF::loadView('user.order.invoice',compact('order','orderItems'))->setPaper('a4')->setOptions([
          'tempDir' => public_path(),
          'chroot' => public_path(),
      ]);
        return $pdf->download('invoice.pdf');
        // return view('user.order.invoice', compact('order','orderItems'));
 }
 // User Return Order Submit
    public function ReturnOrderSubmit(Request $request){

        $id = $request->id;
        Order::findOrFail($id)->update([
            'return_date' =>Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);

        $notification=array(
            'message'=>'Return Request Send Success',
            'alert-type'=>'success'
             );
             return Redirect()->route('my-orders')->with($notification);
    }

}
