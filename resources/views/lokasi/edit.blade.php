@extends('master')
@section('act-jabatan', 'active')
@section('content')
	<div class="col-sm-4">
		<div class="card card-info">
			<div class="card-header">
				<h3 class="card-title">Form Edit Lokasi</h3>
			</div>
			<!-- /.card-header -->
			<!-- form start -->
			<form action="{{ route('location.update', $data->id) }}" method="POST" enctype="multipart/form-data"
				class="form-horizontal">
				@csrf
				@method('PUT')
				<div class="card-body">
					<div class="form-group">
						<label>Lokasi</label>
						<div>
							<input type="text" name="location" class="form-control" placeholder="Masukkan Lokasi"
								value="{{ $data->location }}" required>
						</div>
					</div>
					<div class="form-group">
						<label>Latitude</label>
						<div>
							<input type="text" name="latitude" class="form-control" placeholder="Masukkan Latitude"
								value="{{ $data->latitude }}" required>
						</div>
					</div>
					<div class="form-group">
						<label>Longitude</label>
						<div>
							<input type="text" name="longitude" class="form-control" placeholder="Masukkan Longitude"
								value="{{ $data->longitude }}" required>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button class="btn btn-default" id="btnCancel">Cancel</button>
					<button type="submit" class="btn btn-info float-right">Simpan</button>
				</div>
				<!-- /.card-footer -->
			</form>
		</div>
	</div>
@endsection
@section('script')
	<script>
		document.querySelector('#btnCancel').addEventListener('click', function(event) {
			event.preventDefault();
			window.history.back();
		});
	</script>
@endsection
