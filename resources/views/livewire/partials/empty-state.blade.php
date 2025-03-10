<div class="col-span-full flex flex-col items-center justify-center py-20">
  <div class="relative w-80 h-80 bg-white/50 border-2 border-dashed border-gray-300 rounded-3xl">
    <div class="absolute inset-0 flex items-center justify-center">
      <!-- Dynamic Icon System -->
      @if ($iconType === 'blog' || $iconType === 'default')
        <svg xmlns="http://www.w3.org/2000/svg"
          class="w-24 h-24 text-blue-600 opacity-75 transition-transform duration-300 hover:scale-110" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
      @elseif($iconType === 'testimonial')
        <svg xmlns="http://www.w3.org/2000/svg"
          class="w-20 h-20 text-blue-600 opacity-75 transition-transform duration-300 hover:scale-110" fill="none"
          viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M7 8h10M7 12h4m-4 4h10M11 5l3 3m0 0l-3 3m3-3H8m13 0h-3m3 3h-3m-3-3h3m-3 3h3" />
        </svg>
      @elseif($iconType === 'program')
        <svg xmlns="http://www.w3.org/2000/svg"
          class="w-24 h-24 text-blue-600 opacity-75 transition-transform duration-300 hover:scale-110"
          viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M16.8 22.8L12 20.4 7.2 22.8V4.8h9.6v18zM12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19v-6m0-3V5m-3 3h6" />
        </svg>
      @elseif($iconType === 'animation')
        <img class="object-contain rounded-3xl" src="{{ asset('storage/' . $customIcon) }}" alt="empty-state-animation">
      @elseif($iconType === 'custom')
        {!! $customIcon !!}
      @endif

      <!-- Pulsating Circle Effect -->
      @if (!$iconType === 'animation' && !$iconType === 'custom')
        <div class="absolute w-24 h-24 rounded-full bg-blue-200 opacity-25 animate-pulse"></div>
      @endif
    </div>
  </div>

  <div class="text-center mt-8 space-y-4">
    <h3 class="text-2xl font-medium text-gray-900">
      {{ __($title) }}
    </h3>
    <p class="text-gray-600 max-w-md mx-auto">
      {{ __($message) }}
    </p>

    <!-- Dynamic Action Button -->
    @if ($buttonText)
      <button type="button"
        class="mt-4 bg-blue-600 text-white px-6 py-3 rounded-full
                     hover:bg-blue-700 transition-all duration-200
                     focus:outline-none focus:ring-2 focus:ring-blue-500"
        x-on:click="{{ $buttonAction ?? 'alert(\'Action triggered\')' }}">
        {{ __($buttonText) }}
      </button>
    @endif
  </div>
</div>
