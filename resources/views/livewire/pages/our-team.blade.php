<div>
  @livewire('partials.navbar')
  <section class="py-16">
    <div class="bg-cover bg-blue-800/60 bg-blend-multiply p-20 h-96 rounded-xl flex items-center justify-center"
      style="background-image: url('{{ asset('storage/assets/user/images/about/iec-dps.jpg') }}');">
      <div class="space-y-4">
        <div class="space-y-2 flex flex-col items-center">
          <x-breadcrumb>
            <x-breadcrumb.list>
              <x-breadcrumb.item>
                <x-breadcrumb.link class="text-slate-300" href="{{ route('landing') }}"
                  wire:navigate>Home</x-breadcrumb.link>
              </x-breadcrumb.item>
              <x-breadcrumb.separator class="text-slate-300" />
              <x-breadcrumb.item>
                <x-breadcrumb.page class="text-white">Our teams</x-breadcrumb.page>
              </x-breadcrumb.item>
            </x-breadcrumb.list>
          </x-breadcrumb>
          <h3 class="font-bold text-slate-300 text-5xl pt-6">Meet Our Experts!!</h3>
        </div>
      </div>
    </div>
  </section>
  <section class="py-16">
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
      <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
        <div>
          <p
            class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
            Core Team
          </p>
        </div>
        <h2
          class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
          <span class="relative inline-block">
            <svg viewBox="0 0 52 24" fill="currentColor"
              class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-blue-gray-100 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
              <defs>
                <pattern id="1d4040f3-9f3e-4ac7-b117-7d4009658ced" x="0" y="0" width=".135" height=".30">
                  <circle cx="1" cy="1" r=".7"></circle>
                </pattern>
              </defs>
              <rect fill="url(#1d4040f3-9f3e-4ac7-b117-7d4009658ced)" width="52" height="24"></rect>
            </svg>
            <span class="relative">Welcome</span>
          </span>
          our talented team of professionals
        </h2>
        <p class="text-base text-gray-700 md:text-lg">
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque rem aperiam, eaque ipsa
          quae.
        </p>
      </div>
      <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
        <div>
          <div
            class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80"
              src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=3&amp;h=750&amp;w=1260"
              alt="Person" />
            <div
              class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-1 text-lg font-bold text-gray-100">Oliver Aguilerra</p>
              <p class="mb-4 text-xs text-gray-100">Product Manager</p>
              <p class="mb-4 text-xs tracking-wide text-gray-400">
                Vincent Van Gogh’s most popular painting, The Starry Night.
              </p>
              <div class="flex items-center justify-center space-x-3">
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                    </path>
                  </svg>
                </a>
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div
            class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80"
              src="https://images.pexels.com/photos/2381069/pexels-photo-2381069.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
              alt="Person" />
            <div
              class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-1 text-lg font-bold text-gray-100">Marta Clermont</p>
              <p class="mb-4 text-xs text-gray-100">Design Team Lead</p>
              <p class="mb-4 text-xs tracking-wide text-gray-400">
                Amet I love liquorice jujubes pudding croissant I love pudding.
              </p>
              <div class="flex items-center justify-center space-x-3">
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                    </path>
                  </svg>
                </a>
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div
            class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80"
              src="https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
              alt="Person" />
            <div
              class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-1 text-lg font-bold text-gray-100">Anthony Geek</p>
              <p class="mb-4 text-xs text-gray-100">CTO, Lorem Inc.</p>
              <p class="mb-4 text-xs tracking-wide text-gray-400">
                Apple pie macaroon toffee jujubes pie tart cookie caramels.
              </p>
              <div class="flex items-center justify-center space-x-3">
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                    </path>
                  </svg>
                </a>
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div
            class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80"
              src="https://images.pexels.com/photos/3747435/pexels-photo-3747435.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
              alt="Person" />
            <div
              class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-1 text-lg font-bold text-gray-100">Alice Melbourne</p>
              <p class="mb-4 text-xs text-gray-100">Human Resources</p>
              <p class="mb-4 text-xs tracking-wide text-gray-400">
                Lorizzle ipsum bling bling sit amizzle, consectetuer adipiscing elit.
              </p>
              <div class="flex items-center justify-center space-x-3">
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                    </path>
                  </svg>
                </a>
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div
            class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80"
              src="https://images.pexels.com/photos/3785077/pexels-photo-3785077.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;w=500"
              alt="Person" />
            <div
              class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-1 text-lg font-bold text-gray-100">Martin Garix</p>
              <p class="mb-4 text-xs text-gray-100">Good guy</p>
              <p class="mb-4 text-xs tracking-wide text-gray-400">
                Bacon ipsum dolor sit amet salami jowl corned beef, andouille flank.
              </p>
              <div class="flex items-center justify-center space-x-3">
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                    </path>
                  </svg>
                </a>
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div
            class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80"
              src="https://images.pexels.com/photos/3931603/pexels-photo-3931603.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
              alt="Person" />
            <div
              class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-1 text-lg font-bold text-gray-100">Andrew Larkin</p>
              <p class="mb-4 text-xs text-gray-100">Backend Developer</p>
              <p class="mb-4 text-xs tracking-wide text-gray-400">
                Moonfish, steelhead, lamprey southern flounder tadpole fish bigeye.
              </p>
              <div class="flex items-center justify-center space-x-3">
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                    </path>
                  </svg>
                </a>
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div
            class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80"
              src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=3&amp;h=750&amp;w=1260"
              alt="Person" />
            <div
              class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-1 text-lg font-bold text-gray-100">Sophie Denmo</p>
              <p class="mb-4 text-xs text-gray-100">Designer</p>
              <p class="mb-4 text-xs tracking-wide text-gray-400">
                Veggies sunt bona vobis, proinde vos postulo esse magis grape pea.
              </p>
              <div class="flex items-center justify-center space-x-3">
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                    </path>
                  </svg>
                </a>
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div>
          <div
            class="relative overflow-hidden transition duration-300 transform rounded shadow-lg lg:hover:-translate-y-2 hover:shadow-2xl">
            <img class="object-cover w-full h-56 md:h-64 xl:h-80"
              src="https://images.pexels.com/photos/3931553/pexels-photo-3931553.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=2&amp;h=750&amp;w=1260"
              alt="Person" />
            <div
              class="absolute inset-0 flex flex-col justify-center px-5 py-4 text-center transition-opacity duration-300 bg-black bg-opacity-75 opacity-0 hover:opacity-100">
              <p class="mb-1 text-lg font-bold text-gray-100">Benedict Caro</p>
              <p class="mb-4 text-xs text-gray-100">Frontend Developer</p>
              <p class="mb-4 text-xs tracking-wide text-gray-400">
                I love cheese, especially airedale queso. Cheese and biscuits halloumi.
              </p>
              <div class="flex items-center justify-center space-x-3">
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
                    </path>
                  </svg>
                </a>
                <a href="/" class="text-white transition-colors duration-300 hover:text-teal-accent-400">
                  <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                    <path
                      d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
                    </path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ====== FAQ Section Start -->
  <section x-data="{
      openFaq1: false,
      openFaq2: false,
      openFaq3: false,
      openFaq4: false,
      openFaq5: false,
      openFaq6: false
  }"
    class="relative z-20 overflow-hidden bg-white dark:bg-dark pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
    <div class="container mx-auto">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4">
          <div class="mx-auto mb-[60px] max-w-[520px] text-center lg:mb-20">
            <span class="block mb-2 text-lg font-semibold text-primary">
              FAQ
            </span>
            <h2 class="text-dark dark:text-white mb-4 text-3xl font-bold sm:text-[40px]/[48px]">
              Any Questions? Look Here
            </h2>
            <p class="text-base text-body-color dark:text-dark-6">
              There are many variations of passages of Lorem Ipsum available
              but the majority have suffered alteration in some form.
            </p>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4 lg:w-1/2">
          <div
            class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-dark-2 sm:p-8 lg:px-6 xl:px-8">
            <button class="flex w-full text-left faq-btn" @click="openFaq1 = !openFaq1">
              <div
                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                <svg :class="openFaq1 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                  fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                    fill="currentColor" />
                </svg>
              </div>
              <div class="w-full">
                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-white">
                  How long we deliver your first blog post?
                </h4>
              </div>
            </button>
            <div x-show="openFaq1" class="faq-content pl-[62px]">
              <p class="py-3 text-base leading-relaxed text-body-color dark:text-dark-6">
                It takes 2-3 weeks to get your first blog post ready. That
                includes the in-depth research & creation of your monthly
                content marketing strategy that we do before writing your
                first blog post, Ipsum available .
              </p>
            </div>
          </div>
          <div
            class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-dark-2 sm:p-8 lg:px-6 xl:px-8">
            <button class="flex w-full text-left faq-btn" @click="openFaq2 = !openFaq2">
              <div
                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                <svg :class="openFaq2 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                  fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                    fill="currentColor" />
                </svg>
              </div>
              <div class="w-full">
                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-white">
                  How long we deliver your first blog post?
                </h4>
              </div>
            </button>
            <div x-show="openFaq2" class="faq-content pl-[62px]">
              <p class="py-3 text-base leading-relaxed text-body-color dark:text-dark-6">
                It takes 2-3 weeks to get your first blog post ready. That
                includes the in-depth research & creation of your monthly
                content marketing strategy that we do before writing your
                first blog post, Ipsum available .
              </p>
            </div>
          </div>
          <div
            class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-dark-2 sm:p-8 lg:px-6 xl:px-8">
            <button class="flex w-full text-left faq-btn" @click="openFaq3 = !openFaq3">
              <div
                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                <svg :class="openFaq3 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                  fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                    fill="currentColor" />
                </svg>
              </div>
              <div class="w-full">
                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-white">
                  How long we deliver your first blog post?
                </h4>
              </div>
            </button>
            <div x-show="openFaq3" class="faq-content pl-[62px]">
              <p class="py-3 text-base leading-relaxed text-body-color dark:text-dark-6">
                It takes 2-3 weeks to get your first blog post ready. That
                includes the in-depth research & creation of your monthly
                content marketing strategy that we do before writing your
                first blog post, Ipsum available .
              </p>
            </div>
          </div>
        </div>
        <div class="w-full px-4 lg:w-1/2">
          <div
            class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-dark-2 sm:p-8 lg:px-6 xl:px-8">
            <button class="flex w-full text-left faq-btn" @click="openFaq4 = !openFaq4">
              <div
                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                <svg :class="openFaq4 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                  fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                    fill="currentColor" />
                </svg>
              </div>
              <div class="w-full">
                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-white">
                  How long we deliver your first blog post?
                </h4>
              </div>
            </button>
            <div x-show="openFaq4" class="faq-content pl-[62px]">
              <p class="py-3 text-base leading-relaxed text-body-color dark:text-dark-6">
                It takes 2-3 weeks to get your first blog post ready. That
                includes the in-depth research & creation of your monthly
                content marketing strategy that we do before writing your
                first blog post, Ipsum available .
              </p>
            </div>
          </div>
          <div
            class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-dark-2 sm:p-8 lg:px-6 xl:px-8">
            <button class="flex w-full text-left faq-btn" @click="openFaq5 = !openFaq5">
              <div
                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                <svg :class="openFaq5 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                  fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                    fill="currentColor" />
                </svg>
              </div>
              <div class="w-full">
                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-white">
                  How long we deliver your first blog post?
                </h4>
              </div>
            </button>
            <div x-show="openFaq5" class="faq-content pl-[62px]">
              <p class="py-3 text-base leading-relaxed text-body-color dark:text-dark-6">
                It takes 2-3 weeks to get your first blog post ready. That
                includes the in-depth research & creation of your monthly
                content marketing strategy that we do before writing your
                first blog post, Ipsum available .
              </p>
            </div>
          </div>
          <div
            class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-dark-2 sm:p-8 lg:px-6 xl:px-8">
            <button class="flex w-full text-left faq-btn" @click="openFaq6 = !openFaq6">
              <div
                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                <svg :class="openFaq6 && 'rotate-180'" width="22" height="22" viewBox="0 0 22 22"
                  fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                    fill="currentColor" />
                </svg>
              </div>
              <div class="w-full">
                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-white">
                  How long we deliver your first blog post?
                </h4>
              </div>
            </button>
            <div x-show="openFaq6" class="faq-content pl-[62px]">
              <p class="py-3 text-base leading-relaxed text-body-color dark:text-dark-6">
                It takes 2-3 weeks to get your first blog post ready. That
                includes the in-depth research & creation of your monthly
                content marketing strategy that we do before writing your
                first blog post, Ipsum available .
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="absolute bottom-0 right-0 z-[-1]">
      <svg width="1440" height="886" viewBox="0 0 1440 886" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path opacity="0.5"
          d="M193.307 -273.321L1480.87 1014.24L1121.85 1373.26C1121.85 1373.26 731.745 983.231 478.513 729.927C225.976 477.317 -165.714 85.6993 -165.714 85.6993L193.307 -273.321Z"
          fill="url(#paint0_linear)" />
        <defs>
          <linearGradient id="paint0_linear" x1="1308.65" y1="1142.58" x2="602.827" y2="-418.681"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#3056D3" stop-opacity="0.36" />
            <stop offset="1" stop-color="#F5F2FD" stop-opacity="0" />
            <stop offset="1" stop-color="#F5F2FD" stop-opacity="0.096144" />
          </linearGradient>
        </defs>
      </svg>
    </div>
  </section>
  <!-- ====== FAQ Section End -->
  @livewire('partials.footer')
</div>
