@extends('_layouts.user')

@section('title', 'My PDF')

@section('content')
    
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white d-flex justify-content-between">
            <h2 class="h5 mb-0 py-1 fw-bold card-title">My PDF</h2>
            <a href="{{ route('user.files.create') }}" class="btn btn-sm btn-primary">Upload PDF</a>
        </div>
        <div class="card-body">
            <livewire:files.table>
        </div>
    </div>

@endsection