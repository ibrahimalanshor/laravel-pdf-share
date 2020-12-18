@extends('_layouts.app')

@section('title', 'Profile '.$user->name)

@section('content')
    
    <div class="row mt-4">
    	<div class="col-md-8 mt-3">
	    	<div class="card shadow-sm border-0">
	    	    <div class="card-header bg-white">
	    	        <h2 class="h5 mb-0 py-1 fw-bold card-title">Profile User</h2>
	    	    </div>
	    	    <div class="card-body">
	    	        <div class="row">
	    	            <div class="col-sm-4">
	    	                <img src="{{ $user->detail->photoSrc }}" alt="" class="img-fluid rounded mb-3">
	    	            </div>
	    	            <div class="col-sm-8">
	    	                <h3 class="h5 fw-bold">{{ $user->name }}</h3>
	    	                <hr>
	    	                <dl class="row">
	    	                    <dt class="col-3">Birth</dt>
	    	                    <dt class="col-1">:</dt>
	    	                    <dd class="col-8">{{ $user->detail->birthDate }}</dd>
	    	                    <dt class="col-3">Phone</dt>
	    	                    <dt class="col-1">:</dt>
	    	                    <dd class="col-8">{{ $user->detail->phone }}</dd>
	    	                    <dt class="col-3">Gender</dt>
	    	                    <dt class="col-1">:</dt>
	    	                    <dd class="col-8">{{ $user->detail->gender }}</dd>
	    	                    <dt class="col-3">Address</dt>
	    	                    <dt class="col-1">:</dt>
	    	                    <dd class="col-8">{{ $user->detail->address }}</dd>
	    	                </dl>
	    	            </div>
	    	        </div>
	    	    </div>
	    	</div>
	    </div>
    	<div class="col-md-4 mt-3 mb-5">
    		<div class="card shadow-sm border-0">
	    	    <div class="card-header bg-white">
	    	        <h2 class="h5 mb-0 py-1 fw-bold card-title">User File ({{ $user->files_count }})</h2>
	    	    </div>
	    	    <div class="card-body">
	    	    	<div class="list-group">
	    	    		@forelse ($user->files as $file)
	    	    			<a href="{{ route('detail', $file->slug) }}" class="list-group-item">{{ $file->name }}</a>
	    	    		@empty
	    	    			<span class="list-group-item">Empty</span>
	    	    		@endforelse
	    	    	</div>
	    	    </div>
	    	</div>
    	</div>
    </div>

@endsection