@extends('master')
@section('act-jabatan', 'active')
@section('content')
	<div class="col-sm-8">
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
			<script>
				setTimeout(function() {
					document.getElementById('error-alert').style.display = 'none';
				}, 3000);
			</script>
		@endif
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Location</h3>

				<div class="card-tools">
					<div class="btn-group">
						<a href="{{ route('location.create') }}" class="btn btn-outline-primary">Tambah Location</a>
					</div>
				</div>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width: 5px">#</th>
							<th>Lokasi</th>
							<th>Latitude</th>
							<th>Longitude</th>
							<th style="width: 30%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($data as $item)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $item->location }}</td>
								<td>{{ $item->latitude }}</td>
								<td>{{ $item->longitude }}</td>
								<td>
									<a href="{{ route('location.edit', $item->id) }}" class="btn btn-warning btn-block" style="margin: 5px">Edit</a>
									<form action="{{ route('location.destroy', $item->id) }}" method="POST" style="display:inline;">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger btn-block" style="margin: 5px"
											onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
									</form>
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
