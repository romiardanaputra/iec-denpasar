<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Gagal</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <body class="bg-gray-100 min-h-screen flex justify-center items-center">
    <div class="bg-white p-6 md:mx-auto lg:w-4/12">
      <svg viewBox="0 0 24 24" class="text-red-600 w-16 h-16 mx-auto my-6">
        <path fill="currentColor"
          d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
        </path>
      </svg>
      <div class="text-center">
        <h3 class="md:text-2xl text-base text-gray-900 font-semibold text-center">Pembayaran Gagal</h3>
        <p class="text-gray-600 my-2">
          {{ __('Pembayaran anda belum selesai, Mohon untuk menyelesaikan pembayaran anda, Terima kasih') }}
        </p>
        <p>{{ __('Semoga harimu menyenangkan') }}</p>

        <!-- Detail Kesalahan -->
        <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Kode Kesalahan:</strong>
          <span class="block sm:inline" id="error-code"></span>
          <br>
          <strong class="font-bold">Pesan Kesalahan:</strong>
          <span class="block sm:inline" id="error-message"></span>
        </div>

        <div class="py-10 text-center">
          <a wire:navigate href="{{ route('bill') }}"
            class="px-12 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold py-3">
            {{ __('Selesaikan Pembayaran') }}
          </a>
        </div>
      </div>
    </div>

    <script>
      // Contoh data kesalahan yang diterima dari server
      const errorCode = '{{ session('error_code') ?? 'UNKNOWN' }}';
      const errorMessage = '{{ session('error_message') ?? 'Terjadi kesalahan saat memproses pembayaran.' }}';

      // Menampilkan data kesalahan di halaman
      document.getElementById('error-code').textContent = errorCode;
      document.getElementById('error-message').textContent = errorMessage;
    </script>
  </body>
</html>
