<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (auth()->check() && auth()->user()->isAdmin())
      <meta name="robots" content="noindex, nofollow">
    @elseif(Route::is('admin.*'))
      <meta name="robots" content="noindex, nofollow">
    @endif
    {!! SEO::generate(true) !!}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link href="{{ asset('assets') }}/css/styles.css?v=1.0.3" rel="stylesheet" />

    <title>{{ $title . ' - ' . 'IEC Denpasar' ?? config('app.name') }}</title>

    <style>
      [x-cloak] {
        display: none !important;
      }
    </style>

    @livewireStyles
    @filamentStyles
    @vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body class="antialiased">
    <div class="w-full">

      @if (auth()->check() && auth()->user()->hasVerifiedEmail() && auth()->user()->isUser())
        <div class="m-0 font-sans antialiased font-normal text-size-base leading-default bg-gray-50 text-slate-500">
          @include('layouts.navbars.auth.sidebar')
          <main class="ease-soft-in-out xl:ml-68.5 relative h-full rounded-xl transition-all duration-200">
            @include('layouts.navbars.auth.nav')
            <div class="w-full px-6 py-6 mx-auto">
              {{ $slot }}
              @include('layouts.footers.auth.footer')
            </div>
          </main>
        </div>
      @else
        @if (!Route::is('login', 'register', 'forgot.password', 'password.reset', 'verification.notice', 'verification.verify'))
          @livewire('partials.navbar')
        @endif
        {{ $slot }}
        @if (!Route::is('login', 'register', 'forgot.password', 'password.reset', 'verification.notice', 'verification.verify'))
          @livewire('partials.footer')
        @endif
      @endif

    </div>

    @filamentScripts
    @livewireScripts
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js" async></script>
    <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.min.js" async></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="{{ asset('assets') }}/js/soft-ui-dashboard-tailwind.js?v=1.0.3" async></script>
    @yield('js_custom')
    @vite('resources/js/app.js')
  </body>
</html>
