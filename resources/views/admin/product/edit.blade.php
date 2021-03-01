@extends('layouts.admin_master')

@section('products')
active show-sub
@endsection

@section('add-product')
active 
@endsection

@section('admin_content')

 
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
     <a class="breadcrumb-item" href="index.html">Starlight</a>
     <span class="breadcrumb-item active">Update Product</span>
  </nav>

  <div class="sl-pagebody">
    <div class="card">
      <div class="card-header text-center">Update Product</div>
        <div class="card-body">
          <form action="{{route('update-product')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
         <div class="row row-sm">
           <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Select Brand:<span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one" name="brand_id">
                    
                <option label="Choose One" ></option>
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' :'' }}>{{ ucwords($brand->brand_name_en) }}</option>
                @endforeach
              </select>
                @error('brand_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
         </div>
         <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Select Categry:<span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one" name="category_id">
                    
                <option label="Choose One" ></option>
                @foreach ($categories as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' :'' }}>{{ucwords($cat->category_name_en) }}</option>
                @endforeach
              </select>
                @error('category_id')
                <span class="tx-danger">{{ $message }}</span>
                @enderror
            </div>
         </div>
         <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Select sub-category:<span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one" name="subcategory_id">
                {{-- <option label="Choose One" ></option>
                @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ ucwords($brand->brand_name_en) }}</option>
                @endforeach  --}}
              </select>
                @error('subcategory_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
         </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Select sub-subCategry:<span class="tx-danger">*</span></label>
                <select class="form-control select2-show-search" data-placeholder="Select one" name="subsubcategory_id">
                {{-- <option label="Choose One" ></option>
                @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ ucwords($cat->category_name_en) }}</option>
                @endforeach --}}
              </select>
                @error('subsubcategory_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Name:English <span class="tx-danger">*</span></label>
          <input type="text" name="product_name_en" value="{{ $product->product_name_en }}" placeholder="product_name_en" class="form-control">

          @error('product_name_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Name:Bangla<span class="tx-danger">*</span></label>
          <input type="text" name="product_name_bn" value="{{ $product->product_name_bn }}" placeholder="product_name_bn" class="form-control">

          @error('product_name_bn')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Code<span class="tx-danger">*</span></label>
          <input type="text" name="product_code" value="{{ $product->product_code }}" placeholder="product_code" class="form-control">

          @error('product_code')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Quntity<span class="tx-danger">*</span></label>
          <input type="text" name="product_qty" value="{{ $product->product_qty }}" placeholder="product_qty" class="form-control">

          @error('product_qty')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Tags:English<span class="tx-danger">*</span></label>
          <input type="text" name="product_tags_en" value="{{ $product->product_tags_en }}" placeholder="product_tags_en" class="form-control" data-role="tagsinput">

          @error('product_tags_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Tags:Bangla<span class="tx-danger">*</span></label>
          <input type="text" name="product_tags_bn" value="{{ $product->product_tags_bn }}" placeholder="product_tags_bn" class="form-control" data-role="tagsinput">

          @error('product_tags_bn')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Size:English<span class="tx-danger">*</span></label>
          <input type="text" name="product_size_en" value="{{$product->product_size_en}}" placeholder="product_size_en" class="form-control" data-role="tagsinput">

          @error('product_size_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Size:Bangla<span class="tx-danger">*</span></label>
          <input type="text" name="product_size_bn" value="{{ $product->product_size_bn }}" placeholder="product_size_bn" class="form-control" data-role="tagsinput">

          @error('product_size_bn')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Color:English<span class="tx-danger">*</span></label>
          <input type="text" name="product_color_en" value="{{ $product->product_color_en }}" placeholder="product_color_en" class="form-control" data-role="tagsinput">

          @error('product_color_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Product Color:Bangla<span class="tx-danger">*</span></label>
          <input type="text" name="product_color_bn" value="{{ $product->product_color_bn }}" placeholder="product_color_bn" class="form-control" data-role="tagsinput">

          @error('product_color_bn')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Selling Price<span class="tx-danger">*</span></label>
          <input type="text" name="selling_price" value="{{ $product->selling_price}}" placeholder="selling_price" class="form-control">

          @error('selling_price')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
          <label class="form-control-label">Discount Price<span class="tx-danger">*</span></label>
          <input type="text" name="discount_price" value="{{ $product->discount_price}}" placeholder="discount_price" class="form-control">

          @error('discount_price')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-8">
        <div class="form-group">
          <label class="form-control-label">Short Descp:English<span class="tx-danger">*</span></label>
         <textarea name="short_descp_en" id="summernote">{{ $product->short_descp_en }}</textarea>

          @error('short_descp_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <label class="form-control-label">Short Descp:Bangla<span class="tx-danger">*</span></label>
         <textarea name="short_descp_bn" id="summernote2">{{ $product->short_descp_bn }}</textarea>

          @error('short_descp_bn')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="form-group">
          <label class="form-control-label">Long Descp:English<span class="tx-danger">*</span></label>
          <textarea name="long_descp_en" id="summernote3">{{ $product->long_descp_en }}</textarea>
          @error('long_descp_en')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-6">
        <div class="form-group">
          <label class="form-control-label">Long Descp:Bangla<span class="tx-danger">*</span></label>
          <textarea name="long_descp_bn" id="summernote4">{{ $product->long_descp_bn }}</textarea>

          @error('long_descp_bn')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>


      <div class="col-lg-4">
        <div class="form-group">
            <label for="checkbox">
                <input type="checkbox" name="hot_deals" value="1" {{ $product->hot_deals == 1 ? 'checked': '' }}><span>Chackbox</span>
            </label>
          @error('hot_deals')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
            <label for="checkbox">
                <input type="checkbox" name="featured" value="1" {{ $product->featured == 1 ? 'checked': '' }}><span>Featured</span>
            </label>
          @error('featured')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
            <label for="checkbox">
                <input type="checkbox" name="special_offer" value="1" {{ $product->special_offer == 1 ? 'checked': '' }}><span>Special Offer</span>
            </label>
          @error('special_offer')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
            <label for="checkbox">
                <input type="checkbox" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked': '' }}><span>Special Deals</span>
            </label>
          @error('special_deals')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
      </div>

       </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success">Update Product</button>
      </div>
    </form>

      <form action="{{ route('update-product-thambnail') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Update Product Thambnail Image</h3>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="old_img" value="{{ $product->product_thambnail }}">
        <div class="row row-sm" style="margin-top:50px;">
          <div class="col-md-3">
          <div class="card">
            <img src="{{ asset ($product->product_thambnail) }}" class="card-img-top">
            <div class="card-body">
              <p class="card-text">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label class="form-control-label">Update Thambnail<span class="tx-danger">*</span></label>
                   <input type="file" name="product_thambnail" onchange="mainThambUrl(this)">
                  </div>
                </div>
                <img src="" id="mainthamb">
              </p>
            </div>
          </div>
        </div>
       </div>
       <div class="form-layout footer">
         <button class="btn btn-success">Update Thambnail</button>
       </div>
      </form>

      <form action="{{ route('update-product-image') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <br>
        <h3>Update Product Multi-Image</h3>
        <div class="row row-sm" style="margin-top:50px;">
          @foreach ($multiImags as $img)
          <div class="col-md-3">
          <div class="card">
            <img src="{{ asset ($img->photo_name) }}" class="card-img-top" style="width:200px;">
            <div class="card-body">
              <a href="{{ url('admin/product/multiimg/delete/'.$img->id) }}" class="btn btn-danger" id="delete"><i  class="fa fa-trash"></i> DELETE</a>
              <p class="card-text">
                <div class="col-lg-3">
                  <div class="form-group">
                    <label class="form-control-label">Update Image</label>
                   <input type="file" name="multiImg[{{ $img->id }}]">
                  </div>
                </div>
              </p>
            </div>
          </div>
        </div>
       @endforeach
      </div>
       <div class="form-layout footer">
         <button class="btn btn-success">Update Image</button>
       </div>
      </form>
    </div>
   </div>
  </div>
</div>

{{-- <div class="col-lg-4">
    <div class="form-group">
      <label class="form-control-label">Main Thambnail<span class="tx-denger">*</span></label>
      <input type="file" name="product_thambnail" value="{{old('product_thambnail')}}" class="form-control" onchange="mainThambUrl(this)">

      @error('product_thambnail')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
      <img src="" id="mainthamb">
  </div>

  <div class="col-lg-4">
    <div class="form-group">
      <label class="form-control-label">Multi Image<span class="tx-denger">*</span></label>
      <input type="file" name="multi_img[]" value="{{old('multi_img')}}" multiple class="form-control" id="multiImg">

      @error('multi_img')
        <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="row" id="preview_img"></div>
  </div> --}}

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
                  $('select[name="subsubcategory_id"]').html('');
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

    $('select[name="subcategory_id"]').on('change', function(){
        var subcategory_id = $(this).val();
        if(subcategory_id) {
            $.ajax({
                url: "{{  url('/admin/sub-subcategory/ajax') }}/"+subcategory_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="subsubcategory_id"]').empty();
                      $.each(data, function(key, value){
  
                          $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>');
  
                      });
  
                },
  
            });
        } else {
            alert('danger');
        }
  
    });
    
  });
  </script>  

  <!-- MultiImage Show -->
  <script>
    $(document).ready(function(){
      $('#multiImg').on('change', function(){
        if(window.File && window.FileReader && window.FileList && window.Blob)
        {
          var data =$(this)[0].files;

          $.each(data, function(index, file){
            if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){
              var fRead = new FileReader();
              fRead.onload = (function(file){
                return function(e){
                  var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80).height(80);
                  $('#preview_img').append(img);
                };
              })(file);
              fRead.readAsDataURL(file);
            }
          });
        }else{
          alert("You Browser dosen't support file API");
        }
      });
    });
  </script>

  <!-- Manin Thambnail -->
  <script>
    function mainThambUrl(input){
      if(input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
          $('#mainthamb').attr('src',e.target.result).width(80).height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>

  @endsection
