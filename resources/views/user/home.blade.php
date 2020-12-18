@extends('_layouts.user')

@section('title', 'Home')

@section('content')
    
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h2 class="h5 mb-0 py-1 fw-bold card-title">Dashboard</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 mb-3 col-lg-4">
                    <div class="card bg-primary text-white text-center">
                        <div class="card-header">
                            <h3 class="h6 mb-0 card-title">Total PDF</h3>
                        </div>
                        <div class="card-body">
                            <span class="fw-bold display-6">{{ $totalFiles }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 col-lg-4">
                    <div class="card bg-danger text-white text-center">
                        <div class="card-header">
                            <h3 class="h6 mb-0 card-title">Total Downloaded</h3>
                        </div>
                        <div class="card-body">
                            <span class="fw-bold display-6">{{ $totalDownloaded }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 col-lg-4">
                    <div class="card bg-warning text-white text-center">
                        <div class="card-header">
                            <h3 class="h6 mb-0 card-title">Total Viewed</h3>
                        </div>
                        <div class="card-body">
                            <span class="fw-bold display-6">{{ $totalViewed }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection