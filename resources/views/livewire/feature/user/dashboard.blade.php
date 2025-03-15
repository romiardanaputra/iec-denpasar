  <div>
    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full px-3 mb-6 lg:mb-0 lg:w-4/12 lg:flex-none">
        <div
          class=" flex flex-col justify-center min-w-0 break-words border border-solid border-gray-200 rounded-2xl bg-clip-border h-full">
          <div class="max-w-full p-6 lg:flex-none relative">
            <div class="flex flex-col justify-center w-full h-full">
              <p class="pt-2 mb-1 font-semibold">Informasi Akun</p>
              <h5 class="font-bold">{{ $user->name }}</h5>
              <div class="mt-4 space-y-2">
                <p class="font-medium text-sm">Informasi general akun: </p>
                <p class="flex items-center gap-2 text-size-sm">
                  <x-lucide-mail class="size-4 font-bold" />
                  {{ $user->email }}
                </p>
                <p class="flex items-center gap-2 text-size-sm">
                  <x-lucide-map class="size-4" />{{ $user->address ?? '-' }}
                </p>
                <p class="flex items-center gap-2 text-size-sm">
                  <x-lucide-phone class="size-4" />{{ $user->phone ?? '-' }}
                </p>
              </div>

              <a href="{{ route('profile') }}">
                <x-button
                  class="bg-blue-600 text-sm font-bold hover:bg-blue-700 lg:w-4/12 mt-4 rounded-full py-6">{{ __('Update Profile') }}</x-button>
              </a>

            </div>

            <x-badge class="absolute rounded-full top-8 right-8 bg-green-600 hover:bg-green-500">Akun Aktif</x-badge>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 mb-6 lg:mb-0 lg:w-4/12 lg:flex-none">
        <div
          class=" flex flex-col justify-center min-w-0 break-words border border-solid border-gray-200 rounded-2xl bg-clip-border h-full">
          <div class="max-w-full p-6 lg:flex-none relative">
            @php
              $isEmptyCourse = true;
            @endphp
            @if ($students->isEmpty() || $programs->isEmpty())
              <div class="flex flex-col items-center justify-center gap-4">
                <img src="{{ asset('storage/assets/vectors/undraw_hello_ccwj.svg') }}" alt="notfoundcourse"
                  class="object-cover aspect-auto w-5/12 mx-auto">
                <p class="font-bold text-center w-8/12">Anda belum mendaftar ke program kursus apapun.</p>
                <a href="{{ route('our-program') }}">
                  <x-button
                    class="bg-blue-600 hover:bg-blue-700 px-6 mt-8 rounded-full py-6">{{ __('Daftar Kursus') }}</x-button>
                </a>

              </div>
            @else
              <div class="flex flex-col h-full">
                <p class="pt-2 mb-1 font-semibold">Informasi Kursus</p>
                <h5 class="font-bold">{{ $students->count() }} Terdaftar</h5>
                <p class="mt-4 font-medium text-size-sm">Program kursus yang sedang diikuti: </p>
                <div class="mt-2 space-y-2">
                  @foreach ($programs as $index => $program)
                    @if ($index < 2)
                      <p class="flex items-center gap-2 text-size-sm">
                        <x-lucide-album class="size-4 font-bold" />
                        {{ $program }}
                      </p>
                    @endif
                  @endforeach
                  @if (@count($programs) >= 2)
                    <div>
                      <a href="#" class="text-blue-500 font-bold underline">Lihat lebih</a>
                    </div>
                  @endif
                </div>
                <x-button
                  class="bg-blue-600 font-bold hover:bg-blue-700 w-4/12 mt-4 rounded-full py-6">{{ __('Lihat Program') }}</x-button>

                <x-badge class="absolute top-8 rounded-full right-8 bg-green-600 hover:bg-green-500">Kursus
                  Aktif</x-badge>
              </div>
            @endif

          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 lg:w-4/12 lg:flex-none">
        <div
          class="flex flex-col justify-center min-w-0 break-words border border-solid border-gray-200 rounded-2xl bg-clip-border h-full">
          <div class="max-w-full p-6 lg:flex-none relative">
            @if ($students->isEmpty())
              <div class="flex flex-col items-center justify-center gap-4">
                <img src="{{ asset('storage/assets/vectors/undraw_my-personal-files_886p.svg') }}" alt="notfoundcourse"
                  class="object-cover aspect-auto w-4/12 mx-auto">
                <p class="font-bold text-center w-8/12">Belum ada pendaftar dalam kursus apapun.</p>
                <a href="{{ route('our-program') }}">
                  <x-button
                    class="bg-blue-600 hover:bg-blue-700 px-6 mt-8 rounded-full py-6">{{ __('Daftar Kursus') }}</x-button>
                </a>
              </div>
            @else
              <div class="flex flex-col h-full">
                <p class="pt-2 mb-1 font-semibold">Informasi Pendaftar</p>
                <h5 class="font-bold">{{ $students->count() }} Student(s)</h5>
                <p class="mt-4 font-medium text-size-sm ">Nama Murid: </p>
                <div class="mt-2 space-y-2">
                  @foreach ($students as $index => $student)
                    @if ($index < 2)
                      <p class="flex items-center gap-2 text-size-sm">
                        <x-lucide-graduation-cap class="size-4 font-bold" />
                        {{ $student->student_name }}
                      </p>
                    @endif
                  @endforeach
                  @if (@count($students) > 2)
                    <div>
                      <a href="#" class="text-blue-500 font-bold underline">Lihat lebih</a>
                    </div>
                  @endif
                </div>
                <x-button class="bg-blue-600 hover:bg-blue-700 w-4/12 mt-4 font-bold rounded-full py-6"
                  wire:click="redirectToProgram">{{ __('Lihat Nilai!') }}</x-button>
                <x-badge class="absolute rounded-full top-8 right-8 bg-green-600 hover:bg-green-500">Siswa
                  Aktif</x-badge>
              </div>
            @endif

          </div>
        </div>
      </div>
    </div>

    <!-- cards row 4 -->

    <div class="flex flex-wrap my-6 -mx-3">
      <!-- card 1 -->

      <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none">
        <div
          class="relative flex min-w-0 flex-col break-words rounded-2xl border border-solid border-gray-200 bg-white bg-clip-border h-full">

          @if ($schedules->isEmpty())
            <div class="flex flex-col items-center justify-center h-full gap-4 p-6">
              <img src="{{ asset('storage/assets/vectors/undraw_schedule_6t8k.svg') }}" alt="notfoundcourse"
                class="object-cover aspect-video w-4/12 mx-auto">
              <p class="font-bold text-center w-8/12">Belum ada pendaftar dalam kursus apapun.</p>
            </div>
          @else
            <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
              <x-tabs :defaultValue="$selectedStudentName" class="w-full">
                <x-tabs.list>
                  @foreach ($students as $student)
                    <x-tabs.trigger wire:click="selectStudent('{{ $student->student_name }}')"
                      value="{{ $student->student_name }}">{{ $student->student_name }}</x-tabs.trigger>
                  @endforeach
                </x-tabs.list>

                @foreach ($students as $student)
                  <x-tabs.content value="{{ $student->student_name }}">
                    <div class="flex flex-wrap mt-0 -mx-3">
                      <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                        <h6>Jadwal Kursus</h6>
                        <p class="mb-0 leading-normal text-size-sm">
                          <i class="fa fa-check text-cyan-500"></i>
                          <span class="ml-1 font-semibold">{{ $student->program->name }}</span>
                        </p>
                      </div>
                    </div>
                    <div class="flex-auto p-6 px-0 pb-2">
                      <div class="overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                          <thead class="align-bottom">
                            <tr>
                              @php
                                $headers = ['Teacher Name', 'Class Code', 'Start class', 'End class', 'Daily Class'];
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
                            @foreach ($schedules as $schedule)
                              <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                                  <div class="flex px-2 py-1">
                                    <div>
                                      <img
                                        class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl"
                                        src="{{ $schedule->classSchedule->team->image ? (Str::startsWith($schedule->classSchedule->team->image, 'http') ? $schedule->classSchedule->team->image : asset('storage/' . $schedule->classSchedule->team->image)) : 'https://png.pngtree.com/png-clipart/20231019/original/pngtree-user-profile-avatar-png-image_13369988.png' }}"
                                        alt="{{ $schedule->classSchedule->team->image }}" />
                                    </div>
                                    <div class="flex flex-col justify-center">
                                      <h6 class="mb-0 leading-normal text-size-sm">
                                        {{ $schedule->classSchedule->team->name }}</h6>
                                    </div>
                                  </div>
                                </td>
                                <td
                                  class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                  <span
                                    class="font-semibold leading-tight text-size-xs">{{ $schedule->classSchedule->class_code }}</span>
                                </td>
                                <td
                                  class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                  <span
                                    class="font-semibold leading-tight text-size-xs">{{ $schedule->classSchedule->time->time_start }}</span>
                                </td>
                                <td
                                  class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                  <span
                                    class="font-semibold leading-tight text-size-xs">{{ $schedule->classSchedule->time->time_end }}</span>
                                </td>
                                <td
                                  class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                                  <span
                                    class="font-semibold leading-tight text-size-xs">{{ $schedule->classSchedule->day->day_name }}</span>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </x-tabs.content>
                @endforeach
              </x-tabs>
            </div>
          @endif

        </div>
      </div>

      <!-- card 2 -->

      <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none lg:w-1/3 lg:flex-none">
        @if ($order && $order->program)
          <div
            class="relative flex h-full min-w-0 flex-col break-words rounded-2xl border border-gray-200 border-solid bg-white bg-clip-border">
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
              <a href="{{ route('our-program') }}">
                <x-button
                  class="bg-blue-800 hover:bg-blue-700 px-6 mt-8 rounded-xl py-6">{{ __('Lihat kursus') }}</x-button>
              </a>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
