@extends('_layouts.app')

@section('title', 'Login')

@section('content')
	
	<div class="my-5 col-sm-5 mx-auto">
		@if (session()->has('error'))
	    	<div class="alert alert-danger alert-dismissible">
	        	{{ session('error') }}
	        	<button class="btn-close" data-bs-dismiss="alert"></button>
	    	</div>
	    @endif
		<div class="card border-0 shadow-sm">
			<div class="card-header bg-white px-4 py-3">
				<h1 class="h3 mb-0 fw-bold">Login</h1>
			</div>
			<div class="card-body p-4">
				<form action="{{ route('login') }}" method="post">
					@csrf
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" autofocus>

						 @error('email')
						 	<span class="invalid-feedback">{{ $message }}</span>
						 @enderror
					</div>
					<div class="mb-4">
						<label class="form-label">Password</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}">

						 @error('password')
						 	<span class="invalid-feedback">{{ $message }}</span>
						 @enderror
					</div>
					<div class="mb-4">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" name="remember" id="remember">
							<label for="remember" class="form-check-label">Remember</label>
						</div>
					</div>
					<button class="btn btn-primary">Login</button>
					<a href="{{ route('register') }}" class="btn btn-danger">Register</a>
				</form>
			</div>
		</div>
	</div>

@endsection