  <div>
    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full px-3 mb-6 lg:mb-0 lg:w-4/12 lg:flex-none">
        <div class=" flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="max-w-full px-3 lg:flex-none">
                <div class="flex flex-col h-full">
                  <p class="pt-2 mb-1 font-semibold">Hi, Student!</p>
                  <h5 class="font-bold">{{ $user->name }}</h5>
                  <p class="mb-12 mt-2">
                    {{ __('Lihat jadwal les kamu sekarang!, Jika masih terdapat kendala silahkan hubungi admin IEC Denpasar pada nomor berikut') }}
                  </p>
                  <x-button class="bg-blue-800 p-2 rounded-lg py-6">{{ __('Lihat Jadwal') }}</x-button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full px-3 mb-6 lg:mb-0 lg:w-4/12 lg:flex-none">
        <div class=" flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex-auto p-4">
            <div class="flex flex-wrap -mx-3">
              <div class="max-w-full px-3 lg:flex-none">
                <div class="flex flex-col h-full">
                  <p class="pt-2 mb-1 font-semibold">Welcome to IEC Denpasar</p>
                  <h5 class="font-bold">{{ $user->name }}</h5>
                  <p class="mb-12 mt-2">
                    {{ __(' Tingkatkan skill dan wawasanmu dengan berbagai program unggulan dari IEC Denpasar!
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              Temukan peluang belajar yang sesuai dengan minat dan tujuanmu. 🌟  ') }}
                  </p>
                  <x-button wire:click="redirectToProgram"
                    class="bg-blue-800 p-2 rounded-lg py-6">{{ __('Lihat Program') }}</x-button>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="w-full max-w-full px-3 lg:w-4/12 lg:flex-none">
        <div
          class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-4">
          <div class="relative h-full overflow-hidden bg-cover rounded-xl"
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
          </div>
        </div>
      </div>
    </div>

    <!-- cards row 4 -->

    <div class="flex flex-wrap my-6 -mx-3">
      <!-- card 1 -->

      <div class="w-full max-w-full px-3 mt-0 mb-6 md:mb-0 md:w-1/2 md:flex-none lg:w-2/3 lg:flex-none">
        <div
          class="border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
            <div class="flex flex-wrap mt-0 -mx-3">
              <div class="flex-none w-7/12 max-w-full px-3 mt-0 lg:w-1/2 lg:flex-none">
                <h6>Your Class Detail</h6>
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
          </div>
          <div class="flex-auto p-6 px-0 pb-2">
            <div class="overflow-x-auto">
              <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                  <tr>
                    <th
                      class="px-6 py-3 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                      Teacher Name</th>
                    <th
                      class="px-6 py-3 pl-2 font-bold tracking-normal text-left uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                      Class Code</th>
                    <th
                      class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                      Class Member</th>
                    <th
                      class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                      Room Class</th>
                    <th
                      class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                      Start class</th>
                    <th
                      class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                      End class</th>
                    <th
                      class="px-6 py-3 font-bold tracking-normal text-center uppercase align-middle bg-transparent border-b letter border-b-solid text-size-xxs whitespace-nowrap border-b-gray-200 text-slate-400 opacity-70">
                      Daily Class</th </tr>
                </thead>
                <tbody>
                  @for ($i = 0; $i < 5; $i++)
                    <tr>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                        <div class="flex px-2 py-1">
                          <div>
                            <img src="../assets/img/small-logos/logo-xd.svg"
                              class="inline-flex items-center justify-center mr-4 text-white transition-all duration-200 ease-soft-in-out text-size-sm h-9 w-9 rounded-xl"
                              alt="xd" />
                          </div>
                          <div class="flex flex-col justify-center">
                            <h6 class="mb-0 leading-normal text-size-sm">{{ $user->name }}
                            </h6>
                          </div>
                        </div>
                      </td>
                      <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap">
                        <span class="font-semibold leading-tight text-size-xs"> WFMo2F </span>
                      </td>
                      <td
                        class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                        <span class="font-semibold leading-tight text-size-xs"> 20 </span>
                      </td>
                      <td
                        class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                        <span class="font-semibold leading-tight text-size-xs"> Room IV </span>
                      </td>
                      <td
                        class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                        <span class="font-semibold leading-tight text-size-xs"> 17.25 </span>
                      </td>
                      <td
                        class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                        <span class="font-semibold leading-tight text-size-xs"> 19.25 </span>
                      </td>
                      <td
                        class="p-2 leading-normal text-center align-middle bg-transparent border-b text-size-sm whitespace-nowrap">
                        <span class="font-semibold leading-tight text-size-xs"> Wednesday - Friday </span>
                      </td>
                    </tr>
                  @endfor

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- card 2 -->

      <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none lg:w-1/3 lg:flex-none">
        @if ($order && $order->program)
          <div
            class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
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
            class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
            <div
              class="border-black/12.5 mb-0 rounded-t-2xl h-full border-b-0 border-solid bg-white p-6 pb-0 flex items-center justify-center">
              <h6>Tidak ada riwayat transaksi</h6>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
