@extends('layouts.admin_master')

@section('categories')active show-sub @endsection

@section('title') @if(session()->get('language')== 'bangla') সাব-ক্যাটেগারি @else  SUB-CATEGORY @endif @endsection

@section('sub-category')active @endsection

@section('admin_content')
 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">Sub-Category</span>
    </nav>
<div class="sl-pagebody">
  <div class="row row-sm">
     <div class="col-md-8">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header">Sub Category List</div>
              <div class="card-body">
                 <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
  <thead>
    <tr>
      <th class="wd-25p">Sub-cat Name</th>
      <th class="wd-25p">Sub-cat Name En</th>
      <th class="wd-25p">Sub-cat Name Bn</th>
      <th class="wd-25p">Actions</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($subcategories as $item)
    <tr>
    <td>
      {{ $item->category->category_name_en }}
    </td>
      <td>{{ $item->subcategory_name_en }}</td>
      <td>{{ $item->subcategory_name_bn }}</td>
      <td>
    <a href="{{ url('admin/subcategory-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

    <a href="{{url('admin/subcategory-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
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
			<div class="card-header text-center">Add New Sub-Category</div>
				<div class="card-body">

<form action="{{route('subcategory-store')}}" method="POST">
            @csrf
  <div class="form-group">
    <label class="form-control-label">Select Categry:<span class="tx-danger">*</span></label>
    <select class="form-control select2-show-search" data-placeholder="Select one" name="category_id">
        
    <option label="Choose One" ></option>
    @foreach ($categories as $cat)
    <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
    @endforeach
  </select>
    @error('category_id')
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

  <div class="form-group">
    <label class="form-control-label">Sub-Category Name:English<span class="tx-danger">*</span></label>
    <input type="text" name="subcategory_name_en" value="{{old('subcategory_name_en')}}" placeholder="Sub-category_name_en" class="form-control">

   @error('subcategory_name_en')
     <span class="text-danger">{{ $message }}</span>
    @enderror
 </div>
  <div class="form-group">
    <label class="form-control-label"> Sub-Category Name:Bangla<span class="tx-danger">*</span></label>
    <input type="text" name="subcategory_name_bn" value="{{old('subcategory_name_bn')}}" placeholder="Sub-category_name_bn" class="form-control">

    @error('subcategory_name_bn')
        <span class="text-danger">{{ $message }}</span>
    @enderror
 </div>
                        
    <div class="form-group">
         <button type="submit" class="btn btn-success">Sub-Category Add</button>
    </div>
           </form>
		 </div>
	  </div>
   	</div>
  </div>
</div>
</div>

  @endsection



