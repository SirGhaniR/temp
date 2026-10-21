@extends('admin.layout')

@section('title', 'Edit Curriculum Item')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">Edit Item</h1>
      <p class="mt-1 text-sm text-muted">{{ $item->title }}</p>
    </div>
    <a class="text-xs text-muted hover:text-white" href="{{ route('admin.curriculum.index') }}">← Back</a>
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

  <form class="surface-card mt-6 space-y-4 p-6" method="POST" action="{{ route('admin.curriculum.update', $item) }}">
    @csrf

    <div>
      <label class="mb-1 block text-xs text-muted" for="title">Title</label>
      <input class="form-input" id="title" name="title" type="text" value="{{ old('title', $item->title) }}"
        required>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="description">Description</label>
      <textarea class="form-input" id="description" name="description" rows="4" required>{{ old('description', $item->description) }}</textarea>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="order">Order (lower = earlier)</label>
      <input class="form-input w-32" id="order" name="order" type="number" value="{{ old('order', $item->order) }}"
        min="0" max="9999" required>
    </div>

    <div class="flex items-center justify-end gap-3 pt-2">
      <a class="text-xs text-muted hover:text-white" href="{{ route('admin.curriculum.index') }}">Cancel</a>
      <button class="btn-primary text-sm" type="submit">Save changes</button>
    </div>
  </form>
@endsection
