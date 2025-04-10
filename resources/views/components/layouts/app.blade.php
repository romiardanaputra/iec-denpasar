<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link preload
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet">
    <link preload
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet">

    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <style>
      [x-cloak] {
        display: none !important;
      }
    </style>

    @if (auth()->check() && auth()->user()->isAdmin())
      <meta name="robots" content="noindex, nofollow">
    @elseif(Route::is('admin.*'))
      <meta name="robots" content="noindex, nofollow">
    @endif

    {!! SEO::generate(true) !!}

    @if (Route::is('dashboard', 'profile', 'bill', 'bill.detail', 'invoice', 'exam-grade'))
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
      <link href="{{ asset('storage/assets/css/styles.min.css') }}" rel="stylesheet" />
    @endif

    @vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @filamentStyles
    @yield('css_custom')

  </head>
  <body class="antialiased">
    <div class="w-full">
      @if (auth()->check() && auth()->user()->hasVerifiedEmail() && auth()->user()->isUser())
        @if (!Route::is('verification.notice', 'verification.verify'))
          <div
            class="@unless (Route::is(
                    'landing',
                    'about',
                    'our-program',
                    'our-team',
                    'contact',
                    'program.detail',
                    'blog',
                    'blog.detail',
                    'checkout')) m-0 font-sans antialiased min-h-svh md:min-h-dvh lg:min-h-lvh font-normal text-size-base leading-default bg-white text-slate-500 @endunless">
            @if (Route::is(
                    'landing',
                    'about',
                    'our-program',
                    'our-team',
                    'contact',
                    'program.detail',
                    'blog',
                    'blog.detail',
                    'checkout'))
              @livewire('partials.navbar')
              {{ $slot }}
              @livewire('partials.footer')
            @else
              @if (Route::is('payment.success', 'payment.pending', 'payment.failed'))
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
                'payment.success',
                'payment.pending',
                'payment.failed'))
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
                'payment.success',
                'payment.pending',
                'payment.failed'))
          @livewire('partials.footer')
        @endunless
      @endif
    </div>
    @vite('resources/js/app.js')
    @livewireScripts
    @filamentScripts
    {{-- if env is prod --}}
    @if (config('app.env') === 'production')
      <script async defer src="{{ asset('storage/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
      <script async defer src="{{ asset('storage/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.3') }}"></script>
    @else
      {{-- else env is local --}}
      <script async defer src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
      <script async defer src="{{ asset('assets/js/soft-ui-dashboard-tailwind.js?v=1.0.3') }}"></script>
    @endif

    @yield('js_custom')
  </body>
</html>
