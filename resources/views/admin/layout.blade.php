<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — PPLG</title>
    @vite(['resources/css/app.css'])
  </head>
  <body class="min-h-screen bg-ink text-brand-soft antialiased">

    <header class="border-b border-border/60 bg-ink/80">
      <div class="mx-auto flex max-w-6xl items-center justify-between px-6 py-4">
        <a class="flex items-center gap-3" href="{{ route('admin.index') }}">
          <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="PPLG">
          <span class="text-sm font-medium text-white">Admin</span>
        </a>

        <div class="flex items-center gap-4 text-xs">
          <span class="text-muted">{{ auth()->user()->email }}</span>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-muted hover:text-white">Log out</button>
          </form>
        </div>
      </div>
    </header>

    <main class="mx-auto max-w-6xl px-6 py-10">
      @if (session('status'))
        <p class="mb-6 rounded-lg border border-green-500/30 bg-green-500/10 px-4 py-2 text-sm text-green-300">
          {{ session('status') }}
        </p>
      @endif

      @yield('content')
    </main>

  </body>
</html>
