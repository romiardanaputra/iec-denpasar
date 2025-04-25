<div>
  <section>
    <div class="mx-auto max-w-7xl">
      <div class="mb-4 p-2 flex md:flex-nowrap flex-wrap gap-4 md:items-center justify-between bg-white rounded-2xl">
        <!-- Search Input -->
        <div class="w-full md:max-w-sm flex items-center gap-2 relative">
          <input name="search" type="text" wire:model="search"
            class="h-10 border border-gray-300 text-gray-900 pl-11 pr-16 text-sm font-normal leading-7 rounded-full block w-full py-2.5 appearance-none relative outline-none bg-white  hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50"
            placeholder="Search by class code">
          <button wire:click="performSearch"
            class="absolute top-1/2 -translate-y-1/2 right-0 z-40 bg-blue-600 text-white rounded-full size-9 flex items-center justify-center hover:bg-blue-700 transition-all duration-200 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
              <path
                d="M17.5 17.5L15.4167 15.4167M15.8333 9.16667C15.8333 5.48477 12.8486 2.5 9.16667 2.5C5.48477 2.5 2.5 5.48477 2.5 9.16667C2.5 12.8486 5.48477 15.8333 9.16667 15.8333C11.0005 15.8333 12.6614 15.0929 13.8667 13.8947C15.0814 12.6872 15.8333 11.0147 15.8333 9.16667Z"
                stroke="#fff" stroke-width="1.6" stroke-linecap="round"></path>
            </svg>
          </button>
        </div>

        <!-- Filters -->
        <div class="flex gap-4 items-center w-full">
          <!-- Filter by Day -->
          <div class="relative flex items-center w-1/2 md:w-[116px] h-8 cursor-pointer">
            <select name="filterDay" wire:model="filterDay"
              class="text-gray-900 py-1.5 pr-1.5 pl-3 cursor-pointer text-xs font-medium leading-5 block w-full rounded-md shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] border border-gray-300 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:bg-gray-50 focus-within:border-gray-300">
              <option value="">Filter by Day</option>
              @foreach ($days as $day)
                <option value="{{ $day->day_name }}">{{ $day->day_name }}</option>
              @endforeach
            </select>
            <svg class="absolute top-1/2 -translate-y-1/2 right-1.5 z-50 ml-1.5" width="16" height="16"
              viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>

          <!-- Filter by Time -->
          <div class="relative flex items-center w-1/2  md:w-[150px] h-8 cursor-pointer">
            <select name="filterTime" wire:model="filterTime"
              class="text-gray-900 py-1.5 cursor-pointer pr-1.5 pl-3 text-xs font-medium leading-5 block w-full rounded-md shadow-[0px_1px_2px_0px_rgba(16,_24,_40,_0.05)] border border-gray-300 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:bg-gray-50 focus-within:border-gray-300">
              <option value="">Filter by Time</option>
              @foreach ($times as $time)
                <option value="{{ $time->time_start }}">{{ $time->time_start }} - {{ $time->time_end }}</option>
              @endforeach
            </select>
            <svg class="absolute top-1/2 -translate-y-1/2 right-1.5 z-50 ml-1.5" width="16" height="16"
              viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>

        </div>
      </div>
    </div>
  </section>
  <div class="flex flex-col overflow-x-auto">
    <div class=" overflow-x-auto pb-4">
      <div class="min-w-full inline-block align-middle">
        <div class="overflow-hidden  border rounded-lg border-gray-300">
          <table class="table-auto min-w-full rounded-xl">
            <thead>
              <tr class="bg-gray-50">
                <th scope="col"
                  class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                  Mentor </th>
                <th scope="col"
                  class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                  Program </th>
                <th scope="col"
                  class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Buku
                </th>

                <th scope="col"
                  class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Hari
                </th>
                <th scope="col"
                  class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                  Jam </th>
                <th scope="col"
                  class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">Kode
                  kelas </th>
                <th scope="col"
                  class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                  Status
                </th>
                <th scope="col"
                  class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                  Actions </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-300 ">
              @forelse ($classes as $key => $class)
                <tr class="bg-white transition-all duration-500 hover:bg-gray-50" wire:key={{ $class->id }}>
                  <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> Ms. Tini</td>
                  <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                    {{ $class->program->name }}
                  </td>
                  <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                    {{ $class->book->book_name }} </td>
                  <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                    {{ $class->day->day_name }}</td>
                  <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                    {{ $class->time->time_start }} - {{ $class->time->time_end }} </td>
                  <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                    {{ $class->class_code }} </td>
                  <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                    <div class="py-1.5 px-2.5 bg-emerald-50 rounded-full flex justify-center w-20 items-center gap-1">
                      <svg width="5" height="6" viewBox="0 0 5 6" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2.5" cy="3" r="2.5" fill="#059669"></circle>
                      </svg>
                      <span class="font-medium text-xs text-emerald-600 ">Active</span>
                    </div>
                  </td>
                  <td class="flex p-5 items-center gap-0.5">
                    <button
                      class="p-2 rounded-full bg-white group transition-all duration-500 hover:bg-blue-600 flex item-center text-sm hover:text-white font-bold">
                      tanya yuk?
                    </button>
                  </td>
                </tr>
              @empty
                <div>jadwal kosong</div>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="mt-4">
      {{ $classes->links() }}
    </div>
  </div>
</div>
