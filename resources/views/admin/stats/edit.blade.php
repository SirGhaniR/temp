@extends('admin.layout')

@section('title', 'Edit Stat')

@section('content')
  <div class="flex items-center justify-between">
    <div>
      <h1 class="text-2xl font-semibold text-white">Edit Stat</h1>
      <p class="mt-1 text-sm text-muted">{{ $stat->label }}</p>
    </div>
    <a class="text-xs text-muted hover:text-white" href="{{ route('admin.stats.index') }}">← Back</a>
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

  <form class="surface-card mt-6 space-y-4 p-6" method="POST" action="{{ route('admin.stats.update', $stat) }}">
    @csrf

    <div>
      <label class="mb-1 block text-xs text-muted" for="label">Label</label>
      <input class="form-input" id="label" name="label" type="text" value="{{ old('label', $stat->label) }}"
        required>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
      <div class="sm:col-span-2">
        <label class="mb-1 block text-xs text-muted" for="value">Value</label>
        <input class="form-input" id="value" name="value" type="text" value="{{ old('value', $stat->value) }}"
          required>
      </div>
      <div>
        <label class="mb-1 block text-xs text-muted" for="suffix">Suffix</label>
        <input class="form-input" id="suffix" name="suffix" type="text" value="{{ old('suffix', $stat->suffix) }}"
          placeholder="% or +">
      </div>
    </div>

    <div>
      <label class="mb-1 block text-xs text-muted" for="order">Order (lower = earlier)</label>
      <input class="form-input w-32" id="order" name="order" type="number" value="{{ old('order', $stat->order) }}"
        min="0" max="9999" required>
    </div>

    <div class="flex items-center justify-end gap-3 pt-2">
      <a class="text-xs text-muted hover:text-white" href="{{ route('admin.stats.index') }}">Cancel</a>
      <button class="btn-primary text-sm" type="submit">Save changes</button>
    </div>
  </form>
@endsection
