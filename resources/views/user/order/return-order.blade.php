@extends('layouts.frontend_master')

@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Return Orders</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row" >
                <div class="col-sm-4" style="display:inline">
                    @include('user.inc.sidebar')
                </div>
                <div class="table-responsive">
                    <div class="col-sm-8">
                        <table class="table">
                            <tbody>
                                <tr style="backgound:#f9ebec">

                                    <td class="col-md-1">
                                        <label for="">Date</label>
                                    </td>

                                    <td class="col-md-3">
                                        <label for="">Total</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">Payment</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">Invoice</label>
                                    </td>

                                    <td class="col-md-2">
                                        <label for="">Orders</label>
                                    </td>

                                    <td class="col-md-1">
                                        <label for="">Action</label>
                                    </td>

                                </tr>

                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="col-md-1">
                                            <strong>{{ $order->order_date }}</strong>
                                        </td>

                                        <td class="col-md-3">
                                            <strong>{{ $order->amount }}</strong>
                                        </td>

                                        <td class="col-md-2">
                                            <strong>{{ $order->payment_method }}</strong>
                                        </td>

                                        <td class="col-md-2">
                                            <strong>{{ $order->invoice_no }}</strong>
                                        </td>

                                        @if ($order->status == 'Pending')
                                        <td class="col-md-2">
                                            <span class="badge badge-pill badge-primary" style="background: #e48f06; text:white;">
                                            {{ ucwords($order->status) }}</span>
                                        </td>
                                        @endif

                                        @if ($order->status == 'Confirm')
                                        <td class="col-md-2">
                                            <span class="badge badge-pill badge-primary" style="background: #e48f06; text:white;">
                                            {{ ucwords($order->status) }}</span>
                                        </td>
                                        @endif

                                        @if ($order->status == 'Processing')
                                        <td class="col-md-2">
                                            <span class="badge badge-pill badge-primary" style="background: rgb(14, 80, 14); text:white;">
                                            {{ ucwords($order->status) }}</span>
                                        </td>
                                        @endif

                                        @if ($order->status == 'Picked')
                                        <td class="col-md-2">
                                            <span class="badge badge-pill badge-primary" style="background: rgb(14, 80, 14); text:white;">
                                            {{ ucwords($order->status) }}</span>
                                        </td>
                                        @endif

                                        @if ($order->status == 'Shipping')
                                        <td class="col-md-2">
                                            <span class="badge badge-pill badge-primary" style="background: rgb(14, 80, 14); text:white;">
                                            {{ ucwords($order->status) }}</span>
                                        </td>
                                        @endif

                                        @if ($order->status == 'Delivered')
                                        <td class="col-md-2">
                                            <span class="badge badge-pill badge-primary" style="background: rgb(14, 80, 14); text:white;">
                                            {{ ucwords($order->status) }}</span><br>

                                            <span class="badge badge-pill badge-primary" style="background: red; text:white;">Return Requested</span>
                                        </td>
                                        @endif

                                        <td class="col-md-1">
                                            <a href="{{ url('user/order-view/'.$order->id) }}" class="btn btn-sm btn-primary" title="View"><i class="fa fa-eye"></i></a>

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
</div>

@endsection
