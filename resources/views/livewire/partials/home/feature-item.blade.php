<div class="relative w-full text-center max-md:max-w-sm max-md:mx-auto group md:w-2/5 lg:w-1/4">
  <div
    class="bg-{{ $backgroundColor }}-50 rounded-lg flex justify-center items-center mb-4 w-16 h-16 mx-auto cursor-pointer transition-all duration-500 group-hover:bg-{{ $backgroundColor }}-600">
    <x-dynamic-component :component="'lucide-' . $icon"
      class="stroke-{{ $iconColor }}-600 transition-all duration-500 group-hover:stroke-white size-6" />
  </div>
  <h3 class="text-lg font-medium text-gray-900 mb-2 capitalize">{{ __($title) }}</h3>
  <p class="text-sm font-normal text-gray-500">{{ __($description) }}</p>
</div>
