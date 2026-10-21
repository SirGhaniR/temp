@extends('admin.layout')

@section('title', 'Stats')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">Stats</h1>
      <p class="mt-1 text-sm text-muted">The three numbers shown below the hero.</p>
    </div>
    <a class="text-xs text-muted hover:text-white" href="{{ route('admin.index') }}">← Back</a>
  </div>

  <div class="mt-8 space-y-3">
    @forelse ($stats as $stat)
      <div class="surface-card flex items-center gap-4 p-5">
        <div class="flex-1">
          <p class="text-lg font-semibold text-white">
            {{ $stat->value }}{{ $stat->suffix }}
          </p>
          <p class="mt-1 text-xs text-muted">{{ $stat->label }}</p>
        </div>
        <p class="text-xs text-muted">Order {{ $stat->order }}</p>
        <a class="rounded-lg border border-border px-3 py-1.5 text-xs text-white hover:border-white/40"
          href="{{ route('admin.stats.edit', $stat) }}">
          Edit
        </a>
      </div>
    @empty
      <div class="surface-card p-6 text-sm text-muted">
        No stats yet. Run <code class="rounded bg-white/5 px-1">php artisan db:seed --class=StatSeeder</code>.
      </div>
    @endforelse
  </div>
@endsection
