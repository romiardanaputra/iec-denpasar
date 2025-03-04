<section>
  <div class="bg-blue-900 px-8 py-16">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 justify-center items-center gap-12">
      <!-- Left Side: Text and Button -->
      <div class="text-center md:text-left">
        <h2 class="text-4xl lg:text-5xl font-semibold text-white mb-6 md:!leading-[55px]">
          {{ __('Gabung Bersama Kami!') }}
        </h2>
        <p class="text-lg text-white">
          {{ __('Rasakan pengalaman belajar bahasa Inggris yang menyenangkan dan efektif bersama mentor profesional kami.') }}
        </p>
        <a href="{{ route('register') }}" wire:navigate>
          <x-button type="button" size="lg"
            class="bg-white rounded-full mt-6 text-slate-800 hover:bg-gray-200 transition-all duration-300">
            {{ __('Daftar Sekarang!') }}
          </x-button>
        </a>
      </div>
      <!-- Right Side: Image -->
      <div class="flex justify-center md:justify-end">
        <img class="w-7/12 rounded-2xl" src="{{ asset('storage/assets/iec/cta-section.svg') }}"
          srcset="
            {{ asset('storage/assets/iec/cta-section.svg') }} 480w,
            {{ asset('storage/assets/iec/cta-section.svg') }} 768w,
            {{ asset('storage/assets/iec/cta-section.svg') }} 1024w
          "
          sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px"
          alt="{{ __('Belajar Bahasa Inggris di IEC Denpasar') }}" loading="lazy" />
      </div>

    </div>
  </div>
</section>
