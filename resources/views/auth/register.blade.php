@extends('layouts.auth')

@section('content')
	<div class="login-box" style="margin-bottom: 5px; margin-top: 25px; overflow-x: hidden !important;">
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
				<p class="login-box-msg">Create Account</p>
				<form action="{{ route('register') }}" method="post">
					@csrf
					<div class="form-group has-feedback">
						<input type="text" name="name"
						       class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
						       value="{{ old('name') }}" placeholder="Your Name" required autofocus>
						@if ($errors->has('name'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group has-feedback">
						<input type="text" name="staff_number"
						       class="form-control {{ $errors->has('staff_number') ? ' is-invalid' : '' }}"
						       value="{{ old('staff_number') }}" placeholder="Your Staff Number" required>
						@if ($errors->has('staff_number'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('staff_number') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group has-feedback">
						<input type="email" name="email"
						       class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
						       value="{{ old('email') }}" placeholder="Your Email Address" required>
						@if ($errors->has('email'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
						@endif
					</div>
					<div class="form-group has-feedback">
						<select name="department" id="department" class="form-control" required>
							{{--<option selected disabled> -- Select your Department --</option>--}}
							<option value="ict">Department of ICT</option>
							<option value="procurement">Department of Procurement</option>
							<option value="catering">Department of Catering</option>
						</select>
						@if ($errors->has('department'))
							<span class="invalid-feedback">
                                <strong class="text-danger">{{ $errors->first('department') }}</strong>
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
					
					<div class="form-group has-feedback">
						<input type="hidden" name="remember" id="remember" value="true" title="remember">
					</div>
					
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Create Account</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				
				<div class="social-auth-links text-center mb-3">
					<p>- OR -</p>
					<a href="{{ route('login') }}" class="btn btn-block btn-outline-danger">
						<i class="fa fa-sign-in-alt mr-2"></i> Login Instead?
					</a>
				</div>
			
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
@endsection
