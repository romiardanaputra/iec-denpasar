{{-- <section class="container bg-white dark:bg-gray-900">
  <div class="swiper swiper-testimonial">
    <div class="py-8 mx-auto text-center lg:py-16 lg:px-6 swiper-wrapper">
      @foreach ($testimonials as $testimonial)
        <div class="swiper-slide">
          <figure class="max-w-screen-md mx-auto">
            <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none"
              xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path
                d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
                fill="currentColor" />
            </svg>
            <blockquote>
              <p class="text-lg md:text-2xl font-medium text-gray-900 dark:text-white">
                "{{ __($testimonial->testimony) }}"
              </p>
            </blockquote>
            <figcaption class="flex items-center justify-center mt-6 space-x-3">
              <img class="w-6 h-6 rounded-full"
                src="{{ asset('storage/' . Str::replaceLast('.png', '.webp', $testimonial->image_path)) }}"
                srcset="
                  {{ asset('storage/' . Str::replaceLast('.png', '-small.webp', $testimonial->image_path)) }} 480w,
                  {{ asset('storage/' . Str::replaceLast('.png', '-medium.webp', $testimonial->image_path)) }} 768w,
                  {{ asset('storage/' . Str::replaceLast('.png', '-large.webp', $testimonial->image_path)) }} 1024w
                "
                sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" alt="{{ __($testimonial->name) }}"
                loading="lazy">
              <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                <div class="pr-3 font-medium text-gray-900 dark:text-white">{{ __($testimonial->name) }}</div>
                <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">{{ __($testimonial->position) }}
                </div>
              </div>
            </figcaption>
          </figure>
        </div>
      @endforeach
    </div>
    <div class="swiper-pagination swiper-pagination-testimonial"></div>
  </div>
</section> --}}

@section('css_custom')
  <style>
    .swiper-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet,
    .swiper-pagination-horizontal.swiper-pagination-bullets .swiper-pagination-bullet {
      width: 16px !important;
      height: 4px !important;
      border-radius: 5px !important;
      margin: 0 6px !important;
    }

    .swiper-pagination {
      bottom: 2px !important;
    }

    .swiper-wrapper {
      height: max-content !important;
      width: max-content !important;
      padding-bottom: 64px;
    }

    .swiper-pagination-bullet-active {
      background: rgb(28 100 242) !important;
    }

    .swiper-slide.swiper-slide-active>.slide_active\:border-blue-600 {
      --tw-border-opacity: 1;
      border-color: rgb(28 100 242 / var(--tw-border-opacity));
    }

    .swiper-slide.swiper-slide-active>.group .slide_active\:text-gray-800 {
      ---tw-text-opacity: 1;
      color: rgb(31 41 55 / var(--tw-text-opacity));
    }
  </style>
@endsection

<section class="py-24 ">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-16 max-w-2xl mx-auto ">
      <span class="text-sm text-gray-500 font-medium text-center block mb-2">TESTIMONIAL</span>
      <h2 class="text-4xl text-center mb-5 font-bold text-gray-900 ">Mereka Sudah Berani Bicara di Depan Publik!!</h2>
      <p class="text-center">Apa Kata Alumni Tentang Metode Belajar Kami?</p>
    </div>
    <!--Slider wrapper-->

    <div class="swiper mySwiper">
      <div class="swiper-wrapper w-max {{ $testimonials->isEmpty() ? 'lg:mx-auto' : '' }}">
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
                <img class="rounded-full h-10 w-10 object-cover" src="https://pagedone.io/asset/uploads/1696229969.png"
                  alt="avatar" />
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
@section('js_custom')
  @vite(['resources/js/swiper-testimonial.js'])
@endsection
