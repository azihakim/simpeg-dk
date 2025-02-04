@extends('master')
@section('act-lamaran', 'active')
@section('content')
	<div class="col-sm-10">
		@if (session('success'))
			<div class="alert alert-success" id="success-alert">
				{{ session('success') }}
			</div>
			<script>
				setTimeout(function() {
					document.getElementById('success-alert').style.display = 'none';
				}, 3000);
			</script>
		@endif
		@if (session('error'))
			<div class="alert alert-danger" id="error-alert">
				{{ session('error') }}
			</div>
		@endif
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Lamaran</h3>

				<div class="card-tools">
					@if (Auth::user()->jabatan == 'Super Admin' || (Auth::user()->jabatan != 'Pimpinan' && Auth::user()->jabatan != 'Admin'))
						{{-- <div class="btn-group">
							<a href="{{ route('lowongan.create') }}" class="btn btn-outline-primary">Tambah Lowongan</a>
						</div> --}}
					@endif
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="datatable" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th style="width: 5px">#</th>
							<th>Jabatan</th>
							<th style="width: 20%">Status</th>
							@if (Auth::user()->jabatan == 'Super Admin' || Auth()->user()->jabatan == 'Admin')
								<th style="width: 30%">Aksi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach ($lamaran as $item)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $item->lowongan->jabatan->nama_jabatan }}</td>
								<td>{{ $item->status }}</td>
								@if (Auth::user()->jabatan == 'Super Admin' || Auth()->user()->jabatan == 'Admin')
									<td>
										@if ($item->status == 'Diajukan' && Auth::user()->jabatan == 'Pelamar')
											<a href="{{ route('lamaran.edit', $item->id) }}" class="btn btn-warning btn-block">Edit</a>
										@endif
										@if (Auth()->user()->jabatan == 'Super Admin' || Auth()->user()->jabatan == 'Admin')
											<div class="dropdown">
												<button class="btn btn-outline-info btn-block dropdown-toggle" type="button" id="dropdownMenuOutlineButton1"
													data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Respon</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton1">
													<h6 class="dropdown-header">Cek Lamaran</h6>
													<a class="dropdown-item" href="{{ asset('storage/lamaran_files/' . $item->file) }}" target="_blank">Cek
														Berkas</a>
													<div class="dropdown-divider"></div>

													<h6 class="dropdown-header">Ubah Status</h6>
													<form action="{{ route('lamaran.status', $item->id) }}" method="POST" style="display:inline;">
														@csrf
														@method('PUT')
														<input type="hidden" name="status" value="Ditolak">
														<button class="dropdown-item" type="submit">Tolak</button>
													</form>
													<form action="{{ route('lamaran.status', $item->id) }}" method="POST" style="display:inline;">
														@csrf
														@method('PUT')
														<input type="hidden" name="status" value="Diterima">
														<button class="dropdown-item" type="submit">Terima</button>
													</form>
												</div>
											</div>
										@endif
									</td>
								@endif
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
@endsection
