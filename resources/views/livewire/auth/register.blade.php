<div class="max-w-screen-xl mx-auto h-screen">
  <div class="grid md:grid-cols-2 items-center gap-8 h-full">
    <x-form wire:submit="store" method="post" class="max-w-lg max-md:mx-auto w-full p-6" autocomplete="on">
      @csrf
      <div class="mb-12">
        <h3 class="text-gray-800 text-4xl font-extrabold">Sign Up</h3>
        <p class="text-gray-800 text-sm mt-6">Immerse yourself in a hassle-free login journey with our
          intuitively
          designed login form. Effortlessly access your account.</p>
      </div>

      <div class="mt-4">
        <x-label for="name">Full Name</x-label>
        <div class="relative flex items-center">
          <x-input wire:model.blur="name" name="name" class="text-gray-800 rounded-full" type="text"
            id="name" placeholder="full name" required autofocus autocomplete value="old('name')" />
          <x-lucide-user class="size-4 absolute right-0 mr-4" />
        </div>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <div class="grid lg:grid-cols-2 gap-4">
        <div class="mt-4">
          <x-label for="phone">Phone Number</x-label>
          <div class="relative flex items-center">
            <x-input wire:model.blur="phone" name="phone" autocomplete required class="text-gray-800 rounded-full"
              type="text" id="phone" placeholder="Phone Number" value="old('phone')" />
            <x-lucide-phone class="size-4 absolute right-0 mr-4" />
          </div>
          <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="mt-4">
          <x-label for="email">Email</x-label>
          <div class="relative flex items-center">
            <x-input wire:model.blur="email" name="email" autocomplete required class="text-gray-800 rounded-full"
              type="email" id="email" placeholder="Email Address" value="old('email')" />
            <x-lucide-mail class="size-4 absolute right-0 mr-4" />
          </div>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
      </div>

      <div class="grid lg:grid-cols-2 gap-4">
        <div class="mt-4">
          <x-label for="password">Password</x-label>
          <div class="relative flex items-center">
            <x-input wire:model.blur="password" name="password" required class="text-gray-800 rounded-full"
              type="password" id="password" placeholder="Password" />
            <x-lucide-eye class="size-4 absolute right-0 mr-4" />
          </div>
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
          <x-label for="password_confirmation">Confirm Password</x-label>
          <div class="relative flex items-center">
            <x-input wire:model.blur="password_confirmation" name="password_confirmation" required
              class="text-gray-800 rounded-full" type="password" id="password_confirmation"
              placeholder="Confirm Password" />
            <x-lucide-eye-off class="size-4 absolute right-0 mr-4" />
          </div>
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>
      </div>

      <div class="mt-8">
        <x-button type="submit" size='lg'
          class="w-full bg-blue-800  hover:bg-blue-900 text-white rounded-full px-8 py-6 ">
          <x-lucide-log-in class="mr-2 size-4" /> Register Now
        </x-button>
      </div>
      <p class="text-sm mt-8 text-center text-gray-800">Already have an account?
        <a href="{{ route('login') }}" wire:navigate
          class="text-blue-600 font-semibold tracking-wide hover:underline ml-1">Login here</a>
      </p>
    </x-form>

    <div class="h-full flex justify-center items-center">
      <img src="{{ asset('storage/assets/vectors/mobile_login.svg') }}"
        class="rounded-md object-cover lg:w-full md:w-11/12 z-50 relative" alt="Dining Experience" />
    </div>
  </div>
</div>
