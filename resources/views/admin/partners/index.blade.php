@extends('admin.layout')

@section('title', 'Partners')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">Partners</h1>
      <p class="mt-1 text-sm text-muted">The partnership logo grid at the bottom of the landing page.</p>
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

  <form class="surface-card mt-6 flex flex-col gap-3 p-5 sm:flex-row sm:items-end" method="POST"
    action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="flex-1">
      <label class="mb-1 block text-xs text-muted" for="new_name">Name</label>
      <input class="form-input" id="new_name" name="name" type="text" value="{{ old('name') }}"
        placeholder="Partner name" required>
    </div>

    <div class="sm:w-64">
      <label class="mb-1 block text-xs text-muted" for="new_logo">Logo</label>
      <input
        class="block w-full cursor-pointer rounded-sm border border-border bg-white/2 text-md text-muted file:mr-3 file:cursor-pointer file:border-0 file:bg-white file:p-3 file:text-md file:font-medium file:text-black hover:file:opacity-90"
        id="new_logo" name="logo" type="file" accept="image/png,image/jpeg,image/webp,image/svg+xml" required>
    </div>

    <button class="btn-primary whitespace-nowrap text-sm" type="submit">+ Add</button>
  </form>

  <div class="mt-8 space-y-3">
    @forelse ($partners as $partner)
      <div class="surface-card flex items-center gap-4 p-5">
        <div class="flex h-16 w-24 shrink-0 items-center justify-center">
          <img class="max-h-16 max-w-24 object-contain" src="{{ $partner->logoUrl() }}" alt="{{ $partner->name }}">
        </div>

        <div class="flex-1">
          <p class="text-sm font-semibold text-white">{{ $partner->name }}</p>
          @if ($partner->website_url)
            <p class="mt-1 truncate text-[11px] text-blue-300">→ {{ $partner->website_url }}</p>
          @else
            <p class="mt-1 text-[11px] italic text-muted">No website</p>
          @endif
        </div>

        <p class="text-xs text-muted">Order {{ $partner->order }}</p>

        <div class="flex items-center gap-2">
          <a class="rounded-lg border border-border px-3 py-1.5 text-xs text-white hover:border-white/40"
            href="{{ route('admin.partners.edit', $partner) }}">
            Edit
          </a>

          <form method="POST" action="{{ route('admin.partners.destroy', $partner) }}"
            onsubmit="return confirm('Delete this partner?');">
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
        No partners yet. Add one using the form above, or run
        <code class="rounded bg-white/5 px-1">php artisan db:seed --class=PartnerSeeder</code>.
      </div>
    @endforelse
  </div>
@endsection
