@extends('layouts.auth')

@section('content')
	<div class="login-box" style="margin-bottom: 5px; margin-top: 150px">
		<div class="login-logo">
			<a href="{{ route('welcome') }}"><b>{{ config('app.name') }}</b></a>
		</div>
		<div class="row">
			<div class="col-md-12">
				@if (session('status'))
					<div class="alert alert-success text-center" role="alert">
						{{ session('status') }}
					</div>
				@endif
			</div>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Reset Your Account Password</p>
				<form action="{{ route('password.email') }}" method="post">
					@csrf
					<div class="form-group has-feedback">
						<input type="email" name="email"
						       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
						       value="{{ old('email') }}" placeholder="Your Account Email" autofocus required>
						@if ($errors->has('email'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
						@endif
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">
								Send Password Reset Link
							</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
@endsection
