@extends('layouts.auth')

@section('content')
	<div class="login-box" style="margin-bottom: 5px; margin-top: 75px; overflow-x: hidden !important;">
		<div class="login-logo">
			<a href="{{ route('welcome') }}"><b>{{ config('app.name') }}</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Reset Your Account Password</p>
				<form action="{{ route('password.update') }}" method="post">
					@csrf
					<input type="hidden" name="token" value="{{ $token }}">
					<div class="form-group has-feedback">
						<input type="email" name="email" autofocus
						       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
						       value="{{ old('email') }}" placeholder="Your Email Address" required>
						@if ($errors->has('email'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password"
						       class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
						       placeholder="Your Password" required>
						@if ($errors->has('password'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password_confirmation"
						       class="form-control"
						       placeholder="Confirm Password" required>
					</div>
					
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Reset Password</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
@endsection
