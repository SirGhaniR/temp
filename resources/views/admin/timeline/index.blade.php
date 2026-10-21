@extends('admin.layout')

@section('title', 'Timeline')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">Timeline Project Cards</h1>
      <p class="mt-1 text-sm text-muted">The cards shown under each of the three timeline steps.</p>
    </div>
    <a class="text-xs text-muted hover:text-white" href="{{ route('admin.index') }}">← Back</a>
  </div>

  @if ($errors->any())
    <div class="mt-6 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-xs text-red-300">
      <ul class="space-y-1">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  @foreach ([1, 2, 3] as $step)
    @php
      $cards = $cardsByStep[$step] ?? collect();
      $title = $step === 1 ? 'Make project' : ($step === 2 ? 'Deploy' : 'Achievements');
      $canAdd = $canAddToStep[$step];
    @endphp

    <div class="mt-10">
      <div class="flex items-center justify-between">
        <h2 class="text-xs font-semibold uppercase tracking-widest text-muted">
          Step {{ $step }} — {{ $title }} ({{ $cards->count() }}/{{ $maxPerStep }})
        </h2>

        <form method="POST" action="{{ route('admin.timeline.store') }}">
          @csrf
          <input name="step" type="hidden" value="{{ $step }}">
          <button
            class="rounded-lg border border-border px-3 py-1.5 text-xs text-white transition hover:border-white/40 disabled:cursor-not-allowed disabled:opacity-40"
            type="submit" @disabled(!$canAdd)>
            + Add card
          </button>
        </form>
      </div>

      <div class="mt-4 space-y-3">
        @forelse ($cards as $card)
          <div class="surface-card flex items-start gap-4 p-5">
            @if ($card->image_path)
              <img class="h-16 w-24 shrink-0 rounded object-cover" src="{{ $card->imageUrl() }}" alt="">
            @else
              <div
                class="flex h-16 w-24 shrink-0 items-center justify-center rounded border border-border text-[10px] text-muted">
                No image
              </div>
            @endif

            <div class="flex-1">
              <p class="text-sm font-semibold text-white">{{ $card->headline }}</p>
              @if ($card->description)
                <p class="mt-1 line-clamp-2 text-xs text-muted">{{ $card->description }}</p>
              @endif
              @if ($card->link)
                <p class="mt-2 truncate text-[11px] text-blue-300">→ {{ $card->link }}</p>
              @else
                <p class="mt-2 text-[11px] italic text-muted">No link set</p>
              @endif
            </div>

            <p class="text-xs text-muted">Order {{ $card->order }}</p>

            <div class="flex items-center gap-2">
              <a class="rounded-lg border border-border px-3 py-1.5 text-xs text-white hover:border-white/40"
                href="{{ route('admin.timeline.edit', $card) }}">
                Edit
              </a>

              <form method="POST" action="{{ route('admin.timeline.destroy', $card) }}"
                onsubmit="return confirm('Delete this card? This cannot be undone.');">
                @csrf
                @method('DELETE')
                <button
                  class="rounded-lg border border-red-500/40 px-3 py-1.5 text-xs text-red-300 hover:border-red-400 hover:bg-red-500/10"
                  type="submit">
                  Delete
                </button>
              </form>
            </div>
          </div>
        @empty
          <div class="surface-card p-6 text-sm text-muted">
            No cards in this step yet.
          </div>
        @endforelse
      </div>
    </div>
  @endforeach
@endsection
