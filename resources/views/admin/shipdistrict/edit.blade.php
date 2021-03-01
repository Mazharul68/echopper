@extends('layouts.admin_master')

@section('shipping')
active show-sub
@endsection
@section('title') @if(session()->get('language')== 'bangla') ডিস্ট্রিক @else District @endif @endsection

@section('district')
active 
@endsection
@section('admin_content')
 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">Shipping District</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">


	<div class="col-md-8 m-auto">
		<div class="card">
			<div class="card-header text-center">Edit district</div>
				<div class="card-body">

          <form action="{{route('district-update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $district->id }}">
            <div class="form-group">
                <label class="form-control-label">Select Division:<span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one" name="division_id">
                    
                <option label="Choose One" ></option>
                @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ $division->id == $district->division_id ? 'selected':'' }}>{{ ucwords($division->division_name) }}</option>
                @endforeach
              </select>
                @error('division_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

					<div class="form-group">
						<label class="form-control-label">district Name<span class="tx-denger">*</span></label>
						<input type="text" name="district_name" value="{{ $district->district_name }}"class="form-control">

                        @error('district_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
					</div>
       	
					<div class="form-group">
						<button type="submit" class="btn btn-success">district Update</button>
					</div>
          </form>
				</div>
		  </div>
   	</div>
  </div>
</div>
</div>

  @endsection



