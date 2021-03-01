@extends('layouts.admin_master')
@section('title') @if(session()->get('language')== 'bangla') অল-ইউজার @else All Users @endif @endsection
@section('admin_content')
 <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{ '/' }}">E-SHOOPER</a>
        <span class="breadcrumb-item active">All Users</span>
      </nav>
      <div class="sl-pagebody">
        <div class="row row-sm">
	<div class="col-md-12">
		<div class="card pd-20 pd-sm-40">

            @php
                $oneline_user = 0;
            @endphp
            @foreach ($users as $row)
            @php
                if($row->userIsOnline()){
                    $oneline_user = $oneline_user +1;
                }
            @endphp
            @endforeach
			<div class="card-header">Total User : <span class="badge pill-badge badge-success" style="font-size: 14px"> ({{ count($users) }})</span><span class="badge pill-badge badge-success ml-3" style="font-size: 14px"> Active User ({{ $oneline_user }})</span>


            </div>

          <div class="card-body">
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                  <tr>
                    <th class="wd-10p">image</th>
                    <th class="wd-20p">Name</th>
                    <th class="wd-20p">Email</th>
                    <th class="wd-15p">Phone</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-10p">account</th>
                    <th class="wd-15p">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td><img src="{{ asset($user->image) }}" width="80px" alt=""></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} </td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        @if ($user->userIsOnline())
                        <span class="badge pill-badge badge-success">Active now</span>
                        @else
                        <span class="badge pill-badge badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                        @endif
                    </td>
                    <td>
                        @if ($user->isban == 0)
                        <span class="badge pill-badge badge-success">Unbanned</span>
                        @else
                        <span class="badge pill-badge badge-danger">Banned</span>
                        @endif
                      </td>
                    <td>
                        @if ($user->isban == 1)
                             <a href="{{ url('admin/user/unbanned/'.$user->id) }}" class="btn btn-success btn-sm"><i class="fa fa-arrow-down"></i>Unbanned</a>
                        @else
                            <a href="{{ url('admin/user/banned/'.$user->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-up"></i>Banned</a>
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
