@extends(auth()->user()->is_admin ? 'layouts.admin' : 'layouts.app')

@section('content')
	
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Update Password</h1>
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
								<form role="form" action="{{ route('account.password') }}" method="POST">
									@csrf
									@method('put')
									<div class="card-body">
										<div class="form-group">
											<label for="currentPassword">Current Password</label>
											<input type="password"
											       class="form-control {{ $errors->has('current_password') ? ' is-invalid' : '' }}"
											       id="current_password" name="current_password" autofocus
											       placeholder="Current Password" required>
											
											@if ($errors->has('current_password'))
												<span class="invalid-feedback">
			                                        <strong>{{ $errors->first('current_password') }}</strong>
			                                    </span>
											@endif
										</div>
										<div class="form-group">
											<label for="password">New Password</label>
											<input type="password"
											       class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
											       id="password" name="password"
											       placeholder="New Password" required>
											
											@if ($errors->has('password'))
												<span class="invalid-feedback">
			                                        <strong>{{ $errors->first('password') }}</strong>
			                                    </span>
											@endif
										</div>
										<div class="form-group">
											<label for="confirmPassword">Confirm Password</label>
											<input type="password"
											       class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
											       id="password_confirmation" name="password_confirmation"
											       placeholder="Confirm New Password" required>
										</div>
										
										<button type="submit" class="btn btn-primary btn-block">Update Password</button>
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
