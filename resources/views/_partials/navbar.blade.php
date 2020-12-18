<nav class="navbar navbar-expand-md navbar-light shadow-sm bg-white">
	<div class="container">
		<a href="{{ route('home') }}" class="navbar-brand"><b>{{ site('name') }}</b></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<form action="{{ route('search') }}" class="d-flex my-4 my-md-0 me-auto">
				<div class="input-group">
					<input class="form-control" type="search" placeholder="Search" name="q">
					<button class="btn btn-primary"><i class="fa fa-search"></i></button>
				</div>
			</form>
			<ul class="navbar-nav mb-2 mb-lg-0">
				@auth('web')
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
							<img src="{{ auth()->user()->detail->photoSrc }}" style="width: 30px; height: 30px; object-fit: cover;" class="rounded-circle me-1" alt="">
							{{ auth()->user()->name }}
						</a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('user.index') }}" class="dropdown-item">Dashboard</a></li>
							<li><a href="{{ route('user.files.index') }}" class="dropdown-item">My PDF</a></li>
							<li><a href="{{ route('user.profile') }}" class="dropdown-item">Edit Profile</a></li>
							<li><a href="{{ route('logout') }}" class="dropdown-item">Logout</a></li>
						</ul>
					</li>
				@endauth
				@guest('web')
					<li class="nav-item">
						<a href="{{ route('login') }}" class="nav-link">Login</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('register') }}" class="nav-link">Register</a>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>