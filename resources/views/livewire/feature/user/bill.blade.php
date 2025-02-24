<div>
  <div class="w-full p-6 mx-auto">
    @php
      $isBillEmpty = false;
    @endphp

    @if (!$isBillEmpty)
      <div class="min-h-[75dvh] flex flex-col items-center justify-center gap-4">
        <img src="{{ asset('storage/assets/vectors/undraw_credit-card_t6qm.svg') }}"
          class="object-cover aspect-auto w-4/12 mx-auto" alt="grade-ilustration">
        <p class="font-bold text-center">Belum ada detail transaksi</p>
        <a href="{{ route('our-program') }}" wire:navigate>
          <x-button class="bg-blue-800 hover:bg-blue-700 px-6 mt-4 rounded-xl py-6">{{ __('Daftar Kursus') }}</x-button>
        </a>
      </div>
    @else
      <div class="flex flex-wrap -mx-3">
        @forelse ($orders as $key => $order)
          <div class="w-full max-w-full px-3 mt-6 md:w-full md:flex-none">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 class="mb-0">Billing Information ({{ $order->status }})</h6>
              </div>
              <div class="flex-auto p-4 pt-6">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                  <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
                    <div class="flex flex-col">
                      <h6 class="mb-4 leading-normal text-size-sm">{{ $order->user->name }}</h6>
                      <span class="mb-2 leading-tight text-size-xs">Order Id: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->order_id }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Nama Program: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->program->name }}</span></span>
                      <span class="mb-2 leading-tight text-size-xs">Email Address: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->user->email }}</span></span>
                      <span class="leading-tight text-size-xs">Alamat: <span
                          class="font-semibold text-slate-700 sm:ml-2">{{ $order->user->address ?? '-' }}</span></span>
                    </div>
                    <div class="ml-auto text-right">
                      <a class="relative z-10 inline-block px-4 py-3 mb-0 font-bold text-center text-transparent uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-150 bg-gradient-red hover:scale-102 active:opacity-85 bg-x-25 bg-clip-text"
                        href="javascript:;"><i
                          class="mr-2 far fa-trash-alt bg-150 bg-gradient-red bg-x-25 bg-clip-text"></i>Detail
                        Tagihan</a>
                      <a class="inline-block px-4 py-3 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-size-xs ease-soft-in bg-150 hover:scale-102 active:opacity-85 bg-x-25 text-green-700"
                        href="javascript:;"><i class="mr-2 fas fa-pencil-alt text-slate-700"
                          aria-hidden="true"></i>Bayar
                        Sekarang</a>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @empty
        @endforelse
      </div>
    @endif

  </div>
</div>
