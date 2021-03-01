@extends('layouts.admin_master')

@section('categories')active show-sub @endsection

@section('sub-sub-category')active @endsection

@section('title') @if(session()->get('language')== 'bangla') সাব-সাব-ক্যাটেগারি @else  SUB-SUB-CATEGORY @endif @endsection

@section('admin_content')
 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">Sub-Sub-Category</span>
    </nav>
<div class="sl-pagebody">
  <div class="row row-sm">
     <div class="col-md-8">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header"> sub Sub Category List</div>
              <div class="card-body">
                 <div class="table-wrapper">
<table id="datatable1" class="table display responsive nowrap">
    <thead>
        <tr>
          <th class="wd-30p">Cat N.</th>
          <th class="wd-30p">SubCat N.</th>
          <th class="wd-25p">subSubCat N. En</th>
          <th class="wd-25p">subSubCat N. Bn</th>
          <th class="wd-20p">Action</th>
        </tr>
      </thead>
  <tbody>
    @foreach($subsubcategories as $item)
    <tr>
      <td>{{ $item ->category->category_name_en }}</td>
      <td>{{ $item ->subcategory->subcategory_name_en }}</td>
      <td>{{ $item->subsubcategory_name_en }}</td>
      <td>{{ $item->subsubcategory_name_bn }}</td>

      <td>
    <a href="{{ url('/admin/sub-subcategory-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

    <a href="{{url('/admin/sub-subcategory-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delete data"><i class="fa fa-trash"></i></a>
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
			<div class="card-header text-center">Add Sub-Category</div>
				<div class="card-body">

<form action="{{route('sub-subcategory-store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label class="form-control-label">Select Category: <span class="tx-danger">*</span></label>
              <select class="form-control select2-show-search" data-placeholder="Select One" name="category_id">
                <option label="Choose one"></option>
                @foreach ($subcategory as $cat)
                <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                @endforeach
              </select>
              @error('category_id')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>

            <div class="form-group">
                <label class="form-control-label">Select SubCategory: <span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select One" name="subcategory_id">
                  <option label="Choose one"></option>

                </select>
                @error('subcategory_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>

            <div class="form-group">
              <label class="form-control-label">Sub-Sub-Category Name English: <span class="tx-danger">*</span></label>
              <input class="form-control" type="text" name="subsubcategory_name_en" value="{{ old('subsubcategory_name_en') }}" placeholder="Enter subcategory name en">
              @error('subsubcategory_name_en')
              <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
                <label class="form-control-label">sub-Category Name Bangla: <span class="tx-danger">*</span></label>
                <input class="form-control" type="text" name="subsubcategory_name_bn" value="{{ old('subsubcategory_name_bn') }}" placeholder="Enter subcategory name bn">
                @error('subsubcategory_name_bn')
                <span class="text-danger">{{ $message }}</span>
              @enderror
              </div>


            <div class="form-layout-footer">
              <button type="submit" class="btn btn-info" style="cursor:pointer">Add New</button>
            </div><!-- form-layout-footer -->
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
    $('select[name="category_id"]').on('change', function(){
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: "{{  url('/admin/subcategory/ajax') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){
  
                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
  
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



 