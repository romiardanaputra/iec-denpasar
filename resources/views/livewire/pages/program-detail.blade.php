<section class="max-w-screen-xl mx-auto mt-12">
  <div class="bg-white dark:bg-gray-800 h-full py-6 sm:py-8 ">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 xl:gap-5">
        @forelse ($program->images->take(4) as $key => $image)
          <a href="#"
            class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80 {{ $key == 1 || $key == 2 ? 'md:col-span-2' : '' }}">
            <img
              src="{{ $image->path ? (Str::startsWith($image->path, 'http') ? $image->path : asset('storage/' . $image->path)) : asset('images/default.png') }}"
              loading="lazy" alt="{{ $program->name . '-' . $key }}"
              class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
            <div
              class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
            </div>
            <span
              class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $program->name }}</span>
          </a>
        @empty
          <p class="text-center text-red-500">Tidak ada gambar yang dimasukkan</p>
        @endforelse
      </div>
    </div>
  </div>
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="grid lg:grid-cols-3 w-full gap-12">
      <div class="w-full grid lg:grid-cols-1 lg:col-span-2 gap-2">
        <x-typography.h2>
          {{ __($program->name) }}
        </x-typography.h2>
        <x-typography.p class="text-pretty">
          {{ __($program->short_description) }}
        </x-typography.p>
        <x-typography.list>
          @forelse ($program->detail->benefits as $benefit)
            <li class="text-gray-600 font-[lato]">{{ __($benefit['item']) }}</li>
          @empty
            <li>{{ __('tidak ada manfaat list yang dimasukkan') }}</li>
          @endforelse

        </x-typography.list>
      </div>
      <div class="lg:w-full flex flex-col gap-4 space-y-2
       ">
        <span class="font-bold text-2xl">Rp. {{ number_format($program->price, 0, ',', '.') }}</span>
        <div class="flex gap-1 items-center">
          <svg class="size-4 fill-yellow-400" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
          </svg>
          <span>{{ $program->rate }} Stars</span>
        </div>
        <div class="flex justify-between gap-4">
          <span class="font-medium">Level Kursus</span>
          <div class="flex flex-wrap">
            <p class="font-bold text-blue-600">{{ $program->detail->level }}</p>
          </div>
        </div>
        <div class="flex w-full">
          @guest
            <div class="flex justify-center items-center mt-8">
              <button wire:click="redirectToBill"
                class="relative flex items-center justify-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-full shadow-lg transform hover:scale-105 transition-transform duration-200">
                <span class="absolute inset-0 rounded-full bg-blue-500 opacity-20 animate-ping"></span>
                <span class="relative z-10">Daftar kursus sekarang!</span>
              </button>
            </div>
          @endguest
          @auth
            <div class="block" id="registransForm">
              @livewire('partials.program.registrans-form', ['program' => $program])
            </div>
          @endauth
        </div>
      </div>
    </div>
  </div>

  <div class=" mx-auto max-w-screen-2xl px-4 mt-12 lg:mt-0 md:px-8">
    <x-tabs defaultValue="schedule" class="w-full z-50">
      <x-tabs.list class="w-full">
        <x-tabs.trigger value="schedule" class="text-base font-bold">Jadwal less</x-tabs.trigger>
        <x-tabs.trigger value="overview" class="text-base font-bold">Informasi Umum</x-tabs.trigger>
      </x-tabs.list>
      <x-tabs.content value="schedule" class="max-w-[480px] sm:max-w-screen-sm lg:max-w-screen-xl overflow-x-auto">
        @livewire('partials.program.schedule-table', ['program' => $program])
      </x-tabs.content>
      <x-tabs.content class="text-justify leading-7" value="overview">{!! __($program->detail->long_description) !!}
      </x-tabs.content>
    </x-tabs>
  </div>
</section>

@section('js_custom')
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
  </script>
  <script type="module" src="{{ asset('midtrans/index.js') }}" defer></script>
@endsection
