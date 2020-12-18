@extends('_layouts.app')

@section('title', 'Register')

@section('content')
	
	<div class="my-5 col-sm-5 mx-auto">
		<div class="card border-0 shadow-sm">
			<div class="card-header bg-white px-4 py-3">
				<h1 class="h3 mb-0 fw-bold">Email Verification</h1>
			</div>
			<div class="card-body p-4">
                {{ __('Before proceeding, please check your email for a verification link.') }}
			</div>
		</div>
	</div>

@endsection