<nav
  class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start"
  navbar-main navbar-scroll="true">
  <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
    <nav>
      <ol class="flex flex-wrap pt-1 bg-transparent rounded-lg">
        <li class="pl-2 leading-normal text-size-sm">
          <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
        </li>
        <li
          class="text-size-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
          aria-current="page">{{ str_replace('-', ' ', Request::path()) }}</li>
      </ol>
      <h6 class="mb-0 font-bold capitalize">{{ str_replace('-', ' ', Request::path()) }}</h6>
    </nav>

    <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
      <div class="flex items-center md:ml-auto md:pr-4">
        <div class="ml-2 relative flex flex-wrap items-center w-full transition-all rounded-lg ease-soft">
          <x-input placeholder="search here..." class="pl-12" id="search" />
          <x-lucide-search class="size-4 absolute left-0 ml-4" />
        </div>
      </div>
      <ul
        class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full {{ Request::is('rtl') ? 'pr-10 ml-0 mr-auto' : '' }}">

        <li class="flex items-center">
          <a href="javascript:;"
            class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-size-sm text-slate-500">
            <livewire:auth.logout />
          </a>
        </li>
        <li class="flex items-center {{ Request::is('rtl') ? 'pr-4' : 'pl-4' }} xl:hidden">
          <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-size-sm text-slate-500"
            sidenav-trigger>
            <div class="w-4.5 overflow-hidden">
              <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
              <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
              <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
            </div>
          </a>
        </li>
        <li class="flex items-center px-4">
          <a href="javascript:;" class="p-0 transition-all text-size-sm ease-nav-brand text-slate-500">
            <i fixed-plugin-button-nav class="cursor-pointer fa fa-cog"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

@section('js_custom')
  <script>
    document.addEventListener('livewire:navigated', function() {
      document.addEventListener('DOMContentLoaded', function() {
        const sidenav = document.getElementById('sidenav-main');
        const sidenavTrigger = document.querySelector('[sidenav-trigger]');

        sidenavTrigger.addEventListener('click', function() {
          sidenav.classList.toggle('-translate-x-52');
          sidenav.classList.toggle('translate-x-0');
        });
      });
    })
  </script>
@endsection
