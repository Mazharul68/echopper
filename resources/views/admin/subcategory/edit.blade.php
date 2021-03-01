@extends('layouts.admin_master')

@section('categories')active show-sub @endsection

@section('sub-category')active @endsection

@section('admin_content')
 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">Sub-Category</span>
    </nav>

  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <div class="card-header text-center">Update Sub Category</div>
        <div class="card-body">
          <form action="{{route('update/subcategory')}}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $subcategory->id }}">
         <div class="row row-sm">
           <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Select Categry:<span class="tx-denger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one" name="category_id">
                    
                <option label="Choose One" ></option>
                @foreach ($categories as $cat)
                <option value="{{ $cat->id }}"{{ $cat->id ==$subcategory->category_id ? 'selected': '' }}>{{ ucwords($cat->category_name_en) }}</option>
                @endforeach
              </select>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
         </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Sub-Category Name:English<span class="tx-denger">*</span></label>
                <input type="text" name="subcategory_name_en" value="{{$subcategory->subcategory_name_en}}" placeholder="Sub-category_name_en" class="form-control">
            
               @error('subcategory_name_en')
                 <span class="text-danger">{{ $message }}</span>
                @enderror
             </div>
        </div>

      <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label"> Sub-Category Name:Bangla<span class="tx-denger">*</span></label>
            <input type="text" name="subcategory_name_bn" value="{{$subcategory->subcategory_name_bn}}" placeholder="Sub-category_name_bn" class="form-control">
        
            @error('subcategory_name_bn')
                <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Update Data</button>
       </div>
      </div>
      </form>
    </div>
   </div>
  </div>
</div>
  @endsection