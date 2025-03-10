<div class="max-w-screen-xl container mx-auto h-screen relative">
  <div wire:loading.flex wire:target="store"
    class="fixed inset-0 bg-black/50 z-50 items-center justify-center transition-opacity">
    <div class="bg-white p-8 rounded-lg shadow-xl flex items-center space-x-2">
      <x-lucide-loader class="animate-spin size-6 text-blue-600" />
      <span class="text-gray-800 font-medium">Processing registration...</span>
    </div>
  </div>

  <div class="fixed inset-0 z-40 pointer-events-none px-4">
    @if (session('error'))
      <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        class="max-w-md mx-auto mt-4 alert alert-error shadow-lg transition-transform" x-transition>
        <div class="flex items-center space-x-2">
          <x-lucide-alert-circle class="size-4 text-red-500" />
          <span>{{ session('error') }}</span>
        </div>
      </div>
    @endif

    @if (session('success'))
      <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)"
        class="max-w-md mx-auto mt-4 alert alert-success shadow-lg transition-transform" x-transition>
        <div class="flex items-center space-x-2">
          <x-lucide-check-circle class="size-4 text-green-500" />
          <span>{{ session('success') }}</span>
        </div>
      </div>
    @endif
  </div>
  <div class="grid md:grid-cols-2 items-center gap-8 h-full">
    <x-form wire:submit="store" method="post" class="max-w-lg max-md:mx-auto w-full p-6" autocomplete="on">
      <div class="mb-12">
        <h3 class="text-gray-800 text-4xl font-extrabold">Sign Up</h3>
        <p class="text-gray-800 text-sm mt-6">
          {{ __('Benamkan diri Anda dalam pengalaman pendaftaran tanpa hambatan dengan formulir registrasi kami yang intuitif. Bergabunglah dengan IEC Denpasar dan akses berbagai program kursus dengan mudah.') }}
        </p>
      </div>
      <div class="mt-4">
        <x-label for="name">Full Name</x-label>
        <div class="relative flex items-center">
          <x-input wire:model="name" name="name" class="text-gray-800 rounded-full" type="text" id="name"
            placeholder="full name" required autofocus autocomplete value="{{ old('name') }}" />
          <x-lucide-user class="size-4 absolute right-0 mr-4" />
        </div>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div class="grid lg:grid-cols-2 gap-4">
        <div class="mt-4">
          <x-label for="phone">Phone Number</x-label>
          <div class="relative flex items-center">
            <x-input wire:model="phone" name="phone" autocomplete required class="text-gray-800 rounded-full"
              type="text" id="phone" placeholder="Phone Number" value="{{ old('phone') }}" />
            <x-lucide-phone class="size-4 absolute right-0 mr-4" />
          </div>
          <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>
        <div class="mt-4">
          <x-label for="email">Email</x-label>
          <div class="relative flex items-center">
            <x-input wire:model="email" name="email" autocomplete required class="text-gray-800 rounded-full"
              type="email" id="email" placeholder="Email Address" value="{{ old('email') }}" />
            <x-lucide-mail class="size-4 absolute right-0 mr-4" />
          </div>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
      </div>
      <div class="grid lg:grid-cols-2 gap-4">
        <div class="mt-4">
          <x-label for="password">{{ __('Password') }}</x-label>
          <div class="relative flex items-center" x-data="{ show: false }">
            <x-input wire:model="password" name="password" required class="text-gray-800 rounded-full"
              x-bind:type="show ? 'text' : 'password'" id="password" placeholder="Password" />
            <button type="button" class="absolute right-0 mr-4 focus:outline-none" x-on:click="show = !show">
              <x-lucide-eye class="size-4" x-show="!show" />
              <x-lucide-eye-off class="size-4" x-show="show" />
            </button>
          </div>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div class="mt-4">
          <x-label for="password_confirmation">{{ __('Confirm password') }}</x-label>
          <div class="relative flex items-center" x-data="{ show: false }">
            <x-input wire:model="password_confirmation" name="password_confirmation" required
              class="text-gray-800 rounded-full" x-bind:type="show ? 'text' : 'password'" id="password_confirmation"
              placeholder="password_confirmation" />
            <button type="button" class="absolute right-0 mr-4 focus:outline-none" x-on:click="show = !show">
              <x-lucide-eye class="size-4" x-show="!show" />
              <x-lucide-eye-off class="size-4" x-show="show" />
            </button>
          </div>
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
      </div>
      <div class="mt-8">
        <button type="submit"
          class="w-full bg-blue-600 hover:bg-blue-700 text-white rounded-full px-8 py-6
                       transition-all duration-200 ease-in-out disabled:opacity-70 disabled:cursor-wait relative"
          wire:loading.attr="disabled" wire:target="store">
          <div class="flex items-center justify-center space-x-2 absolute inset-0">
            <x-lucide-log-in class="size-4" wire:loading.remove wire:target="store" />
            <x-lucide-loader class="animate-spin size-4" wire:loading wire:target="store" />
            <span>Register Now</span>
          </div>
        </button>
      </div>
      <p class="text-sm mt-8 text-center text-gray-800">Already have an account?
        <a href="{{ route('login') }}" wire:navigate
          class="text-blue-600 font-semibold tracking-wide hover:underline ml-1">Login here</a>
      </p>
    </x-form>
    <div class="h-full md:flex justify-center items-center hidden">
      <img src="{{ asset('storage/assets/vectors/mobile_login.svg') }}"
        class="rounded-md object-cover lg:w-full md:w-11/12 z-40 relative" alt="Dining Experience" />
    </div>
  </div>
</div>
