<x-guest-layout>
  {{-- Nothing in the world is as soft and yielding as water. --}}
  <section class="max-w-screen-xl mx-auto">
    <div class="h-[30rem] grid lg:grid-cols-4 gap-4">
      <div class="w-full grid lg:grid-cols-1 lg:col-span-2">
        <img src="{{ asset('storage/assets/user/images/about/iec-dps.jpg') }}" alt="iec-dps"
          class="size-full object-cover rounded-lg">
      </div>
      <div class="w-full grid lg:grid-rows-2 gap-4">
        <div>
          <img src="{{ asset('storage/assets/user/images/about/iec-dps.jpg') }}" alt="iec-dps"
            class="rounded-lg object-cover size-full">
        </div>
        <div>
          <img src="{{ asset('storage/assets/user/images/about/iec-dps.jpg') }}" alt="iec-dps"
            class="rounded-lg object-cover size-full">
        </div>
      </div>
      <div class="w-full grid lg:grid-rows-2 gap-4">
        <div>
          <img src="{{ asset('storage/assets/user/images/about/iec-dps.jpg') }}" alt="iec-dps"
            class="rounded-lg object-cover size-full">
        </div>
        <div>
          <img src="{{ asset('storage/assets/user/images/about/iec-dps.jpg') }}" alt="iec-dps"
            class="rounded-lg object-cover size-full">
        </div>
      </div>
    </div>
    {{-- dtail section --}}
    <section class="py-10">
      <div class="grid lg:grid-cols-3 w-full">
        <div class="w-full grid lg:grid-cols-1 lg:col-span-2 gap-4">
          <x-typography.h2>
            The People of the Kingdom
          </x-typography.h2>
          <x-typography.p>
            The king, seeing how much happier his subjects were, realized the error of his ways and repealed the joke
            tax.
          </x-typography.p>
          <x-typography.list>
            <li>1st level of puns: 5 gold coins</li>
            <li>2nd level of jokes: 10 gold coins</li>
            <li>3rd level of one-liners : 20 gold coins</li>
          </x-typography.list>
          <div>
            <x-tabs defaultValue="overview" class="w-[400px]">
              <x-tabs.List>
                <x-tabs.trigger value="overview">Overview</x-tabs.trigger>
                <x-tabs.trigger value="delivery">Delivery</x-tabs.trigger>
                <x-tabs.trigger value="refund">Refund</x-tabs.trigger>
              </x-tabs.List>
              <x-tabs.content value="overview">Make changes to your account here.</x-tabs.content>
              <x-tabs.content value="delivery">Change your password here.</x-tabs.content>
              <x-tabs.content value="refund">Change your password here.</x-tabs.content>
            </x-tabs>
          </div>
        </div>
        <div class="lg:w-full grid lg:grid-cols-1">
          <x-typography.p>
            The king, seeing how much happier his subjects were, realized the error of his ways and repealed the joke
            tax.
          </x-typography.p>
          <div class="flex gap-2">
            @for ($i = 0; $i < 5; $i++)
              <x-lucide-star class="mr-1 size-4 text-yellow-400" />
            @endfor
            <span>Ratings</span>
          </div>
          <div>
            <span>type</span>
            <div class="flex flex-wrap">
              <x-button>Button</x-button>
              <x-button>Button</x-button>
              <x-button>Button</x-button>

            </div>
          </div>
        </div>
      </div>

    </section>
  </section>

</x-guest-layout>
