@props([
    'variant' => 'outline',
])

<x-button :$variant x-on:click="__dialogOpen = true" {{ $attributes->twMerge('bg-blue-800 text-white') }}>
  {{ $slot }}
</x-button>
