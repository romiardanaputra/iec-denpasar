<div x-data="{ show: {{ $schedules && $schedules->count() > 0 ? 'true' : 'false' }} }" x-init="$watch('show', value => { if (!value) $wire.$refresh(); })" x-show="show"
  class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 p-4" style="display: none"
  x-transition.opacity>
  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-md p-6 transition-colors duration-200 relative"
    x-bind:class="$store.theme.mode === 'dark' ? 'bg-gray-800 text-white' : 'bg-white text-gray-900'">
    <!-- Tombol Close -->
    <button type="button" x-on:click="show = false"
      class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white text-xl font-bold">
      &times;
    </button>

    <h2 class="text-xl font-bold mb-4" :class="$store.theme.mode === 'dark' ? 'text-white' : 'text-gray-900'">
      Jadwal Kelas Penuh
    </h2>

    @if (count($schedules) > 0)
      <ul class="space-y-2 mb-4">
        @foreach ($schedules as $schedule)
          <li class="border-b pb-2 border-gray-300 dark:border-gray-600">
            <strong class="block"
              :class="$store.theme.mode === 'dark' ? 'text-gray-300' : 'text-gray-700'">Program:</strong>
            <span x-text="'{{ $schedule->program->name ?? '-' }}'"
              :class="$store.theme.mode === 'dark' ? 'text-white' : 'text-gray-900'"></span>

            <strong class="block mt-1"
              :class="$store.theme.mode === 'dark' ? 'text-gray-300' : 'text-gray-700'">Kode:</strong>
            <span x-text="'{{ $schedule->class_code }}'"
              :class="$store.theme.mode === 'dark' ? 'text-white' : 'text-gray-900'"></span>

            <strong class="block mt-1"
              :class="$store.theme.mode === 'dark' ? 'text-gray-300' : 'text-gray-700'">Hari:</strong>
            <span x-text="'{{ optional($schedule->day)->day_name }}'"
              :class="$store.theme.mode === 'dark' ? 'text-white' : 'text-gray-900'"></span>

            <strong class="block mt-1"
              :class="$store.theme.mode === 'dark' ? 'text-gray-300' : 'text-gray-700'">Waktu:</strong>
            <span x-text="'{{ optional($schedule->time)->time_code }}'"
              :class="$store.theme.mode === 'dark' ? 'text-white' : 'text-gray-900'"></span>
          </li>
        @endforeach
      </ul>

      <div class="flex justify-between">
        @foreach ($schedules as $schedule)
          <button wire:click="approve({{ $schedule->class_schedule_id }})" wire:loading.attr="disabled"
            class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded transition">
            ✔ Approve
          </button>
        @endforeach

        <!-- Tombol Abaikan -->
        <button type="button" x-on:click="show = false"
          class="px-4 py-2 bg-gray-400 hover:bg-gray-500 text-white rounded transition">
          ❌ Abaikan
        </button>
      </div>
    @else
      <p :class="$store.theme.mode === 'dark' ? 'text-white' : 'text-gray-900'">Tidak ada jadwal penuh.</p>
    @endif
  </div>
</div>
