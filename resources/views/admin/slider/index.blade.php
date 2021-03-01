@extends('layouts.admin_master')

@section('sliders')
active
@endsection

@section('title') @if(session()->get('language')== 'bangla') স্লাইডার @else SLIDER @endif @endsection

@section('admin_content')

 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOOPER</a>
        <span class="breadcrumb-item active">Sliders</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">

	<div class="col-md-8">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header">Slider List</div>
          <div class="card-body">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-25">Slider Img</th>
                  <th class="wd-25p">Title_en</th>
                  <th class="wd-25p">des. En</th>
                  <th class="wd-25">Actions</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach($sliders as $item)
                <tr>
                  <td><img src="{{asset ($item->image) }}" alt="img" style="width:80px;"></td>
                  <td>
                      @if($item->title_en == null)
                      <span class="badge badge-pill badge-danger">No Title Found</span>
                      @else
                      {{ $item->title_en}}
                      @endif
                  </td>

                  <td>
                    @if($item->description_en == null)
                    <span class="badge badge-pill badge-danger">No Diescription Found</span>
                    @else
                      {{ $item->description_en }}
                      @endif
                  </td>
                  <td>
                    @if ($item->status ==1)
                    <span class="badge pill-badge badge-success">Active</span>
                    @else  
                    <span class="badge pill-badge badge-danger">Unactive</span>           
                    @endif
                  </td>

                  <td>
                    <a href="{{ url('admin/sliders-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

                    <a href="{{url('admin/sliders-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delete data"><i class="fa fa-trash"></i></a>


                    @if ($item->status ==1)
                    <a href="{{ url('admin/slider-inactive/'.$item->id) }}" class="btn btn-danger btn-sm" title="inactive"><i class="fa fa-arrow-down"></i></a>

                    @else  

                    <a href="{{ url('admin/slider-active/'.$item->id) }}" class="btn btn-success btn-sm" title="active"><i class="fa fa-arrow-up"></i></a>
                        
                  @endif
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
			<div class="card-header text-center">Add New Slider</div>
				<div class="card-body">

          <form action="{{route('slider-store')}}" method="POST" enctype="multipart/form-data">
            @csrf
					<div class="form-group">
						<label class="form-control-label">Slider :Title-Enlish<span class="tx-denger">*</span></label>
						<input type="text" name="title_en" value="{{old('title_en')}}" placeholder="Slider Title-English" class="form-control">
                    </div>

                    <div class="form-group">
						<label class="form-control-label">Slider :Title-Bangla<span class="tx-denger">*</span></label>
						<input type="text" name="title_bn" value="{{old('title_bn')}}" placeholder="Slider Title-Bangla" class="form-control">
                    </div>
                    
					<div class="form-group">
						<label class="form-control-label"> Slider-Desciption-English<span class="tx-denger">*</span></label>
						<input type="text" name="description_en" value="{{old('description_en')}}" placeholder="Slider description English" class="form-control">

                   @error('description_en')
                  <span class="text-danger">{{ $message }}</span>
                   @enderror
                    </div>
                    
                    <div class="form-group">
						<label class="form-control-label"> Slider-Desciption-Bangla<span class="tx-denger">*</span></label>
						<input type="text" name="description_bn" value="{{old('description_bn')}}" placeholder="Slider description Bangla" class="form-control">

                   @error('description_bn')
                  <span class="text-danger">{{ $message }}</span>
                   @enderror
					</div>

					<div class="form-group">
						<label class="form-control-label">Slider:Image<span class="tx-denger">*</span></label>
						<input type="file" name="image" placeholder="Slider image" class="form-control">

              @error('image')
              <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Add Slider</button>
					</div>
          </form>
				</div>
		</div>
	</div>
      </div>
    </div>
  </div>

  @endsection