<div>
  <div class="w-full px-6 mx-auto">
    <div class="relative flex items-center p-0 mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl"
      style="background-image: url({{ asset('/assets/img/curved-images/curved0.jpg') }}); background-position-y: 50%;">
      <span class="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-fuchsia opacity-60"></span>
    </div>
    <div
      class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/80 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
      <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-auto max-w-full px-3">
          <div
            class="text-size-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
            <img src="{{ $user->gauth_avatar }}" alt="{{ $user->name }}" class="w-full shadow-soft-sm rounded-xl" />
          </div>
        </div>
        <div class="flex-none w-auto max-w-full px-3 my-auto">
          <div class="h-full">
            <h5 class="mb-1">{{ $user->name ?? 'Kadek Romi Ardana Putra' }}</h5>
            <p class="mb-0 font-semibold leading-normal text-size-sm">{!! htmlspecialchars($user->email) !!}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="flex flex-wrap mt-6 -mx-3">
    <div class="w-full px-3 mb-6">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <h5 class="font-bold py-5">Basic Info</h5>

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

          <x-form wire:submit="saveProfile" autocomplete="on" id="profileForm">
            <div class="flex flex-wrap -mx-3">
              <div class="max-w-full px-3 w-1/2 lg:flex-none">
                <div class="flex flex-col h-full space-y-3">
                  <x-label htmlFor="name">Name</x-label>
                  <x-input type="text" wire:model.defer="name" id="name" placeholder="name" :value="old('name', $user->name)"
                    required autofocus autocomplete />
                  @error('name')
                    <p class="text-red-500 text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="max-w-full px-3 w-1/2 lg:flex-none">
                <div class="flex flex-col h-full space-y-3">
                  <x-label htmlFor="email">Email</x-label>
                  <x-input type="email" wire:model.defer="email" id="email" placeholder="email" required
                    autocomplete :value="old('email', $user->email)" />
                  @error('email')
                    <p class="text-red-500   text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mt-4">
              <div class="max-w-full px-3 w-1/2 lg:flex-none space-y-3">
                <x-label htmlFor="phone">Phone Number</x-label>
                <x-input type="text" :value="old('phone', $user->phone)" wire:model.defer="phone" id="phone"
                  placeholder="phone number" required autocomplete />
                @error('phone')
                  <p class="text-red-500 text-size-sm">{{ $message }}</p>
                @enderror
              </div>
              <div class="max-w-full px-3 w-1/2 lg:flex-none space-y-3">
                <x-label htmlFor="address">Address</x-label>
                <x-input :value="old('address', $user->address)" type="text" wire:model.defer="address" id="address"
                  placeholder="address" required autocomplete />
                @error('address')
                  <p class="text-red-500 text-size-sm">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mt-4">
              <div class="max-w-full px-3 w-4/12 lg:flex-none space-y-3">
                <x-label htmlFor="country_code">Kode negara</x-label>
                <x-input type="text" :value="old('country_code', $user->country_code)" wire:model.defer="country_code" id="country_code"
                  placeholder="country_code" required />
                @error('country_code')
                  <p class="text-red-500 text-size-sm">{{ $message }}</p>
                @enderror
              </div>
              <div class="max-w-full px-3 w-4/12 lg:flex-none space-y-3">
                <x-label htmlFor="city">Kota</x-label>
                <x-input :value="old('city', $user->city)" type="text" wire:model.defer="city" id="city" placeholder="city"
                  required />
                @error('city')
                  <p class="text-red-500 text-size-sm">{{ $message }}</p>
                @enderror
              </div>
              <div class="max-w-full px-3 w-4/12 lg:flex-none space-y-3">
                <x-label htmlFor="postal_code">kode Pos</x-label>
                <x-input :value="old('postal_code', $user->postal_code)" type="text" wire:model.defer="postal_code" id="postal_code"
                  placeholder="postal_code" required autocomplete />
                @error('postal_code')
                  <p class="text-red-500 text-size-sm">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="space-y-3 mt-4">
              <x-label htmlFor="about">Tentang Saya</x-label>
              <x-textarea :value="old('about', $user->about)" wire:model.defer="about" id="about" rows="5"
                placeholder="Tell us about yourself" required></x-textarea>
              @error('about')
                <p class="text-red-500 text-size-sm">{{ $message }}</p>
              @enderror
            </div>

            <div class="mt-4">
              <x-button type="submit">Save</x-button>
            </div>
          </x-form>
        </div>
      </div>
    </div>
  </div>

  <div class="flex flex-wrap mt-6 -mx-3">
    <div class="w-full px-3 mb-6">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <h5 class="font-bold py-5">Change Password</h5>

          @if (session('success_reset_password'))
            <div id="alert"
              class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-dark-gray border-slate-100">
              {{ session('success_reset_password') }}
              <button type="button" onclick="alertClose()"
                class="absolute top-0 right-0 p-2 bg-transparent border-0 rounded text-size-sm">
                <span aria-hidden="true">&#10005;</span>
              </button>
            </div>
          @endif

          @if (session('error_reset_password'))
            <div id="alert-error_reset_password"
              class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-red border-slate-100">
              {{ session('error_reset_password') }}
              <button type="button" onclick="alertClose('alert-error_reset_password')"
                class="absolute top-0 right-0 p-2 bg-transparent border-0 rounded text-size-sm">
                <span aria-hidden="true">&#10005;</span>
              </button>
            </div>
          @endif

          <x-form wire:submit="resetPassword" autocomplete="on" id="passwordForm">
            <div class="flex flex-wrap -mx-3">
              <div class="max-w-full px-3 w-1/2 lg:flex-none">
                <div class="flex flex-col h-full space-y-3">
                  <x-label htmlFor="current_password">Current password</x-label>
                  <x-input type="text" wire:model.defer="current_password" id="current_password"
                    placeholder="current_password" required />
                  @error('current_password')
                    <p class="text-red-500 text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="max-w-full px-3 w-1/2 lg:flex-none">
                <div class="flex flex-col h-full space-y-3">
                  <x-label htmlFor="password">New password</x-label>
                  <x-input type="password" wire:model.defer="password" id="password" placeholder="password"
                    required />
                  @error('password')
                    <p class="text-red-500 text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 mt-4">
              <div class="max-w-full px-3 w-1/2 lg:flex-none">
                <div class="flex flex-col h-full space-y-3">
                  <x-label htmlFor="password_confirmation">Confirm Password</x-label>
                  <x-input type="password_confirmation" wire:model.defer="password_confirmation"
                    id="password_confirmation" placeholder="password_confirmation" required />
                  @error('password_confirmation')
                    <p class="text-red-500 text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

            </div>

            <div class="mt-4">
              <x-button type="submit">Save</x-button>
            </div>
          </x-form>
        </div>
      </div>
    </div>
  </div>
</div>
