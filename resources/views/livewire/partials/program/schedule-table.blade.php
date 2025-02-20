<div class="font-[sans-serif] overflow-x-auto">
  <div class="flex w-full max-w-sm items-center space-x-2">
    <x-input type="text" placeholder="cari jadwal.." wire:model.live="search" />
  </div>
  <table class="min-w-full bg-white ">
    <thead class="bg-gray-800 whitespace-nowrap">
      <tr>
        <th class="p-4 text-left text-sm font-medium text-white">
          No
        </th>
        <th class="p-4 text-left text-sm font-medium text-white">
          Nama Program
        </th>
        <th class="p-4 text-left text-sm font-medium text-white">
          Buku
        </th>
        <th class="p-4 text-left text-sm font-medium text-white">
          Hari
        </th>
        <th class="p-4 text-left text-sm font-medium text-white">
          Jam Mulai
        </th>
        <th class="p-4 text-left text-sm font-medium text-white">
          Jam Selesai
        </th>
        <th class="p-4 text-left text-sm font-medium text-white">
          Kode Kelas
        </th>
        <th class="p-4 text-left text-sm font-medium text-white">
          Actions
        </th>
      </tr>
    </thead>

    <tbody class="whitespace-nowrap">
      @foreach ($classes as $key => $class)
        <tr class="even:bg-blue-50" wire:key={{ $key }}>
          <td class="p-4 text-sm text-black">
            {{ ++$key }}
          </td>
          <td class="p-4 text-sm text-black">
            {{ $class->program->name }}
          </td>
          <td class="p-4 text-sm text-black">
            {{ $class->book->book_name }}
          </td>
          <td class="p-4 text-sm text-black">
            {{ $class->day->day_name }}
          </td>
          <td class="p-4 text-sm text-black">
            {{ $class->time->time_start }}
          </td>
          <td class="p-4 text-sm text-black">
            {{ $class->time->time_end }}
          </td>
          <td class="p-4 text-sm text-black">
            {{ $class->class_code }}
          </td>
          <td class="p-4 z-50">
            <x-dialog>
              <x-dialog.trigger>Lihat Detail</x-dialog.trigger>
              <x-dialog.content class="sm:max-w-md">
                <div class="grid gap-4 py-4">
                  <x-dialog.header>
                    <x-dialog.title>
                      Informasi Detail Kelas
                    </x-dialog.title>
                    <x-dialog.description>
                      Berikut merupakan informasi <br> detail kelas {{ $class->program->name }}
                      ({{ $class->class_code }})
                    </x-dialog.description>
                  </x-dialog.header>
                  <form id="detail_info_class">
                    <div class="grid grid-cols-4 items-center gap-4">
                      <x-label htmlFor="program_name" class="text-right">
                        Nama Program
                      </x-label>
                      <x-input id="program_name" value="{{ $class->program->name }}" class="col-span-3" readonly />
                    </div>
                    <div class="grid grid-cols-4 items-center gap-4">
                      <x-label htmlFor="book_name_display" class="text-right">
                        Buku
                      </x-label>
                      <x-input id="book_name_display" value="{{ $class->book->book_name }}" class="col-span-3"
                        readonly />
                    </div>
                    <div class="grid grid-cols-4 items-center gap-4">
                      <x-label htmlFor="day_name" class="text-right">
                        Jadwal Hari
                      </x-label>
                      <x-input id="day_name" value="{{ $class->day->day_name }}" class="col-span-3" readonly />
                    </div>
                    <div class="grid grid-cols-4 items-center gap-4">
                      <x-label htmlFor="time_schedule" class="text-right">
                        Jadwal Jam
                      </x-label>
                      <x-input id="time_schedule"
                        value="{{ $class->time->time_start . ' s/d ' . $class->time->time_end }}" class="col-span-3"
                        readonly />
                    </div>
                    <div class="grid grid-cols-4 items-center gap-4">
                      <x-label htmlFor="class_mentor" class="text-right">
                        Mentor Kelas
                      </x-label>
                      <x-input id="class_mentor" value="{{ 'MR. Wi' }}" class="col-span-3" readonly />
                    </div>
                    <div class="grid grid-cols-4 items-center gap-4">
                      <x-label htmlFor="class_room" class="text-right">
                        Ruangan Kelas
                      </x-label>
                      <x-input id="class_room" value="{{ 'IV (20 orang)' }}" class="col-span-3" readonly />
                    </div>
                  </form>
                  @livewire('partials.share-whatsapp', ['program' => $program, 'class' => $class])
                </div>
              </x-dialog.content>
            </x-dialog>
          </td>
        </tr>
        <tr></tr>
      @endforeach
    </tbody>
  </table>
  <div class="mt-4">
    {{ $classes->appends(['search' => $search])->onEachSide(1)->links() }}
  </div>
</div>
