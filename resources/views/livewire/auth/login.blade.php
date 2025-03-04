<div class="max-w-screen-xl container mx-auto h-screen">
  <div class="grid md:grid-cols-2 items-center gap-8 h-full">
    <x-form wire:submit="login" class="max-w-lg max-md:mx-auto w-full p-6" autocomplete="on">
      <div class="mb-12">
        <h3 class="text-gray-800 text-4xl font-extrabold">{{ __('Login') }}</h3>
        <p class="text-gray-800 text-sm mt-6">
          {{ __('Benamkan diri Anda dalam perjalanan login tanpa kerumitan dengan formulir login kami yang dirancang secara intuitif. Akses akun Anda dengan mudah.') }}
        </p>
      </div>
      <div class="mt-4">
        <x-label for="email">{{ __('Email') }}</x-label>
        <div class="relative flex items-center">
          <x-input wire:model.blur="email" name="email" required class="text-gray-800 rounded-full" type="email"
            id="email" placeholder="Email Address" autocomplete :value="old('email')" />
          <x-lucide-mail class="size-4 absolute right-0 mr-4" />
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <div class="mt-4">
        <x-label for="password">{{ __('Password') }}</x-label>
        <div class="relative flex items-center">
          <x-input wire:model.blur="password" name="password" required class="text-gray-800 rounded-full"
            :type="$showPassword ? 'text' : 'password'" id="password" placeholder="Password" />
          <button type="button" class="absolute right-0 mr-4 focus:outline-none" wire:click="togglePasswordVisibility">
            <x-lucide-eye class="{{ $showPassword ? 'hidden' : '' }} size-4" id="password-toggle-icon" />
            <x-lucide-eye-off class="{{ $showPassword ? '' : 'hidden' }} size-4" id="password-toggle-icon-off" />
          </button>
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <div class="flex flex-wrap items-center gap-4 justify-between mt-4">
        <div class="flex items-center gap-4">
          <x-checkbox id="terms1" wire:model.live="remmember" name="remmember" />
          <x-label for="terms1"
            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
            {{ __('Ingat saya') }}
          </x-label>
        </div>

        @if (Route::has('forgot.password'))
          <div class="text-sm">
            <a href="{{ route('forgot.password') }}" class="text-blue-600 font-semibold hover:underline">
              {{ __('Lupa password?') }}
            </a>
          </div>
        @endif
      </div>

      <div class="mt-8 flex flex-col gap-4">
        <x-button type="submit" size='lg'
          class="w-full bg-blue-800  hover:bg-blue-900 text-white rounded-full px-8 py-6 ">
          <x-lucide-log-in class="mr-2 size-4" /> {{ __('Login') }}
        </x-button>
        <div class="text-center font-medium md:py-0">{{ __('Atau') }}</div>
        <a href="{{ route('oauth.google') }}"
          class="px-5 py-3 inline-flex items-center justify-center rounded-full text-[#333] text-base tracking-wider font-semibold border-none outline-none shadow-lg bg-gray-50 hover:bg-gray-100 active:bg-gray-50">
          <svg xmlns="http://www.w3.org/2000/svg" width="22px" fill="#fff" class="inline mr-3"
            viewBox="0 0 512 512">
            <path fill="#fbbd00"
              d="M120 256c0-25.367 6.989-49.13 19.131-69.477v-86.308H52.823C18.568 144.703 0 198.922 0 256s18.568 111.297 52.823 155.785h86.308v-86.308C126.989 305.13 120 281.367 120 256z"
              data-original="#fbbd00" />
            <path fill="#0f9d58"
              d="m256 392-60 60 60 60c57.079 0 111.297-18.568 155.785-52.823v-86.216h-86.216C305.044 385.147 281.181 392 256 392z"
              data-original="#0f9d58" />
            <path fill="#31aa52"
              d="m139.131 325.477-86.308 86.308a260.085 260.085 0 0 0 22.158 25.235C123.333 485.371 187.62 512 256 512V392c-49.624 0-93.117-26.72-116.869-66.523z"
              data-original="#31aa52" />
            <path fill="#3c79e6"
              d="M512 256a258.24 258.24 0 0 0-4.192-46.377l-2.251-12.299H256v120h121.452a135.385 135.385 0 0 1-51.884 55.638l86.216 86.216a260.085 260.085 0 0 0 25.235-22.158C485.371 388.667 512 324.38 512 256z"
              data-original="#3c79e6" />
            <path fill="#cf2d48"
              d="m352.167 159.833 10.606 10.606 84.853-84.852-10.606-10.606C388.668 26.629 324.381 0 256 0l-60 60 60 60c36.326 0 70.479 14.146 96.167 39.833z"
              data-original="#cf2d48" />
            <path fill="#eb4132"
              d="M256 120V0C187.62 0 123.333 26.629 74.98 74.98a259.849 259.849 0 0 0-22.158 25.235l86.308 86.308C162.883 146.72 206.376 120 256 120z"
              data-original="#eb4132" />
          </svg>
          {{ __('Lanjutkan dengan google') }}
        </a>
      </div>
      <p class="text-sm mt-8 text-center text-gray-800">{{ __('Tidak punya akun?') }}
        <a href="{{ route('register') }}" wire:navigate
          class="text-blue-600 font-semibold tracking-wide hover:underline ml-1">{{ __('Daftar') }}</a>
      </p>
    </x-form>

    <div class="h-full md:flex justify-center items-center hidden ">
      <img src="{{ asset('storage/assets/vectors/mobile_login.svg') }}"
        class="rounded-md object-cover lg:w-full md:w-11/12 z-50 relative" alt="login-image" />
    </div>
  </div>
</div>
