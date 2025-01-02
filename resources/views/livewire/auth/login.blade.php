<div class="max-w-screen-xl mx-auto h-screen">
  <div class="grid md:grid-cols-2 items-center gap-8 h-full">
    <x-form wire:submit.prevent="login" method="post" class="max-w-lg max-md:mx-auto w-full p-6" autocomplete="on">
      @csrf
      <div class="mb-12">
        <h3 class="text-gray-800 text-4xl font-extrabold">Sign in</h3>
        <p class="text-gray-800 text-sm mt-6">Immerse yourself in a hassle-free login journey with our
          intuitively
          designed login form. Effortlessly access your account.</p>
      </div>
      <div class="mt-4">
        <x-label htmlFor="email">Email</x-label>
        <div class="relative flex items-center">
          <x-input wire:model.blur="email" name="email" required class="text-gray-800 rounded-full" type="email"
            id="email" placeholder="Email Address" autocomplete="email address" :value="old('email')" />
          <x-lucide-mail class="size-4 absolute right-0 mr-4" />
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <div class="mt-4">
        <x-label htmlFor="password">Password</x-label>
        <div class="relative flex items-center">
          <x-input wire:model.blur="password" name="password" required class="text-gray-800 rounded-full"
            type="password" id="password" placeholder="Password" autocomplete="new password" />
          <x-lucide-eye class="size-4 absolute right-0 mr-4" />
        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <div class="flex flex-wrap items-center gap-4 justify-between mt-4">
        <div class="flex items-center gap-4">
          <x-checkbox id="terms1" wire:model.live="remmember" name="remmember" />
          <x-label htmlFor="terms1"
            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
            Remember Me
          </x-label>
        </div>

        @if (Route::has('password.request'))
          <div class="text-sm">
            <a href="{{ route('password.request') }}" class="text-blue-600 font-semibold hover:underline">
              Forgot your password?
            </a>
          </div>
        @endif
      </div>

      <div class="mt-8">
        <x-button type="submit" size='lg'
          class="w-full bg-blue-800  hover:bg-blue-900 text-white rounded-full px-8 py-6 ">
          <x-lucide-log-in class="mr-2 size-4" /> Log In
        </x-button>
      </div>
      <p class="text-sm mt-8 text-center text-gray-800">Don't have an account?
        <a href="{{ route('register') }}" wire:navigate
          class="text-blue-600 font-semibold tracking-wide hover:underline ml-1">Sign Up</a>
      </p>
    </x-form>

    <div class="h-full flex justify-center items-center">
      <img src="https://readymadeui.com/photo.webp" class="rounded-md lg:w-4/5 md:w-11/12 z-50 relative"
        alt="Dining Experience" />
    </div>
  </div>
