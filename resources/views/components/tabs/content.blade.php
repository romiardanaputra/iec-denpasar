@props([
    'value' => '',
])

<div x-show="__selected === '{{ $value }}'" {{ $attributes->twMerge('mt-2 leading-relaxed') }}>
  {{ $slot }}
</div>
