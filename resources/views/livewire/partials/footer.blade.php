<footer class="bg-white dark:bg-gray-900 mt-20">
  <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
    <div class="md:flex md:justify-between">
      <div class="mb-6 md:mb-0 w-full">
        <a href="{{ route('landing') }}" class="flex items-center">
          <img src="{{ asset('storage/assets/user/images/logo/iec.jpg') }}" class="h-20  me-3" alt="IEC Denpasar" />
        </a>
      </div>
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Our Program</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
            @php
              $programs = [
                  (object) [
                      'name' => 'English for children',
                  ],
                  (object) [
                      'name' => 'English for Junior',
                  ],
                  (object) [
                      'name' => 'General english',
                  ],
                  (object) [
                      'name' => 'TOEFL/TOEIC Program',
                  ],
              ];
            @endphp
            @forelse ($programs as $program)
              <li class="mb-4">
                <a href="https://flowbite.com/" class="hover:underline">{{ $program->name }}</a>
              </li>
            @empty
              <div> no data found</div>
            @endforelse

          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Qucik navigation</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">
            @php
              $quickNavs = [
                  (object) [
                      'name' => 'sign up',
                      'route' => 'sign-up',
                  ],
                  (object) [
                      'name' => 'sign in',
                      'route' => 'sign-in',
                  ],
                  (object) [
                      'name' => 'privacy policy',
                      'route' => 'privacy-policy',
                  ],
                  (object) [
                      'name' => 'terms condition',
                      'route' => 'term-condition',
                  ],
              ];
            @endphp
            @forelse ($quickNavs as $quickNav)
              <li class="mb-4">
                <a href="{{ 'none' }}" class="hover:underline">{{ $quickNav->name }}</a>
              </li>
            @empty
            @endforelse

          </ul>
        </div>
        <div>
          <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Contact Information</h2>
          <ul class="text-gray-500 dark:text-gray-400 font-medium">

            @php
              $contacts = [
                  (object) [
                      'name' => 'contact',
                      'value' => '098834982832',
                  ],
                  (object) [
                      'name' => 'address',
                      'value' => 'Jl. Jaya Giri Gg. XXII No.10x, Renon, Kec. Denpasar Tim., Kota Denpasar, Bali 80236',
                  ],
                  (object) [
                      'name' => 'whatsapp',
                      'value' => '39284329832',
                  ],
                  (object) [
                      'name' => 'email',
                      'value' => 'iecdps@gmail.com',
                  ],
              ];
            @endphp
            @forelse ($contacts as $contact)
              <li class="mb-4">
                <a href="https://github.com/themesberg/flowbite" class="hover:underline ">{{ $contact->name }} :
                  {{ $contact->value }}</a>
              </li>
            @empty
              <span>No data found</span>
            @endforelse
          </ul>
        </div>

      </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a href="{{ route('landing') }}"
          class="hover:underline">Iec denpasar</a>. All Rights Reserved.
      </span>
      <div class="flex mt-4 sm:justify-center sm:mt-0">
        <a href="https://www.facebook.com/iec.denpasar/" target="_blank">
          <x-lucide-facebook class="mr-2 size-4" />
        </a>
        <a href="https://www.instagram.com/iecdenpasar/" target="_blank">
          <x-lucide-instagram class="mr-2 size-4" />
        </a>
      </div>
    </div>
  </div>
</footer>
