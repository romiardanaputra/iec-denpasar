<section class="max-w-screen-xl mx-auto mt-20">
  <div class="bg-white dark:bg-gray-800 h-full py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
        <a href="#"
          class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
          <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600"
            loading="lazy" alt="Photo by Minh Pham"
            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
          <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
          </div>
          <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">VR</span>
        </a>

        <a href="#"
          class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
          <img src="https://images.unsplash.com/photo-1542759564-7ccbb6ac450a?auto=format&q=75&fit=crop&w=1000"
            loading="lazy" alt="Photo by Magicle"
            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
          <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
          </div>
          <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Tech</span>
        </a>

        <a href="#"
          class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
          <img src="https://images.unsplash.com/photo-1610465299996-30f240ac2b1c?auto=format&q=75&fit=crop&w=1000"
            loading="lazy" alt="Photo by Martin Sanchez"
            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
          <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
          </div>
          <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Dev</span>
        </a>

        <a href="#"
          class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
          <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&q=75&fit=crop&w=600"
            loading="lazy" alt="Photo by Lorenzo Herrera"
            class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
          <div
            class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
          </div>
          <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Retro</span>
        </a>
      </div>
    </div>
  </div>
  <div class="py-10 mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="grid lg:grid-cols-3 w-full gap-12">
      <div class="w-full grid lg:grid-cols-1 lg:col-span-2 gap-4">
        <x-typography.h2>
          {{ __('English For Kid Program') }}
        </x-typography.h2>
        <x-typography.p>
          {{ __('Semakin dini anak belajar bahasa, semakin mudah baginya untuk mengembangkan kemampuan berbahasa dan logika. Dengan penekanan pada belajar sambil bermain, program bahasa Inggris untuk anak-anak.') }}
        </x-typography.p>
        <x-typography.list>
          <li>{{ __('Menerapkan best practice dalam percakapan berbahasa Inggris') }}</li>
          <li>{{ __('Melatih dan menerapkan fundamental berbahasa Inggris') }}</li>
          <li>{{ __('Reading and writing dalam memperkuat vocabulary') }}</li>
        </x-typography.list>
        <div>
          <x-tabs defaultValue="overview" class="w-full">
            <x-tabs.List class="w-full">
              <x-tabs.trigger value="overview">Jadwal Less</x-tabs.trigger>
              <x-tabs.trigger value="delivery">Delivery</x-tabs.trigger>
              <x-tabs.trigger value="refund">Refund</x-tabs.trigger>
            </x-tabs.List>
            <div class="p-8">
              <x-tabs.content
                value="overview">{{ __('Kami menawarkan program Bahasa Inggris untuk anak-anak yang dirancang untuk menciptakan lingkungan belajar yang menyenangkan dan stimulatif. Program kami fokus pada belajar sambil bermain, sehingga anak-anak dapat mengembangkan kemampuan berbahasa dan logika mereka dengan mudah.') }}.</x-tabs.content>
              <x-tabs.content
                value="delivery">{{ __('Program kami tersedia secara online dan offline. Untuk kursus online, Anda dapat mengakses materi pembelajaran melalui platform kami yang mudah digunakan. Untuk kursus offline, kami memiliki lokasi di Jl. Jaya Giri Gg. XXII No.10x, Renon, Denpasar Timur, Denpasar, Bali 80236.') }}.</x-tabs.content>
              <x-tabs.content
                value="refund">{{ __('Kami menawarkan kebijakan pengembalian dana yang fleksibel. Jika Anda tidak puas dengan program kami, Anda dapat mengajukan permohonan pengembalian dana dalam 30 hari pertama pendaftaran. Silakan hubungi kami di +62 361 234 567 untuk informasi lebih lanjut.') }}</x-tabs.content>
            </div>
          </x-tabs>
        </div>
      </div>
      <div class="lg:w-full flex flex-col gap-4 space-y-4">
        <span class="font-bold text-2xl">Rp. 500.000,00</span>
        <div class="flex gap-1 items-center">
          @for ($i = 0; $i < 5; $i++)
            <svg class="w-3.5 h-3.5 fill-blue-600" viewBox="0 0 14 13" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
            </svg>
          @endfor
          <span>(5 stars) 14 reviews</span>
        </div>
        <div class="flex justify-between gap-4">
          <span class="font-medium">Level Kursus</span>
          <div class="flex flex-wrap">
            <x-button>6 Level</x-button>
          </div>
        </div>
        <div class="flex w-full">
          <x-button type="submit" class="w-full py-6 ">Buy Now</x-button>
        </div>
      </div>
    </div>
  </div>
</section>
