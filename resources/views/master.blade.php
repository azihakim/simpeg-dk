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
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('vendors/dist/css/adminlte.min.css') }}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/select2/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendors/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
	<!-- daterange picker -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/daterangepicker/daterangepicker.css') }}">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet"
		href="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
	<!-- Bootstrap4 Duallistbox -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
	<!-- BS Stepper -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/bs-stepper/css/bs-stepper.min.css') }}">
	<!-- dropzonejs -->
	<link rel="stylesheet" href="{{ asset('vendors/plugins/dropzone/min/dropzone.min.css') }}">
	@yield('style')
</head>

<body class="hold-transition layout-top-nav">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-dark navbar-primary mb-3">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index3.html" class="nav-link">
						<img src="{{ asset('vendors/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
							class="brand-image img-circle elevation-3" style="opacity: .8"> SIMPEG
					</a>
				</li>

				<!-- REKRUTMEN dropdown -->
				@if (Auth::user()->jabatan == 'Super Admin' ||
						Auth::user()->jabatan == 'Pimpinan' ||
						Auth::user()->jabatan == 'Admin' ||
						Auth::user()->jabatan != 'Karyawan')
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
							aria-expanded="false">
							<i class="fas fa-newspaper"></i> Rekrutmen
						</a>
						<div class="dropdown-menu">
							<a href="{{ route('lowongan.index') }}" class="dropdown-item @yield('act-lowongan')">
								<i class="fas fa-file-alt"></i> Lowongan
							</a>
							<a href="{{ route('lamaran.index') }}" class="dropdown-item @yield('act-lamaran')">
								<i class="fas fa-briefcase"></i> Pelamar
							</a>
						</div>
					</li>
				@endif

				<!-- Karyawan dropdown -->
				<li class="nav-item dropdown">
					@if (Auth::user()->jabatan == 'Super Admin' || Auth::user()->jabatan == 'Pimpinan' || Auth::user()->jabatan != 'Pelamar')
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
							aria-expanded="false">
							<i class="fas fa-users"></i> Karyawan
						</a>
						<div class="dropdown-menu">
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan != 'Karyawan')
								<a href="{{ route('karyawan.index') }}" class="dropdown-item @yield('act-karyawan')">
									<i class="fas fa-database"></i> Data Karyawan
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan == 'Karyawan')
								<a href="{{ route('jabatan.index') }}" class="dropdown-item @yield('act-jabatan')">
									<i class="fas fa-briefcase"></i> Jabatan
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan == 'Karyawan' ||
									Auth::user()->jabatan == 'Admin')
								<a href="{{ route('absensi.index') }}" class="dropdown-item @yield('act-absensi')">
									<i class="fas fa-calendar"></i> Absensi
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin')
								<a href="{{ route('location.index') }}" class="dropdown-item @yield('act-lokasi')">
									<i class="fas fa-building"></i> Lokasi
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan == 'Karyawan')
								<a href="{{ route('cutiizin.index') }}" class="dropdown-item @yield('act-cutiizin')">
									<i class="fas fa-calendar-times"></i> Cuti/Izin
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan == 'Karyawan')
								<a href="{{ route('promosidemosi.index') }}" class="dropdown-item @yield('act-promosidemosi')">
									<i class="fas fa-bullhorn"></i> Promosi/Demosi
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan == 'Karyawan')
								<a href="{{ route('resign.index') }}" class="dropdown-item @yield('act-resign')">
									<i class="fas fa-user-times"></i> Pengunduran Diri
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan == 'Karyawan')
								<a href="{{ route('rewardpunishment.index') }}" class="dropdown-item @yield('act-rewardpunishment')">
									<i class="fas fa-gavel"></i> Reward/Punishment
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan == 'Karyawan' ||
									Auth::user()->jabatan == 'Admin')
								<a href="{{ route('phk.index') }}" class="dropdown-item @yield('act-phk')">
									<i class="fas fa-users-slash"></i> PHK
								</a>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Pimpinan' ||
									Auth::user()->jabatan == 'Karyawan' ||
									Auth::user()->jabatan == 'Admin')
								<a href="{{ route('user.index') }}" class="dropdown-item @yield('act-user')">
									<i class="fas fa-laptop"></i> Data Pengguna
								</a>
							@endif
						</div>
					@endif
				</li>
			</ul>

			<!-- Right navbar links (optional) -->
			<ul class="navbar-nav ml-auto">
				<!-- Profile dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
						aria-expanded="false">
						<i class="fas fa-user-circle"></i> {{ Auth::user()->pegawai->nama ?? (Auth::user()->username ?? 'none') }} -
						{{ Auth::user()->jabatan ?? 'none' }}
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							{{ __('Log Out') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			</ul>
		</nav>

		<!-- /.navbar -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row justify-content-center">
						@yield('content')
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->

		<!-- Main Footer -->
		<footer class="main-footer">

		</footer>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- jQuery -->
	<script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>

	<!-- Bootstrap 4 -->
	<script src="{{ asset('vendors/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<!-- DataTables  & Plugins -->
	<script src="{{ asset('vendors/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/jszip/jszip.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/pdfmake/pdfmake.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/pdfmake/vfs_fonts.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('vendors/dist/js/adminlte.min.js') }}"></script>
	<!-- Page specific script -->
	<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});
		});
	</script>
	{{-- map --}}
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
		integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
	<!-- Select2 -->
	<script src="{{ asset('vendors/plugins/select2/js/select2.full.min.js') }}"></script>
	<!-- Bootstrap4 Duallistbox -->
	<script src="{{ asset('vendors/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
	<!-- InputMask -->
	<script src="{{ asset('vendors/plugins/moment/moment.min.js') }}"></script>
	<script src="{{ asset('vendors/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
	<!-- date-range-picker -->
	<script src="{{ asset('vendors/plugins/daterangepicker/daterangepicker.js') }}"></script>
	<!-- bootstrap color picker -->
	<script src="{{ asset('vendors/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="{{ asset('vendors/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
	<!-- Bootstrap Switch -->
	<script src="{{ asset('vendors/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
	<!-- BS-Stepper -->
	<script src="{{ asset('vendors/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
	<!-- dropzonejs -->
	<script src="{{ asset('vendors/plugins/dropzone/min/dropzone.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			//Initialize Select2 Elements
			$('.select2').select2({
				theme: 'bootstrap4'
			})

			//Datemask dd/mm/yyyy
			$('#datemask').inputmask('dd/mm/yyyy', {
				'placeholder': 'dd/mm/yyyy'
			})
			//Datemask2 mm/dd/yyyy
			$('#datemask2').inputmask('mm/dd/yyyy', {
				'placeholder': 'mm/dd/yyyy'
			})
			//Money Euro
			$('[data-mask]').inputmask()

			//Date picker
			$('#reservationdate').datetimepicker({
				format: 'L'
			});

			//Date and time picker
			$('#reservationdatetime').datetimepicker({
				icons: {
					time: 'far fa-clock'
				}
			});

			//Date range picker
			$('#reservation').daterangepicker()
			//Date range picker with time picker
			$('#reservationtime').daterangepicker({
				timePicker: true,
				timePickerIncrement: 30,
				locale: {
					format: 'MM/DD/YYYY hh:mm A'
				}
			})
			//Date range as a button
			$('#daterange-btn').daterangepicker({
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
							'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate: moment()
				},
				function(start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
				}
			)

			//Timepicker
			$('#timepicker').datetimepicker({
				format: 'LT'
			})

			//Bootstrap Duallistbox
			$('.duallistbox').bootstrapDualListbox()

			//Colorpicker
			$('.my-colorpicker1').colorpicker()
			//color picker with addon
			$('.my-colorpicker2').colorpicker()

			$('.my-colorpicker2').on('colorpickerChange', function(event) {
				$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
			})

			$("input[data-bootstrap-switch]").each(function() {
				$(this).bootstrapSwitch('state', $(this).prop('checked'));
			})

		})
	</script>
	@yield('script')
</body>

</html>
