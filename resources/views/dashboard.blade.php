@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
  <p class="text-sm text-muted">You should have been redirected to the admin panel.</p>
  <a class="mt-4 inline-block rounded-lg bg-white px-4 py-2 text-sm text-black" href="{{ route('admin.index') }}">
    Go to /admin
  </a>
@endsection
