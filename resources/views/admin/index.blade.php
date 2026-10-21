@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
  <h1 class="text-2xl font-semibold text-white">Content Admin</h1>
  <p class="mt-2 text-sm text-muted">Manage the copy that powers the landing page.</p>

  <div class="mt-10 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
    @php
      $sections = [
          ['label' => 'Stats', 'hint' => '92% / 50+ / 100+', 'disabled' => true],
          ['label' => 'Why Choose', 'hint' => '3 feature cards', 'disabled' => true],
          ['label' => 'Curriculum', 'hint' => 'Web / Mobile / Game', 'disabled' => true],
          ['label' => 'Timeline', 'hint' => 'Project cards across 3 steps', 'disabled' => true],
          ['label' => 'Partners', 'hint' => 'Partnership grid', 'disabled' => true],
      ];
    @endphp

    @foreach ($sections as $section)
      <div class="surface-card p-6 {{ $section['disabled'] ? 'opacity-60' : '' }}">
        <p class="text-xs uppercase tracking-widest text-muted">{{ $section['hint'] }}</p>
        <p class="mt-2 text-lg font-medium text-white">{{ $section['label'] }}</p>
        <p class="mt-1 text-xs text-muted">{{ $section['disabled'] ? 'Coming in the next batch' : 'Edit' }}</p>
      </div>
    @endforeach
  </div>
@endsection
