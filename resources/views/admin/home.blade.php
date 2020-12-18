@extends('admin._layouts.app', ['urls' => ['Home']])

@section('title', 'Dashboard')

@section('content')
  
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible">
      {{ session('success') }}
      <button class="close" data-dismiss="alert">&times;</button>
    </div>
  @endif

  <div class="row">
  	<div class="col-lg-4 col-6">
  		<div class="small-box bg-info">
  			<div class="inner">
  				<h3>{{ $totalFile }}</h3>

  				<p>PDF</p>
  			</div>
  			<div class="icon">
  				<i class="far fa-file-alt"></i>
  			</div>
  			<a href="{{ route('admin.files.index') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
  		</div>
  	</div>
  	<div class="col-lg-4 col-6">
  		<div class="small-box bg-danger">
  			<div class="inner">
  				<h3>{{ $totalUser }}</h3>

  				<p>User</p>
  			</div>
  			<div class="icon">
  				<i class="far fa-file-alt"></i>
  			</div>
  			<a href="{{ route('admin.users.index') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
  		</div>
  	</div>
  	<div class="col-lg-4 col-6">
  		<div class="small-box bg-success">
  			<div class="inner">
  				<h3>{{ $totalVisitor }}</h3>

  				<p>Visitor</p>
  			</div>
  			<div class="icon">
  				<i class="far fa-file-alt"></i>
  			</div>
  			<a href="{{ route('admin.index') }}" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
  		</div>
  	</div>
  </div>

@endsection