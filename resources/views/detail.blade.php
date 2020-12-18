@extends('_layouts.app')

@section('title', $file->name)

@section('content')
    
    <div class="row mt-4">
        <div class="col-md-8 mt-3">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        	<div class="card shadow-sm border-0">
        	    <div class="card-header bg-white">
        	        <h2 class="h5 mb-0 py-1 fw-bold card-title">Detail File</h2>
        	    </div>
        	    <div class="card-body">
        	        <div class="row">
        	            <div class="col-sm-4">
        	                <img src="{{ $file->cover }}" alt="" class="img-fluid rounded mb-3">
        	                <div class="text-sm-center mb-3 mb-sm-0">
        	                    @for ($i = 0; $i < 5; $i++)
        	                        <i class="fa fa-star {{ $i < floor($file->star) ? 'text-warning' : '' }}"></i>
        	                    @endfor
        	                    <span class="d-block mt-2 fw-bold">{{ floor($file->star) }}/5</span>
        	                </div>
        	            </div>
        	            <div class="col-sm-8">
        	                <h3 class="h5 fw-bold">{{ $file->name }}</h3>
        	                @foreach ($file->categories as $category)
        	                    <span class="badge bg-primary">{{ $category->name }}</span>
        	                @endforeach
        	                <hr>
        	                <p>
        	                    {{ $file->description }}
        	                </p>
        	                <hr>
        	                <dl class="row">
        	                    <dt class="col-3">Author</dt>
        	                    <dt class="col-1">:</dt>
        	                    <dd class="col-8"><a href="{{ route('user', $file->user->id) }}">{{ $file->user->name }}</a></dd>
        	                    <dt class="col-3">Writer</dt>
        	                    <dt class="col-1">:</dt>
        	                    <dd class="col-8">{{ $file->writer }}</dd>
        	                    <dt class="col-3">Size</dt>
        	                    <dt class="col-1">:</dt>
        	                    <dd class="col-8">{{ $file->size }}</dd>
        	                    <dt class="col-3">Downloaded</dt>
        	                    <dt class="col-1">:</dt>
        	                    <dd class="col-8">{{ $file->downloaded }}</dd>
        	                    <dt class="col-3">Viewed</dt>
        	                    <dt class="col-1">:</dt>
        	                    <dd class="col-8">{{ $file->viewed }}</dd>
        	                </dl>
        	            </div>
        	        </div>
        	    </div>
        	    <div class="card-footer">
        	        <button id="{{ $file->slug }}" class="btn btn-primary download"><i class="fa fa-download me-2"></i>Download</button>
        	        @auth
        	        	@can('save', $file)
                            <a href="{{ route('save', $file->slug) }}" class="btn btn-secondary"><i class="fa fa-heart me-2"></i> Save</a>
                        @endcan
        	        @endauth
        	    </div>
        	</div>
        </div>
        <div class="col-md-4 mt-3 mb-5 order-md-first">
            <livewire:comment :file="$file->id" />
        </div>
    </div>

    <div class="modal">
    <div class="modal-dialog">
    <div class="modal-content">
	<form action="">
		@csrf
    	<div class="modal-header">
    		<h5 class="modal-title fw-bold">Give Star First</h5>
    		<button class="btn-close" data-bs-dismiss="modal"></button>
    	</div>
    	<div class="modal-body">
			<i class="fa fa-star star" id="1"></i>
			<i class="fa fa-star star" id="2"></i>
			<i class="fa fa-star star" id="3"></i>
			<i class="fa fa-star star" id="4"></i>
			<i class="fa fa-star star" id="5"></i>
			<input type="hidden" name="star">
    	</div>
    	<div class="modal-footer">
    		<button class="btn btn-primary" type="submit">Download</button>
    	</div>
	</form>
    </div>
    </div>
    </div>

@endsection

@push('js')
	<script>
		const filename = '{{ $file->file }}'
		const csrf = '{{ csrf_token() }}'
		const downloadUrl = '{{ route('download', ':id') }}'
	</script>
	<script src="{{ asset('js/detail.js') }}"></script>
@endpush