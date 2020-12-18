@extends('_layouts.user')

@section('title', 'New PDF')

@section('content')
    
    <div class="card shadow-sm border-0">
    <form action="{{ route('user.files.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header bg-white">
            <h2 class="h5 mb-0 py-1 fw-bold card-title">New PDF</h2>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" autofocus>

                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <input type="text" class="form-control custom-select @error('category') is-invalid @enderror" name="category" value="{{ old('category') }}" placeholder="Category">

                @error('category')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Writer</label>
                <input type="text" class="form-control custom-select @error('writer') is-invalid @enderror" name="writer" value="{{ old('writer') }}" placeholder="Writer">

                @error('writer')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Cover</label>
                <input type="file" class="form-control custom-select @error('cover') is-invalid @enderror" name="cover" value="{{ old('cover') }}">

                @error('cover')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control custom-select @error('description') is-invalid @enderror" name="description" placeholder="Description">{{ old('description') }}</textarea>

                @error('description')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">File</label>
                <input type="file" class="form-control custom-select @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}">

                @error('file')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary" type="submit">Add</button>
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