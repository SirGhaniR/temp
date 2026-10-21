@extends('admin.layout')

@section('title', 'Curriculum')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">What You'll Learn</h1>
      <p class="mt-1 text-sm text-muted">The three cards inside the curriculum panel.</p>
    </div>
    <a class="text-xs text-muted hover:text-white" href="{{ route('admin.index') }}">← Back</a>
  </div>

  <div class="mt-8 space-y-3">
    @forelse ($items as $item)
      <div class="surface-card flex items-start gap-4 p-5">
        <div class="flex-1">
          <p class="text-sm font-semibold text-white">{{ $item->title }}</p>
          <p class="mt-2 line-clamp-2 text-xs text-muted">{{ $item->description }}</p>
        </div>
        <p class="text-xs text-muted">Order {{ $item->order }}</p>
        <a class="rounded-lg border border-border px-3 py-1.5 text-xs text-white hover:border-white/40"
          href="{{ route('admin.curriculum.edit', $item) }}">
          Edit
        </a>
      </div>
    @empty
      <div class="surface-card p-6 text-sm text-muted">
        No items yet. Run <code class="rounded bg-white/5 px-1">php artisan db:seed --class=CurriculumItemSeeder</code>.
      </div>
    @endforelse
  </div>
@endsection
