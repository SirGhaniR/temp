@extends('admin.layout')

@section('title', 'Edit Partner')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">Edit Partner</h1>
      <p class="mt-1 text-sm text-muted">{{ $partner->name }}</p>
    </div>
    <a class="text-xs text-muted hover:text-white" href="{{ route('admin.partners.index') }}">← Back</a>
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

  <form class="surface-card mt-6 space-y-4 p-6" method="POST" action="{{ route('admin.partners.update', $partner) }}"
    enctype="multipart/form-data">
    @csrf

    <div>
      <label class="mb-1 block text-xs text-muted" for="name">Name</label>
      <input class="form-input" id="name" name="name" type="text" value="{{ old('name', $partner->name) }}"
        required>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="website_url">Website URL (optional)</label>
      <input class="form-input" id="website_url" name="website_url" type="text"
        value="{{ old('website_url', $partner->website_url) }}" placeholder="https://partner.com">
      <p class="mt-1 text-[11px] text-muted">Must include <code>https://</code>.</p>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="order">Order (lower = earlier)</label>
      <input class="form-input w-32" id="order" name="order" type="number"
        value="{{ old('order', $partner->order) }}" min="0" max="9999" required>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="logo">Replace logo (optional)</label>

      <div class="mb-3 flex items-center gap-3 rounded-lg border border-border bg-white/2 p-3">
        <img class="h-12 w-20 object-contain" src="{{ $partner->logoUrl() }}" alt="">
        <p class="text-[11px] text-muted">Current logo. Pick a new file to replace it.</p>
      </div>

      <input
        class="block w-full cursor-pointer rounded-sm border border-border bg-white/2 text-md text-muted file:mr-3 file:cursor-pointer file:border-0 file:bg-white file:p-3 file:text-md file:font-medium file:text-black hover:file:opacity-90"
        id="logo" name="logo" type="file" accept="image/png,image/jpeg,image/webp,image/svg+xml">
      <p class="mt-1 text-[11px] text-muted">PNG, JPG, WebP, or SVG, up to 2 MB. Transparent background recommended.</p>
    </div>

    <div class="flex items-center justify-end gap-3 pt-2">
      <a class="text-xs text-muted hover:text-white" href="{{ route('admin.partners.index') }}">Cancel</a>
      <button class="btn-primary text-sm" type="submit">Save changes</button>
    </div>
  </form>
@endsection
