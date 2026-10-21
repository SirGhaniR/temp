@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
  <h1 class="text-2xl font-semibold text-white">Content Admin</h1>
  <p class="mt-2 text-sm text-muted">Manage the copy that powers the landing page.</p>

  <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    <a class="surface-card p-6 transition hover:border-white/30" href="{{ route('admin.stats.index') }}">
      <p class="text-xs uppercase tracking-widest text-muted">92% / 50+ / 100+</p>
      <p class="mt-2 text-lg font-medium text-white">Stats</p>
      <p class="mt-1 text-xs text-muted">Edit</p>
    </a>

    <a class="surface-card p-6 transition hover:border-white/30" href="{{ route('admin.why-choose.index') }}">
      <p class="text-xs uppercase tracking-widest text-muted">3 feature cards</p>
      <p class="mt-2 text-lg font-medium text-white">Why Choose</p>
      <p class="mt-1 text-xs text-muted">Edit</p>
    </a>

    <a class="surface-card p-6 transition hover:border-white/30" href="{{ route('admin.curriculum.index') }}">
      <p class="text-xs uppercase tracking-widest text-muted">Web / Mobile / Game</p>
      <p class="mt-2 text-lg font-medium text-white">Curriculum</p>
      <p class="mt-1 text-xs text-muted">Edit</p>
    </a>

    <a class="surface-card p-6 transition hover:border-white/30" href="{{ route('admin.timeline.index') }}">
      <p class="text-xs uppercase tracking-widest text-muted">Project cards across 3 steps</p>
      <p class="mt-2 text-lg font-medium text-white">Timeline</p>
      <p class="mt-1 text-xs text-muted">Edit</p>
    </a>

    <div class="surface-card p-6 opacity-60">
      <p class="text-xs uppercase tracking-widest text-muted">Partnership grid</p>
      <p class="mt-2 text-lg font-medium text-white">Partners</p>
      <p class="mt-1 text-xs text-muted">Coming in the next batch</p>
    </div>
  </div>
@endsection
