@extends('layouts.admin_master')

@section('shipping')
active show-sub
@endsection
@section('title') @if(session()->get('language')== 'bangla') ডিস্ট্রিক @else thana @endif @endsection

@section('thana')
active 
@endsection
@section('admin_content')
 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">Shipping thana</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">


	<div class="col-md-6 m-auto">
		<div class="card">
			<div class="card-header text-center">Add New thana</div>
				<div class="card-body">

          <form action="{{route('thana-update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $thana->id }}">
                    <div class="form-group">
                        <label class="form-control-label">Select Division:<span class="tx-danger">*</span></label>
                    <select class="form-control select2-show-search" data-placeholder="Select one" name="division_id">
                            
                        <option label="Choose One" ></option>
                        @foreach ($divisions as $row)
                        <option value="{{ $row->id }}" {{ $row->id == $thana->division_id ? 'selected': '' }}>{{ ucwords($row->division_name) }}</option>
                        @endforeach
                    </select>
                        @error('division_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-control-label">Select District: <span class="tx-danger">*</span></label>
                        <input type="text" value="{{ $thana->district->district_name }}" class="form-control">
                    </div>

					<div class="form-group">
						<label class="form-control-label">thana Name<span class="tx-denger">*</span></label>
						<input type="text" name="thana_name" value="{{ $thana->thana_name }}" class="form-control">

                        @error('thana_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
					</div>
       	
					<div class="form-group">
						<button type="submit" class="btn btn-success">thana Update</button>
					</div>
          </form>
				</div>
		  </div>
   	</div>
  </div>
</div>
</div>

<script src="{{asset('backend')}}/custom-js/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="division_id"]').on('change', function(){
          var division_id = $(this).val();
          if(division_id) {
              $.ajax({
                  url: "{{  url('/admin/district-get/ajax') }}/"+division_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
    
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
    
                        });
    
                  },
    
              });
          } else {
              alert('danger');
          }
    
      });
      
    });
    </script>  

  @endsection



