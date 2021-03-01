@extends('layouts.admin_master')

@section('categories')
active show-sub
@endsection
@section('title') @if(session()->get('language')== 'bangla') ক্যাটেগারি @else CATEGORY @endif @endsection

@section('add-category')
active 
@endsection
@section('admin_content')
 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">Category</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">

	<div class="col-md-8">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header">Category List</div>
          <div class="card-body">
          <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
  <thead>
    <tr>
      <th class="wd-25p">Category Icon</th>
      <th class="wd-25p">Category Name En</th>
      <th class="wd-25p">Category Name Bn</th>
      <th class="wd-25p">Actions</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $item)
    <tr>
    <td>
      <span><i class="{{ $item->category_icon }}"></i></span>
    </td>
      <td>{{ $item->category_name_en }}</td>
      <td>{{ $item->category_name_bn }}</td>
      <td>
        <a href="{{ url('admin/category-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

        <a href="{{url('admin/category-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
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
			<div class="card-header text-center">Add New Category</div>
				<div class="card-body">

          <form action="{{route('category-store')}}" method="POST">
            @csrf
					<div class="form-group">
						<label class="form-control-label">Categry Icon:<span class="tx-denger">*</span></label>
						<input type="text" name="category_icon" value="{{old('category_icon')}}" placeholder="category_icon" class="form-control">

            @error('category_icon')
              <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>

					<div class="form-group">
						<label class="form-control-label">Category Name:English<span class="tx-denger">*</span></label>
						<input type="text" name="category_name_en" value="{{old('category_name_en')}}" placeholder="category_name_en" class="form-control">

            @error('category_name_en')
              <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>
          <div class="form-group">
            <label class="form-control-label">Category Name:Bangla<span class="tx-denger">*</span></label>
            <input type="text" name="category_name_bn" value="{{old('category_name_bn')}}" placeholder="category_name_bn" class="form-control">

            @error('category_name_bn')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-success">Category Add</button>
					</div>
          </form>
				</div>
		  </div>
   	</div>
  </div>
</div>
</div>

  @endsection



