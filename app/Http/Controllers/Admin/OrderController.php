<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //Pending Orders
    public function PendingOrders(){

        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();

      return view('admin.orders.pending',compact('orders'));
    }

    // All Order View Show

    public function ViewOrders($order_id){

      $order = Order::with('division','district','thana','user')->where('id', $order_id)->first();
      $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

      return view('admin.orders.order-view',compact('order','orderItems'));
    }


    // Pending Order Delete
    public function PendingDelete($order_id){
        echo "emon";
    }

    // Confirmed Order
    public function ConfirmOrder(){

        $orders = Order::where('status', 'Confirm')->orderBy('id', 'DESC')->get();

      return view('admin.orders.confirm',compact('orders',));
    }
    // Processing Orders
    public function ProcessingOrder(){

        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();

      return view('admin.orders.processing',compact('orders',));
    }

    //Picked Orders
    public function PickedOrder(){
        $orders = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();

        return view('admin.orders.picked',compact('orders',));
    }
    // Shipping Orders
    public function ShippingOrder(){

        $orders = Order::where('status', 'Shipping')->orderBy('id', 'DESC')->get();

        return view('admin.orders.shipping',compact('orders',));
    }
    // Delevered Orders
    public function DeleveredOrder(){

        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();

        return view('admin.orders.delevered',compact('orders',));
    }
    //Cancel Orders
    public function CancelOrder(){

        $orders = Order::where('status', 'Cancel')->orderBy('id', 'DESC')->get();

        return view('admin.orders.cancel',compact('orders',));
    }

    //////////////////////////////////////////////////Panding To Confirm
    public function PendingtoConfirm($order_id){

    Order::findOrFail($order_id)->update(['status' => 'Confirm']);

    $notification=array(
        'message'=>'Successsfully Confirm Order',
        'alert-type'=>'success'
         );
        return Redirect()->route('pending-orders')->with($notification);
    }

    ////////////////////////////////////Confirm To Processing
    public function ConfirmProcess($order_id){

        Order::findOrFail($order_id)->update(['status' => 'Processing']);

        $notification=array(
            'message'=>'Successsfully Processing Order',
            'alert-type'=>'success'
             );
            return Redirect()->route('confirmed-orders')->with($notification);

    }
    /////////////////////////////// Processging to Picked Order
    public function ProcessToPick($order_id){

        Order::findOrFail($order_id)->update(['status' => 'Picked']);

        $notification=array(
            'message'=>'Order Picked Success',
            'alert-type'=>'success'
             );
            return Redirect()->route('processing-orders')->with($notification);
    }

    ///////////////////////////////Picked to Shipping Orders
    public function pickToShipped($order_id){

        Order::findOrFail($order_id)->update(['status'=> 'Shipping']);


        $notification=array(
            'message'=>'Order Shipping Success',
            'alert-type'=>'success'
             );
            return Redirect()->route('picked-orders')->with($notification);
    }
    /////////////////////////// Shipping To Delivered Orders
    public function ShippedToDelivery($order_id){

        Order::findOrFail($order_id)->update(['status' => 'Delivered']);

        $notification=array(
            'message'=>'Order Delivery Success',
            'alert-type'=>'success'
             );
            return Redirect()->route('shipping-orders')->with($notification);
    }
    /////////////////// INvoice Download
    public function InvoiceDownloard($order_id){
        $order = Order::with('division','district','thana','user')->where('id', $order_id)->first();
      $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
      $pdf = PDF::loadView('admin.orders.invoice',compact('order','orderItems'))->setPaper('a4')->setOptions([
          'tempDir' => public_path(),
          'chroot' => public_path(),
      ]);
        return $pdf->download('invoice.pdf');
    }
    }
