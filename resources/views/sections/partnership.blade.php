<section class="border-y border-white/20 bg-ink py-20">
  <div class="mx-auto max-w-6xl px-6">
    <h2 class="text-center text-3xl font-semibold text-white sm:text-4xl">Our partnership</h2>
    <p class="mt-3 text-center text-sm text-muted">Trusted by schools, startups, and studios.</p>

    <div class="mt-12 grid grid-cols-2 gap-8 sm:grid-cols-4">
      @forelse ($partners as $partner)
        @php $tag = $partner->website_url ? 'a' : 'div'; @endphp
        <{{ $tag }}
          class="group flex flex-col items-center gap-3 {{ $partner->website_url ? 'transition' : '' }}"
          @if ($partner->website_url) href="{{ $partner->website_url }}" target="_blank" rel="noopener noreferrer" @endif>
          <div class="flex h-20 w-full items-center justify-center">
            <img class="max-h-20 max-w-full object-contain opacity-80 transition group-hover:opacity-100"
              src="{{ $partner->logoUrl() }}" alt="{{ $partner->name }}">
          </div>
          <p class="text-xs text-muted transition group-hover:text-white">{{ $partner->name }}</p>
          </{{ $tag }}>
        @empty
          <p class="col-span-full text-center text-xs text-muted">No partners yet.</p>
      @endforelse
    </div>
  </div>
</section>
