@extends('admin.layout')

@section('title', 'Edit Timeline Card')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">Edit Card</h1>
      <p class="mt-1 text-sm text-muted">Step {{ $card->step }} · Order {{ $card->order }}</p>
    </div>
    <a class="text-xs text-muted hover:text-white" href="{{ route('admin.timeline.index') }}">← Back</a>
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

  <form class="surface-card mt-6 space-y-4 p-6" method="POST" action="{{ route('admin.timeline.update', $card) }}"
    enctype="multipart/form-data">
    @csrf

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
      <div>
        <label class="mb-1 block text-xs text-muted" for="step">Step</label>
        <select class="form-input" id="step" name="step" required>
          @foreach ([1 => '1 - Make project', 2 => '2 - Deploy', 3 => '3 - Achievements'] as $value => $label)
            <option value="{{ $value }}" @selected(old('step', $card->step) == $value)>{{ $label }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="mb-1 block text-xs text-muted" for="order">Order (within step)</label>
        <input class="form-input" id="order" name="order" type="number" value="{{ old('order', $card->order) }}"
          min="0" max="9999" required>
      </div>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="headline">Headline</label>
      <input class="form-input" id="headline" name="headline" type="text"
        value="{{ old('headline', $card->headline) }}" required>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="description">Description (optional)</label>
      <textarea class="form-input" id="description" name="description" rows="3">{{ old('description', $card->description) }}</textarea>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="link">Link (optional)</label>
      <input class="form-input" id="link" name="link" type="text" value="{{ old('link', $card->link) }}"
        placeholder="https://github.com/you/repo">
      <p class="mt-1 text-[11px] text-muted">Must include <code>https://</code>. If set, the whole card becomes clickable.
      </p>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="image">Image (optional)</label>

      @if ($card->image_path)
        <div class="mb-3 gap-3 rounded-lg border border-border bg-white/2 p-3">
          <p class="text-[11px] text-muted">Current image. Pick a new file to replace it, or check remove.</p>
          <img class="w-full aspect-video rounded object-cover" src="{{ $card->imageUrl() }}" alt="">
        </div>
      @endif

      <input
        class="block w-full cursor-pointer rounded-xs border border-border bg-white/2 text-sm text-muted file:mr-3 file:cursor-pointer file:border-0 file:bg-white file:p-3 file:text-sm file:font-medium file:text-black hover:file:opacity-90"
        id="image" name="image" type="file" accept="image/*">

      @if ($card->image_path)
        <label class="mt-2 inline-flex items-center gap-2 text-[11px] text-muted">
          <input class="rounded border-border bg-white/5" name="remove_image" type="checkbox" value="1">
          Remove current image
        </label>
      @endif
    </div>

    <div class="flex items-center justify-end gap-3 pt-2">
      <a class="text-xs text-muted hover:text-white" href="{{ route('admin.timeline.index') }}">Cancel</a>
      <button class="btn-primary text-sm" type="submit">Save changes</button>
    </div>
  </form>
@endsection
