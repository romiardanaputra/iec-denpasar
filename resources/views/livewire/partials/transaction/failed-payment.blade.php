<div class="bg-gray-100 min-h-screen flex justify-center items-center">
  <div class="bg-white rounded-lg p-6 md:mx-auto lg:w-4/12">
    <svg viewBox="0 0 24 24" class="text-red-600 w-16 h-16 mx-auto my-6">
      <path fill="currentColor"
        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
      </path>
    </svg>
    <div class="text-center">
      <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Pembayaran Gagal</h3>
      <p class="text-gray-600 my-2">
        {{ __('Maaf, pembayaran Anda gagal. Mohon periksa kembali detail pembayaran Anda dan coba lagi.') }}
      </p>
      <p>{{ __('Jika masalah masih berlanjut, silakan hubungi layanan pelanggan kami.') }}</p>

      <!-- Detail Kesalahan -->
      <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Kode Kesalahan:</strong>
        <span class="block sm:inline" id="error-code"></span>
        <br>
        <strong class="font-bold">Pesan Kesalahan:</strong>
        <span class="block sm:inline" id="error-message"></span>
      </div>

      <div class="py-10 text-center">
        <a href="{{ route('bill') }}"
          class="px-12 rounded-full bg-blue-600 hover:bg-blue-500 text-white font-semibold py-3">
          {{ __('Ulangi transaksi') }}
        </a>
      </div>
    </div>
  </div>
</div>

@section('js_custom')
  <script>
    // Mengambil data kesalahan dari sesi
    const errorData = @json(session('error_data', ['code' => 'UNKNOWN', 'message' => 'Terjadi kesalahan saat memproses pembayaran.']));

    // Menampilkan data kesalahan di halaman
    document.getElementById('error-code').textContent = errorData.code;
    document.getElementById('error-message').textContent = errorData.message;
  </script>
@endsection
