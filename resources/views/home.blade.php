@extends('layouts.app')

@section('title', 'PPLG - Master the Future')

@section('content')
  @foreach ($sections as $section)
    @include($section)
  @endforeach
@endsection
