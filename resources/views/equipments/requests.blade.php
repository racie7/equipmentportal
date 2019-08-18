@extends('layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>My Requests</h1>
				</div>
				<div class="col-sm-6">
					<div class="breadcrumb float-sm-right">
						<a href="{{ url()->previous() }}" class="btn btn-info btn-sm">Go Back</a>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- /.row -->
			@include('partials.alerts')
			<div class="row">
				<div class="col-12">
					@if(count($requests))
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">My Requests</h3>
								
								{{--<div class="card-tools">--}}
								{{--<div class="input-group input-group-sm" style="width: 150px;">--}}
								{{--<input type="text" name="table_search" class="form-control float-right"--}}
								{{--placeholder="Search">--}}
								{{----}}
								{{--<div class="input-group-append">--}}
								{{--<button type="submit" class="btn btn-default"><i class="fa fa-search"></i>--}}
								{{--</button>--}}
								{{--</div>--}}
								{{--</div>--}}
								{{--</div>--}}
							</div>
							<!-- /.card-header -->
							<div class="card-body table-responsive p-0">
								<table class="table table-hover table-bordered">
									<thead>
									<tr>
										<th width="1">#</th>
										<th class="text-center">Tag NO</th>
										<th>Description</th>
										<th class="text-center">Approval Status</th>
										<th class="text-center">Returning Status</th>
										<th class="text-center">Returns At</th>
										<th class="text-center">Placed At</th>
									</tr>
									</thead>
									<tbody>
									@foreach($requests as $request)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td class="text-center">{{ $request->equipment->tag_number }}</td>
											<td>{{ $request->equipment->description }}</td>
											<td class="text-center">
												@if(!$request->is_processed)
													<span class="badge badge-danger">Pending</span>
												@else
													<span class="badge badge-success">Processed</span>
												@endif
											</td>
											<td class="text-center">
												@if(!$request->is_returned)
													<span class="badge badge-danger">Pending</span>
												@else
													<span class="badge badge-success">Returned</span>
												@endif
											</td>
											<td class="text-center">
												{{ !is_null($request->returns_at) ?
												date("M d Y, H:i", strtotime($request->returns_at))
												 : 'N/A'}}
											</td>
											<td class="text-center">
												{{ date("M d Y, H:i", strtotime($request->created_at)) }}
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<div class="card-footer clearfix">
								<ul class="pagination pagination-sm m-0 float-right">
									{{ $requests->appends($_GET)->links() }}
								</ul>
							</div>
							<!-- /.card-body -->
						</div>
					@else
						<div class="card">
							<div class="container" style="margin: 40px 0">
								<div class="row">
									<div class="col-md-6 offset-md-3">
										<div class="alert alert-info alert-dismissible text-center">
											No requests were found. Please create a request.
										</div>
									</div>
								</div>
								<div class="text-center">
									<a href="{{ route('equipments.available') }}"
									   class="btn btn-primary text-center">
										Create Request
									</a>
								</div>
							</div>
						</div>
				@endif
				<!-- /.card -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
@endsection
