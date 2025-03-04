  <div class="min-h-screen space-y-8 lg:space-y-14 pt-20">
    {{-- banner here --}}
    <section class="min-h-svh md:min-h-[60vh] lg:min-h-[80vh] flex items-center justify-center sm:mt-20 lg:mt-0">
      <div class="flex items-center container w-full flex-col lg:flex-row">
        <div class="space-y-8 w-full">
          <article class="space-y-4 md:space-y-8 sm:space-y-6 ">
            <p class="text-blue-900 font-medium ">{{ __('Intensive English Course Denpasar') }}</p>
            <h1 class="text-2xl lg:text-5xl text-slate-700 font-medium sm:text-inherit leading-tight">
              {{ __('Lebih dari sekedar kursus bahasa Inggris.') }}</h1>
            <p class="sm:w-[80%] leading-normal">
              {{ __('Bergabunglah dengan kursus bahasa Inggris dinamis kami yang dirancang untuk semua tingkatan. Temukan kegembiraan belajar') }}
            </p>
          </article>
          <div class="flex gap-2 md:gap-5 md:space-x-8">
            <a href="{{ route('our-program') }}" wire:navigate>
              <x-button size='lg' class="bg-blue-800 text-white hover:bg-blue-800 rounded-full px-8 py-6 ">
                <x-lucide-search class="mr-2 size-4" /> {{ __('Program') }}
              </x-button>
            </a>
            <a href="{{ route('register') }}" wire:navigate>
              <x-button size='lg'
                class="border border-blue-800 bg-transparent text-blue-800 hover:bg-blue-800 hover:text-white rounded-full px-8 py-6 ">
                <x-lucide-user-round-plus class="mr-2 size-4" /> {{ __('Daftar') }}
              </x-button>
            </a>
          </div>
        </div>
        <div class="sm:w-[90%] md:w-[80%] tracking-in-contract-bck-top mt-10 md:mt-0">
          <img class="size-full aspect-auto md:size-10/12 mx-auto"
            src="{{ asset('storage/assets/iec/iec-banner-large.webp') }}" alt="iec denpasar hero image" loading="lazy"
            srcset="
      {{ asset('storage/assets/iec/iec-banner-small.webp') }} 480w,
      {{ asset('storage/assets/iec/iec-banner-medium.webp') }} 768w,
      {{ asset('storage/assets/iec/iec-banner-large.webp') }} 1024w,
      {{ asset('storage/assets/iec/iec-banner-large.webp') }} 1280w
    "
            sizes="(max-width: 640px) 90vw, (max-width: 768px) 80vw, 100vw">
        </div>
      </div>
    </section>

    {{-- program section --}}
    @livewire('partials.program-section')

    {{-- why choose us section --}}
    <section class="container">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-14 text-center">
          <span
            class="py-1 px-4 bg-indigo-100 rounded-full text-xs font-medium text-indigo-600">{{ __('Features') }}</span>
          <h1 class="text-2xl md:text-4xl font-medium text-gray-900 py-5">{{ __('Mengapa memilih IEC Denpasar?') }}
          </h1>
          <p class="text-base font-normal text-gray-500 max-w-md md:max-w-2xl mx-auto">
            {{ __('Kami menyediakan program pembelajaran bahasa Inggris yang inovatif, terstruktur, dan sesuai dengan kebutuhan Anda. Dari pemula hingga mahir, kami siap membantu Anda mencapai tujuan.') }}
          </p>
        </div>
        <div
          class="flex justify-center items-center gap-x-5 gap-y-8 lg:gap-y-0 flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between lg:gap-x-8">
          @foreach ($features as $feature)
            <livewire:partials.home.feature-item :icon="$feature['icon']" :iconColor="$feature['iconColor']" :backgroundColor="$feature['backgroundColor']" :title="$feature['title']"
              :description="$feature['description']" />
          @endforeach
        </div>
      </div>
    </section>

    {{-- testimonial section --}}
    @livewire('partials.testimonial-section')

    {{-- cta home section --}}
    @livewire('partials.cta-section')
  </div>
