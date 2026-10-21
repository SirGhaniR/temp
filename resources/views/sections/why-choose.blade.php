<section class="border-y border-white/20 relative overflow-hidden" id="advantages">
  <div class="relative mx-auto max-w-6xl px-6 py-24">
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl font-semibold leading-tight text-white sm:text-4xl">
        Why Choose PPLG at SMK Prakarya Internasional?
      </h2>
      <p class="mt-4 text-sm text-muted">
        It's more than just a classroom. We've built a launchpad for those who love tinkering with code, experimenting
        with systems, and shipping real-world projects.
      </p>
    </div>

    <div class="mt-14 grid grid-cols-1 gap-6 md:grid-cols-3">
      @foreach ($whyChooseCards as $card)
        <div class="surface-card p-8 transition hover:border-white/20">
          <h3 class="text-sm font-semibold text-white">{{ $card->title }}</h3>
          <p class="mt-3 text-xs leading-relaxed text-muted">{{ $card->description }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
