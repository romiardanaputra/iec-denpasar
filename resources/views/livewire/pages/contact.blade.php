<div>
  @livewire('partials.hero-section', ['routeName' => 'landing', 'breadcrumb' => 'Hubungi Kami', 'title' => 'Hubungi Kami'])
  <section class="py-16 container">
    <div class="max-w-6xl mx-auto relative bg-white rounded-lg py-6">
      <div class="flex flex-col items-center justify-center text-center w-full mx-auto mb-16">
        <h2 class="text-3xl font-bold text-gray-800">Hubungi Kami</h2>
        <p class="text-gray-600 mt-4">Sampaikan pertanyaan atau permintaan Anda kepada tim kami. Kami siap membantu!</p>
      </div>
      <div class="grid lg:grid-cols-3 items-center">
        <div class="grid sm:grid-cols-2 gap-4 z-20 relative lg:left-16 max-lg:px-4">
          <div
            class="flex flex-col items-center justify-center rounded-lg w-full h-44 p-4 text-center bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
            <x-lucide-map-pin class="size-8 text-blue-800" />
            <h4 class="text-gray-800 text-base font-bold mt-4">Kunjungi Kantor</h4>
            <p class="text-sm text-gray-600 mt-2">Jl. Jaya Giri Gg. XXII No.10x, Renon, Denpasar Timur, Denpasar, Bali
              80236</p>
          </div>
          <div
            class="flex flex-col items-center justify-center rounded-lg w-full h-44 p-4 text-center bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
            <x-lucide-phone class="size-8 text-blue-800" />
            <h4 class="text-gray-800 text-base font-bold mt-4">Hubungi Telepon</h4>
            <p class="text-sm text-gray-600 mt-2">+62 361 234 567</p>
          </div>
          <div
            class="flex flex-col items-center justify-center rounded-lg w-full h-44 p-4 text-center bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
            <x-lucide-message-square-more class="size-8 text-blue-800" />
            <h4 class="text-gray-800 text-base font-bold mt-4">Kirim Email</h4>
            <p class="text-sm text-gray-600 mt-2">info@iec-denpasar.com</p>
          </div>
          <div
            class="flex flex-col items-center justify-center rounded-lg w-full h-44 p-4 text-center bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
            <x-lucide-printer class="size-8 text-blue-800" />
            <h4 class="text-gray-800 text-base font-bold mt-4">Fax</h4>
            <p class="text-sm text-gray-600 mt-2">+62 361 234 568</p>
          </div>
        </div>
        <div class="lg:col-span-2 bg-blue-900/10 rounded-lg sm:p-10 p-4 z-10 max-lg:-order-1 max-lg:mb-8">
          <h2 class="text-3xl text-blue-800 text-center font-bold mb-6 py-4">Formulir Kontak</h2>
          <x-form class="w-full [&_input]:max-w-full mx-auto">
            <div class="max-w-md mx-auto space-y-5">
              <x-input name="name" placeholder="Nama Lengkap"
                class="w-full bg-gray-100 rounded-lg p-6 text-sm outline-none" />
              <x-input name="email" placeholder="Alamat Email" type="email"
                class="w-full bg-gray-100 rounded-lg p-6 text-sm outline-none" />
              <x-input name="phone" placeholder="Nomor Telepon"
                class="w-full bg-gray-100 rounded-lg p-6 text-sm outline-none" />
              <x-textarea name="message" placeholder='Pesan Anda' rows="6"
                class="w-full bg-gray-100 rounded-lg px-6 text-sm pt-3 outline-none mb-5" />
              <x-button size="lg" class="bg-blue-800 text-white hover:bg-blue-900 rounded-full px-8 py-6 w-full">
                <x-lucide-send class="mr-2 size-4" /> Kirim Pesan
              </x-button>
            </div>
          </x-form>
        </div>
      </div>
    </div>
  </section>
  <section class="container pt-10 pb-20">
    <div style="width: 100%">
      <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.3257751230026!2d115.2285713!3d-8.6605348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2408f684b9513%3A0x26863cb09bc1fdf9!2sIEC%20DENPASAR!5e0!3m2!1sid!2sid!4v1738849541653!5m2!1sid!2sid"
        allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  </section>
  @livewire('partials.cta-section')
</div>
