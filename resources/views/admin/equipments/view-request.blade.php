@extends('layouts.admin')

@section('content')
	
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Borrowing Request #{{ $request->id }}</h1>
				</div>
				<div class="col-sm-6">
					<div class="breadcrumb float-sm-right">
						<a href="{{ route('admin.equipments.borrowing') }}" class="btn btn-info btn-sm">
							View Requests
						</a>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	
	<section class="content">
		<div class="container-fluid">
			@include('partials.alerts')
			<div class="row">
				<div class="col-md-3">
					
					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<h3 class="profile-username text-center">{{ $request->user->name }}</h3>
							
							<p class="text-muted text-center">{{ $request->user->staff_number }}</p>
							
							<ul class="list-group list-group-unbordered mb-3">
								<li class="list-group-item">
									<b>Email</b> <a class="float-right">{{ $request->user->email }}</a>
								</li>
								<li class="list-group-item">
									<b>Department</b> <a class="float-right">{{ $request->user->department }}</a>
								</li>
								<li class="list-group-item">
									<b>Member Since</b> <a class="float-right">
										{{ date("M d Y", strtotime($request->user->created_at)) }}
									</a>
								</li>
							</ul>
							
							{{--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
					<!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="card">
						<div class="card-body">
							<div class="tab-content">
								<div class="active tab-pane" id="activity">
									<form role="form"
									      action="{{ route('admin.equipments.borrowing.request', $request->id) }}"
									      method="POST">
										@csrf
										<div class="card-body">
											<div class="form-group">
												<label for="name">Equipment Name</label>
												<input type="text"
												       class="form-control"
												       value="{{ $request->equipment->description }}"
												       id="name" name="name" disabled>
											</div>
											<div class="form-group">
												<label for="name">Tag No</label>
												<input type="text"
												       class="form-control"
												       value="{{ $request->equipment->tag_number }}"
												       id="name" name="name" disabled>
											</div>
											<div class="form-group">
												<label for="date">Returning Date</label>
												<input type="date" min="{{ now()->toDateString() }}"
												       class="form-control" required
												       id="date" name="date">
											</div>
											@if($request->is_processed)
												<button class="btn btn-success btn-block" disabled>
													Request Approved
												</button>
											@else
												<button type="submit" class="btn btn-primary btn-block">
													Approve Request
												</button>
											@endif
										</div>
										<!-- /.card-body -->
									</form>
								</div>
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- /.nav-tabs-custom -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
@endsection
