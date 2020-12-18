@extends('admin._layouts.app', ['urls' => ['Home', 'Files']])

@section('title', 'Files')

@section('content')

	<div id="alert"></div>

	<div class="card">
		<div class="card-header">
			<h2 class="h5 card-title">Files</h2>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>User</th>
							<th>Created At</th>
							<th>Action</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

@endsection

@push('css')
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('js')
	<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
	<script>
		const ajaxUrl = '{{ route('admin.files.datatables') }}'
		const deleteUrl = '{{ route('admin.files.destroy', ':id') }}'
		const csrf = '{{ csrf_token() }}'
	</script>
	<script src="{{ asset('js/admin/files.js') }}"></script>
@endpush