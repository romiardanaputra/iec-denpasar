<div class="min-h-screen space-y-8 lg:space-y-14 pt-20">
  {{-- banner here --}}
  <section
    class="min-h-svh md:min-h-[60vh] lg:min-h-[80vh] flex items-center justify-center sm:mt-20 lg:mt-0 md:px-12 lg:px-32 ">
    <div class="flex items-center container w-full flex-col lg:flex-row">
      <div class="space-y-8 w-full">
        <article class="space-y-4 md:space-y-8 sm:space-y-6 ">
          <p class="text-blue-600 font-[Nunito] font-bold ">{{ __('Intensive English Course Denpasar') }}</p>
          <h1 class="text-2xl lg:text-5xl text-slate-700 font-bold sm:text-inherit leading-tight">
            {{ __('Lebih dari sekedar kursus bahasa Inggris.') }}</h1>
          <p class="sm:w-[80%] leading-normal">
            {{ __('Bergabunglah dengan kursus bahasa Inggris kami yang dirancang untuk semua tingkatan.') }}
          </p>
        </article>
        <div class="flex gap-2 md:gap-4">
          <a href="{{ route('our-program') }}" wire:navigate>
            <x-button size='lg' class="bg-blue-600 text-white hover:bg-blue-600 rounded-full px-8 py-6 ">
              <x-lucide-search class="mr-2 size-4" /> {{ __('Program') }}
            </x-button>
          </a>
          <a href="{{ route('register') }}" wire:navigate>
            <x-button size='lg'
              class="border border-blue-800 bg-transparent text-blue-600 hover:bg-blue-600 hover:text-white rounded-full px-8 py-6 ">
              <x-lucide-user-round-plus class="mr-2 size-4" /> {{ __('Daftar Akun') }}
            </x-button>
          </a>
        </div>
      </div>
      <div class="sm:w-[90%] md:w-[80%] w-[95%] mt-10 md:mt-0">
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
  <section>
    <div class="px-8 py-12 mx-auto md:px-12 lg:px-32 container flex flex-col lg:min-h-svh justify-center ">
      <div class="flex flex-col ">
        <div class="prose text-gray-500 prose-sm prose-headings:font-normal prose-headings:text-xl">
          <div>
            <h1>Mengapa Memilih IEC Denpasar?</h1>
            <p class="text-balance">
              IEC Denpasar menawarkan solusi belajar bahasa Inggris inovatif untuk setiap situasi.
            </p>
          </div>
        </div> <!-- Starts component -->
        <div class="mt-6 md:pt-12">
          <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-24 items-center ">
            <div>
              <p class="text-4xl mt-8 tracking-tighter font-[Nunito] font-semibold text-gray-700 text-balance">
                Solusi bahasa Inggris yang inovatif untuk setiap situasi </p>
              <p class="text-base  mt-4 text-gray-700 text-balance"> Temukan berbagai kursus, layanan, dan bimbingan
                ahli yang disesuaikan dengan kebutuhan bahasa Inggris unik Anda </p>
              <div
                class="mt-6 text-xs font-medium grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 gap-2 text-gray-950">
                <div class="inline-flex items-center gap-2  text-xs text-gray-700"> <svg
                    class="icon icon-tabler text-gray-700 size-4 icon-tabler-360" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M17 15.328c2.414 -.718 4 -1.94 4 -3.328c0 -2.21 -4.03 -4 -9 -4s-9 1.79 -9 4s4.03 4 9 4">
                    </path>
                    <path d="M9 13l3 3l-3 3"></path>
                  </svg> <span class="text-gray-950 font-medium text-sm"> Jalur pembelajaran yang jelas </span> </div>
                <div class="inline-flex items-center gap-2  text-xs text-gray-700"> <svg
                    class="icon icon-tabler text-gray-700 size-4 icon-tabler-antenna-bars-3" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M6 18l0 -3"></path>
                    <path d="M10 18l0 -6"></path>
                    <path d="M14 18l0 .01"></path>
                    <path d="M18 18l0 .01"></path>
                  </svg> <span class="text-gray-950 font-medium text-sm"> Aktivitas pembelajaran yang kondusif </span>
                </div>
                <div class="inline-flex items-center gap-2  text-xs text-gray-700"> <svg
                    class="icon icon-tabler text-gray-700 size-4 icon-tabler-load-balancer" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 13m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    <path d="M12 20m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    <path d="M12 16v3"></path>
                    <path d="M12 10v-7"></path>
                    <path d="M9 6l3 -3l3 3"></path>
                    <path d="M12 10v-7"></path>
                    <path d="M9 6l3 -3l3 3"></path>
                    <path d="M14.894 12.227l6.11 -2.224"></path>
                    <path d="M17.159 8.21l3.845 1.793l-1.793 3.845"></path>
                    <path d="M9.101 12.214l-6.075 -2.211"></path>
                    <path d="M6.871 8.21l-3.845 1.793l1.793 3.845"></path>
                  </svg> <span class="text-gray-950 font-medium text-sm"> Peningkatan stabilitas pembelajaran </span>
                </div>
                <div class="inline-flex items-center gap-2  text-xs text-gray-700"> <svg
                    class="icon icon-tabler text-gray-700 size-4 icon-tabler-brand-speedtest" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5.636 19.364a9 9 0 1 1 12.728 0"></path>
                    <path d="M16 9l-4 4"></path>
                  </svg> <span class="text-gray-950 font-medium text-sm"> Waktu belajar yang dipercepat </span> </div>
              </div>
            </div>
            <div class="h-full md:order-first"> <img
                src="https://ik.imagekit.io/kht744nua/iec_dps/iec-why-us.webp?updatedAt=1741367298023" alt="#_"
                class=" bg-gray-200 shadow-box shadow-gray-500/30 overflow-hidden aspect-square  w-full h-full object-cover object-center">
            </div>
          </div>
          <div class="grid grid-cols-1 gap-8 md:grid-cols-2 md:gap-24 items-center md:flex-row-reverse">
            <div>
              <p class="text-4xl mt-8 tracking-tighter font-semibold font-[Nunito] text-gray-700 text-balance">
                Solusi bahasa Inggris yang disesuaikan untuk skenario apa pun </p>
              <p class="text-sm  mt-4 text-gray-700 text-balance"> Temukan berbagai instrumen belajar dan nasihat
                personalisasi yang dirancang untuk memenuhi kebutuhan unik Anda.</p>
              <div
                class="mt-6 text-xs font-medium grid grid-cols-1 sm:grid-cols-2 md:grid-cols-1 lg:grid-cols-2 gap-2 text-gray-950">
                <div class="inline-flex items-center gap-2  text-xs text-gray-700"> <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-database text-gray-700 size-4" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 6m-8 0a8 3 0 1 0 16 0a8 3 0 1 0 -16 0"></path>
                    <path d="M4 6v6a8 3 0 0 0 16 0v-6"></path>
                    <path d="M4 12v6a8 3 0 0 0 16 0v-6"></path>
                  </svg> <span class="text-gray-950 font-medium text-sm"> Pelacakan kemajuan yang transparan </span>
                </div>
                <div class="inline-flex items-center gap-2  text-xs text-gray-700"> <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-building text-gray-700 size-4" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 21l18 0"></path>
                    <path d="M9 8l1 0"></path>
                    <path d="M9 12l1 0"></path>
                    <path d="M9 16l1 0"></path>
                    <path d="M14 8l1 0"></path>
                    <path d="M14 12l1 0"></path>
                    <path d="M14 16l1 0"></path>
                    <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path>
                  </svg> <span class="text-gray-950 font-medium text-sm"> Fleksibilitas jadwal </span> </div>
                <div class="inline-flex items-center gap-2  text-xs text-gray-700"> <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-augmented-reality-2 text-gray-700 size-4" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 21h-2a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v3.5"></path>
                    <path d="M17 17l-4 -2.5l4 -2.5l4 2.5v4.5l-4 2.5z"></path>
                    <path d="M13 14.5v4.5l4 2.5"></path>
                    <path d="M17 17l4 -2.5"></path>
                    <path d="M11 4h2"></path>
                  </svg> <span class="text-gray-950 font-medium text-sm"> Bahan pembelajaran berkualitas </span>
                </div>
                <div class="inline-flex items-center gap-2  text-xs text-gray-700"> <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-time-duration-0 text-gray-700 size-4" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 12v.01"></path>
                    <path d="M21 12v.01"></path>
                    <path d="M12 21v.01"></path>
                    <path d="M12 3v.01"></path>
                    <path d="M7.5 4.2v.01"></path>
                    <path d="M16.5 4.2v.01"></path>
                    <path d="M16.5 19.8v.01"></path>
                    <path d="M7.5 19.8v.01"></path>
                    <path d="M4.2 16.5v.01"></path>
                    <path d="M19.8 16.5v.01"></path>
                    <path d="M19.8 7.5v.01"></path>
                    <path d="M4.2 7.5v.01"></path>
                    <path d="M10 11v2a2 2 0 1 0 4 0v-2a2 2 0 1 0 -4 0z"></path>
                  </svg> <span class="text-gray-950 font-medium text-sm"> Metode fun learning </span> </div>
              </div>
            </div>
            <div class="h-full "> <img
                src="https://ik.imagekit.io/kht744nua/iec_dps/iec-1.png?updatedAt=1739430767392" alt="#_"
                class=" bg-gray-200 shadow-box shadow-gray-500/30 overflow-hidden aspect-square  w-full h-full object-cover object-center">
            </div>
          </div>
        </div> <!-- Emds component -->
      </div>
    </div>
  </section>

  {{-- testimonial section --}}
  @livewire('partials.testimonial-section')

  @livewire('partials.scroll-to-top')
</div>
