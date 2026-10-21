<section class="relative overflow-hidden py-24" id="curriculum">
  <div class="relative mx-auto max-w-3xl px-6">
    <div class="relative">
      <div class="ring-breathe ring-b-1  absolute inset-0 rounded-lg border border-white/10 pointer-events-none"
        style="transform: scale(1.10);"></div>
      <div class="ring-breathe ring-b-2  absolute inset-0 rounded-lg border border-white/30 pointer-events-none"
        style="transform: scale(1.07);"></div>
      <div class="ring-breathe ring-b-3  absolute inset-0 rounded-lg border border-white/50 pointer-events-none"
        style="transform: scale(1.04);"></div>

      <div class="surface-card border-white/50! relative p-10 text-center">
        <h2 class="text-2xl font-semibold text-white sm:text-3xl">What You'll Learn</h2>
        <p class="mt-4 text-sm leading-relaxed text-muted">
          Not just one path: explore everything from web to mobile to game development.
        </p>

        <div class="mt-8 grid grid-cols-1 gap-3 text-left sm:grid-cols-3">
          @foreach ($curriculumItems as $item)
            <div class="rounded-lg border border-border bg-white/2 p-4">
              <p class="text-xs font-medium text-white">{{ $item->title }}</p>
              <p class="mt-2 text-[11px] leading-relaxed text-muted">{{ $item->description }}</p>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
