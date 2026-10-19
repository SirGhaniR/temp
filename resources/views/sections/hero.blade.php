<section class="relative overflow-hidden min-h-300 bg-cover bg-center bg-no-repeat" id="get-started"
  style="background-image: url('{{ asset('images/bg-top.png') }}');">
    <div class="relative mx-auto grid max-w-7xl items-center gap-14 px-6 py-24 md:grid-cols-2 md:py-32">
      <div>
        <h1 class="text-3xl font-semibold leading-relaxed text-white sm:text-4xl md:text-5xl">
          Master the Future
        </h1>

        <p class="mt-6 max-w-md text-sm leading-tight text-muted">
          Master Software and Game Development through a cutting-edge industry-oriented curriculum. Shape a generation
          of
          skilled developers ready to compete globally.
        </p>

        <form class="mt-8 flex max-w-md gap-3" action="{{ route('join.store') }}" method="POST">
          @csrf
          <input class="hidden" name="website" type="text" aria-hidden="true" tabindex="-1" autocomplete="off">
          <input class="form-input" name="email" type="email" value="{{ old('email') }}" required
            placeholder="Enter your email">
          <button class="btn-primary whitespace-nowrap" type="submit">Join!</button>
        </form>

        @if (session('status'))
          <p class="mt-3 text-xs text-green-400">{{ session('status') }}</p>
        @endif

        @error('email')
          <p class="mt-3 text-xs text-red-400">{{ $message }}</p>
        @enderror

        <p class="mt-4 text-xs text-muted">Limited slots available for this year's intake!</p>
      </div>

      <div class="bg-black rounded-lg min-h-100 shadow-center">
        <div class="flex justify-start items-center gap-2 bg-white rounded-t-lg px-4 py-3">
          <div class="terminal-dot bg-red-600"></div>
          <div class="terminal-dot bg-yellow-300"></div>
          <div class="terminal-dot bg-green-400"></div>
          <p class="self-center font-mono text-sm font-extrabold text-black">PPLG@mac - 80 × 24</p>
        </div>
        <div class="p-6 font-mono text-xs leading-relaxed">
          <p class="text-white/40">~/pplg $ <span class="text-white">git status</span></p>
          <p class="mt-3 text-white/40">On branch <span class="text-white">main</span></p>
          <p class="text-white/40">Your branch is up to date with <span class="text-white">'origin/main'</span>.</p>
          <p class="mt-3 text-white/40">Changes not staged for commit:</p>
          <p class="ml-3 text-white/40">modified: <span class="text-white">future.js</span></p>
          <p class="mt-3 text-white/40">~/pplg $ <span class="animate-pulse text-white">▍</span></p>
        </div>
      </div>
    </div>
</section>
