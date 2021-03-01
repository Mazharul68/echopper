@extends('layouts.admin_master')

@section('sliders')
active
@endsection

@section('admin_content')

 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOOPER</a>
        <span class="breadcrumb-item active">Edit Slider</span>
      </nav>

  <div class="sl-pagebody">
    <div class="card">
      <div class="card-header text-center">Update Slider</div>
        <div class="card-body">
          <form action="{{route('update-slider')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="old_image" value="{{ $slider->image }}">
            <input type="hidden" name="id" value="{{ $slider->id }}">
         <div class="row row-sm">
            @if ($slider->title_en == null)
            @else
           <div class="col-lg-4">
             <div class="form-group">
                <label class="form-control-label">Slider :Title-Enlish<span class="tx-denger">*</span></label>
                <input type="text" name="title_en" value="{{$slider->title_en}}" placeholder="Slider Title-English" class="form-control">
            </div>
        </div>

      <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label">Slider :Title-Bangla<span class="tx-denger">*</span></label>
            <input type="text" name="title_bn" value="{{$slider->title_bn}}" placeholder="Slider Title-Bangla" class="form-control">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="form-group">
            <label class="form-control-label"> Slider-Desciption-English<span class="tx-denger">*</span></label>
            <input type="text" name="description_en" value="{{$slider->description_en}}" placeholder="Slider description English" class="form-control">
           </div>
        </div>

        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label"> Slider-Desciption-Bangla<span class="tx-denger">*</span></label>
                <input type="text" name="description_bn" value="{{ $slider->description_bn }}" placeholder="Slider description Bangla" class="form-control">
             </div>
          </div>
          @endif
          <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Slider:Image<span class="tx-denger">*</span></label>
                <input type="file" name="image" placeholder="Slider image" class="form-control">

                @error('image')
                <span class="text-danger">{{ $message }}</span>
                @enderror
             </div>
          </div>

          <div class="col-lg-4">
            <div class="form-group">
                <label class="form-control-label">Old Image<span class="tx-denger">*</span></label>
                <img src="{{ asset($slider->image) }}" style="width: 160;" height="100px;" alt="">

             </div>
          </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success">Update Slider</button>
      </div>
      </div>
      </form>
    </div>
   </div>
  </div>
</div>


  @endsection