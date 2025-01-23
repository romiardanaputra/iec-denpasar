<div>
  @livewire('partials.navbar')
  <section class="py-16">
    <div class="bg-cover bg-blue-800/60 bg-blend-multiply p-20 h-96 rounded-xl flex items-center justify-center"
      style="background-image: url('{{ asset('storage/assets/user/images/about/iec-dps.jpg') }}');">
      <div class="space-y-4">
        <div class="space-y-2 flex flex-col items-center">
          <x-breadcrumb>
            <x-breadcrumb.list>
              <x-breadcrumb.item>
                <x-breadcrumb.link class="text-slate-300" href="{{ route('landing') }}"
                  wire:navigate>Home</x-breadcrumb.link>
              </x-breadcrumb.item>
              <x-breadcrumb.separator class="text-slate-300" />
              <x-breadcrumb.item>
                <x-breadcrumb.page class="text-white">About</x-breadcrumb.page>
              </x-breadcrumb.item>
            </x-breadcrumb.list>
          </x-breadcrumb>
          <h3 class="font-bold text-slate-300 text-5xl pt-6">See our program!</h3>
        </div>
      </div>
    </div>
  </section>
  <div class="py-16">
    @livewire('partials.program-section')
  </div>
  <section class="bg-white dark:bg-gray-900 pb-20">
    <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-20 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
      <img src="{{ asset('storage/assets/user/images/home/whyus.webp') }}" class="rounded-2xl" alt="cta-image-section">
      <article class="mt-4 md:mt-0">
        <h1 class="mb-4 text-4xl tracking-tight font-medium text-gray-900 dark:text-white">Waiting for what? Let's
          enroll and find your own joy</h1>
        <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">IEC denpasar is more than just English
          course. Educate everyone with our professional mentors</p>
        <a href="#">
          <x-button size='lg' class="bg-blue-800 text-white hover:bg-blue-800 rounded-full px-8 py-6">
            <x-lucide-library class="mr-2 size-4" /> Enroll Now
          </x-button>
        </a>
      </article>
    </div>
  </section>
  @livewire('partials.footer')
</div>
