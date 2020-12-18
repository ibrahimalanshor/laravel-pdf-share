@extends('_layouts.user')

@section('title', 'My PDF')

@section('content')

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h2 class="h5 mb-0 py-1 fw-bold card-title">Detail File</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <img src="{{ $file->cover }}" alt="" class="img-fluid rounded mb-3">
                    <div class="text-center">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fa fa-star {{ $i < $file->star ? 'text-warning' : '' }}"></i>
                        @endfor
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
                        <dt class="col-sm-3">Writer</dt>
                        <dt class="col-sm-1">:</dt>
                        <dd class="col-sm-8">{{ $file->writer }}</dd>
                        <dt class="col-sm-3">Size</dt>
                        <dt class="col-sm-1">:</dt>
                        <dd class="col-sm-8">{{ $file->size }}</dd>
                        <dt class="col-sm-3">Downloaded</dt>
                        <dt class="col-sm-1">:</dt>
                        <dd class="col-sm-8">{{ $file->downloaded }}</dd>
                        <dt class="col-sm-3">Viewed</dt>
                        <dt class="col-sm-1">:</dt>
                        <dd class="col-sm-8">{{ $file->viewed }}</dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('user.files.edit', $file->slug) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('user.files.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>

@endsection