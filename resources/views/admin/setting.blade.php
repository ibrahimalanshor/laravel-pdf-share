@extends('admin._layouts.app', ['urls' => ['Home']])

@section('title', 'Dashboard')

@section('content')
  
  <livewire:admin.setting />

@endsection