<div>
  @php
    $isEmptyGrade = $grades->isEmpty();
  @endphp
  @if ($isEmptyGrade)
    <div class="min-h-[80dvh] flex flex-col items-center justify-center gap-4">
      <img src="{{ asset('storage/assets/vectors/undraw_notebook_8ihb.png') }}"
        class="object-cover aspect-video w-6/12 mx-auto" alt="grade-ilustration">
      <p class="font-bold text-center">Belum ada postingan untuk nilai!</p>
    </div>
  @else
    <!-- Filter Section -->
    <section class="mb-4">
      <div class="flex flex-col md:flex-row justify-between gap-4">
        <div class="w-full md:w-1/3">
          <x-input class="py-3" label="Cari" placeholder="Nama student atau program"
            wire:model.live.debounce.300ms="search" class="py-2" />
        </div>
        <div class="w-full md:w-1/3">
          <x-select label="Program" wire:model.live.debounce.300ms="selectedProgram">
            <option value="">Semua Program</option>
            @foreach ($programs as $id => $name)
              <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
          </x-select>
        </div>
        <div class="w-full md:w-1/3">
          <x-select label="Level" wire:model.live.debounce.300ms="selectedLevel">
            <option value="">Semua Level</option>
            @foreach ($grades->pluck('level_name')->unique() as $level)
              <option value="{{ $level }}">{{ $level }}</option>
            @endforeach
          </x-select>
        </div>
        <div class="w-full md:w-1/3">
          <x-input label="Nama Student" placeholder="Nama student" wire:model.live.debounce.300ms="selectedStudent"
            class="py-2" />
        </div>
      </div>
    </section>
    <section class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
      @foreach ($grades as $key => $grade)
        <x-card class="w-full m-2 cursor-pointer" wire:key="card-{{ $grade->id }}">
          <x-card.header class="flex-row justify-between p-6 pb-4">
            <x-card.title class="text-lg">Level {{ $grade->level_name }}</x-card.title>
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
            <p class="font-medium text-sm">{{ $grade->registration->student_name }}</p>
            <p class="font-medium text-sm">{{ $grade->registration->program->name }}</p>
            <x-progress-bar title="Reading" grade="{{ $grade->reading_grade }}" />
            <x-progress-bar title="Speaking" grade="{{ $grade->speaking_grade }}" />
            <x-progress-bar title="Listening" grade="{{ $grade->listening_grade }}" />
            {{-- <x-progress-bar title="Grammar" grade="90" /> --}}
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

    <!-- Pagination -->
    <div class="mt-8">
      {{ $grades->links() }}
    </div>

    <!-- Tabs Section -->
    <section class="mt-20">
      <x-tabs :defaultValue="$grades->first()->level_name ?? 'Level 1'" class="w-full">
        <x-tabs.List>
          @foreach ($grades->pluck('level_name')->unique() as $level)
            <x-tabs.trigger value="{{ $level }}"
              wire:key="tab-trigger-{{ $level }}">{{ $level }}</x-tabs.trigger>
          @endforeach
        </x-tabs.List>
        @foreach ($grades->pluck('level_name')->unique() as $level)
          <x-tabs.content value="{{ $level }}" wire:key="tab-content-{{ $level }}">
            <div>
              <x-typography.p class="font-semibold leading-none tracking-tight text-xl">
                Performance Insight
              </x-typography.p>
              <div class="w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                @foreach ($grades->where('level_name', $level) as $grade)
                  <div class="bg-white p-6 pb-4 shadow-md">
                    <div class="flex flex-col gap-2 mb-4">
                      <p class="font-bold">Nama Student: {{ $grade->registration->student_name }}</p>
                      <p class="font-medium">Program Kursus: {{ $grade->registration->program->name }}</p>
                    </div>
                    <div class="bg-[#ECFDF5] p-4">
                      <x-lucide-trending-up class="mt-6 size-8 text-[#059669]" />
                      <x-typography.p class="font-semibold leading-none tracking-tight">
                        Strong Areas
                      </x-typography.p>
                      <x-typography.p class="">
                        {{ $grade->strong_area }}
                      </x-typography.p>
                    </div>
                    <div class="bg-[#FFF7ED] p-4">
                      <x-lucide-refresh-cw class="mt-6 size-8 text-[#EA580C]" />
                      <x-typography.p class="font-semibold leading-none tracking-tight">
                        Improvement Area
                      </x-typography.p>
                      <x-typography.p class="">
                        {{ $grade->improvement_area }}
                      </x-typography.p>
                    </div>
                    <div class="bg-[#EFF6FF] p-4">
                      <x-lucide-lightbulb class="mt-6 size-8 text-[#2563EB]" />
                      <x-typography.p class="font-semibold leading-none tracking-tight">
                        Weak Area
                      </x-typography.p>
                      <x-typography.p class="">
                        {{ $grade->weak_area }}
                      </x-typography.p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </x-tabs.content>
        @endforeach
      </x-tabs>
    </section>
  @endif
</div>
