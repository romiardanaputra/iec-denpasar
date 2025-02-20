<div>
  <section class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    @foreach ($grades as $key => $grade)
      <x-card class="w-full m-2 cursor-pointer" wire:key="{{ $grade->id }}">
        <x-card.header class="flex-row justify-between p-6 pb-4">
          <x-card.title class="text-lg"> {{ $grade->level_name }}</x-card.title>

          @if ($grade->average_grade >= 85)
            <div class="flex gap-4">
              <x-badge class="bg-blue-600">Excellent</x-badge>
              <x-lucide-sparkles class="size-6 text-blue-600" />
            </div>
          @elseif($grade->average_grade >= 40 && $grade->average_grade < 85)
            <x-badge class="bg-green-600">Good Job</x-badge>
          @elseif($grade->average_grade < 40)
            <x-badge class="bg-orange-600">Need Improvement</x-badge>
          @else
            <x-badge class="bg-gray-400">No Badge</x-badge>
          @endif

        </x-card.header>
        <x-card.content class="space-y-4 pt-6">
          <p class="font-medium text-sm">{{ $grade->registration->program->name }}</p>
          <x-progress-bar title="Reading" grade="{{ $grade->reading_grade }}" />
          <x-progress-bar title="Speaking" grade="{{ $grade->speaking_grade }}" />
          <x-progress-bar title=  "Writting" grade= "{{ $grade->writting_grade }}" />
          <x-progress-bar title="Grammar" grade="90" />
        </x-card.content>
        <x-card.footer class="justify-between gap-4">
          <p class="font-medium">Average total</p>
          @if ($grade->average_grade >= 85)
            <p class="font-bold text-green-600">{{ $grade->average_grade }}%</p>
          @elseif($grade->average_grade < 84.99 && $grade->average_grade > 40)
            <p class="font-bold text-orange-400">{{ $grade->average_grade }}%</p>
          @elseif($grade->average_grade <= 40)
            <p class="font-bold text-red-600">{{ $grade->average_grade }}%</p>
          @endif
        </x-card.footer>
      </x-card>
    @endforeach
  </section>

  <section class="mt-20">

    <x-tabs defaultValue="Level 1" class="w-full">
      <x-tabs.List>
        @foreach ($grades as $grade)
          <x-tabs.trigger value="{{ $grade->level_name }}"
            wire:key="{{ $grade->id }}">{{ $grade->level_name }}</x-tabs.trigger>
        @endforeach
      </x-tabs.List>
      @foreach ($grades as $grade)
        <x-tabs.content value="{{ $grade->level_name }}">
          <div>
            <x-typography.p class="font-semibold leading-none tracking-tight text-xl">
              Performance Insight ({{ $grade->registration->program->name }})
            </x-typography.p>
            <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
              <x-card class="mt-4 bg-[#ECFDF5]">
                <x-card.content>
                  <x-lucide-trending-up class="mt-6 size-8 text-[#059669]" />
                  <x-typography.p class="font-semibold leading-none tracking-tight">
                    Strong areas
                  </x-typography.p>
                  <x-typography.p class="">
                    {{ $grade->strong_area }}
                  </x-typography.p>
                </x-card.content>
              </x-card>
              <x-card class=" bg-[#FFF7ED]">
                <x-card.content>
                  <x-lucide-refresh-cw class="mt-6 size-8 text-[#EA580C]" />
                  <x-typography.p class="font-semibold leading-none tracking-tight">
                    Improvement Area
                  </x-typography.p>
                  <x-typography.p class="">
                    {{ $grade->improvement_area }}
                  </x-typography.p>
                </x-card.content>
              </x-card>
              <x-card class=" bg-[#EFF6FF]">
                <x-card.content>
                  <x-lucide-lightbulb class="mt-6 size-8 text-[#2563EB]" />
                  <x-typography.p class="font-semibold leading-none tracking-tight">
                    Weak area
                  </x-typography.p>
                  <x-typography.p class="">
                    {{ $grade->weak_area }}
                  </x-typography.p>
                </x-card.content>
              </x-card>
            </div>
          </div>
        </x-tabs.content>
      @endforeach

    </x-tabs>

  </section>

</div>
