<div>
  <div class="w-full p-6 mx-auto">
    <!-- Filter Form -->
    <div class="mb-6">
      <form wire:submit.prevent="applyFilters" class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mb-6 md:w-3/12 md:flex-none">
          <label for="startDate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Mulai</label>
          <input type="date" wire:model="startDate" id="startDate"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="w-full max-w-full px-3 mb-6 md:w-3/12 md:flex-none">
          <label for="endDate" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Akhir</label>
          <input type="date" wire:model="endDate" id="endDate"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="w-full max-w-full px-3 mb-6 md:w-3/12 md:flex-none">
          <label for="programName" class="block mb-2 text-sm font-medium text-gray-900">Nama Program</label>
          <input type="text" wire:model="programName" id="programName"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
        </div>
        <div class="w-full max-w-full px-3 gap-2 md:w-3/12 md:flex-none flex items-center">
          <button type="submit"
            class="bg-blue-600 text-white font-bold py-2.5 px-5 rounded-lg hover:bg-blue-700">Terapkan Filter</button>
          <button type="button" wire:click="resetFilters"
            class="bg-gray-300 text-gray-900 font-bold py-2.5 px-5 rounded-lg hover:bg-gray-400">Reset Filter</button>
        </div>
      </form>
    </div>

    <x-tabs defaultValue="pending" class="w-full">
      <x-tabs.List>
        <x-tabs.trigger value="pending">Pending</x-tabs.trigger>
        <x-tabs.trigger value="paid">Paid</x-tabs.trigger>
        <x-tabs.trigger value="failed">Failed</x-tabs.trigger>
        <x-tabs.trigger value="expired">Expired</x-tabs.trigger>
      </x-tabs.List>

      <x-tabs.content value="pending">
        @forelse ($pendingOrders as $order)
          <div class="w-full max-w-full px-3 mt-6 md:w-full md:flex-none">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-0">Informasi Tagihan ({{ $order->program->name }})</h6>
                <small class="font-bold">pesanan dibuat pada:
                  {{ $order->created_at->translatedFormat('l, d F Y H:i:s') }}</small>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                    <div class="flex flex-col">
                      <h6 class="mb-4 leading-normal text-size-sm">{{ $order->user->name }}</h6>
                      <span class="mb-2 leading-tight text-size-xs">Order Id: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->order_id }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Pendaftar: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->registration->student_name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Status Pembayaran: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->payment_status }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Tipe Pembayaran: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->payment_method }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Program: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->program->name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Email Address: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->user->email }}</span></span>
                    </div>
                    <div class="ml-auto text-right">
                      <a href="{{ route('bill.detail', ['order' => $order->id]) }}"
                        class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-150 bg-gradient-red hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                        href="javascript:;">
                        <i class="mr-2 far fa-trash-alt bg-150 bg-gradient-red bg-x-25 bg-clip-text"></i>Detail Tagihan
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @empty
          <div class="min-h-[75dvh] flex flex-col items-center justify-center gap-4">
            <img src="{{ asset('storage/assets/vectors/undraw_credit-card_t6qm.svg') }}"
              class="object-cover aspect-auto w-4/12 mx-auto" alt="grade-ilustration">
            <p class="font-bold text-center">Tidak ada tagihan pending</p>
          </div>
        @endforelse
      </x-tabs.content>

      <x-tabs.content value="paid">
        @forelse ($paidOrders as $order)
          <div class="w-full max-w-full px-3 mt-6 md:w-full md:flex-none">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-0">Informasi Tagihan ({{ $order->program->name }})</h6>
                <small class="font-bold">pesanan dibuat pada:
                  {{ $order->created_at->translatedFormat('l, d F Y H:i:s') }}</small>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                    <div class="flex flex-col">
                      <h6 class="mb-4 leading-normal text-size-sm">{{ $order->user->name }}</h6>
                      <span class="mb-2 leading-tight text-size-xs">Order Id: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->order_id }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Pendaftar: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->registration->student_name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Status Pembayaran: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->payment_status }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Tipe Pembayaran: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->payment_method }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Program: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->program->name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Email Address: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->user->email }}</span></span>
                    </div>
                    <div class="ml-auto text-right">
                      <a href="{{ route('bill.detail', ['order' => $order->id]) }}"
                        class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-150 bg-gradient-green hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                        href="javascript:;">
                        <i class="mr-2 far fa-check bg-150 bg-gradient-green bg-x-25 bg-clip-text"></i>Detail Tagihan
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @empty
          <div class="min-h-[75dvh] flex flex-col items-center justify-center gap-4">
            <img src="{{ asset('storage/assets/vectors/undraw_credit-card_t6qm.svg') }}"
              class="object-cover aspect-auto w-4/12 mx-auto" alt="grade-ilustration">
            <p class="font-bold text-center">Tidak ada tagihan yang telah dibayar</p>
          </div>
        @endforelse
      </x-tabs.content>

      <x-tabs.content value="failed">
        @forelse ($failedOrders as $order)
          <div class="w-full max-w-full px-3 mt-6 md:w-full md:flex-none">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-0">Informasi Tagihan ({{ $order->program->name }})</h6>
                <small class="font-bold">pesanan dibuat pada:
                  {{ $order->created_at->translatedFormat('l, d F Y H:i:s') }}</small>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                    <div class="flex flex-col">
                      <h6 class="mb-4 leading-normal text-size-sm">{{ $order->user->name }}</h6>
                      <span class="mb-2 leading-tight text-size-xs">Order Id: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->order_id }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Pendaftar: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->registration->student_name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Status Pembayaran: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->payment_status }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Tipe Pembayaran: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->payment_method }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Program: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->program->name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Email Address: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->user->email }}</span></span>
                    </div>
                    <div class="ml-auto text-right">
                      <a href="{{ route('bill.detail', ['order' => $order->id]) }}"
                        class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-150 bg-gradient-red hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                        href="javascript:;">
                        <i class="mr-2 far fa-times bg-150 bg-gradient-red bg-x-25 bg-clip-text"></i>Detail Tagihan
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @empty
          <div class="min-h-[75dvh] flex flex-col items-center justify-center gap-4">
            <img src="{{ asset('storage/assets/vectors/undraw_credit-card_t6qm.svg') }}"
              class="object-cover aspect-auto w-4/12 mx-auto" alt="grade-ilustration">
            <p class="font-bold text-center">Tidak ada tagihan yang gagal</p>
          </div>
        @endforelse
      </x-tabs.content>

      <x-tabs.content value="expired">
        @forelse ($expiredOrders as $order)
          <div class="w-full max-w-full px-3 mt-6 md:w-full md:flex-none">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-0">Informasi Tagihan ({{ $order->program->name }})</h6>
                <small class="font-bold">pesanan dibuat pada:
                  {{ $order->created_at->translatedFormat('l, d F Y H:i:s') }}</small>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                    <div class="flex flex-col">
                      <h6 class="mb-4 leading-normal text-size-sm">{{ $order->user->name }}</h6>
                      <span class="mb-2 leading-tight text-size-xs">Order Id: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->order_id }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Pendaftar: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->registration->student_name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Status Pembayaran: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->payment_status }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Tipe Pembayaran: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->payment_method }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Program: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->program->name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Email Address: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->user->email }}</span></span>
                    </div>
                    <div class="ml-auto text-right">
                      <a href="{{ route('bill.detail', ['order' => $order->id]) }}"
                        class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-150 bg-gradient-red hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                        href="javascript:;">
                        <i class="mr-2 far fa-clock bg-150 bg-gradient-red bg-x-25 bg-clip-text"></i>Detail Tagihan
                      </a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @empty
          <div class="min-h-[75dvh] flex flex-col items-center justify-center gap-4">
            <img src="{{ asset('storage/assets/vectors/undraw_credit-card_t6qm.svg') }}"
              class="object-cover aspect-auto w-4/12 mx-auto" alt="grade-ilustration">
            <p class="font-bold text-center">Tidak ada tagihan yang kedaluwarsa</p>
          </div>
        @endforelse
      </x-tabs.content>
    </x-tabs>
  </div>
</div>
