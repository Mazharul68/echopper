@extends('layouts.admin_master')

@section('orders')
active show-sub
@endsection

@section('cancel-orders')
active
@endsection


@section('title') @if(session()->get('language')== 'bangla') ক্যান্সেল @else cancel-Order @endif @endsection

@section('admin_content')

 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOOPER</a>
        <span class="breadcrumb-item active">Cancel Orders</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">

	<div class="col-lg-12">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header">Cancel List</div>
          <div class="card-body">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Date</th>
                  <th class="wd-20p">Invoice</th>
                  <th class="wd-20p">TnX Id</th>
                  <th class="wd-15p">Amount</th>
                  <th class="wd-15p">Status</th>
                  <th class="wd-15p">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <tr>

                  <td>{{ $order->order_date }}</td>
                  <td>{{ $order->invoice_no }}</td>
                  <td>{{ $order->transaction_id }} </td>
                  <td>{{ $order->amount }} Tk</td>
                  <td>
                    <span class="badge pill-badge badge-info">{{ $order->status }}</span>
                  </td>
                  <td>
                    <a href="{{ url('admin/order-view/'.$order->id) }}" class="btn btn-info btn-sm" title="View data"><i class="fa fa-eye"></i></a>

                  </td>

                </tr>
               @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
        </div>
	</div>
      </div>
    </div>
  </div>

  @endsection
