<footer class="dark:bg-gray-900 mt-20">
  <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
    <div class="md:flex md:justify-between">
      <div class="mb-6 md:mb-0 w-full">
        <a href="{{ route('landing') }}" class="flex items-center">
          <img src="{{ asset('storage/assets/logo/iec-logo.webp') }}" class="h-20 mr-3" alt="IEC Denpasar" loading="lazy"
            srcset="
              {{ asset('storage/assets/logo/iec-logo-small.webp') }} 480w,
              {{ asset('storage/assets/logo/iec-logo-medium.webp') }} 768w,
              {{ asset('storage/assets/logo/iec-logo-large.webp') }} 1024w
            "
            sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" />
        </a>
      </div>
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">{{ __('Program Kami') }}</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
            @forelse ($programs as $program)
              <li class="mb-4">
                <a href="{{ route('program.detail', ['slug' => $program->slug]) }}" class="hover:underline"
                  wire:navigate>
                  {{ __($program->name) }}
                </a>
              </li>
            @empty
              <li>{{ __('Data tidak ditemukan') }}</li>
            @endforelse
          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">{{ __('Navigasi Cepat') }}</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
            @forelse ($quickNavs as $quickNav)
              <li class="mb-4">
                <a href="{{ $quickNav->route }}" class="hover:underline" wire:navigate>
                  {{ __($quickNav->name) }}
                </a>
              </li>
            @empty
              <li>{{ __('Data tidak ditemukan') }}</li>
            @endforelse
          </ul>
        </div>
        <div class="col-span-2 lg:col-span-1">
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">{{ __('Informasi Kontak') }}
          </h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
            @forelse ($contacts as $contact)
              <li class="mb-4">
                <a href="{{ $contact->redirect }}" target="_blank" class="hover:underline">
                  {{ __($contact->name) }}: {{ $contact->value }}
                </a>
              </li>
            @empty
              <li>{{ __('Tidak terdapat data yang ditemukan') }}</li>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">
        © 2025 <a href="{{ route('landing') }}" class="hover:underline">IEC Denpasar</a>. All Rights Reserved.
      </span>
      <div class="flex mt-4 sm:justify-center sm:mt-0">
        <a href="https://www.facebook.com/iec.denpasar/" target="_blank" aria-label="Facebook">
          <x-lucide-facebook class="mr-2 size-4" />
        </a>
        <a href="https://www.instagram.com/iecdenpasar/" target="_blank" aria-label="Instagram">
          <x-lucide-instagram class="size-4" />
        </a>
      </div>
    </div>
  </div>
</footer>
