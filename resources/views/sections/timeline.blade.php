<section class="relative overflow-hidden bg-cover bg-center bg-no-repeat py-24" id="project" data-timeline
  style="background-image: url('{{ asset('images/bg-middle.png') }}');">
  <div class="relative flex items-center justify-center">
    <div
      class="absolute inset-x-0 top-1/2 h-px -translate-y-1/2 bg-linear-to-r from-white/40 via-transparent to-white/40">
    </div>

    <div class="relative z-10 bg-ink px-2 text-center">
      <h2 class="text-3xl font-semibold text-white sm:text-4xl">Here's how</h2>
    </div>
  </div>

  <p class="mt-4 text-center text-sm text-muted">Doing nothing? Let's build some innovation or big project for a better
    life. :)</p>

  <div class="relative mx-auto max-w-6xl px-6">
    <div class="relative mt-16">

      <div class="relative">

        <svg class="pointer-events-none absolute left-0 top-0 hidden h-full w-full text-white/80 md:block"
          aria-hidden="true" viewBox="0 0 1000 2000" preserveAspectRatio="none" fill="none">
          <path data-timeline-path d="M 400 50
       C 700 50, 900 240, 900 640
       C 900 1040, 700 1040, 500 1040
       C 300 1040, 100 1100, 100 1440
       C 100 1740, 300 1950, 750 1950" stroke="currentColor" stroke-width="4" stroke-linecap="round" />
        </svg>

        <div class="relative grid grid-cols-1 gap-8 md:grid-cols-2">
          <div class="opacity-0" data-timeline-number>
            <p class="text-2xl font-semibold text-white">1. Make project</p>
            <p class="mt-2 max-w-sm text-xs text-muted">Start with a problem you care about. Ship something small and
              real.</p>
          </div>
          <div></div>
        </div>

        <div class="relative mt-8 mb-24">
          <div class="relative grid grid-cols-1 gap-4 md:grid-cols-4 md:items-start">
            @foreach ($timelineCards[1] ?? [] as $i => $card)
              @include('sections.timeline-card', ['card' => $card, 'index' => $i])
            @endforeach
          </div>
        </div>

        <div class="relative my-8 flex flex-col items-center justify-center text-center md:my-12">
          <p class="text-sm font-medium text-white">New to coding?</p>
          <p class="mt-2 text-xs text-muted">Don't worry, we have guides for complete beginners!</p>
        </div>

        <div class="relative flex flex-col items-center justify-center text-center">
          <div class="opacity-0" data-timeline-number>
            <p class="text-2xl font-semibold text-white">2. Deploy</p>
            <p class="mt-2 text-xs text-muted">Get it out into the world.</p>
          </div>
        </div>

        <div class="relative mt-12 mb-24">
          <div class="relative grid grid-cols-1 gap-4 md:grid-cols-3 md:items-start">
            @foreach ($timelineCards[2] ?? [] as $i => $card)
              @include('sections.timeline-card', ['card' => $card, 'index' => $i])
            @endforeach
          </div>
        </div>

        <div class="relative flex justify-end text-center">
          <div class="opacity-0" data-timeline-number>
            <p class="text-2xl font-semibold text-white">3. Achievements</p>
            <p class="mt-2 text-xs text-muted">Collect your digital trophies.</p>
          </div>
        </div>

      </div>

      <div class="relative mt-12 mb-24">
        <div class="relative grid grid-cols-1 gap-4 md:grid-cols-3 md:items-start">
          @foreach ($timelineCards[3] ?? [] as $i => $card)
            @include('sections.timeline-card', ['card' => $card, 'index' => $i])
          @endforeach
        </div>
      </div>

    </div>
  </div>
</section>
