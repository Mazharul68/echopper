@extends('layouts.admin_master')

@section('brands')
active
@endsection

@section('admin_content')

 
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
     <a class="breadcrumb-item" href="index.html">Starlight</a>
     <span class="breadcrumb-item active">Dashboard</span>
  </nav>

  <div class="sl-pagebody">
    <div class="card">
      <div class="card-header text-center">Add New Bradss</div>
        <div class="card-body">
          <form action="{{route('update-brand')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
            <input type="hidden" name="brand_id" value="{{ $brand->id }}">
         <div class="row row-sm">
           <div class="col-lg-4">
             <div class="form-group">
                <label class="form-control-label">Brand Name:English<span class="tx-denger">*</span></label>
        <input type="text" name="brand_name_en" value="{{ $brand->brand_name_en}}" placeholder="brand_name_en" class="form-control">

        @error('brand_name_en')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
        <label class="form-control-label">Brand Name:Bangla<span class="tx-denger">*</span></label>
        <input type="text" name="brand_name_bn" value="{{ $brand->brand_name_bn}}" placeholder="brand_name_bn" class="form-control">

        @error('brand_name_bn')
          <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
        <label class="form-control-label">Brand Name:Image<span class="tx-denger">*</span></label>
        <input type="file" name="brand_image" placeholder="brands image" class="form-control">

          @error('brand_image')
          <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
      </div>
      <div class="col">
        <div class="form-group" style="float:right">
          <label>Old Image (Barnd Logo)</label>
          <br>
          <img src="{{asset ($brand->brand_image) }}" width="50px;" height="50px;"  >
        </div>
      </div>

      <div class="form-group col-12">
        <button type="submit" class="btn btn-success">Brand Update</button>
      </div>
      </div>
      </form>
    </div>
   </div>
  </div>
</div>


  @endsection