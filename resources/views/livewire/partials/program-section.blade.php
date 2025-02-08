<section class="container py-16 pt-0 mt-0">
  <article class="space-y-4">
    <p class="font-medium text-blue-800">{{ __('Kursus') }}</p>
    <h1 class="lg:text-4xl font-medium sm:text-inherit leading-tight mb-5 ">{{ __('Program Kami') }}</h1>
    <div class="sm:flex justify-between gap-5">
      <p class="mb-4 sm:w-8/12 text-slate-600">
        {{ __('Tingkatkan potensi Anda dengan kursus bahasa Inggris kami, dirancang untuk semua level. Apapun tujuan Anda, kami siap membantu. Bergabunglah sekarang!') }}
      </p>
      <a href="#">
        <x-button size='lg' class="bg-blue-800 text-white hover:bg-blue-800 rounded-full px-8 py-6">
          <x-lucide-eye class="mr-2 size-4" /> {{ __('Lihat Semua Kursus') }}
        </x-button>
      </a>
    </div>
  </article>
  <article class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 w-full my-8 mt-12 ">
    @forelse ($programs as $program)
      <a href="{{ route('program.detail', ['slug' => $program->slug]) }}" wire:navigate>
        <x-card class="min-w-[300px] hover:-translate-y-2 transition-all cursor-pointer will-change-transform">
          <x-card.header class="pb-4">
            <img class="w-100 h-[210px] object-cover object-center rounded-xl"
              src="{{ asset('storage/' . $program->image) }}" alt="course-image">
            <x-typography.h4 class="pt-4 px-6">
              {{ $program->name }}
            </x-typography.h4>
          </x-card.header>
          <x-card.content>
            <x-typography.p class="text-slate-600">
              {{ Str::limit($program->short_description, 70, '...') }}
            </x-typography.p>
          </x-card.content>
          <x-card.footer class="flex justify-between ">
            <div class="flex items-center">
              <div class="flex items-center gap-1">
                @for ($i = 0; $i < $program->rate; $i++)
                  <svg class="w-3.5 h-3.5 fill-blue-600" viewBox="0 0 14 13" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                  </svg>
                @endfor
              </div>
            </div>
            <x-button size='lg'
              class="border border-blue-800 hover:bg-blue-800 hover:text-white bg-white text-blue-800 px-6 py-5 rounded-full">
              {{ __('Detail') }}
            </x-button>
          </x-card.footer>
        </x-card>
      </a>

    @empty
      <div>No data found</div>
    @endforelse

  </article>
</section>
