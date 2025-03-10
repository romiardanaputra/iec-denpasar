<div>
  <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
  </div>
  <x-form wire:submit="passwordConfirm" method="POST">
    <div class="mt-4">
      <x-label htmlFor="password">Password</x-label>
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
    <div class="mt-8">
      <x-button type="submit" size='lg'
        class="w-full bg-blue-800  hover:bg-blue-900 text-white rounded-full px-8 py-6 ">
        <x-lucide-log-in class="mr-2 size-4" />Confirm
      </x-button>
    </div>
  </x-form>
</div>
