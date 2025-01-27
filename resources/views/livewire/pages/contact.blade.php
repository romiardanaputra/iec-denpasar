<x-guest-layout>
  @livewire('partials.hero-section', ['routeName' => 'landing', 'breadcrumb' => 'Contact Us', 'title' => 'Contact Us'])
  <section class="py-16 container">
    <div class="max-w-6xl mx-auto relative bg-white rounded-lg py-6">
      <div class="flex flex-col items-center justify-center text-center w-1/2 mx-auto mb-16">
        <h2>Get in touch</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti recusandae quaerat perspiciatis libero
          velit
          dolorem aliquam? Ipsa sequi voluptates culpa?</p>
      </div>
      <div class="grid lg:grid-cols-3 items-center">
        <div class="grid sm:grid-cols-2 gap-4 z-20 relative lg:left-16 max-lg:px-4">
          <div
            class="flex flex-col items-center justify-center rounded-lg w-full h-44 p-4 text-center bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
            <x-lucide-map-pin class="size-8 text-blue-800" />
            <h4 class="text-gray-800 text-base font-bold mt-4">Visit office</h4>
            <p class="text-sm text-gray-600 mt-2"> 123 Main Street, City, Country</p>
          </div>
          <div
            class="flex flex-col items-center justify-center rounded-lg w-full h-44 p-4 text-center bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
            <x-lucide-phone class="size-8 text-blue-800" />
            <h4 class="text-gray-800 text-base font-bold mt-4">Call us</h4>
            <p class="text-sm text-gray-600 mt-2">+158 996 888</p>
          </div>
          <div
            class="flex flex-col items-center justify-center rounded-lg w-full h-44 p-4 text-center bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
            <x-lucide-message-square-more class="size-8 text-blue-800" />
            <h4 class="text-gray-800 text-base font-bold mt-4">Chat to us</h4>
            <p class="text-sm text-gray-600 mt-2">info@example.com</p>
          </div>
          <div
            class="flex flex-col items-center justify-center rounded-lg w-full h-44 p-4 text-center bg-white shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)]">
            <x-lucide-printer class="size-8 text-blue-800" />
            <h4 class="text-gray-800 text-base font-bold mt-4">Fax</h4>
            <p class="text-sm text-gray-600 mt-2">+1-548-2588</p>
          </div>
        </div>

        <div class="lg:col-span-2 bg-blue-900/10 rounded-lg sm:p-10 p-4 z-10 max-lg:-order-1 max-lg:mb-8">
          <h2 class="text-3xl text-blue-800 text-center font-bold mb-6 py-4">Contact us</h2>
          <x-form class="w-2/3 [&_input]:max-w-full mx-auto">
            <div class="max-w-md mx-auto space-y-5">
              <x-input name="name" placeholder="Name"
                class="w-full bg-gray-100 rounded-lg p-6 text-sm outline-none" />
              <x-input name="email" placeholder="Email" type="email"
                class="w-full bg-gray-100 rounded-lg p-6 text-sm outline-none" />
              <x-input name="phone" placeholder="Phone Number"
                class="w-full bg-gray-100 rounded-lg p-6 text-sm outline-none" />
              <x-textarea name="message" placeholder='Message' rows="6"
                class="w-full bg-gray-100 rounded-lg px-6 text-sm pt-3 outline-none mb-5" />
              <x-button size="lg" class="bg-blue-800 text-white hover:bg-blue-800 rounded-full px-8 py-6 w-full">
                <x-lucide-send class="mr-2 size-4" /> Login with Email
              </x-button>
            </div>
          </x-form>
        </div>
      </div>
    </div>
  </section>
  <section class="container pt-10 pb-20">
    <div style="width: 100%"><iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0"
        marginwidth="0"
        src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=Jl.%20Jaya%20Giri%20Gg.%20XXII%20No.10x,%20Renon,%20Kec.%20Denpasar%20Tim.,%20Kota%20Denpasar,%20Bali%2080236+(IEC%20Denpasar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
          href="https://www.gps.ie/">gps trackers</a></iframe></div>
  </section>
  @livewire('partials.cta-section')
</x-guest-layout>
