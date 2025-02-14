<nav class="bg-white dark:bg-gray-900 fixed w-full z-50 top-0 start-0 ">
  <div class="container flex flex-wrap items-center justify-between mx-auto p-4 px-0">
    <a href="{{ route('landing') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset('storage/assets/images/logo/iec.jpg') }}" class="h-8" alt="{{ config('app.name' . 'logo') }}">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"></span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      @if (auth()->check() && auth()->user()->isUser() && auth()->user()->hasVerifiedEmail())
        <a href="{{ route('dashboard') }}">
          <x-button size='lg'
            class="border border-blue-800 bg-white text-blue-800 hover:bg-blue-800 hover:text-white rounded-full px-8 py-6 ">
            <x-lucide-log-in class="mr-2 size-4" /> {{ __('Dashboard') }}
          </x-button>
        </a>
      @elseif(auth()->check() && auth()->user()->hasVerifiedEmail() && auth()->user()->isAdmin())
        <a href="/admin">
          <x-button size='lg'
            class="border border-blue-800 bg-white text-blue-800 hover:bg-blue-800 hover:text-white rounded-full px-8 py-6 ">
            <x-lucide-log-in class="mr-2 size-4" /> {{ __('Admin Dashboard') }}
          </x-button>
        </a>
      @else
        <a href="{{ route('login') }}" wire:navigate>
          <x-button size='lg'
            class="border border-blue-800 bg-white text-blue-800 hover:bg-blue-800 hover:text-white rounded-full px-8 py-6 ">
            <x-lucide-log-in class="mr-2 size-4" /> {{ __('Masuk') }}
          </x-button>
        </a>
      @endif
      <button data-collapse-toggle="navbar-sticky" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul
        class="flex flex-col p-4 gap-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <x-navbar.nav-link :active="request()->routeIs('landing')" :href="route('landing')">{{ __('Beranda') }}</x-navbar.nav-link>
        <x-navbar.nav-link :active="request()->routeIs('about')" :href="route('about')">{{ __('Tentang') }}</x-navbar.nav-link>
        <x-navbar.nav-link :active="request()->routeIs('our-program.*')" :href="route('our-program')">{{ __('Program Kami') }}</x-navbar.nav-link>
        <x-navbar.nav-link :active="request()->routeIs('our-team')" :href="route('our-team')">{{ __('Team Kami') }}</x-navbar.nav-link>
        <x-navbar.nav-link :active="request()->routeIs('contact')" :href="route('contact')">{{ __('Kontak') }}</x-navbar.nav-link>
      </ul>
    </div>
  </div>
</nav>
