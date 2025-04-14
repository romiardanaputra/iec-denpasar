<!-- component -->
<div class="bg-gray-100 min-h-screen flex justify-center items-center">
  <div class="bg-white rounded-sm p-6 md:mx-auto lg:w-4/12">
    <svg class="mx-auto py-4" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100"
      viewBox="0 0 50 50">
      <path
        d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24.984375 6.9863281 A 1.0001 1.0001 0 0 0 24 8 L 24 22.173828 A 3 3 0 0 0 22 25 A 3 3 0 0 0 22.294922 26.291016 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 23.708984 27.705078 A 3 3 0 0 0 25 28 A 3 3 0 0 0 28 25 A 3 3 0 0 0 26 22.175781 L 26 8 A 1.0001 1.0001 0 0 0 24.984375 6.9863281 z">
      </path>
    </svg>
    <div class="text-center">
      <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Pembayaran Tertunda!</h3>
      <p class="text-gray-600 my-2">
        {{ __('Pembayaran anda belum selesai, Mohon untuk menyelesaikan pembayaran anda, Terima
                                                                                                        kasih') }}
      </p>
      <p> {{ __('Semoga harimu menyenangkan') }} </p>
      <div class="py-10 text-center">
        <a href="{{ route('bill') }}"
          class="px-12 rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3">
          {{ __('Selesaikan Pembayaran') }}
        </a>
      </div>
    </div>
  </div>
</div>
