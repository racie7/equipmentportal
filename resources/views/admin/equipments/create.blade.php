@extends(auth()->user()->is_admin ? 'layouts.admin' : 'layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Upload Equipments CSV</h1>
				</div>
				<div class="col-sm-6">
					<div class="breadcrumb float-sm-right">
						<a href="{{ route('admin.equipments.index') }}" class="btn btn-info btn-sm">View Equipments</a>
					</div>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- general form elements -->
					<div class="card">
						<div style="padding-top: 10px">
							@include('partials.alerts')
						</div>
						<!-- form start -->
						<div class="row">
							<div class="col-md-6 offset-md-3">
								<form role="form" action="{{ route('admin.equipments.store') }}" method="POST"
								      enctype="multipart/form-data">
									@csrf
									<div class="card-body">
										<div class="form-group">
											<label for="currentPassword">Upload CSV</label>
											<input type="file"
											       class="form-control {{ $errors->has('csv') ? ' is-invalid' : '' }}"
											       id="csv" name="csv" autofocus required>
											
											@if ($errors->has('csv'))
												<span class="invalid-feedback">
			                                        <strong>{{ $errors->first('csv') }}</strong>
			                                    </span>
											@endif
										</div>
										
										<button type="submit" class="btn btn-primary btn-block">Upload File</button>
									</div>
									<!-- /.card-body -->
								</form>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (left) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
@endsection
