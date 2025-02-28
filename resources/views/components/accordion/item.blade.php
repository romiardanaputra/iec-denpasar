@props(['value'])

<div x-accordion:item class="{{ Request::is('blog') ? 'border-none' : 'border-b' }}" x-data="{ item: '{{ $value }}' }"
  :data-state="__getDataState(item)">
  {{ $slot }}
</div>
