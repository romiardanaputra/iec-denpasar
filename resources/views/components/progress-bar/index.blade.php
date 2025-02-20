@props([
    'title' => 'title',
    'grade' => '100%',
])

<div class="grid grid-cols-2">
  <p class="text-sm">{{ $title }}</p>
  <div class="flex gap-4 items-center w-full">
    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">

      @if ($grade >= 80)
        <div class="bg-green-600 h-2.5 rounded-full dark:bg-green-500" style="width: {{ $grade }}%"></div>
      @elseif($grade <= 70 && $grade >= 40)
        <div class="bg-orange-400 h-2.5 rounded-full dark:bg-orange-300" style="width: {{ $grade }}%"></div>
      @elseif($grade <= 40)
        <div class="bg-red-600 h-2.5 rounded-full dark:bg-red-500" style="width: {{ $grade }}%"></div>
      @endif

    </div>
    <p>{{ $grade }}%</p>
  </div>
</div>
