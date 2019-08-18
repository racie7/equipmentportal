@extends(auth()->user()->is_admin ? 'layouts.admin' : 'layouts.app')

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
						<a href="{{ route('admin.equipments.create') }}" class="btn btn-info btn-sm">Upload CSV</a>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- /.row -->
			<div class="row">
				<div class="col-12">
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
									<th>Tag NO</th>
									<th>Class</th>
									<th>Description</th>
									<th>Serial NO</th>
									<th>Cost</th>
									<th>NBV</th>
									<th>Location</th>
								</tr>
								</thead>
								<tbody>
								@foreach($equipments as $equipment)
									@php($cost = is_null($equipment->cost) ? 'N/A' : number_format($equipment->cost))
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $equipment->tag_number }}</td>
										<td>{{ $equipment->class }}</td>
										<td>{{ $equipment->description }}</td>
										<td>{{ $equipment->serial_number }}</td>
										<td>{{ $cost }}</td>
										<td>{{ number_format($equipment->nbv) }}</td>
										<td>{{ $equipment->location }}</td>
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
					<!-- /.card -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
@endsection
