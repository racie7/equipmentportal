<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>{{ config('app.name', 'Laravel') }}</title>
	
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="{{ route('home') }}" class="nav-link">Home</a>
			</li>
		
		</ul>
		
		<!-- SEARCH FORM -->
		<form class="form-inline ml-3">
			<div class="input-group input-group-sm">
				<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-navbar" type="submit">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</form>
	
	</nav>
	<!-- /.navbar -->
	
	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="{{ route('home') }}" class="brand-link">
			<img src="{{ asset('images/logo.png') }}" alt="App logo" class="brand-image img-circle elevation-3"
			     style="opacity: .8">
			<span class="brand-text font-weight-light">{{ config('app.name') }}</span>
		</a>
		
		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="{{ asset('images/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">{{ auth()->user()->name }}</a>
				</div>
			</div>
			
			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
				    data-accordion="false">
					<li class="nav-item">
						<a href="{{ route('home') }}" class="nav-link">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>Dashboard</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-tools"></i>
							<p>
								Equipments
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('equipments.available') }}" class="nav-link">
									<i class="fa fa-check-circle nav-icon"></i>
									<p>Available Equipments</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link">
							<i class="nav-icon fa fa-user-cog"></i>
							<p>
								My Account
								<i class="right fa fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('account.password') }}" class="nav-link">
									<i class="fa fa-key nav-icon"></i>
									<p>Password Settings</p>
								</a>
							</li>
							{{--<li class="nav-item">--}}
							{{--<a href="{{ route('account.profile') }}" class="nav-link">--}}
							{{--<i class="fa fa-user nav-icon"></i>--}}
							{{--<p>My Profile</p>--}}
							{{--</a>--}}
							{{--</li>--}}
						</ul>
					</li>
					<li class="nav-item">
						<a href="{{ route('logout') }}" class="nav-link"
						   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="nav-icon fas fa-sign-out-alt"></i>
							<p>Logout</p>
							
							<form id="logout-form" action="{{ route('logout') }}" method="POST"
							      style="display: none;">
								@csrf
							</form>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@yield('content')
	</div>
	<!-- /.content-wrapper -->
	<!-- Main Footer -->
	<footer class="main-footer text-center">
		<strong>
			Copyright &copy; {{ date('Y') }} <a href="{{ config('app.url') }}">{{ config('app.name') }}</a>.
		</strong>
	</footer>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	@stack('scripts')
</div>
</body>
</html>
