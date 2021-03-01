@extends('layouts.admin_master')

@section('shipping')
active show-sub
@endsection
@section('title') @if(session()->get('language')== 'bangla') ডিভিশন @else division @endif @endsection

@section('division')
active 
@endsection
@section('admin_content')
 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">Shipping Division</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">
	<div class="col-md-4 m-auto">
		<div class="card">
			<div class="card-header text-center">Edit Division</div>
				<div class="card-body">

          <form action="{{route('division-update')}}" method="POST">
            @csrf
					<input type="hidden" name="id" value="{{ $divisions->id }}">

					<div class="form-group">
						<label class="form-control-label">Division Name<span class="tx-denger">*</span></label>
						<input type="text" name="division_name" value="{{ $divisions->division_name }}" class="form-control">

                        @error('division_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
					</div>
       	
					<div class="form-group">
						<button type="submit" class="btn btn-success">Division Update</button>
					</div>
          </form>
				</div>
		  </div>
   	</div>
  </div>
</div>
</div>

  @endsection



