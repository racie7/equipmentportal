@extends('layouts.auth')

@section('content')
	<div class="login-box" style="margin-bottom: 5px; margin-top: 60px">
		<div class="login-logo">
			<a href="{{ route('welcome') }}"><b>{{ config('app.name') }}</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="row">
			<div class="col-md-12">
				@if (session('status'))
					<div class="alert alert-danger text-center" role="alert">
						{{ session('status') }}
					</div>
				@endif
			</div>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Log In</p>
				<form action="{{ route('login') }}" method="post">
					@csrf
					<div class="form-group has-feedback">
						<input type="email" name="email"
						       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
						       value="{{ old('email') }}" placeholder="Email" required autofocus>
						@if ($errors->has('email'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group has-feedback">
						<input type="password" name="password"
						       class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
						       placeholder="Password" required>
						@if ($errors->has('password'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
						@endif
					</div>
					
					<div class="form-group has-feedback">
						<input type="hidden" name="remember"
						       id="remember" value="true" title="remember">
					</div>
					
					<div class="row" style="padding-bottom: 10px">
						<div class="col-12">
							<p class="mb-1">
								<a href="{{ route('password.request') }}" class="pull-right">Forgot Password?</a>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				
				<div class="social-auth-links text-center mb-3">
					<p>- OR -</p>
					<a href="{{ route('register') }}" class="btn btn-block btn-outline-danger">
						<i class="fa fa-sign-in-alt mr-2"></i> Create Account?
					</a>
				</div>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
@endsection
