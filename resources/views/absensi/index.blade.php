@extends('master')
@section('act-absensi', 'active')
@section('content')
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Absensi</h3>

				<div class="card-tools">
					@if (Auth::user()->jabatan == 'Super Admin' ||
							Auth::user()->jabatan == 'Karyawan' ||
							Auth::user()->jabatan == 'Pimpinan')
						<div class="btn-group">
							@if (Auth::user()->jabatan == 'Super Admin' || Auth::user()->jabatan == 'Karyawan')
								<button type="button" class="btn btn-outline-primary" id="btnAbsen" data-toggle="modal"
									data-target="#exampleModal">Absen</button>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									(Auth::user()->jabatan != 'Karyawan' && Auth::user()->jabatan == 'Pimpinan'))
								<button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#rekapAbsensi">
									Rekap Absen
								</button>
							@endif
						</div>
					@endif

					@include('absensi.modalAbsen')
					@include('absensi.modalRekap')
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width: 5px; text-align:center">#</th>
							<th>Karyawan</th>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th>Foto</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($dataAbsen as $item)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $item->user->nama ?? '' }}</td>
								<td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</td>
								<td>{{ $item->keterangan }}</td>
								<td><img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" style="width: 100px; height: auto;">
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
@endsection
