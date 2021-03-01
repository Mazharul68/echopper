@extends('layouts.admin_master')

@section('coupon')
active
@endsection

@section('title') @if(session()->get('language')== 'bangla') কুপন @else Coupon @endif @endsection

@section('admin_content')

 
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
     <a class="breadcrumb-item" href="index.html">Starlight</a>
     <span class="breadcrumb-item active">Dashboard</span>
  </nav>

  <div class="sl-pagebody">
    <div class="card">
      <div class="card-header text-center">Add New Coupon</div>
        <div class="card-body">
          <form action="{{route('update-coupon')}}" method="POST">
            <input type="hidden" name="id" value="{{ $coupon->id }}">
            @csrf
         <div class="row row-sm">
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Coupon Name<span class="tx-denger">*</span></label>
                    <input type="text" name="coupon_name" value="{{ $coupon->coupon_name }}" class="form-control">

                        @error('coupon_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Coupon Discount<span class="tx-denger">*</span></label>
                    <input type="text" name="coupon_discount" value="{{ $coupon->coupon_discount }}" class="form-control">

                        @error('coupon_discount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-control-label">Coupon Validity<span class="tx-denger">*</span></label>
                    <input type="date" name="coupon_validity" value="{{$coupon->coupon_validity}}" placeholder="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                    @error('coupon_validity')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
      <div class="form-group col-12">
        <button type="submit" class="btn btn-success">Coupon Update</button>
      </div>
      </div>
      </form>
    </div>
   </div>
  </div>
</div>


  @endsection