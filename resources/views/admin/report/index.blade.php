@extends('layouts.admin_master')

@section('reports')
active
@endsection

@section('title') @if(session()->get('language')== 'bangla') রিপোর্টস @else Reports @endif @endsection

@section('admin_content')

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOOPER</a>
        <span class="breadcrumb-item active">Reports</span>
      </nav>
    <div class="sl-pagebody">
        <div class="row row-sm">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Search by Date</div>
                    <div class="card-body">
                        <form action="{{route('search-by-date')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Select Dete<span class="tx-denger">*</span></label>
                                <input type="date" name="date" class="form-control">
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Search Date</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Search By Month</div>
                    <div class="card-body">
                        <form action="{{route('search-by-month')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Select Month :<span class="tx-denger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select one" name="month_name" data-validation="required">

                                    <option label="Choose One" ></option>
                                        <option value="january">Fanuary</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">september</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                  </select>
                                  @error('month_name')
                                <span class="text-danger">{{ $message }}</span>
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Select Year :<span class="tx-denger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select one" name="year_name" data-validation="required">
                                    <option label="Choose One" ></option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                  </select>
                                @error('year_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Search By Year</div>
                    <div class="card-body">
                        <form action="{{route('search-by-year')}}" method="POST">
                                @csrf
                            <div class="form-group">
                                <label class="form-control-label">Select Year :<span class="tx-denger">*</span></label>
                                <select class="form-control select2-show-search" data-placeholder="Select one" name="year" data-validation="required">
                                    <option label="Choose One" ></option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                  </select>
                                @error('year')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  @endsection
