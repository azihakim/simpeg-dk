<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIMPEG</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
	@if (session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif

	@if ($errors->has('username'))
		<div class="alert alert-danger">
			Username atau password salah
		</div>
	@endif

	<div class="register-box">
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				{{-- <img src="{{ asset('vendors/img/logo-provinsi.png') }}" alt="Logo Palembang"> --}}
				<h6 style="margin-bottom: 1px"><strong>SIMPEG</strong></h6>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Login</p>

				<form action="{{ route('login') }}" method="post">
					@csrf
					<div class="input-group mb-3">
						<input name="username" type="text" class="form-control" placeholder="Username" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input name="password" type="password" class="form-control" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block"><strong>Login</strong></button>
						</div>
					</div>
					<p class="mt-1">
						<a href="{{ route('registrasi.form') }}">Daftar</a>
					</p>
				</form>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
