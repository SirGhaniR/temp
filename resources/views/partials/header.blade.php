<header class="sticky top-0 z-40 border-b border-border/60 bg-ink/70">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
    <a class="flex items-center gap-2" href="{{ route('home') }}">
      <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="PPLG">
    </a>

    <nav class="hidden items-center gap-8 text-sm md:flex">
      <a class="nav-link" href="#get-started">Get started</a>
      <a class="nav-link" href="#advantages">Advantages</a>
      <a class="nav-link" href="#curriculum">Curriculum</a>
      <a class="nav-link" href="#project">Project</a>
    </nav>

    <a class="hidden rounded-md border border-border px-4 py-2 text-xs font-medium text-white transition hover:border-white/40 md:inline-block"
      href="#get-started">
      Join now
    </a>

    <button class="text-white md:hidden" type="button" aria-label="Toggle navigation"
      onclick="document.getElementById('mobile-nav').classList.toggle('hidden')">
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </button>
  </div>

  <div class="hidden border-t border-border/60 bg-ink/95 px-6 py-4 md:hidden" id="mobile-nav">
    <nav class="flex flex-col gap-3 text-sm">
      <a class="nav-link" href="#get-started">Get started</a>
      <a class="nav-link" href="#advantages">Advantages</a>
      <a class="nav-link" href="#curriculum">Curriculum</a>
      <a class="nav-link" href="#project">Project</a>
    </nav>
  </div>
</header>
