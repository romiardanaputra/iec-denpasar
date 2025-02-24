  <div>
    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full px-3 mb-6 lg:mb-0 lg:w-4/12 lg:flex-none">
        <div
          class=" flex flex-col justify-center min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
          <div class="max-w-full p-6 lg:flex-none relative">
            <div class="flex flex-col justify-center w-full h-full">
              <p class="pt-2 mb-1 font-semibold">Informasi Akun</p>
              <h5 class="font-bold">{{ $user->name }}</h5>
              <div class="mt-4 space-y-2">
                <p class="flex items-center gap-2">
                  <x-lucide-mail class="size-4 font-bold" />
                  {{ $user->email }}
                </p>
                <p class="flex items-center gap-2">
                  <x-lucide-map class="size-4" />{{ $user->address }}
                </p>
                <p class="flex items-center gap-2">
                  <x-lucide-phone class="size-4" />{{ $user->phone }}
                </p>
              </div>

              <a href="{{ route('profile') }}" wire:navigate>
                <x-button
                  class="bg-blue-800 hover:bg-blue-700 w-6/12 px-6 mt-8 rounded-xl py-6">{{ __('Update Profile') }}</x-button>
              </a>

            </div>

            <x-badge class="absolute top-8 right-8 bg-green-600 hover:bg-green-500">Akun Aktif</x-badge>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mb-6 lg:mb-0 lg:w-4/12 lg:flex-none">
        <div
          class=" flex flex-col justify-center min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border h-full">
          <div class="max-w-full p-6 lg:flex-none relative">
            @php
              $isEmptyCourse = false;
            @endphp
            @if (!$isEmptyCourse)
              <div class="flex flex-col items-center justify-center gap-4">
                <img src="{{ asset('storage/assets/vectors/undraw_hello_ccwj.svg') }}" alt="notfoundcourse"
                  class="object-cover aspect-auto w-5/12 mx-auto">
                <p class="font-bold text-center w-8/12">Anda belum mendaftar ke program kursus apapun.</p>
                <a href="{{ route('our-program') }}" wire:navigate>
                  <x-button
                    class="bg-blue-800 hover:bg-blue-700 px-6 mt-8 rounded-xl py-6">{{ __('Daftar Kursus') }}</x-button>
                </a>

              </div>
            @else
              <div class="flex flex-col h-full">
                <p class="pt-2 mb-1 font-semibold">Informasi Kursus</p>
                <h5 class="font-bold">2 Terdaftar</h5>
                <p class="mt-4 font-medium">Program kursus yang sedang diikuti: </p>
                {{-- <div class="min-h-24 flex items-center justify-center text-red-600">
                Belum ada kursus yang diikuti!
              </div> --}}
                {{-- <div class="mt-2 flex flex-wrap gap-2 justify-between">
                <p class="flex items-center gap-2">
                  <x-lucide-album class="size-4 font-bold" />
                  English for children
                </p>
                <p class="flex items-center gap-2">
                  <x-lucide-album class="size-4 font-bold" />
                  English for general
                </p>
                <p class="flex items-center gap-2">
                  <x-lucide-album class="size-4 font-bold" />
                  English for general
                </p>
                <p class="flex items-center gap-2">
                  <x-lucide-album class="size-4 font-bold" />
                  English for general
                </p>
                <a href="">Lihat lebih banyak...</a>
              </div> --}}
                <x-button
                  class="bg-blue-800 hover:bg-blue-700 w-6/12 px-6 mt-8 rounded-xl py-6">{{ __('Lihat program lainnya!') }}</x-button>

                <x-badge class="absolute top-8 right-8 bg-green-600 hover:bg-green-500">Kursus Aktif</x-badge>
              </div>
            @endif

          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 lg:w-4/12 lg:flex-none">
        <div
          class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="max-w-full p-6 lg:flex-none relative">
            @php
              $isEmptyRegistran = false;
            @endphp
            @if (!$isEmptyRegistran)
              <div class="flex flex-col items-center justify-center gap-4">
                <img src="{{ asset('storage/assets/vectors/undraw_my-personal-files_886p.svg') }}" alt="notfoundcourse"
                  class="object-cover aspect-auto w-4/12 mx-auto">
                <p class="font-bold text-center w-8/12">Belum ada pendaftar dalam kursus apapun.</p>
                <a href="{{ route('our-program') }}" wire:navigate>
                  <x-button
                    class="bg-blue-800 hover:bg-blue-700 px-6 mt-8 rounded-xl py-6">{{ __('Daftar Kursus') }}</x-button>
                </a>
              </div>
            @else
              <div class="flex flex-col h-full">
                <p class="pt-2 mb-1 font-semibold">Informasi Pendaftar</p>
                <h5 class="font-bold">2 Student(s)</h5>
                <p class="mt-4 font-medium">Nama pendaftar kursus: </p>

                {{-- <div class="min-h-24 flex items-center justify-center text-red-600">
                Belum ada kursus yang diikuti!
              </div> --}}
                <div class="mt-2 space-y-2">
                  <p class="flex items-center gap-2">
                    <x-lucide-graduation-cap class="size-4 font-bold" />
                    Kadek Romi Ardana Putra
                  </p>
                  <p class="flex items-center gap-2">
                    <x-lucide-album class="size-4 font-bold" />
                    English for general
                  </p>
                  <div>
                    <a href="">Lihat lebih banyak...</a>

                  </div>
                </div>
                <x-button
                  class="bg-blue-800 hover:bg-blue-700 px-6 mt-8 rounded-xl py-6">{{ __('Lihat program lainnya!') }}</x-button>

                <x-badge class="absolute top-8 right-8 bg-green-600 hover:bg-green-500">Siswa Aktif</x-badge>
              </div>
            @endif

          </div>
          {{-- <div class="relative h-full overflow-hidden bg-cover rounded-xl"
            style="background-image: url('../assets/img/ivancik.jpg')">
            <span
              class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-dark-gray opacity-80"></span>
            <div class="relative z-10 flex flex-col flex-auto h-full p-8">
              <h5 class="pt-2 mb-6 font-bold text-white">Quotes For Today</h5>
              <p class="text-white">"It is not the man who has too little, but the man who craves more, that is poor.".
              </p>
              <a class="mt-auto mb-0 font-semibold leading-normal text-white group text-size-sm" href="javascript:;">
                ~ Seneca
                <i
                  class="fas fa-arrow-right ease-bounce text-size-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
              </a>
            </div>
          </div> --}}
        </div>
      </div>
    </div>

    <!-- cards row 4 -->

    <div class="flex flex-wrap my-6 -mx-3">
      <!-- card 1 -->

      <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none">
        <div
          class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border h-full">

          @php
            $isEmptySchedule = false;
          @endphp
          @if (!$isEmptySchedule)
            <div class="flex flex-col items-center justify-center h-full gap-4 p-6">
              <img src="{{ asset('storage/assets/vectors/undraw_schedule_6t8k.svg') }}" alt="notfoundcourse"
                class="object-cover aspect-video w-4/12 mx-auto">
              <p class="font-bold text-center w-8/12">Belum ada pendaftar dalam kursus apapun.</p>

            </div>
          @else
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
              <x-tabs defaultValue="romi" class="w-full">
                <x-tabs.List>
                  <x-tabs.trigger value="romi">romi</x-tabs.trigger>
                  <x-tabs.trigger value="fadhil">fadil</x-tabs.trigger>
                </x-tabs.List>
                <x-tabs.content value="romi">
                  <div class="flex flex-wrap mt-0 -mx-3">
                    <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                      <h6>Jadwal Kursus</h6>
                      <p class="mb-0 leading-normal text-size-sm">
                        <i class="fa fa-check text-cyan-500"></i>
                        <span class="ml-1 font-semibold">English For Children</span>
                      </p>
                    </div>
                    <div class="flex-none w-5/12 max-w-full px-3 my-auto text-right lg:w-1/2 lg:flex-none">
                      <div class="relative pr-6 lg:float-right">
                        <a dropdown-trigger class="cursor-pointer" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-slate-400"></i>
                        </a>
                        <p class="hidden transform-dropdown-show"></p>

                        <ul dropdown-menu
                          class="z-100 text-size-sm transform-dropdown shadow-soft-3xl duration-250 before:duration-350 before:font-awesome before:ease-soft min-w-44 -ml-34 before:text-5.5 pointer-events-none absolute top-0 m-0 mt-2 list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:top-0 before:right-7 before:left-auto before:z-40 before:text-white before:transition-all before:content-['\f0d8']">
                          <li class="relative">
                            <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300"
                              href="javascript:;">Action</a>
                          </li>
                          <li class="relative">
                            <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300"
                              href="javascript:;">Another action</a>
                          </li>
                          <li class="relative">
                            <a class="py-1.2 lg:ease-soft clear-both block w-full whitespace-nowrap rounded-lg border-0 bg-transparent px-4 text-left font-normal text-slate-500 lg:transition-colors lg:duration-300"
                              href="javascript:;">Something else here</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="flex-auto p-6 px-0 pb-2">
                    <div class="overflow-x-auto">
                      <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                          <tr>
                            @php
                              $headers = [
                                  'Teacher Name',
                                  'Class Code',
                                  'Class Member',
                                  'Room Class',
                                  'Start class',
                                  'End class',
                                  'Daily Class',
                              ];
                            @endphp
                            @for ($i = 0; $i < count($headers); $i++)
                              <th
                                class="px-6 py-3 font-bold tracking-normal {{ $i == 0 ? 'text-left' : 'text-center' }} uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                                {{ $headers[$i] }}
                              </th>
                            @endfor
                          </tr>
                        </thead>
                        <tbody>
                          @php
                            $rows = [
                                [
                                    'name' => 'John Doe',
                                    'class_code' => 'WFMo2F',
                                    'class_member' => 20,
                                    'room_class' => 'Room IV',
                                    'start_class' => '17.25',
                                    'end_class' => '19.25',
                                    'daily_class' => 'Wednesday - Friday',
                                ],
                                [
                                    'name' => 'Jane Smith',
                                    'class_code' => 'WFMo2G',
                                    'class_member' => 25,
                                    'room_class' => 'Room V',
                                    'start_class' => '18.00',
                                    'end_class' => '20.00',
                                    'daily_class' => 'Monday - Wednesday',
                                ],
                            ];
                          @endphp
                          @for ($i = 0; $i < count($rows); $i++)
                            <tr>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                <div class="flex px-2 py-1">
                                  <div>
                                    <img src="../assets/img/small-logos/logo-xd.svg"
                                      class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl"
                                      alt="xd" />
                                  </div>
                                  <div class="flex flex-col justify-center">
                                    <h6 class="mb-0 leading-normal text-size-sm">{{ $rows[$i]['name'] }}</h6>
                                  </div>
                                </div>
                              </td>
                              <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                <span
                                  class="font-semibold leading-tight text-size-xs">{{ $rows[$i]['class_code'] }}</span>
                              </td>
                              <td
                                class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                <span
                                  class="font-semibold leading-tight text-size-xs">{{ $rows[$i]['class_member'] }}</span>
                              </td>
                              <td
                                class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                <span
                                  class="font-semibold leading-tight text-size-xs">{{ $rows[$i]['room_class'] }}</span>
                              </td>
                              <td
                                class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                <span
                                  class="font-semibold leading-tight text-size-xs">{{ $rows[$i]['start_class'] }}</span>
                              </td>
                              <td
                                class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                <span
                                  class="font-semibold leading-tight text-size-xs">{{ $rows[$i]['end_class'] }}</span>
                              </td>
                              <td
                                class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                <span
                                  class="font-semibold leading-tight text-size-xs">{{ $rows[$i]['daily_class'] }}</span>
                              </td>
                            </tr>
                          @endfor
                        </tbody>
                      </table>
                    </div>
                  </div>
                </x-tabs.content>
                <x-tabs.content value="fadil">Isi dengan looping data yang sama berdasarkan registrans jika
                  ada</x-tabs.content>
              </x-tabs>
            </div>
          @endif

        </div>
      </div>

      <!-- card 2 -->

      <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none lg:w-1/3 lg:flex-none">
        @if ($order && $order->program)
          <div
            class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border ">
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
              <h6>Transaksi</h6>
              <p class="leading-normal text-size-sm">
                <i class="fa fa-arrow-up text-lime-500"></i>
                {{ $order->program->name }} - #{{ $order->order_id }}
              </p>
            </div>
            <div class="flex-auto p-4">
              <div
                class="before:border-r-solid relative before:absolute before:top-0 before:left-4 before:h-full before:border-r-2 before:border-r-slate-100 before:content-[''] before:lg:-ml-px">
                <div class="relative mb-4 mt-0 after:clear-both after:table after:content-['']">
                  <span
                    class="w-6.5 h-6.5 text-size-base absolute left-4 z-10 inline-flex -translate-x-1/2 items-center justify-center rounded-full bg-white text-center font-semibold">
                    @if ($order->status == 'pending')
                      <x-lucide-history class="size-5 text-yellow-600" />
                    @else
                      <x-lucide-circle-check class="size-5 text-green-600" />
                    @endif
                  </span>
                  <div class="ml-11.252 pt-1.4 lg:max-w-120 relative -top-1.5 w-auto space-y-3">
                    <h6 class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">Order id :
                      {{ $order->order_id }}</h6>
                    <p class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">Harga :
                      Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                    <p class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">Status Order :
                      {{ $order->status }}</p>
                    <p class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">Status Pembayaran :
                      {{ $order->payment_status }}</p>
                    <p class="mb-0 font-semibold leading-normal text-size-sm text-slate-700">Waktu Pemesanan :
                      {{ $order->created_at->translatedFormat('l, d F Y H:i:s') }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @else
          <div
            class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-6">
            <div class="flex flex-col items-center justify-center gap-4">
              <img src="{{ asset('storage/assets/vectors/undraw_credit-card_t6qm.svg') }}" alt="notfoundcourse"
                class="object-cover aspect-auto w-4/12 mx-auto">
              <p class="font-bold text-center w-8/12">Belum ada transaksi apapun.</p>
              <a href="{{ route('our-program') }}" wire:navigate>
                <x-button
                  class="bg-blue-800 hover:bg-blue-700 px-6 mt-8 rounded-xl py-6">{{ __('Lihat kursus') }}</x-button>
              </a>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
