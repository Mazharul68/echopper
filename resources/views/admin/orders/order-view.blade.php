@extends('layouts.admin_master')

@section('orders')
active
@endsection

@section('title') @if(session()->get('language')== 'bangla') আপেক্ষামান @else Pending @endif @endsection

@section('admin_content')

 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOOPER</a>
        <span class="breadcrumb-item active">View Orders Orders</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">
        <div class="col-lg-6">
            <ul class="list-group">
                <li class="list-group-item active text-center">Shipping Information</li>
                <li class="list-group-item">
                   <strong>Name :</strong> {{ $order->name }}
                </li>
                <li class="list-group-item">
                  <strong>Phone Number :</strong>  {{ $order->phone }}
                </li>
                <li class="list-group-item">
                   <strong>Email Address :</strong> {{ $order->email }}
                </li>
                <li class="list-group-item">
                   <Strong>Division Name :</Strong> {{ $order->division->division_name }}
                </li>
                <li class="list-group-item">
                   <strong>District Name :</strong> {{ $order->district->district_name }}
                </li>
                <li class="list-group-item">
                  <strong>Post Code :</strong>  {{ $order->post_code}}
                </li>
                <li class="list-group-item">
                  <strong>Order Date :</strong>  {{ $order->order_date }}
                </li>
              </ul>
        </div>

        <div class="col-lg-6">
            <ul class="list-group">
                <li class="list-group-item active text-center">Order Information</li>
                {{-- <li class="list-group-item"><img src="{{ asset($orderItems->product->product_thambnail) }}" alt=""></li> --}}
                <li class="list-group-item">
                    <strong> Name :</strong> {{ $order->user->name }}
                </li>
                <li class="list-group-item">
                    <strong> User Phone :</strong>{{ $order->user->phone }}
                </li>
                <li class="list-group-item">
                    <strong> Payment By :</strong>{{ $order->payment_method }}
                </li>
                <li class="list-group-item">
                    <strong> Tnx Id :</strong>{{ $order->transaction_id }}
                </li>
                <li class="list-group-item">
                    <strong> Invoice No:</strong>{{ $order->invoice_no }}
                </li>
                <li class="list-group-item">
                    <strong> Order Total:</strong>{{ $order->amount }} tk
                </li>

                <li class="list-group-item">
                    <strong> Order Status:</strong> <span class="badge badge-pill btn-lg badge-danger" style="font-size:15px;">{{ $order->status }}</span>
                </li>

                <li class="list-group-item">

                    @if ($order->status == 'Pending')
                    <a href="{{ url('admin/pending-to-confirm/'.$order->id) }}" id="pending" class="btn btn-success btn-block">Confirmed Orders</a>

                    @elseif($order->status == 'Confirm')
                    <a href="{{ url('admin/confirm-to-processing/'.$order->id) }}" id="pending" class="btn btn-success btn-block">Processing</a>

                    @elseif($order->status == 'Processing')

                    <a href="{{ url('admin/processing-to-picked/'.$order->id) }}" id="pending" class="btn btn-success btn-block">Picked Order</a>

                    @elseif($order->status == 'Picked')
                    <a href="{{ url('admin/picked-to-shipping/'.$order->id) }}" id="pending" class="btn btn-success btn-block">Shipping Order</a>

                    @elseif($order->status == 'Shipping')
                    <a href="{{ url('admin/shipping-to-delivered/'.$order->id) }}" id="pending" class="btn btn-success btn-block">Delivered Order</a>

                    @endif


                </li>

              </ul>
        </div>
      </div>
      <div class="row mt-5">
          <div class="col-lg-8 m-auto">
            <div class="table-responsive">
                <table class="table">
                <tbody>
                        <tr style="background: #E9EBEC;">
                            <td class="col-md-1">
                                <label for="">Image</label>
                            </td>
                            <td class="col-md-3">
                            <label for="">Poduct Name</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">Poduct Code</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Color</label>
                            </td>

                            <td class="col-md-1">
                                <label for="">Size</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Quantity</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Price</label>
                            </td>

                        </tr>

                     @foreach ($orderItems as $item)
                        <tr>
                            <td class="col-md-1"><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;" alt="imga"></td>
                            <td class="col-md-3">
                                <div class="product-name"><strong>{{ $item->product->product_name_en }}</strong>
                                </div>
                            </td>

                            <td class="col-md-2">
                            <strong>{{ $item->product->product_code }}</strong>
                            </td>

                            <td class="col-md-2">
                                <strong>{{ $item->color }}</strong>
                                </td>

                            <td class="col-md-2">
                            <strong>{{ $item->size }}</strong>
                            </td>

                            <td class="col-md-2">
                            <strong>{{ $item->qty }}</strong>
                            </td>

                            <td class="col-md-1">
                            <strong>৳{{ $item->price }} ({{ $item->price * $item->qty }})</strong>

                            </td>
                        </tr>
                     @endforeach
                    </tbody>
                </table>
            </div>
          </div>
      </div>
    </div>
  </div>


  @endsection
