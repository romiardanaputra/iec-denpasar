<div class="flex flex-wrap mt-6 -mx-3">
  <div class="w-full px-3 mb-6">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="flex-auto p-4">
        <h5 class="font-bold py-5">Change Password</h5>

        @if (session('status'))
          <div id="alert"
            class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-dark-gray border-slate-100">
            {{ session('status') }}
            <button type="button" onclick="alertClose()"
              class="absolute top-0 right-0 p-2 bg-transparent border-0 rounded text-size-sm">
              <span aria-hidden="true">&#10005;</span>
            </button>
          </div>
        @endif

        @if (session('demo'))
          <div id="alert-demo"
            class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-red border-slate-100">
            {{ session('demo') }}
            <button type="button" onclick="alertClose('alert-demo')"
              class="absolute top-0 right-0 p-2 bg-transparent border-0 rounded text-size-sm">
              <span aria-hidden="true">&#10005;</span>
            </button>
          </div>
        @endif

        <form wire:submit.prevent="resetPassword" autocomplete="on" id="profileForm" class="space-y-3">
          @csrf
          <div class="max-w-full px-3 w-full lg:flex-none">
            <div class="flex flex-col h-full space-y-3 ">
              <x-form.label for="currentPass">Current password</x-form.label>
              <x-input type="password" wire:model.defer="current_pass" id="currentPass"
                placeholder="insert current password" required />
              @error('current_pass')
                <p class="text-red-500 text-size-sm">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="max-w-full px-3 w-full lg:flex-none">
            <div class="flex flex-col h-full space-y-3">
              <x-form.label for="password">New password</x-form.label>
              <x-input type="new_password" wire:model.defer="new_password" id="newPassword" placeholder="new_password"
                required />
              @error('new_password')
                <p class="text-red-500 text-size-sm">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="max-w-full px-3 w-full lg:flex-none">
            <div class="flex flex-col h-full space-y-3">
              <x-form.label for="email">Confirm Password</x-form.label>
              <x-input type="password" wire:model.defer="confirm_pass" id="confirmPass"
                placeholder="insert your password" required />
              @error('confirm_pass')
                <p class="text-red-500 text-size-sm">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div>
            <x-typography.p class="text-xl font-semibold mt-5">
              Password Requirements
            </x-typography.p>
            <x-typography.muted>
              Please follow this guide for a strong password:
            </x-typography.muted>
            <x-typography.list class="text-sm">
              <li>One special characters</li>
              <li>Min 6 characters</li>
              <li>One number (2 are recommended)</li>
              <li>Change it often</li>
            </x-typography.list>
          </div>

          <div class="mt-4">
            <x-button type="submit">Save</x-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
