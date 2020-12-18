<div class="card shadow-sm border-0 position-static top-0 left-0">
	<div class="card-header bg-white">
		<h2 class="h5 py-1 mb-0 fw-bold card-title">Menu</h2>
	</div>
	<div class="card-body p-0">
		<div class="list-group list-group-flush">
			<a href="{{ route('user.index') }}" class="list-group-item {{ active('user') }}">Dashboard</a>
			<a href="{{ route('user.files.index') }}" class="list-group-item {{ active('user/files', 'group') }}">My PDF</a>
			<a href="{{ route('user.saved.index') }}" class="list-group-item {{ active('user/saved', 'group') }}">Saved PDF</a>
			<a href="{{ route('user.profile') }}" class="list-group-item {{ active('user/profile') }}">Edit Profile</a>
			<a href="{{ route('logout') }}" onclick="return confirm('Are You Sure')" class="list-group-item">
				Logout
			</a>
		</div>
	</div>
</div>