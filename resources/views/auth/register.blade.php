@extends('_layouts.app')

@section('title', 'Register')

@section('content')
	
	<div class="my-5 col-sm-5 mx-auto">
		<div class="card border-0 shadow-sm">
			<div class="card-header bg-white px-4 py-3">
				<h1 class="h3 mb-0 fw-bold">Register</h1>
			</div>
			<div class="card-body p-4">
				<form action="{{ route('register') }}" method="post">
					@csrf
					<div class="mb-3">
						<label class="form-label">Name</label>
						<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" autofocus>

						 @error('name')
						 	<span class="invalid-feedback">{{ $message }}</span>
						 @enderror
					</div>
					<div class="mb-3">
						<label class="form-label">Email</label>
						<input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">

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
						<label class="form-label">Repeat Password</label>
						<input type="password" class="form-control" placeholder="Repeat Password" name="password_confirmation">
					</div>
					<button class="btn btn-primary">Register</button>
					<a href="{{ route('login') }}" class="btn btn-danger">Login</a>
				</form>
			</div>
		</div>
	</div>

@endsection