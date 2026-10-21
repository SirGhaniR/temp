<section class="bg-ink">
  <div class="mx-auto grid max-w-5xl grid-cols-1 gap-10 px-6 py-16 sm:grid-cols-3">
    @foreach ($stats as $stat)
      <div class="text-center">
        <p class="text-4xl font-semibold text-white sm:text-5xl">
          <span data-count-to="{{ $stat->value }}">0</span>{{ $stat->suffix }}
        </p>
        <p class="mt-2 text-sm text-muted">{{ $stat->label }}</p>
      </div>
    @endforeach
  </div>
</section>
