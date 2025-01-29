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
							Auth::user()->jabatan == 'Pimpinan' ||
							Auth::user()->jabatan == 'Admin')
						<div class="btn-group">
							@if (Auth::user()->jabatan == 'Super Admin' || Auth::user()->jabatan == 'Karyawan')
								<button type="button" class="btn btn-outline-primary" id="btnAbsen" data-toggle="modal"
									data-target="#exampleModal">Absen</button>
							@endif
							@if (Auth::user()->jabatan == 'Super Admin' ||
									Auth::user()->jabatan == 'Admin' ||
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
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Foto Masuk</th>
							<th>Jam Masuk</th>
							<th>Foto Pulang</th>
							<th>Jam Pulang</th>
							<th>Durasi Kerja</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						@php
							// Mengelompokkan data berdasarkan karyawan dan tanggal
							$groupedData = $dataAbsen->groupBy(function ($item) {
							    return $item->id_karyawan . '_' . \Carbon\Carbon::parse($item->created_at)->format('Y-m-d');
							});
						@endphp

						@foreach ($groupedData as $key => $group)
							@php
								// Data Masuk
								$masuk = $group->firstWhere('keterangan', 'masuk');

								// Data Pulang
								$pulang = $group->firstWhere('keterangan', 'pulang');

								// Data Cuti
								$cuti = $group->firstWhere('keterangan', 'Cuti');

								// Data Izin
								$izin = $group->firstWhere('keterangan', 'Izin');

								// Perhitungan Durasi Kerja (hanya berlaku jika ada data masuk dan pulang)
								$durasiKerja = null;
								if ($masuk && $pulang && $masuk->created_at && $pulang->created_at) {
								    $masukTime = \Carbon\Carbon::parse($masuk->created_at);
								    $pulangTime = \Carbon\Carbon::parse($pulang->created_at);
								    $durasiKerja = $masukTime->diff($pulangTime); // Menghitung selisih waktu
								}
							@endphp
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>
									{{-- Menampilkan nama karyawan yang ada --}}
									{{ $masuk->nama ?? ($pulang->nama ?? ($cuti->nama ?? ($izin->nama ?? '-'))) }}
								</td>
								<td>
									{{-- Menampilkan tanggal --}}
									{{ \Carbon\Carbon::parse($masuk->created_at ?? ($pulang->created_at ?? ($cuti->created_at ?? ($izin->created_at ?? now()))))->format('d F Y') }}
								</td>
								<td>
									{{-- Foto Masuk --}}
									@if ($masuk && $masuk->foto)
										<img src="{{ asset('storage/' . $masuk->foto) }}" alt="Foto Masuk" style="width: 100px; height: auto;">
									@else
										-
									@endif
								</td>
								<td>
									{{-- Jam Masuk --}}
									@if ($masuk && $masuk->created_at)
										{{ \Carbon\Carbon::parse($masuk->created_at)->format('H:i:s') }}
									@else
										-
									@endif
								</td>
								<td>
									{{-- Foto Pulang --}}
									@if ($pulang && $pulang->foto)
										<img src="{{ asset('storage/' . $pulang->foto) }}" alt="Foto Pulang" style="width: 100px; height: auto;">
									@else
										-
									@endif
								</td>
								<td>
									{{-- Jam Pulang --}}
									@if ($pulang && $pulang->created_at)
										{{ \Carbon\Carbon::parse($pulang->created_at)->format('H:i:s') }}
									@else
										-
									@endif
								</td>
								<td>
									{{-- Durasi Kerja --}}
									@if ($durasiKerja)
										{{ $durasiKerja->format('%h jam %i menit') }}
									@else
										-
									@endif
								</td>
								<td>
									{{-- Keterangan (Cuti, Izin, Kehadiran Lengkap) --}}
									@if ($cuti)
										Cuti
									@elseif ($izin)
										Izin
									@elseif ($masuk && $pulang)
										Kehadiran Lengkap
									@else
										-
									@endif
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
