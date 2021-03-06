@extends('layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Available Equipments</h1>
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
					@if(count($equipments))
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Available Equipments</h3>
								
								<div class="card-tools">
									<div class="input-group input-group-sm" style="width: 150px;">
										<input type="text" name="table_search" class="form-control float-right"
										       placeholder="Search">
										
										<div class="input-group-append">
											<button type="submit" class="btn btn-default"><i class="fa fa-search"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card-header -->
							<div class="card-body table-responsive p-0">
								<table class="table table-hover table-bordered">
									<thead>
									<tr>
										<th width="1">#</th>
										<th class="text-center">Tag NO</th>
										<th>Description</th>
										<th>Location</th>
										<th class="text-center">Actions</th>
									</tr>
									</thead>
									<tbody>
									@foreach($equipments as $equipment)
										@php($cost = is_null($equipment->cost) ? 'N/A' : number_format($equipment->cost))
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td class="text-center">{{ $equipment->tag_number }}</td>
											<td>{{ $equipment->description }}</td>
											<td>{{ $equipment->location }}</td>
											<td class="text-center">
												<form action="{{ route('equipments.available') }}" method="post">
													@csrf
													<input type="hidden" name="_id" value="{{ $equipment->id }}">
													<input type="hidden" name="_name"
													       value="{{ $equipment->description }}">
													<button class="btn btn-primary btn-primary btn-sm">
														Request
													</button>
												</form>
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<div class="card-footer clearfix">
								<ul class="pagination pagination-sm m-0 float-right">
									{{ $equipments->appends($_GET)->links() }}
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
											No equipments were found. Please check back later.
										</div>
									</div>
								</div>
								<div class="text-center">
									<a href="{{ url()->previous() }}"
									   class="btn btn-primary text-center">
										Go Back
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
