<aside
  class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 block w-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200  xl:translate-x-0 xl:bg-transparent">

  <div class="h-19.5">
    <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden"
      sidenav-close></i>
    <a class="block px-8 py-6 m-0 text-size-sm whitespace-nowrap text-slate-700" href="{{ url('') }}"
      target="_blank">
      <img src="{{ asset('storage/assets/user/images/logo/iec.jpg') }}"
        class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
      <span
        class="{{ Request::is('rtl') ? 'mr-1' : 'ml-1' }} font-semibold transition-all duration-200 ease-nav-brand">IEC
        Denpasar</span>
    </a>
  </div>

  <hr
    class="h-px mt-0 bg-transparent {{ Request::is('virtual-reality') ? 'bg-gradient-horizontal-dark' : 'via-black/40 bg-gradient-to-r from-transparent to-transparent' }} " />

  <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
                {{ Request::is('dashboard') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}"
          href="{{ url('dashboard') }}">

          <div
            class="{{ Request::is('dashboard') ? ' bg-blue-800' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg  bg-center stroke-0 text-center xl:p-2.5">
            <x-lucide-layout-dashboard class="{{ Request::is('dashboard') ? 'text-white' : 'text-slate-800' }}" />
          </div>
          <span
            class="{{ Request::is('rtl') ? 'mr-1' : 'ml-1' }} duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
        </a>
      </li>

      <li class="w-full mt-4">
        <h6
          class="{{ Request::is('rtl') ? 'pr-6 mr-2' : 'pl-6 ml-2' }} font-bold leading-tight uppercase text-size-xs opacity-60">
          Course Detail</h6>
      </li>

      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
              {{ Request::is('profile') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}"
          href="{{ route('profile') }}">
          <div
            class="{{ Request::is('profile') ? ' bg-blue-800' : 'bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg  bg-center stroke-0 text-center xl:p-2.5">
            <x-lucide-circle-user class="size-4 {{ Request::is('profile') ? 'text-white' : 'text-slate-800' }}" />
          </div>
          <span
            class="{{ Request::is('rtl') ? 'mr-1' : 'ml-1' }} duration-300 opacity-100 pointer-events-none ease-soft">
            Profile</span>
        </a>

        <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
              {{ Request::is('schedule') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}"
          href="{{ url('schedule') }}">
          <div
            class="{{ Request::is('schedule') ? 'bg-blue-800' : 'bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <x-lucide-calendar-check class="size-4 {{ Request::is('schedule') ? 'text-white' : 'text-slate-800' }}" />
          </div>
          <span
            class="{{ Request::is('rtl') ? 'mr-1' : 'ml-1' }} duration-300 opacity-100 pointer-events-none ease-soft">
            Class Schedule</span>
        </a>
        <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
              {{ Request::is('exam-grade') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}"
          href="{{ url('exam-grade') }}">
          <div
            class="{{ Request::is('exam-grade') ? 'bg-blue-800' : 'bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <x-lucide-book-plus class="size-4 {{ Request::is('exam-grade') ? 'text-white' : 'text-slate-800' }}" />
          </div>
          <span
            class="{{ Request::is('rtl') ? 'mr-1' : 'ml-1' }} duration-300 opacity-100 pointer-events-none ease-soft">Exam
            Grade</span>
        </a>
        <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
              {{ Request::is('class-info') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}"
          href="{{ url('class-info') }}">
          <div
            class="{{ Request::is('class-info') ? 'bg-blue-800' : 'bg-white' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <x-lucide-book-marked class="size-4 {{ Request::is('class-info') ? 'text-white' : 'text-slate-800' }}" />
          </div>
          <span
            class="{{ Request::is('rtl') ? 'mr-1' : 'ml-1' }} duration-300 opacity-100 pointer-events-none ease-soft">
            Class Info</span>
        </a>
      </li>
      <li class="w-full mt-4">
        <h6
          class="{{ Request::is('rtl') ? 'pr-6 mr-2' : 'pl-6 ml-2' }} font-bold leading-tight uppercase text-size-xs opacity-60">
          Transaction</h6>
      </li>
      <li class="mt-0.5 w-full">
        <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
              {{ Request::is('billing') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}"
          href="{{ url('billing') }}">
          <div
            class="{{ Request::is('billing') ? ' bg-gradient-fuchsia' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
            <x-lucide-receipt class="size-5" />
          </div>
          <span
            class="{{ Request::is('rtl') ? 'mr-1' : 'ml-1' }} duration-300 opacity-100 pointer-events-none ease-soft">Billing</span>
        </a>
        <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
              {{ Request::is('billing') ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}"
          href="{{ url('billing') }}">
          <div
            class="{{ Request::is('billing') ? ' bg-gradient-fuchsia' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
            <x-lucide-receipt class="size-5" />
          </div>
          <span
            class="{{ Request::is('rtl') ? 'mr-1' : 'ml-1' }} duration-300 opacity-100 pointer-events-none ease-soft">Transaction
            History</span>
        </a>
      </li>

    </ul>
  </div>
</aside>
