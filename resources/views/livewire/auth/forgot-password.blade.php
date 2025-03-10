<div class="max-w-screen-sm w-[400px] mx-auto min-h-screen flex flex-col items-center justify-center">
  <x-auth-session-status class="mb-4" :status="session('status')" />
  <form wire:submit="store" method="post" class="w-full">
    @csrf
    <x-card class="p-6 shadow-lg space-y-6">
      <fieldset>
        <legend class="font-bold text-center text-xl">Forgot Password</legend>
        <div class="my-4 text-sm text-center leading-relaxed text-gray-800 dark:text-gray-400">
          {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <div class="mt-4">
          <x-label for="email">Email</x-label>
          <div class="relative flex items-center">
            <x-input wire:model="email" name="email" required class="text-gray-800 rounded-full" type="email"
              id="email" placeholder="Email Address" autocomplete="email address" />
            <x-lucide-mail class="size-4 absolute right-0 mr-4" />
          </div>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mt-8">
          <x-button type="submit" size='lg'
            class="w-full bg-blue-600 hover:bg-blue-700 text-white rounded-full px-8 py-6">
            <x-lucide-log-in class="mr-2 size-4" /> Reset Password
          </x-button>
        </div>
      </fieldset>
    </x-card>
  </form>
</div>
