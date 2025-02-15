<x-dialog>
  <x-dialog.trigger class="w-full p-6">
    Daftar Kursus Sekarang!
  </x-dialog.trigger>
  <x-dialog.content class="sm:max-w-xl">
    <form id="payment-form" method="POST" action="{{ route('program.checkout', ['program' => $program->program_id]) }}"
      autocomplete="on">
      @csrf
      <div class="grid gap-4">
        <x-dialog.header>
          <x-dialog.title>
            Daftar Program {{ $program->name }}
          </x-dialog.title>
          <x-dialog.description>
            Isi data pendaftaran dibawah ini dengan benar!
          </x-dialog.description>
        </x-dialog.header>

        <div class="grid gap-4 py-4">
          <div class="grid grid-cols-4 items-center gap-4">
            <x-label htmlFor="student_name" class="text-right">
              Nama
            </x-label>
            <x-input name="student_name" id="student_name" placeholder='Masukan Nama Lengkap' class="col-span-3"
              value="{{ auth()->user()->name }}" required autocomplete />
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <x-label htmlFor="birthplace" class="text-right">
              Tempat Lahir
            </x-label>
            <x-input name="birthplace" id="birthplace" placeholder="Denpasar" class="col-span-3" required
              autocomplete />
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <x-label htmlFor="birthdate" class="text-right">
              Tanggal Lahir
            </x-label>
            <x-input name="birthdate" id="birthdate" type="date" class="col-span-3" required autocomplete />
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <x-label htmlFor="address" class="text-right">
              Alamat
            </x-label>
            <x-input name="address" id="address" placeholder="Masukan Alamat tinggal" class="col-span-3" required
              autocomplete />
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <x-label htmlFor="education" class="text-right">
              Pendidikan
            </x-label>
            <select name="education" id="education" wire:model="education"
              class="col-span-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
              required>
              @foreach ($educationOptions as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
              @endforeach
            </select>
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <x-label htmlFor="job" class="text-right">
              Pekerjaan
            </x-label>
            <select name="job" id="job" wire:model="job"
              class="col-span-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
              required>
              @foreach ($jobOptions as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
              @endforeach
            </select>
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <x-label htmlFor="market" class="text-right">
              Mengenal IEC Dari
            </x-label>
            <select name="market" id="market" wire:model="market"
              class="col-span-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
              required>
              @foreach ($marketOptions as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
              @endforeach
            </select>
          </div>
          <div class="grid grid-cols-4 items-center gap-4">
            <x-label htmlFor="parent_guardian" class="text-right">
              Nama Orang tua/wali
            </x-label>
            <x-input name="parent_guardian" id="parent_guardian" placeholder="Orang tua / wali yang mendampingi"
              class="col-span-3" required autocomplete />
          </div>
        </div>
        <x-dialog.footer>
          <x-button variant="default" type="submit" id="orderButton">Daftar Sekarang</x-button>
        </x-dialog.footer>
      </div>
    </form>
  </x-dialog.content>
</x-dialog>
