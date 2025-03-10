<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if (auth()->check() && auth()->user()->isAdmin())
      <meta name="robots" content="noindex, nofollow">
    @elseif(Route::is('admin.*'))
      <meta name="robots" content="noindex, nofollow">
    @endif

    {!! SEO::generate(true) !!}

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @if (Route::is('dashboard', 'profile', 'bill', 'invoice', 'exam-grade'))
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
      <link href="{{ asset('storage/assets/css/styles.min.css') }}" rel="stylesheet" />
    @endif

    <style>
      [x-cloak] {
        display: none !important;
      }
    </style>

    @filamentStyles
    @vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('css_custom')

  </head>
  <body class="antialiased">
    <div class="w-full">
      @if (auth()->check() && auth()->user()->hasVerifiedEmail() && auth()->user()->isUser())
        @if (!Route::is('verification.notice', 'verification.verify'))
          <div
            class="@unless (Route::is('landing', 'about', 'our-program', 'our-team', 'contact', 'program.detail')) m-0 font-sans antialiased font-normal text-size-base leading-default bg-gray-50 text-slate-500 @endunless">
            @if (Route::is('landing', 'about', 'our-program', 'our-team', 'contact', 'program.detail', 'blog'))
              @livewire('partials.navbar')
              {{ $slot }}
              @livewire('partials.footer')
            @else
              @if (Route::is('payment.success', 'payment.pending'))
                {{ $slot }}
              @else
                @include('layouts.navbars.auth.sidebar')
                <main class="ease-soft-in-out xl:ml-68.5 relative h-full rounded-xl transition-all duration-200">
                  @include('layouts.navbars.auth.nav')
                  <div class="w-full px-6 py-6 mx-auto">
                    {{ $slot }}
                    @include('layouts.footers.auth.footer')
                  </div>
                </main>
              @endif
            @endif
          </div>
        @else
          {{ $slot }}
        @endif
      @else
        @unless (Route::is(
                'login',
                'register',
                'forgot.password',
                'password.reset',
                'verification.notice',
                'verification.verify',
                'payment.success'))
          @livewire('partials.navbar')
        @endunless
        {{ $slot }}
        @unless (Route::is(
                'login',
                'register',
                'forgot.password',
                'password.reset',
                'verification.notice',
                'verification.verify',
                'payment.success'))
          @livewire('partials.footer')
        @endunless
      @endif
    </div>
    {{-- @filamentScripts --}}
    @vite('resources/js/app.js')
    @livewireScripts
    @filamentScripts
    {{-- <script src="{{ asset('js/filament/filament/app.js') }}"></script> --}}

    <script async defer src="{{ asset('storage/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script async defer src="{{ asset('storage/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.3') }}"></script>
    @yield('js_custom')
  </body>
</html>
