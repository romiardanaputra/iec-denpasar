<aside
  class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 block w-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 -translate-x-52 xl:translate-x-0 xl:bg-transparent"
  id="sidenav-main">
  <div class="h-19.5">
    <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
      sidenav-close></i>
    <a class="flex items-center gap-2 px-8 py-6 m-0 text-size-sm whitespace-nowrap text-slate-700"
      href="{{ url('') }}" target="_blank">
      <img src="{{ asset('storage/assets/logo/iec-logo.webp') }}"
        srcset="
        {{ asset('storage/assets/logo/iec-logo-small.webp') }} 480w,
        {{ asset('storage/assets/logo/iec-logo-medium.webp') }} 768w,
        {{ asset('storage/assets/logo/iec-logo-large.webp') }} 1024w
    "
        sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" class="h-8"
        alt="{{ config('app.name') . ' logo' }}" loading="lazy">
      <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">IEC
        Denpasar</span>
    </a>
  </div>
  <hr class="h-px mt-0 bg-transparent via-black/40 bg-gradient-to-r from-transparent to-transparent " />
  <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
      <x-sidebar.side-link :routeName="'dashboard'" :routeLabel="'Dashboard'" />
      <li class="w-full mt-4">
        <h6 class="pl-2 ml-2 font-bold leading-tight uppercase text-size-xs opacity-60">
          Course Detail</h6>
      </li>
      <x-sidebar.side-link :routeName="'profile'" :routeLabel="'Profile'" />
      <x-sidebar.side-link :routeName="'exam-grade'" :routeLabel="'Exam Grade'" />
      <li class="w-full mt-4">
        <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-size-xs opacity-60">
          Transaction</h6>
      </li>
      <x-sidebar.side-link :routeName="'bill'" :routeLabel="'Billing'" />
    </ul>
  </div>
</aside>
