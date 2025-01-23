@props([
    'type' => 'text',
])

<input type="{{ $type }}"
  {{ $attributes->twMerge('flex w-full rounded-md border border-input bg-transparent px-4 py-3.5 text-sm shadow-sm transition-colors file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50') }} />
