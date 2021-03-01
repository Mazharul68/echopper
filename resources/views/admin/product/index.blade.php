@extends('layouts.admin_master')

@section('products')
active show-sub
@endsection

@section('title') @if(session()->get('language')== 'bangla') ম্যানেজ প্রাডাক্ট @else  MANAGE PRODUCT @endif @endsection

@section('manage-product')
active 
@endsection

@section('admin_content')
  <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOPPER</a>
        <span class="breadcrumb-item active">PRODUCTS</span>
      </nav>

   <div class="sl-pagebody">
        <div class="row row-sm">
	        <div class="col-md-12">
		         <div class="card pd-20 pd-sm-40">
			         <div class="card-header">Product List</div>
                  <div class="card-body">
                    <div class="table-wrapper">
                      <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Prod Img</th>
                            <th class="wd-15p">Prod Name En</th>
                            <th class="wd-15p">Prod Price</th>
                            <th class="wd-20p">Prod Quntity</th>
                            <th class="wd-5p">Prod Dis.</th>
                            <th class="wd-10p">Prod Status</th>
                            <th class="wd-20p">Action</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $item)
                          <tr>
                          <td>
                          <img src="{{asset ($item->product_thambnail) }}" alt="" style="width: 80px;" height="80px;">
                          </td>
                            <td>{{ $item->product_name_en }}</td>
                            <td>{{ $item->selling_price }} Tk</td>
                            <td>{{ $item->product_qty }}</td>
                            <td>
                              @if ($item->discount_price == NUll)
                              <span class="badge pill-badge badge-danger">No</span>
                              @else 
                            @php
                                $amount = $item->selling_price - $item->discount_price;
                                $discount = ($amount/$item->selling_price) * 100;
                            @endphp
                                  <span class="badge pill-badge badge-success">{{round ($discount)}}%</span>
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
                              <a href="{{ url('admin/product-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-eye"></i></a>

                              <a href="{{ url('admin/product-edit/'.$item->id) }}" class="btn btn-info btn-sm" title="edit data"><i class="fa fa-pencil"></i></a>

                              <a href="{{url('admin/product-delete/'.$item->id)}}" class="btn btn-danger btn-sm" id="delete" title="delet data"><i class="fa fa-trash"></i></a>
                        
                            @if ($item->status ==1)
                            <a href="{{ url('admin/product-inactive/'.$item->id) }}" class="btn btn-danger btn-sm" title="inactive"><i class="fa fa-arrow-down"></i></a>
                            @else  
                            <a href="{{ url('admin/product-active/'.$item->id) }}" class="btn btn-success btn-sm" title="active"><i class="fa fa-arrow-up"></i></a>
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
		    </div>
    </div>
  </div>
  @endsection



