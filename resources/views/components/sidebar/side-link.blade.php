@props(['routeName', 'routeLabel'])
@php
  $icons = [
      'dashboard' => 'lucide-layout-dashboard',
      'profile' => 'lucide-circle-user',
      'schedule' => 'lucide-calendar-check',
      'exam-grade' => 'lucide-book-plus',
      'class-info' => 'lucide-book-marked',
      'bill' => 'lucide-receipt',
      'billing' => 'lucide-receipt',
  ];

  $icon = $icons[$routeName] ?? 'lucide-layout-dashboard';
@endphp
<li class="mt-0.5 w-full">
  <a class="py-2.7 text-size-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors
          {{ Request::is($routeName) ? 'shadow-soft-xl rounded-lg bg-white font-semibold text-slate-700' : '' }}"
    href="{{ route($routeName) }}" wire:navigate>
    <div
      class="{{ Request::is($routeName) ? ' bg-blue-800' : '' }} shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
      <x-dynamic-component :component="$icon"
        class="size-4 {{ Request::is($routeName) ? 'text-white' : 'text-slate-800' }}" />
    </div>
    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">{{ $routeLabel }}</span>
  </a>
</li>
