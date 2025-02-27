<section>
  <div class="bg-[#182b50] px-8 py-16">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 justify-center items-center gap-12">
      <!-- Left Side: Text and Button -->
      <div class="text-center md:text-left">
        <h2 class="text-4xl lg:text-5xl font-extrabold text-white mb-6 md:!leading-[55px]">
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
      <div class="text-center">
        <img src="{{ asset('https://readymadeui.com/management-img.webp') }}"
          alt="{{ __('Belajar Bahasa Inggris di IEC Denpasar') }}" class="w-full mx-auto rounded-2xl shadow-lg" />
      </div>
    </div>
  </div>
</section>
