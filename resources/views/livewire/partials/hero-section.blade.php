<section class="py-16">
  <div class="bg-cover bg-blue-800/60 bg-blend-multiply p-20 h-96 flex items-center justify-center"
    style="background-image: url('{{ asset('storage/assets/images/about/iec-dps.jpg') }}');">
    <div class="space-y-4">
      <div class="space-y-2 flex flex-col items-center">
        <x-breadcrumb>
          <x-breadcrumb.list>
            <x-breadcrumb.item>
              <x-breadcrumb.link class="text-slate-300" href="{{ route($routeName) }}"
                wire:navigate>{{ __('Beranda') }}</x-breadcrumb.link>
            </x-breadcrumb.item>
            <x-breadcrumb.separator class="text-slate-300" />
            <x-breadcrumb.item>
              <x-breadcrumb.page class="text-white">{{ __($breadcrumb) }}</x-breadcrumb.page>
            </x-breadcrumb.item>
          </x-breadcrumb.list>
        </x-breadcrumb>
        <h3 class="font-bold text-slate-300 text-5xl pt-6 text-center sm:text-left">{{ __($title) }}</h3>
      </div>
    </div>
  </div>
</section>
