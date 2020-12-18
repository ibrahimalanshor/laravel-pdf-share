@extends('_layouts.user')

@section('title', 'Edit PDF')

@section('content')
    
    <div class="card shadow-sm border-0">
    <form action="{{ route('user.files.update', $file->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-header bg-white">
            <h2 class="h5 mb-0 py-1 fw-bold card-title">Edit PDF</h2>
        </div>
        <div class="card-body">
            <input type="hidden" name="id" value="{{ $file->id }}">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ $file->name }}" autofocus>

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" class="form-control custom-select @error('category') is-invalid @enderror" name="category" value="{{ $categories }}" placeholder="Category">

                @error('category')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Writer</label>
                <input type="text" class="form-control custom-select @error('writer') is-invalid @enderror" name="writer" value="{{ $file->writer }}" placeholder="Writer">

                @error('writer')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control custom-select @error('description') is-invalid @enderror" name="description" placeholder="Description">{{ $file->description }}</textarea>

                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type="file" class="form-control custom-select @error('cover') is-invalid @enderror" name="cover">
                <small class="form-text">Empty if not edit</small>

                @error('cover')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Edit</button>
            <a href="{{ route('user.files.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.21.5/tagify.min.css" integrity="sha512-91wa7heHLbuVdMrSXbWceVZva6iWDFlkFHnM+9Sc+oXFpTgw1FCqdnuaGBJfDVuNSNl0DwDmeGeJSORB0HyLZQ==" crossorigin="anonymous" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/3.21.5/tagify.min.js"></script>
    <script>
        const searchUrl = '{{ route('user.category.search') }}'
        const csrf = '{{ csrf_token() }}'
    </script>
    <script src="{{ asset('js/user/files/create.js') }}"></script>
@endpush