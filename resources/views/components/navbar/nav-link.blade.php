@props(['active' => false])

@php
  $classes = $active ?? false ? 'text-blue-800' : 'text-gray-900';
@endphp

<li class="relative table-cell py-2">
  <a
    {{ $attributes->class(['class' => 'block py-2 px-3 bg-blue-700 rounded md:bg-transparent md:p-0 md:dark:text-blue-500 ', $classes])->merge() }}>
    {{ $slot }}
  </a>
</li>
