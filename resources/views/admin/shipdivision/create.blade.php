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

	<div class="col-md-8">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header">Division List</div>
          <div class="card-body">
          <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
  <thead>
    <tr>
      <th class="wd-25p">Division Name</th>
      <th class="wd-25p">Actions</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($divisions as $item)
    <tr>
      <td>{{ $item->division_name }}</td>
      <td>
        <a href="{{ url('admin/division-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

        <a href="{{url('admin/division-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
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
			<div class="card-header text-center">Add New Division</div>
				<div class="card-body">

          <form action="{{route('division-store')}}" method="POST">
            @csrf

					<div class="form-group">
						<label class="form-control-label">Division Name<span class="tx-denger">*</span></label>
						<input type="text" name="division_name" value="{{old('division_name')}}" placeholder="division_name" class="form-control">

                        @error('division_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
					</div>
       	
					<div class="form-group">
						<button type="submit" class="btn btn-success">Division Create</button>
					</div>
          </form>
				</div>
		  </div>
   	</div>
  </div>
</div>
</div>

  @endsection



