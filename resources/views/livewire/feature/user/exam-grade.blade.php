<div>
  @php
    $isEmptyGrade = $grades->isEmpty();
  @endphp
  @if ($isEmptyGrade)
    <section class="mb-4">
      <div class="flex flex-col md:flex-row gap-4">
        <div class="relative w-full max-w-sm">
          <input id="searchStudentProgram" wire:model.live.debounce.300ms="search"
            class="h-12 border border-gray-300 text-gray-900 pl-11 pr-16 text-base font-normal leading-7 rounded-full block w-full py-2.5 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50"
            placeholder="Search student or program..." />
          <button
            class="absolute top-1/2 -translate-y-1/2 right-4 z-40 bg-blue-600 text-white rounded-full h-8 w-8 flex items-center justify-center hover:bg-blue-700 transition-all duration-200 focus:outline-none">
            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M9.5 4C12.533 4 15 6.467 15 9.5C15 12.533 12.533 15 9.5 15C6.467 15 4 12.533 4 9.5C4 6.467 6.467 4 9.5 4ZM15.5 15.5L19 19"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
          </button>
        </div>
        <div class="relative w-full max-w-sm">
          <svg class="absolute top-1/2 -translate-y-1/2 left-4 z-40" width="20" height="20" viewBox="0 0 20 20"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M16.5555 3.33203H3.44463C2.46273 3.33203 1.66675 4.12802 1.66675 5.10991C1.66675 5.56785 1.84345 6.00813 2.16004 6.33901L6.83697 11.2271C6.97021 11.3664 7.03684 11.436 7.0974 11.5068C7.57207 12.062 7.85127 12.7576 7.89207 13.4869C7.89728 13.5799 7.89728 13.6763 7.89728 13.869V16.251C7.89728 17.6854 9.30176 18.6988 10.663 18.2466C11.5227 17.961 12.1029 17.157 12.1029 16.251V14.2772C12.1029 13.6825 12.1029 13.3852 12.1523 13.1015C12.2323 12.6415 12.4081 12.2035 12.6683 11.8158C12.8287 11.5767 13.0342 11.3619 13.4454 10.9322L17.8401 6.33901C18.1567 6.00813 18.3334 5.56785 18.3334 5.10991C18.3334 4.12802 17.5374 3.33203 16.5555 3.33203Z"
              stroke="black" stroke-width="1.6" stroke-linecap="round" />
          </svg>
          <select id="sortGradeProgram" wire:model.live.debounce.300ms="selectedProgram"
            class="h-12 border border-gray-300 text-gray-900 pl-11 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50">
            <option selected>Sort by all program</option>
            @foreach ($programs as $program)
              <option wire:key="{{ $program->program_id }}" value="{{ $program->program_id }}">{{ $program->name }}
              </option>
            @endforeach
          </select>
          <svg class="absolute top-1/2 -translate-y-1/2 right-4 z-40" width="16" height="16" viewBox="0 0 16 16"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
              stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>

        <div class="relative w-full max-w-sm">
          <svg class="absolute top-1/2 -translate-y-1/2 left-4 z-40" width="20" height="20" viewBox="0 0 20 20"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M16.5555 3.33203H3.44463C2.46273 3.33203 1.66675 4.12802 1.66675 5.10991C1.66675 5.56785 1.84345 6.00813 2.16004 6.33901L6.83697 11.2271C6.97021 11.3664 7.03684 11.436 7.0974 11.5068C7.57207 12.062 7.85127 12.7576 7.89207 13.4869C7.89728 13.5799 7.89728 13.6763 7.89728 13.869V16.251C7.89728 17.6854 9.30176 18.6988 10.663 18.2466C11.5227 17.961 12.1029 17.157 12.1029 16.251V14.2772C12.1029 13.6825 12.1029 13.3852 12.1523 13.1015C12.2323 12.6415 12.4081 12.2035 12.6683 11.8158C12.8287 11.5767 13.0342 11.3619 13.4454 10.9322L17.8401 6.33901C18.1567 6.00813 18.3334 5.56785 18.3334 5.10991C18.3334 4.12802 17.5374 3.33203 16.5555 3.33203Z"
              stroke="black" stroke-width="1.6" stroke-linecap="round" />
          </svg>
          <select id="sortGradeLevel" wire:model.live.debounce.300ms="selectedLevel"
            class="h-12 border border-gray-300 text-gray-900 pl-11 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50">
            <option selected>Sort by all level</option>
            @foreach ($grades->pluck('level_name')->unique() as $level)
              <option value="{{ $level }}">{{ $level }}</option>
            @endforeach
          </select>
          <svg class="absolute top-1/2 -translate-y-1/2 right-4 z-40" width="16" height="16" viewBox="0 0 16 16"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
              stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
    </section>
    <div class="min-h-[80dvh] flex flex-col items-center justify-center gap-4">
      <img src="{{ asset('storage/assets/vectors/undraw_notebook_8ihb.png') }}"
        class="object-cover aspect-video w-6/12 mx-auto" alt="grade-ilustration">
      <p class="font-bold text-center">Belum ada postingan untuk nilai!</p>
    </div>
    <!-- Filter Section -->
  @else
    <section class="mb-4">
      <div class="flex flex-col md:flex-row gap-4">
        <div class="relative w-full max-w-sm">
          <input id="searchStudentProgram" wire:model.live.debounce.300ms="search"
            class="h-12 border border-gray-300 text-gray-900 pl-11 pr-16 text-base font-normal leading-7 rounded-full block w-full py-2.5 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50"
            placeholder="Search student or program..." />
          <button
            class="absolute top-1/2 -translate-y-1/2 right-4 z-40 bg-blue-600 text-white rounded-full h-8 w-8 flex items-center justify-center hover:bg-blue-700 transition-all duration-200 focus:outline-none">
            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M9.5 4C12.533 4 15 6.467 15 9.5C15 12.533 12.533 15 9.5 15C6.467 15 4 12.533 4 9.5C4 6.467 6.467 4 9.5 4ZM15.5 15.5L19 19"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
          </button>
        </div>
        <div class="relative w-full max-w-sm">
          <svg class="absolute top-1/2 -translate-y-1/2 left-4 z-40" width="20" height="20" viewBox="0 0 20 20"
            fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M16.5555 3.33203H3.44463C2.46273 3.33203 1.66675 4.12802 1.66675 5.10991C1.66675 5.56785 1.84345 6.00813 2.16004 6.33901L6.83697 11.2271C6.97021 11.3664 7.03684 11.436 7.0974 11.5068C7.57207 12.062 7.85127 12.7576 7.89207 13.4869C7.89728 13.5799 7.89728 13.6763 7.89728 13.869V16.251C7.89728 17.6854 9.30176 18.6988 10.663 18.2466C11.5227 17.961 12.1029 17.157 12.1029 16.251V14.2772C12.1029 13.6825 12.1029 13.3852 12.1523 13.1015C12.2323 12.6415 12.4081 12.2035 12.6683 11.8158C12.8287 11.5767 13.0342 11.3619 13.4454 10.9322L17.8401 6.33901C18.1567 6.00813 18.3334 5.56785 18.3334 5.10991C18.3334 4.12802 17.5374 3.33203 16.5555 3.33203Z"
              stroke="black" stroke-width="1.6" stroke-linecap="round" />
          </svg>
          <select id="sortGradeProgram" wire:model.live.debounce.300ms="selectedProgram"
            class="h-12 border border-gray-300 text-gray-900 pl-11 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50">
            <option selected>Sort by all program</option>
            @foreach ($programs as $program)
              <option wire:key="{{ $program->program_id }}" value="{{ $program->program_id }}">{{ $program->name }}
              </option>
            @endforeach
          </select>
          <svg class="absolute top-1/2 -translate-y-1/2 right-4 z-40" width="16" height="16"
            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
              stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>

        <div class="relative w-full max-w-sm">
          <svg class="absolute top-1/2 -translate-y-1/2 left-4 z-40" width="20" height="20"
            viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M16.5555 3.33203H3.44463C2.46273 3.33203 1.66675 4.12802 1.66675 5.10991C1.66675 5.56785 1.84345 6.00813 2.16004 6.33901L6.83697 11.2271C6.97021 11.3664 7.03684 11.436 7.0974 11.5068C7.57207 12.062 7.85127 12.7576 7.89207 13.4869C7.89728 13.5799 7.89728 13.6763 7.89728 13.869V16.251C7.89728 17.6854 9.30176 18.6988 10.663 18.2466C11.5227 17.961 12.1029 17.157 12.1029 16.251V14.2772C12.1029 13.6825 12.1029 13.3852 12.1523 13.1015C12.2323 12.6415 12.4081 12.2035 12.6683 11.8158C12.8287 11.5767 13.0342 11.3619 13.4454 10.9322L17.8401 6.33901C18.1567 6.00813 18.3334 5.56785 18.3334 5.10991C18.3334 4.12802 17.5374 3.33203 16.5555 3.33203Z"
              stroke="black" stroke-width="1.6" stroke-linecap="round" />
          </svg>
          <select id="sortGradeLevel" wire:model.live.debounce.300ms="selectedLevel"
            class="h-12 border border-gray-300 text-gray-900 pl-11 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50">
            <option selected>Sort by all level</option>
            @foreach ($grades->pluck('level_name')->unique() as $level)
              <option value="{{ $level }}">{{ $level }}</option>
            @endforeach
          </select>
          <svg class="absolute top-1/2 -translate-y-1/2 right-4 z-40" width="16" height="16"
            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
              stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </div>
      </div>
    </section>

    <section class="w-full grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-4">
      @foreach ($grades as $key => $grade)
        <x-card class="w-full m-2 cursor-pointer border border-solid border-gray-200"
          wire:key="card-{{ $grade->id }}">
          <x-card.header class="flex-row justify-between p-6 pb-4">
            <div class="flex flex-col">
              <x-card.title class="text-lg font-bold">{{ $grade->registration->program->name }} -
                {{ $grade->level_name }}</x-card.title>
              <small class="font-bold">{{ $grade->registration->student_name }}</small>
            </div>
            @if ($grade->average_grade >= 85)
              <div class="flex gap-4">
                <p class="font-bold text-blue-600">Excellent</p>
                <x-lucide-sparkles class="size-6 text-blue-600" />
              </div>
            @elseif($grade->average_grade >= 40 && $grade->average_grade < 85)
              <p class="font-bold text-green-600">Good Job</p>
            @elseif($grade->average_grade < 40)
              <p class="font-bold text-orange-600">Need Improvement</p>
            @else
              <p class="font-bold text-gray-400">No Badge</p>
            @endif
          </x-card.header>
          <x-card.content class="space-y-4 pt-6">
            <x-progress-bar title="Reading" grade="{{ $grade->reading_grade }}" />
            <x-progress-bar title="Speaking" grade="{{ $grade->speaking_grade }}" />
            <x-progress-bar title="Listening" grade="{{ $grade->listening_grade }}" />
            <x-progress-bar title="Writing" grade="{{ $grade->writing_grade }}" />
            {{-- <x-progress-bar title="Grammar" grade="90" /> --}}
          </x-card.content>
          <x-card.footer class="flex-col items-start">
            <div class="flex justify-between gap-4 w-full">
              <p class="font-medium">Average total</p>
              @if ($grade->average_grade >= 85)
                <p class="font-bold text-green-600">{{ $grade->average_grade }}%</p>
              @elseif($grade->average_grade < 84.99 && $grade->average_grade > 40)
                <p class="font-bold text-orange-400">{{ $grade->average_grade }}%</p>
              @elseif($grade->average_grade <= 40)
                <p class="font-bold text-red-600">{{ $grade->average_grade }}%</p>
              @endif
            </div>

            <div class="mt-4">
              <x-dialog>
                <x-dialog.trigger
                  class="rounded-full bg-blue-600 hover:bg-blue-700 hover:text-white">Feedback</x-dialog.trigger>
                <x-dialog.content class="max-w-screen-xl">
                  <div>
                    <x-typography.p class="font-semibold leading-none tracking-tight text-xl">
                      Performance Insight
                    </x-typography.p>
                    <div class="w-full gap-4">
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
                            {!! nl2br($grade->strong_area) !!}
                          </x-typography.p>
                        </div>
                        <div class="bg-[#FFF7ED] p-4">
                          <x-lucide-refresh-cw class="mt-6 size-8 text-[#EA580C]" />
                          <x-typography.p class="font-semibold leading-none tracking-tight">
                            Improvement Area
                          </x-typography.p>
                          <x-typography.p class="">
                            {!! nl2br($grade->improvement_area) !!}
                          </x-typography.p>
                        </div>
                        <div class="bg-[#EFF6FF] p-4">
                          <x-lucide-lightbulb class="mt-6 size-8 text-[#2563EB]" />
                          <x-typography.p class="font-semibold leading-none tracking-tight">
                            Weak Area
                          </x-typography.p>
                          <x-typography.p class="">
                            {!! nl2br($grade->weak_area) !!}
                          </x-typography.p>
                        </div>
                      </div>
                    </div>
                  </div>
                </x-dialog.content>
              </x-dialog>
            </div>
          </x-card.footer>
        </x-card>
      @endforeach
    </section>

    <!-- Pagination -->
    <div class="mt-8">
      {{ $grades->links() }}
    </div>
  @endif
</div>
