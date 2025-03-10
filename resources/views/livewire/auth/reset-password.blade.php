<div class="max-w-screen-sm w-[400px] min-h-screen flex justify-center items-center mx-auto">
  <x-form wire:submit="resetPassword" method="POST" class="w-full">
    <x-card class="p-6">
      <div class="text-center">
        <legend class="font-bold text-xl">Reset Password</legend>
        <small>reset your password here</small>
      </div>
      <input type="hidden" name="token" value="{{ $token }}">
      <div class="mt-4">
        <x-label for="email">Email</x-label>
        <div class="relative flex items-center">
          <x-input wire:model="email" required class="text-gray-800 rounded-full" type="email" id="email"
            placeholder="Email Address" autocomplete :value="old('email')" />
          <x-lucide-mail class="size-4 absolute right-0 mr-4" />
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
      <div class="mt-4">
        <x-label for="password">Password</x-label>
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
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="mt-4">
        <x-label for="password_confirmation">Confirm Password</x-label>
        <div class="relative flex items-center" x-data="{ show: false }">
          <x-input wire:model="password_confirmation" name="password_confirmation" required
            class="text-gray-800 rounded-full" x-bind:type="show ? 'text' : 'password'" id="password_confirmation"
            placeholder="password_confirmation" />
          <button type="button" class="absolute right-0 mr-4 focus:outline-none" x-on:click="show = !show">
            <x-lucide-eye class="size-4" x-show="!show" />
            <x-lucide-eye-off class="size-4" x-show="show" />
          </button>
        </div>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
      </div>
      <div class="mt-8">
        <x-button type="submit" size='lg'
          class="w-full bg-blue-600  hover:bg-blue-700 text-white rounded-full px-8 py-6 ">
          <x-lucide-log-in class="mr-2 size-4" /> Reset Password
        </x-button>
      </div>
    </x-card>
  </x-form>
</div>
