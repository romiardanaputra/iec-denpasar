{{-- custom css and js testimonial --}}
@section('css_custom')
  @vite('resources/css/partials/testimonial-section.css')
@endsection

@section('js_custom')
  @vite(['resources/js/partials/testimonial-section.js'])
@endsection

<section class="md:py-16 py-8 lg:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-16 max-w-2xl mx-auto ">
      <span class="text-sm text-gray-500 font-medium text-center block mb-2">TESTIMONIAL</span>
      <h2 class="lg:text-4xl text-3xl text-center mb-5 font-bold text-gray-900 ">Mereka Sudah Berani Bicara di Depan
        Publik!!</h2>
      <p class="text-center text-gray-600">Apa Kata Alumni Tentang Metode Belajar Kami?</p>
    </div>
    <!--Slider wrapper-->

    <div class="swiper mySwiper">
      <div class="swiper-wrapper w-max {{ $testimonials->isEmpty() ? 'mx-auto' : '' }}">
        @forelse ($testimonials as $testimonial)
          <div class="swiper-slide" wire:key={{ $testimonial->id }}>
            <div
              class="group bg-white border border-solid border-gray-300 rounded-xl p-6 transition-all duration-500  w-full mx-auto hover:border-blue-600 hover:shadow-sm slide_active:border-blue-600">
              <div class="">
                <div class="flex items-center mb-7 gap-2 text-amber-500 transition-all duration-500  ">
                  <svg class="w-5 h-5" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M8.10326 1.31699C8.47008 0.57374 9.52992 0.57374 9.89674 1.31699L11.7063 4.98347C11.8519 5.27862 12.1335 5.48319 12.4592 5.53051L16.5054 6.11846C17.3256 6.23765 17.6531 7.24562 17.0596 7.82416L14.1318 10.6781C13.8961 10.9079 13.7885 11.2389 13.8442 11.5632L14.5353 15.5931C14.6754 16.41 13.818 17.033 13.0844 16.6473L9.46534 14.7446C9.17402 14.5915 8.82598 14.5915 8.53466 14.7446L4.91562 16.6473C4.18199 17.033 3.32456 16.41 3.46467 15.5931L4.15585 11.5632C4.21148 11.2389 4.10393 10.9079 3.86825 10.6781L0.940384 7.82416C0.346867 7.24562 0.674378 6.23765 1.4946 6.11846L5.54081 5.53051C5.86652 5.48319 6.14808 5.27862 6.29374 4.98347L8.10326 1.31699Z"
                      fill="currentColor" />
                  </svg>
                  <span class="text-base font-semibold text-blue-600">4.9</span>
                </div>
                <p
                  class="text-base text-gray-600 leading-6  transition-all duration-500 pb-8 group-hover:text-gray-800 slide_active:text-gray-800">
                  {{ Str::limit($testimonial->testimony, 120) }}
                </p>
              </div>
              <div class="flex items-center gap-5 border-t border-solid border-gray-200 pt-5">
                <img class="rounded-full h-10 w-10 object-cover" src="{{ $testimonial->image_path }}" alt="avatar" />
                <div class="block">
                  <h5 class="text-gray-900 font-medium transition-all duration-500  mb-1">{{ $testimonial->name }}</h5>
                  <span class="text-sm leading-4 text-gray-500">{{ $testimonial->position }} </span>
                </div>
              </div>
            </div>
          </div>
        @empty
          @livewire('partials.empty-state', [
              'title' => 'No testimonials yet',
              'message' => 'We\'re waiting for our first student story. Check back soon for authentic experiences!',
              'iconType' => 'animation',
              'customIcon' => 'assets/empty-state-animation/review.gif',
          ])
        @endforelse
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
