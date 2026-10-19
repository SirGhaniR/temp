<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'PPLG — Master the Future')</title>
    <meta name="description" content="@yield('description', 'Software and Game Development at SMK Prakarya Internasional. Master the future with code, systems, and real projects.')">

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;700&display=swap"
      rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="min-h-screen bg-ink text-brand-soft font-mono antialiased overflow-x-hidden">

    @include('partials.header')

    <main>
      @yield('content')
    </main>

    @include('partials.footer')

  </body>
</html>
