<section id="programKami" class="container lg:py-20 px-8 md:px-12 ">
  <article class="space-y-4">
    <p class="font-bold font-[Nunito] text-blue-600">{{ __('Kursus Bahasa Inggris') }}</p>
    <h1 class="lg:text-4xl font-bold text-3xl leading-tight mb-5">{{ __('Program Kami') }}</h1>
    <div class="sm:flex justify-between gap-5">
      <p class="mb-4 sm:w-8/12 text-gray-600 leading-relaxed md:tracking-wide">
        {{ __('Menguasai bahasa Inggris dengan percaya diri! Program kami dirancang khusus untuk semua level, dari pemula hingga lanjutan. Dapatkan metode pembelajaran interaktif, materi terkini, dan dukungan penuh dari pengajar profesional. Siapkan diri Anda untuk kesuksesan akademik, karir, atau petualangan global!') }}
      </p>
      <a href="{{ route('our-program') }}">
        <x-button size='lg' type="button" class="bg-blue-600 text-white hover:bg-blue-600 rounded-full px-8 py-6">
          <x-lucide-wand-sparkles class="mr-2 size-4" /> {{ __('Lihat Kursus') }}
        </x-button>
      </a>
    </div>
  </article>
  <article class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 w-full my-8 mt-12">
    @forelse ($programs as $program)
      <a href="{{ route('program.detail', ['slug' => $program->slug]) }}"
        class="hover:-translate-y-2 transition-all cursor-pointer will-change-transform"
        wire:key={{ $program->program_id }}>
        <x-card class="shadow-md">
          <x-card.header class="pb-4">
            <img class="w-full h-[210px] object-cover object-center rounded-xl"
              src="{{ $program->image ? (Str::startsWith($program->image, 'http') ? $program->image : asset('storage/' . Str::replaceLast('.png', '.webp', $program->image))) : asset('images/default.webp') }}"
              alt="{{ $program->name }}" loading="lazy"
              srcset="
                {{ $program->image ? (Str::startsWith($program->image, 'http') ? $program->image : asset('storage/' . Str::replaceLast('.png', '-small.webp', $program->image))) : asset('images/default-small.webp') }} 480w,
                {{ $program->image ? (Str::startsWith($program->image, 'http') ? $program->image : asset('storage/' . Str::replaceLast('.png', '-medium.webp', $program->image))) : asset('images/default-medium.webp') }} 768w,
                {{ $program->image ? (Str::startsWith($program->image, 'http') ? $program->image : asset('storage/' . Str::replaceLast('.png', '-large.webp', $program->image))) : asset('images/default-large.webp') }} 1024w
              "
              sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" />
            <x-typography.h1 class="pt-4 px-6 text-xl">
              {{ $program->name }}
            </x-typography.h1>
          </x-card.header>
          <x-card.content>
            <x-typography.p class="text-slate-600">
              {{ Str::limit($program->short_description, 150, '...') }}
            </x-typography.p>
          </x-card.content>
          <x-card.footer class="flex justify-between">
            <div class="flex items-center">
              <div class="flex items-center gap-1">
                <svg class="size-4 fill-yellow-300" viewBox="0 0 14 13" fill="none"
                  xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path
                    d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                </svg>
                <span class="font-bold"> {{ $program->rate }}</span>
              </div>
            </div>
            <x-button size='lg'
              class="border border-blue-600 hover:bg-blue-700  bg-blue-600 text-white px-6 py-5 rounded-full">
              {{ __('Detail') }} <x-lucide-square-arrow-right class="ml-2 size-4" />
            </x-button>
          </x-card.footer>
        </x-card>
      </a>
    @empty
      @livewire('partials.empty-state', [
          'title' => 'Programs in development',
          'message' => 'New educational programs launching this fall',
          'iconType' => 'animation',
          'customIcon' => 'assets/empty-state-animation/growth.gif',
      ])
    @endforelse
  </article>
</section>
