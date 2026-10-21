<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Log in — PPLG</title>
    @vite(['resources/css/app.css'])
  </head>
  <body class="min-h-screen bg-ink text-brand-soft antialiased">

    <div class="mx-auto flex min-h-screen max-w-md flex-col justify-center px-6">
      <a class="mb-8 flex items-center gap-3" href="{{ route('home') }}">
        <img class="h-10 w-auto" src="{{ asset('images/logo.png') }}" alt="PPLG">
        <span class="text-sm text-muted">Admin login</span>
      </a>

      <div class="surface-card p-8">
        <h1 class="text-lg font-semibold text-white">Sign in</h1>
        <p class="mt-1 text-xs text-muted">Content editors only. Public site is at <a class="underline"
            href="{{ route('home') }}">/</a>.</p>

        @if ($errors->any())
          <div class="mt-4 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-2 text-xs text-red-300">
            <ul class="space-y-1">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form class="mt-6 space-y-4" method="POST" action="{{ route('login') }}">
          @csrf

          <div>
            <label class="mb-1 block text-xs text-muted" for="email">Email</label>
            <input class="form-input" id="email" name="email" type="email" value="{{ old('email') }}" required
              autofocus autocomplete="username">
          </div>

          <div>
            <label class="mb-1 block text-xs text-muted" for="password">Password</label>
            <input class="form-input" id="password" name="password" type="password" required
              autocomplete="current-password">
          </div>

          <label class="flex items-center gap-2 text-xs text-muted">
            <input class="rounded border-border bg-white/5" name="remember" type="checkbox">
            Remember me
          </label>

          <button class="btn-primary w-full" type="submit">Log in</button>
        </form>

        @if (Route::has('password.request'))
          <p class="mt-4 text-center text-xs text-muted">
            <a class="underline" href="{{ route('password.request') }}">Forgot password?</a>
          </p>
        @endif
      </div>
    </div>

  </body>
</html>
