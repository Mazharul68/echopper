@extends('layouts.admin_master')

@section('coupon')
active
@endsection

@section('title') @if(session()->get('language')== 'bangla') কুপন @else Coupon @endif @endsection

@section('admin_content')

 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOOPER</a>
        <span class="breadcrumb-item active">Coupon</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">

	<div class="col-md-8">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header">Coupon List</div>
          <div class="card-body">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-20p">Coupon Name</th>
                  <th class="wd-20p">Coupon Discount</th>
                  <th class="wd-20p">Validity</th>
                  <th class="wd-20p">Status</th>
                  <th class="wd-20p">Action</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach($coupons as $item)
                <tr>
                 
                  <td>{{ $item->coupon_name }}</td>
                  <td>{{ $item->coupon_discount }} %</td>
                  <td>
                      {{ Carbon\Carbon::parse($item->coupon_validity)->format('D,d F Y') }}
                   
                    </td>
                  <td>
                    @if ($item->coupon_validity >=Carbon\Carbon::now()->format('Y-m-d'))
                    <span class="badge pill-badge badge-success">Valid</span>
                    @else  
                    <span class="badge pill-badge badge-danger">Invalid</span>           
                  @endif
                  </td>
                  <td>
                    <a href="{{ url('admin/coupon-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

                    <a href="{{url('admin/coupon-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
                  </td>
        
                </tr>
               @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
        </div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header text-center">Add Coupon</div>
				<div class="card-body">

          <form action="{{route('coupon-store')}}" method="POST" enctype="multipart/form-data">
            @csrf
					<div class="form-group">
						<label class="form-control-label">Coupon Name<span class="tx-denger">*</span></label>
						<input type="text" name="coupon_name" value="{{old('coupon_name')}}" placeholder="coupon_name" class="form-control">

                            @error('coupon_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
					</div>

					<div class="form-group">
						<label class="form-control-label">Coupon Discount (%)<span class="tx-denger">*</span></label>
						<input type="text" name="coupon_discount" value="{{old('coupon_discount')}}" placeholder="coupon_discount" class="form-control" min="1" max="99">

                            @error('coupon_discount')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    
                    <div class="form-group">
						<label class="form-control-label">Coupon Validity<span class="tx-denger">*</span></label>
						<input type="date" name="coupon_validity" value="{{old('coupon_validity')}}" placeholder="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                        @error('coupon_validity')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
				
					<div class="form-group">
						<button type="submit" class="btn btn-success">Add new</button>
					</div>
          </form>
				</div>
		</div>
	</div>
      </div>
    </div>
  </div>

  @endsection