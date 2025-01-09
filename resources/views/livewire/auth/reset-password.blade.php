<div class="max-w-screen-sm w-[400px] min-h-screen flex justify-center items-center mx-auto">
  <x-form wire:submit.prevent="resetPassword" method="post" class="w-full">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
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
        <x-input wire:model.blur="password" name="password" required class="text-gray-800 rounded-full" type="password"
          id="password" placeholder="Password" autocomplete="new password" />
        <x-lucide-eye class="size-4 absolute right-0 mr-4" />
      </div>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <div class="mt-4">
      <x-label htmlFor="password_confirmation">Confirm Password</x-label>
      <div class="relative flex items-center">
        <x-input wire:model.blur="password_confirmation" name="password_confirmation" required
          class="text-gray-800 rounded-full" type="password" id="password_confirmation" placeholder="Confirm Password"
          autocomplete="confirmation password" />
        <x-lucide-eye-off class="size-4 absolute right-0 mr-4" />
      </div>
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
    </div>
    <div class="mt-8">
      <x-button type="submit" size='lg'
        class="w-full bg-blue-800  hover:bg-blue-900 text-white rounded-full px-8 py-6 ">
        <x-lucide-log-in class="mr-2 size-4" /> Reset Password
      </x-button>
    </div>
  </x-form>
</div>
