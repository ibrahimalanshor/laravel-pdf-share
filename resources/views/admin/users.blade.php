@extends('admin._layouts.app', ['urls' => ['Home', 'Users']])

@section('title', 'Users')

@section('content')

	<div class="card">
		<div class="card-header">
			<h2 class="h5 card-title">Users</h2>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Confimed</th>
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
		const ajaxUrl = '{{ route('admin.users.datatables') }}'
		const csrf = '{{ csrf_token() }}'
	</script>
	<script src="{{ asset('js/admin/users.js') }}"></script>
@endpush