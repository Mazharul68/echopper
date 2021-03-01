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

	<div class="col-md-8">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header">District List</div>
          <div class="card-body">
          <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
  <thead>
    <tr>
      <th class="wd-25p">Divisin Name</th>
      <th class="wd-25p">District Name</th>
      <th class="wd-25p">Actions</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($district as $item)
    <tr>
      <td>{{ $item->division->division_name }}</td>
      <td>{{ $item->district_name }}</td>
      <td>
        <a href="{{ url('admin/district-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

        <a href="{{url('admin/district-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
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
			<div class="card-header text-center">Add New district</div>
				<div class="card-body">

          <form action="{{route('district-store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-control-label">Select Division:<span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one" name="division_id">
                    
                <option label="Choose One" ></option>
                @foreach ($divisions as $row)
                <option value="{{ $row->id }}">{{ ucwords($row->division_name) }}</option>
                @endforeach
              </select>
                @error('division_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

					<div class="form-group">
						<label class="form-control-label">district Name<span class="tx-denger">*</span></label>
						<input type="text" name="district_name" value="{{old('district_name')}}" placeholder="district_name" class="form-control">

                        @error('district_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
					</div>
       	
					<div class="form-group">
						<button type="submit" class="btn btn-success">district Create</button>
					</div>
          </form>
				</div>
		  </div>
   	</div>
  </div>
</div>
</div>

  @endsection



