@extends('admin.layout')

@section('title', 'Why Choose')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">Why Choose PPLG</h1>
      <p class="mt-1 text-sm text-muted">The three feature cards under the "Why Choose PPLG" heading.</p>
    </div>
    <a class="text-xs text-muted hover:text-white" href="{{ route('admin.index') }}">← Back</a>
  </div>

  <div class="mt-8 space-y-3">
    @forelse ($cards as $card)
      <div class="surface-card flex items-start gap-4 p-5">
        <div class="flex-1">
          <p class="text-sm font-semibold text-white">{{ $card->title }}</p>
          <p class="mt-2 line-clamp-2 text-xs text-muted">{{ $card->description }}</p>
        </div>
        <p class="text-xs text-muted">Order {{ $card->order }}</p>
        <a class="rounded-lg border border-border px-3 py-1.5 text-xs text-white hover:border-white/40"
          href="{{ route('admin.why-choose.edit', $card) }}">
          Edit
        </a>
      </div>
    @empty
      <div class="surface-card p-6 text-sm text-muted">
        No cards yet. Run <code class="rounded bg-white/5 px-1">php artisan db:seed --class=WhyChooseCardSeeder</code>.
      </div>
    @endforelse
  </div>
@endsection
