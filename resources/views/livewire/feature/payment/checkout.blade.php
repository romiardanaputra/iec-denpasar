<div>
  <div class="container lg:py-24 mt-8 px-8 md:px-12">
    <section>
      <x-form action="{{ route('checkout.transaction', ['program' => $program->program_id]) }}" method="POST"
        class="flex flex-col xl:flex-row gap-2" autocomplete="on" id="payment-form">
        @csrf
        <div class="max-w-screen-md max-md:mx-auto w-full p-6 space-y-4">
          <div>
            <h1 class="text-3xl font-bold">Detail Informasi Pendaftar</h1>
            <p>Lengkapi informasi data pendaftar kursus berikut</p>
          </div>

          <div class="grid lg:grid-cols-2 gap-4">
            <div class="mt-4">
              <x-label htmlFor="student_name">Nama pendaftar kursus</x-label>
              <div class="relative flex items-center">
                <x-input name="student_name" class="text-gray-800 rounded-full" type="text" id="student_name"
                  placeholder="full student_name" required autofocus autocomplete value="{{ old('student_name') }}" />
                <x-lucide-user class="size-4 absolute right-0 mr-4" />
              </div>
              <small class="font-semibold">Diisi dengan nama lengkap murid/pendaftar yang akan mengikuti kursus</small>
              <x-input-error :messages="$errors->get('student_name')" class="mt-2" />
            </div>
            <div class="mt-4">
              <x-label htmlFor="address">Alamat pendaftar kursus</x-label>
              <div class="relative flex items-center">
                <x-input name="address" class="text-gray-800 rounded-full" type="text" id="address"
                  placeholder="Alamat pendaftar kursus" required autofocus autocomplete value="{{ old('address') }}" />
                <x-lucide-map class="size-4 absolute right-0 mr-4" />
              </div>
              <small class="font-semibold">Diisi dengan alamat lengkap murid/pendaftar yang akan mengikuti
                kursus</small>
              <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
          </div>

          <div class="grid lg:grid-cols-2 gap-4">
            <div class="mt-4">
              <x-label htmlFor="birthplace">Tempat lahir</x-label>
              <div class="relative flex items-center">
                <x-input type="text" name="birthplace" autocomplete required class="text-gray-800 rounded-full"
                  id="birthplace" placeholder="Tempat lahir" value="{{ old('birthplace') }}" />
                <x-lucide-cake class="size-4 absolute right-0 mr-4" />
              </div>
              <small class="font-semibold">Tempat atau lokasi lahir anda
              </small>
              <x-input-error :messages="$errors->get('birthplace')" class="mt-2" />
            </div>
            <div class="mt-4">
              <x-label htmlFor="birthdate">Tanggal lahir</x-label>
              <div class="relative flex items-center">
                <x-input name="birthdate" autocomplete required class="text-gray-800 rounded-full" type="date"
                  id="birthdate" placeholder="Tanggal lahir" value="{{ old('birthdate') }}" />
                <x-lucide-calendar-fold class="size-4 absolute right-0 mr-4" />
              </div>
              <small class="font-semibold">Isi dengan tanggal lahir pendaftar kursus</small>
              <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>
          </div>
          <div class="grid lg:grid-cols-2 gap-4">
            <div class="mt-4">
              <x-label htmlFor="education" class="text-right">
                Pendidikan
              </x-label>
              <select name="education" id="education"
                class="col-span-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-full shadow-sm w-full px-4 py-3"
                required>
                @foreach ($educationOptions as $value => $label)
                  <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
              </select>
              <small class="font-semibold">Pilih jenjang pendidikan yang sesuai dengan anda</small>
              <x-input-error :messages="$errors->get('education')" class="mt-2" />
            </div>
            <div class="mt-4">
              <x-label htmlFor="job" class="text-right">
                Pekerjaan
              </x-label>
              <select name="job" id="job"
                class="col-span-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-full shadow-sm w-full px-4 py-3"
                required>
                @foreach ($jobOptions as $value => $label)
                  <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
              </select>
              <small class="font-semibold">konfirmasi pasword harus sama dengan password</small>
              <x-input-error :messages="$errors->get('job')" class="mt-2" />
            </div>
          </div>
          <div class="grid lg:grid-cols-2 gap-4">
            <div class="mt-4">
              <x-label htmlFor="market" class="text-right">
                Mengenal IEC Dari
              </x-label>
              <select name="market" id="market"
                class="col-span-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-full shadow-sm w-full px-4 py-3"
                required>
                @foreach ($marketOptions as $value => $label)
                  <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
              </select>
              <small class="font-semibold">Pilih darimana anda mengetahui IEC</small>
              <x-input-error :messages="$errors->get('market')" class="mt-2" />
            </div>
            <div class="mt-4">
              <x-label htmlFor="parent_guardian">Nama orang tua / wali</x-label>
              <div class="relative flex items-center">
                <x-input type="text" name="parent_guardian" autocomplete required class="text-gray-800 rounded-full"
                  id="parent_guardian" placeholder="Nama orang tua / wali" value="{{ old('parent_guardian') }}" />
                <x-lucide-user class="size-4 absolute right-0 mr-4" />
              </div>
              <small class="font-semibold">
                Nama orang tua / wali (jika masih mengenyam pendidikan)
              </small>
              <x-input-error :messages="$errors->get('parent_guardian')" class="mt-2" />
            </div>
          </div>

          <div class="pt-12">
            <h1 class="text-3xl font-bold">Metode pembayaran</h1>
            <p>pilihlah metode pembayaran yang anda inginkan</p>
            <div class="mt-4">
              <label
                class="flex gap-4 items-center bg-gray-100 text-gray-700 p-3 my-3  hover:bg-indigo-300 cursor-pointer rounded-full">
                <input type="radio" value="cash" required name="payment_method">
                <p class="font-bold">Cash / Bayar langsung di tempat</p>
              </label>
            </div>
            <div class="mt-4">
              <label
                class="flex gap-4 items-center bg-gray-100 text-gray-700 p-3 my-3  hover:bg-indigo-300 cursor-pointer rounded-full">
                <input type="radio" value="online" required name="payment_method">
                <p class="font-bold">Bayar online / digital</p>
              </label>
            </div>
          </div>
        </div>

        <div class="p-6 w-full max-w-screen-md xl:w-1/2">
          <h1 class="text-3xl font-bold">Order Summary</h1>
          <p>Rincian pembayaran kursus yang anda inginkan</p>
          <div class="mt-8 space-y-4">
            <div class="flex gap-4">
              <img
                src="{{ $program->image ? (Str::startsWith($program->image, 'http') ? $program->image : asset('storage/' . Str::replaceLast('.png', '.webp', $program->image))) : asset('images/default.webp') }}"
                alt="{{ $program->name }}"
                class="object-cover object-center size-24 bg-gray-200 rounded-2xl shadow-sm" loading="lazy">
              <div class="space-y-1">
                <p>{{ $program->name }}</p>
                <p class="text-lg font-bold">Rp. {{ number_format($program->price, 0, ',', '.') }}</p>
                <p>Quantity 1</p>
              </div>
            </div>
            <hr>
            <div class="flex justify-between">
              <p class="font-bold text-lg">Subtotal</p>
              <p class="font-bold text-lg">Rp. {{ number_format($program->price, 0, ',', '.') }}</p>
            </div>
            <hr>
            <div class="flex justify-between">
              <p class="font-bold text-lg">Total</p>
              <p class="font-bold text-lg">Rp. {{ number_format($program->price, 0, ',', '.') }}</p>
            </div>
            <hr>
            <div class="mt-8">
              <x-button size='lg' type="submit" id="orderButton"
                class="border border-blue-600 hover:bg-blue-700  bg-blue-600 text-white px-6 py-5 rounded-full">
                {{ __('Checkout sekarang!') }} <x-lucide-dollar-sign class="ml-2 size-4" />
              </x-button>
            </div>
          </div>
        </div>
      </x-form>
    </section>
  </div>
  {{--
  @if (session()->has('success'))
    <div>{{ session('success') }}</div>
  @endif

  @if (session()->has('error'))
    <div>{{ session('error') }}</div>
  @endif --}}
</div>

@section('js_custom')
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
  </script>
  <script type="module" src="{{ asset('midtrans/index.js') }}" defer></script>
@endsection
