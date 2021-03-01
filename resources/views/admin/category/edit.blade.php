@extends('layouts.admin_master')

@section('categories')
active show-sub
@endsection

@section('add-category')
active 
@endsection

@section('admin_content')

 
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
     <a class="breadcrumb-item" href="index.html">Starlight</a>
     <span class="breadcrumb-item active">Add-Category</span>
  </nav>

  <div class="sl-pagebody">
    <div class="card">
      <div class="card-header text-center">Add New Category</div>
        <div class="card-body">
          <form action="{{route('update-category')}}" method="POST">
            @csrf

            <input type="hidden" name="category_id" value="{{ $category->id }}">
         <div class="row row-sm">
           <div class="col-lg-4">
             <div class="form-group">
            <label class="form-control-label">Categry Icon:<span class="tx-denger">*</span></label>
            <input type="text" name="category_icon" value="{{$category->category_icon}}" placeholder="category_icon" class="form-control">

            @error('category_icon')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
         </div>
        <div class="col-lg-4">
          <div class="form-group">
          <label class="form-control-label">Brand Name:English<span class="tx-denger">*</span></label>
         <input type="text" name="category_name_en" value="{{ $category->category_name_en}}" placeholder="category_name_en" class="form-control">
        @error('category_name_en')
          <span class="text-danger">{{ $message }}</span>
        @enderror
         </div>
        </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Brand Name:Bangla<span class="tx-denger">*</span></label>
          <input type="text" name="category_name_bn" value="{{ $category->category_name_bn}}" placeholder="category_name_bn" class="form-control">

          @error('category_name_bn')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Update new</button>
       </div>
      </div>
      </form>
    </div>
   </div>
  </div>
</div>


  @endsection