@section('js_custom')
  @vite(['resources/js/partials/team-section.js'])
@endsection

<div>
  <section id="teamKami">
    <div class="px-4 py-8 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
      <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
        <div>
          <p
            class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-blue-900 uppercase rounded-full bg-teal-accent-400">
            {{ __('Team IEC Denpasar') }}
          </p>
        </div>
        <h2 class="max-w-lg mb-6  text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl  md:mx-auto">
          <span class="relative inline-block">
            <svg viewBox="0 0 52 24" fill="currentColor"
              class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block"
              aria-hidden="true">
              <defs>
                <pattern id="1d4040f3-9f3e-4ac7-b117-7d4009658ced" x="0" y="0" width=".135" height=".30">
                  <circle cx="1" cy="1" r=".7"></circle>
                </pattern>
              </defs>
              <rect fill="url(#1d4040f3-9f3e-4ac7-b117-7d4009658ced)" width="52" height="24"></rect>
            </svg>
          </span>
          {{ __('Tim dan Mentor Profesional IEC Denpasar') }}
        </h2>
        <p class="text-base text-gray-700 md:text-lg">
          {{ __('Kami bangga memiliki tim profesional yang berdedikasi untuk membantu siswa mencapai tujuan pendidikan mereka.') }}
        </p>
      </div>
      <div class="swiper swiper-team">
        <div
          class="grid lg:gap-10 sm:grid-cols-2 lg:grid-cols-4 {{ $teams->isEmpty() ? 'justify-center' : 'lg:justify-start' }}   swiper-wrapper w-full">
          @php
            $defaultImage =
                'https://images.pexels.com/photos/1587014/pexels-photo-1587014.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500';
          @endphp
          @forelse ($teams as $team)
            <article class="swiper-slide" wire:key={{ $team->team_id }}>
              <figure
                class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl will-change-transform ">
                <img class="object-cover w-full aspect-square md:h-64 xl:h-80"
                  src="{{ $team->image ? (Str::startsWith($team->image, 'http') ? $team->image : asset('storage/' . Str::replaceLast('.png', '.webp', $team->image))) : $defaultImage }}"
                  onerror="this.onerror=null;this.src='{{ $defaultImage }}';"
                  srcset="
                    {{ $team->image ? (Str::startsWith($team->image, 'http') ? $team->image : asset('storage/' . Str::replaceLast('.png', '-small.webp', $team->image))) : asset('images/default-small.webp') }} 480w,
                {{ $team->image ? (Str::startsWith($team->image, 'http') ? $team->image : asset('storage/' . Str::replaceLast('.png', '-medium.webp', $team->image))) : asset('images/default-medium.webp') }} 768w,
                {{ $team->image ? (Str::startsWith($team->image, 'http') ? $team->image : asset('storage/' . Str::replaceLast('.png', '-large.webp', $team->image))) : asset('images/default-large.webp') }} 1024w
                  "
                  sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" alt="{{ __($team->name) }}"
                  loading="lazy" />
                <figcaption
                  class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
                  <p class="mb-1 text-lg font-bold text-gray-100">{{ $team->name }}</p>
                  <p class="mb-4 text-xs text-gray-100">{{ $team->mentor_class }}</p>
                  <p class="mb-4 text-xs tracking-wide text-gray-400">
                    {{ __($team->short_description) }}
                  </p>
                  <div class="flex items-center justify-center space-x-3">
                    <a href="{{ $team->linkedin }}"
                      class="text-white transition-colors duration-300 hover:text-teal-accent-400"
                      aria-label="{{ __('LinkedIn Profile of ' . $team->name) }}">
                      <svg viewBox="0 0 24 24" fill="currentColor" class="h-5" aria-hidden="true">
                        <path
                          d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                        </path>
                      </svg>
                    </a>
                    <a href="{{ $team->facebook }}"
                      class="text-white transition-colors duration-300 hover:text-teal-accent-400"
                      aria-label="{{ __('Facebook Profile of ' . $team->name) }}">
                      <svg viewBox="0 0 24 24" fill="currentColor" class="h-5" aria-hidden="true">
                        <path
                          d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                        </path>
                      </svg>
                    </a>
                  </div>
                </figcaption>
              </figure>
            </article>
          @empty
            @livewire('partials.empty-state', [
                'title' => 'No Teams posted yet',
                'message' => 'New educational programs launching this fall',
                'iconType' => 'animation',
                'customIcon' => 'assets/empty-state-animation/group.gif',
            ])
          @endforelse
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-team mt-8"></div>
      </div>
    </div>
  </section>

  <section class="py-24 bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center flex-col lg:flex-row md:mt-20">
        <div class="w-full lg:w-1/2">
          <h2
            class="text-3xl md:text-4xl xl:text-5xl text-gray-900 font-bold leading-none lg:leading-8 mb-7 text-center lg:text-left">
            Bergabung dengan Tim IEC Denpasar</h2>
          <p class="text-lg text-gray-500 mb-16 text-center lg:text-left"> Kami membuka kesempatan bagi para profesional
            pendidikan dan penutur bahasa Inggris yang ingin
            berkontribusi dalam meningkatkan kualitas pembelajaran bahasa di Bali. Jadilah bagian dari
            lembaga kursus terdepan yang telah dipercaya ribuan peserta!</p>
          <a id="whatsapp-link">
            <button
              class="cursor-pointer py-3 px-8 w-60 bg-blue-600 text-white text-base font-semibold transition-all duration-500 block text-center rounded-full hover:bg-blue-700 mx-auto lg:mx-0">Join
              our team</button>
          </a>

        </div>
        <div class="w-full hidden md:block lg:w-1/2 lg:mt-0 md:mt-40 mt-16 max-lg:max-w-2xl">
          <div class="grid grid-cols-1 min-[450px]:grid-cols-2 md:grid-cols-3 gap-8">
            <img src="https://pagedone.io/asset/uploads/1696238644.png" alt="Team tailwind section" loading="lazy"
              class="bg-gray-200  w-44 h-56 rounded-2xl object-cover md:mt-20 mx-auto min-[450px]:mr-0" />
            <img src="https://pagedone.io/asset/uploads/1696238665.png" alt="Team tailwind section" loading="lazy"
              class="bg-gray-200  w-44 h-56 rounded-2xl object-cover mx-auto min-[450px]:ml-0 md:mx-auto" />
            <img src="https://pagedone.io/asset/uploads/1696238684.png" alt="Team tailwind section" loading="lazy"
              class="bg-gray-200  w-44 h-56 rounded-2xl object-cover md:mt-20 mx-auto min-[450px]:mr-0 md:ml-0" />
            <img src="https://pagedone.io/asset/uploads/1696238702.png" alt="Team tailwind section" loading="lazy"
              class="bg-gray-200  w-44 h-56 rounded-2xl object-cover mx-auto min-[450px]:ml-0 md:mr-0 md:ml-auto" />
            <img src="https://pagedone.io/asset/uploads/1696238720.png" alt="Team tailwind section" loading="lazy"
              class="bg-gray-200  w-44 h-56 rounded-2xl object-cover md:-mt-20 mx-auto min-[450px]:mr-0 md:mx-auto" />
            <img src="https://pagedone.io/asset/uploads/1696238737.png" alt="Team tailwind section" loading="lazy"
              class="bg-gray-200  w-44 h-56 rounded-2xl object-cover mx-auto min-[450px]:ml-0 md:mr-0" />

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
