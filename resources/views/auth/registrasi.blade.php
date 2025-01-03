<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Registration Page</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	{{-- <link rel="stylesheet" href="{{ asset('vendors/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css') }}"> --}}
</head>

<body class="hold-transition register-page">
	<div class="register-box">
		@if (session('any'))
			<div class="alert alert-info">
				{{ session('any') }}
			</div>
		@endif
		@if (session('error'))
			<div class="alert alert-danger">
				{{ session('error') }}
			</div>
		@endif
		<div class="register-logo">
			<a href="../../index2.html"><b>Admin</b>LTE</a>
		</div>

		<div class="card">
			<div class="card-body register-card-body">
				<p class="login-box-msg">Register a new membership</p>

				<form action="{{ route('registrasi.store') }}" method="post">
					@csrf
					<div class="text-center mb-3">
						{{-- <img src="{{ asset('vendors/build/images/logof.png') }}" style="width: 150px"> --}}
					</div>
					<h1 class="h3 mb-3 font-weight-normal text-center"><strong>Registrasi Form</strong></h1>
					<div class="input-group mb-3">
						<input name="nama" type="text" class="form-control" placeholder="Nama" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input name="umur" type="number" class="form-control" placeholder="Umur" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-calendar"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<select class="form-control" name="jenis_kelamin">
							<option selected disabled>Jenis Kelamin</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-venus-mars"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input name="no_telp" type="text" class="form-control" placeholder="Nomor HP" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-phone"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input name="alamat" type="text" class="form-control" placeholder="Alamat" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-map-marker-alt"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input name="username" type="text" class="form-control" placeholder="Username" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" required name="password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block"><strong>Daftar</strong></button>
						</div>
					</div>
				</form>

				<div class="social-auth-links text-center">
					<p>- OR -</p>
					<a href="#" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i>
						Sign up using Facebook
					</a>
					<a href="#" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i>
						Sign up using Google+
					</a>
				</div>

				<a href="login.html" class="text-center">I already have a membership</a>
			</div>
			<!-- /.form-box -->
		</div><!-- /.card -->
	</div>
	<!-- /.register-box -->

	<!-- jQuery -->
	<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
