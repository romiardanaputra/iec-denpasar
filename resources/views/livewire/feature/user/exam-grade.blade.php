<div>
  <section class="flex flex-wrap">
    @for ($i = 1; $i <= 6; $i++)
      <x-card class="lg:w-[30%] m-2">
        <x-card.header class="flex-row justify-between p-6 pb-4">
          <x-card.title class="text-lg">Level {{ $i }}</x-card.title>
          <x-badge>Excelent</x-badge>
        </x-card.header>
        <x-card.content class="space-y-4 pt-6">
          <x-progress-bar title="Reading" grade="80" />
          <x-progress-bar title="Speaking" grade="50" />
          <x-progress-bar title="Writting" grade="70" />
          <x-progress-bar title="Grammar" grade="90" />
        </x-card.content>
        <x-card.footer class="justify-between gap-4">
          <p class="font-medium">Average total</p>
          <p class="font-bold text-green-600">90%</p>
        </x-card.footer>
      </x-card>
    @endfor
  </section>
  <section class="mt-20">
    <x-typography.p class="font-semibold leading-none tracking-tight text-xl">
      Performance Insight
    </x-typography.p>
    <div class="flex gap-4 flex-wrap">
      <x-card class="my-4 w-[31%] bg-[#ECFDF5]">
        <x-card.content>
          <x-lucide-trending-up class="mt-6 size-8 text-[#059669]" />
          <x-typography.p class="font-semibold leading-none tracking-tight">
            Strong areas
          </x-typography.p>
          <x-typography.p class="">
            Excellence in Reading comprehension and Grammar fundamentals.
          </x-typography.p>
        </x-card.content>
      </x-card>
      <x-card class="my-4 w-[31%] bg-[#FFF7ED]">
        <x-card.content>
          <x-lucide-refresh-cw class="mt-6 size-8 text-[#EA580C]" />
          <x-typography.p class="font-semibold leading-none tracking-tight">
            Strong areas
          </x-typography.p>
          <x-typography.p class="">
            Excellence in Reading comprehension and Grammar fundamentals.
          </x-typography.p>
        </x-card.content>
      </x-card>
      <x-card class="my-4 w-[31%] bg-[#EFF6FF]">
        <x-card.content>
          <x-lucide-lightbulb class="mt-6 size-8 text-[#2563EB]" />
          <x-typography.p class="font-semibold leading-none tracking-tight">
            Strong areas
          </x-typography.p>
          <x-typography.p class="">
            Excellence in Reading comprehension and Grammar fundamentals.
          </x-typography.p>
        </x-card.content>
      </x-card>
    </div>
  </section>
</div>
