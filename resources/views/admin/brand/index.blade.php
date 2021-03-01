@extends('layouts.admin_master')

@section('brands')
active
@endsection

@section('title') @if(session()->get('language')== 'bangla') ব্রান্ড @else BRAND @endif @endsection

@section('admin_content')

 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOOPER</a>
        <span class="breadcrumb-item active">Brand</span>
      </nav>

      <div class="sl-pagebody">
        <div class="row row-sm">

	<div class="col-md-8">
		<div class="card pd-20 pd-sm-40">
			<div class="card-header">Brands List</div>
          <div class="card-body">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-25p">Brand Image</th>
                  <th class="wd-25p">Brand Name En</th>
                  <th class="wd-25p">Brand Name Bn</th>
                  <th class="wd-25p">Actions</th>

                </tr>
              </thead>
              <tbody>
                @foreach($brands as $item)
                <tr>
                  <td><img src="{{asset ($item->brand_image) }}" alt="img" style="width:80px;"></td>
                  <td>{{ $item->brand_name_en }}</td>
                  <td>{{ $item->brand_name_bn }}</td>
                  <td>
                    <a href="{{ url('admin/brand-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

                    <a href="{{url('admin/brand-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
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
			<div class="card-header text-center">Add New Bradss</div>
				<div class="card-body">

          <form action="{{route('brand-store')}}" method="POST" enctype="multipart/form-data">
            @csrf
					<div class="form-group">
						<label class="form-control-label">Brand Name:English<span class="tx-denger">*</span></label>
						<input type="text" name="brand_name_en" value="{{old('brand_name_en')}}" placeholder="brand_name_en" class="form-control">

            @error('brand_name_en')
              <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>

					<div class="form-group">
						<label class="form-control-label">Brand Name:Bangla<span class="tx-denger">*</span></label>
						<input type="text" name="brand_name_bn" value="{{old('brand_name_bn')}}" placeholder="brand_name_bn" class="form-control">

            @error('brand_name_bn')
              <span class="text-danger">{{ $message }}</span>
            @enderror
					</div>

					<div class="form-group">
						<label class="form-control-label">Brand Name:Image<span class="tx-denger">*</span></label>
						<input type="file" name="brand_image" placeholder="brands image" class="form-control">

              @error('brand_image')
              <span class="text-danger">{{ $message }}</span>
            @enderror

					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Add new</button>
					</div>
          </form>
				</div>
		</div>
	</div>
      </div>
    </div>
  </div>

  @endsection
