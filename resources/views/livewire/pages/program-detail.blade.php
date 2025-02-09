<section class="max-w-screen-xl mx-auto mt-20">
  <div class="bg-white dark:bg-gray-800 h-full py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
        @forelse ($program->images as $key => $image)
          <a href="#"
            class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80 {{ $key == 1 || $key == 2 ? 'md:col-span-2' : '' }}">
            <img src="{{ asset('storage/' . $image->path) }}" loading="lazy" alt="{{ $program->name . '-' . $key }}"
              class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
            <div
              class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
            </div>
            <span
              class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">{{ $program->name }}</span>
          </a>
        @empty
          <p class="text-center text-red-500">Tidak ada gambar yang dimasukkan</p>
        @endforelse
      </div>
    </div>
  </div>
  <div class="py-10 mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="grid lg:grid-cols-3 w-full gap-12">
      <div class="w-full grid lg:grid-cols-1 lg:col-span-2 gap-4">
        <x-typography.h2>
          {{ __($program->name) }}
        </x-typography.h2>
        <x-typography.p>
          {{ __($program->short_description) }}
        </x-typography.p>
        <x-typography.list>
          @forelse ($program->detail->benefits as $benefit)
            <li>{{ __($benefit['item']) }}</li>
          @empty
            <li>{{ __('tidak ada manfaat list yang dimasukkan') }}</li>
          @endforelse

        </x-typography.list>
      </div>
      <div class="lg:w-full flex flex-col gap-4 space-y-4 ">
        <span class="font-bold text-2xl">Rp. {{ number_format($program->price, 0, ',', '.') }}</span>
        <div class="flex gap-1 items-center">
          @for ($i = 0; $i < $program->rate; $i++)
            <svg class="w-3.5 h-3.5 fill-blue-600" viewBox="0 0 14 13" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
            </svg>
          @endfor
          <span>({{ $program->rate }} stars) 14 reviews</span>
        </div>
        <div class="flex justify-between gap-4">
          <span class="font-medium">Level Kursus</span>
          <div class="flex flex-wrap">
            <x-button>{{ $program->detail->level }} Level</x-button>
          </div>
        </div>
        <div class="flex w-full">
          <x-button type="submit" class="w-full py-6 ">Buy Now</x-button>
        </div>
      </div>
    </div>
  </div>
  <div class=" mx-auto max-w-screen-2xl px-4 md:px-8">
    <x-tabs defaultValue="overview" class="w-full z-50">
      <x-tabs.List class="w-full">
        <x-tabs.trigger value="overview">Informasi Umum</x-tabs.trigger>
        <x-tabs.trigger value="schedule">Jadwal Less</x-tabs.trigger>
        <x-tabs.trigger value="lessonDocumentation">Kegiatan Belajar</x-tabs.trigger>
      </x-tabs.List>
      <div class="p-8">
        <x-tabs.content class="text-justify leading-7" value="overview">{!! __($program->detail->long_description) !!}.</x-tabs.content>
        <x-tabs.content value="schedule">
          <div>
            <input type="text" wire:model.live="search" placeholder="Cari jadwal kelas..." class="form-control">
          </div>
          <div class="font-[sans-serif] overflow-x-auto">
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
                @forelse ($program->classes as $key => $class)
                  <tr class="even:bg-blue-50" wire:key={{ $class->class_schedule_id }} </tr>
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
                            <div class="grid grid-cols-4 items-center gap-4">
                              <x-label htmlFor="name" class="text-right">
                                Nama Program
                              </x-label>
                              <x-input id="name" value="{{ $class->program->name }}" class="col-span-3"
                                readonly />
                            </div>
                            <div class="grid grid-cols-4 items-center gap-4">
                              <x-label htmlFor="book" class="text-right">
                                Buku
                              </x-label>
                              <x-input id="book" value="{{ $class->book->book_name }}" class="col-span-3"
                                readonly />
                            </div>
                            <div class="grid grid-cols-4 items-center gap-4">
                              <x-label htmlFor="book" class="text-right">
                                Jadwal Hari
                              </x-label>
                              <x-input id="book" value="{{ $class->day->day_name }}" class="col-span-3"
                                readonly />
                            </div>
                            <div class="grid grid-cols-4 items-center gap-4">
                              <x-label htmlFor="book" class="text-right">
                                Jadwal Jam
                              </x-label>
                              <x-input id="book"
                                value="{{ $class->time->time_start . ' s/d ' . $class->time->time_end }}"
                                class="col-span-3" readonly />
                            </div>
                            <div class="grid grid-cols-4 items-center gap-4">
                              <x-label htmlFor="book" class="text-right">
                                Mentor Kelas
                              </x-label>
                              <x-input id="book" value="{{ 'MR. Wi' }}" class="col-span-3" readonly />
                            </div>
                            <div class="grid grid-cols-4 items-center gap-4">
                              <x-label htmlFor="book" class="text-right">
                                Ruangan Kelas
                              </x-label>
                              <x-input id="book" value="{{ 'IV (20 orang)' }}" class="col-span-3" readonly />
                            </div>
                            <x-dialog.footer>
                              @php
                                $whatsappMessage = "Halo, saya ingin membagikan detail program *{$program->name}* kepada Anda:\n\n";
                                $whatsappMessage .= "*Nama Program:* {$program->name}\n";
                                $whatsappMessage .= "*Deskripsi:* {$program->short_description}\n\n";
                                $whatsappMessage .=
                                    '*Harga:* Rp. ' . number_format($program->price, 0, ',', '.') . "\n";
                                $whatsappMessage .= "*Rating:* {$program->rate} stars (14 reviews)\n";
                                $whatsappMessage .= "*Level Kursus:* {$program->detail->level} Level\n";
                                $whatsappMessage .= "*[Manfaat]:*\n";
                                foreach ($program->detail->benefits as $benefit) {
                                    $whatsappMessage .= '- ' . $benefit['item'] . "\n";
                                }
                                $whatsappMessage .= "*[Jadwal Kelas]:*\n";
                                $whatsappMessage .= "  *Nama Program:* {$class->program->name}\n";
                                $whatsappMessage .= "  *Buku:* {$class->book->book_name}\n";
                                $whatsappMessage .= "  *Hari:* {$class->day->day_name}\n";
                                $whatsappMessage .= "  *Jam Mulai:* {$class->time->time_start}\n";
                                $whatsappMessage .= "  *Jam Selesai:* {$class->time->time_end}\n";
                                $whatsappMessage .= "  *Kode Kelas:* {$class->class_code}\n\n";
                                $whatsappMessage .= "*[Kebijakan Pengembalian Dana]:*\n";
                                $whatsappMessage .= __(
                                    'Kami menawarkan kebijakan pengembalian dana yang fleksibel. Jika Anda tidak puas dengan program kami, Anda dapat mengajukan permohonan pengembalian dana dalam 30 hari pertama pendaftaran. Silakan hubungi kami di +62 361 234 567 untuk informasi lebih lanjut.',
                                );

                                $whatsappShareUrl = 'https://wa.me/?text=' . urlencode($whatsappMessage);
                              @endphp
                              <x-link target="_blank" href="{{ $whatsappShareUrl }}">Share</x-link>
                            </x-dialog.footer>
                          </div>
                        </x-dialog.content>
                      </x-dialog>
                    </td>
                  </tr>
                @empty
                  <p class="text-center text-red-500">No data found</p>
                @endforelse
              </tbody>
            </table>
            {{ $classes->links() }}
          </div>
        </x-tabs.content>
        <x-tabs.content
          value="lessonDocumentation">{{ __('Kami menawarkan kebijakan pengembalian dana yang fleksibel. Jika Anda tidak puas dengan program kami, Anda dapat mengajukan permohonan pengembalian dana dalam 30 hari pertama pendaftaran. Silakan hubungi kami di +62 361 234 567 untuk informasi lebih lanjut.') }}</x-tabs.content>
      </div>
    </x-tabs>
  </div>
</section>
