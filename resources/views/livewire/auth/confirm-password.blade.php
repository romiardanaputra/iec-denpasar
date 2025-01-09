<x-guest-layout>
  <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
  </div>
  <x-form wire:submit.prevent="passwordConfirm" method="post">
    @csrf
    <div class="mt-4">
      <x-label htmlFor="password">Password</x-label>
      <div class="relative flex items-center">
        <x-input wire:model.blur="password" name="password" required class="text-gray-800 rounded-full" type="password"
          id="password" placeholder="Password" autocomplete="new password" />
        <x-lucide-eye class="size-4 absolute right-0 mr-4" />
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
</x-guest-layout>
