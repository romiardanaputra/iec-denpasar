<section class="py-16 font-sans">
  <div class="bg-cover bg-blue-800/60 bg-blend-multiply p-20 h-96 flex items-center justify-center"
    style="background-image: url('{{ asset('storage/iec-assets/iec-hero-banner-medium.webp') }}');">
    <div class="space-y-4">
      <div class="space-y-2 flex flex-col items-center sm:items-center">
        <nav aria-label="Breadcrumb" class="text-center sm:text-left">
          <ol class="flex items-center space-x-2">
            <li>
              <a href="{{ route($routeName) }}" wire:navigate class="text-slate-300 hover:text-white">
                {{ __('Beranda') }}
              </a>
            </li>
            <li>
              <span class="text-slate-300">/</span>
            </li>
            <li>
              <span class="text-white">{{ __($breadcrumb) }}</span>
            </li>
          </ol>
        </nav>
        <h3 class="font-bold text-slate-300 text-5xl pt-6 text-center sm:text-left">
          {{ __($title) }}
        </h3>
      </div>
    </div>
  </div>
</section>
