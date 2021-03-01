@extends('layouts.admin_master')

@section('categories')active show-sub @endsection

@section('sub-sub-category')active @endsection

@section('admin_content')
 <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">Sub-Sub-Category</span>
    </nav>
  <div class="sl-pagebody">
    <div class="card pd-20 pd-sm-40">
      <div class="card-header text-center">Update Sub Sub Category</div>
        <div class="card-body">
          <form action="{{route('ubdate-sub-sub-category')}}" method="POST">
            @csrf

            <input type="hidden" name="id" value="{{ $subsubcat->id }}">
         <div class="row row-sm text-center">
           <div class="col-lg-6">
            <div class="form-group">
                <label class="form-control-label">Sub-Category Name:English<span class="tx-denger">*</span></label>
                <input type="text" name="subsubcategory_name_en" value="{{($subsubcat->subsubcategory_name_en)}}" placeholder="Sub-category_name_en" class="form-control">
            
               @error('subsubcategory_name_en')
                 <span class="text-danger">{{ $message }}</span>
                @enderror
             </div>
         </div>
      <div class="col-lg-6">
        <div class="form-group">
            <label class="form-control-label"> Sub-Category Name:Bangla<span class="tx-denger">*</span></label>
            <input type="text" name="subsubcategory_name_bn" value="{{($subsubcat->subsubcategory_name_bn)}}" placeholder="Sub-category_name_bn" class="form-control">
        
            @error('subsubcategory_name_bn')
                <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>
      </div>
      </div>
      

      <div class="form-group">
        <button type="submit" class="btn btn-success">Update Data</button>
       </div>

   
      </form>
    </div>
   </div>
  </div>
</div>
  @endsection