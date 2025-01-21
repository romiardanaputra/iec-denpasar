<x-app-layout>
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
              <img src="{{ asset('assets/img/bruce-mars.jpg') }}" alt="profile_image"
                class="w-full shadow-soft-sm rounded-xl" />
            </div>
          </div>
          <div class="flex-none w-auto max-w-full px-3 my-auto">
            <div class="h-full">
              <h5 class="mb-1">{{ $user->name ?? 'Kadek Romi Ardana Putra' }}</h5>
              <p class="mb-0 font-semibold leading-normal text-size-sm">CEO / Co-Founder</p>
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

            <form wire:submit.prevent="save" autocomplete="on" id="profileForm">
              @csrf
              <div class="flex flex-wrap -mx-3">
                <div class="max-w-full px-3 w-1/2 lg:flex-none">
                  <div class="flex flex-col h-full space-y-3">
                    <x-form.label for="name">Name</x-form.label>
                    <x-input type="text" wire:model.defer="name" id="name" placeholder="name" required />
                    @error('name')
                      <p class="text-red-500 text-size-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="max-w-full px-3 w-1/2 lg:flex-none">
                  <div class="flex flex-col h-full space-y-3">
                    <x-form.label for="email">Email</x-form.label>
                    <x-input type="email" wire:model.defer="email" id="email" placeholder="email" required />
                    @error('email')
                      <p class="text-red-500 text-size-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mt-4">
                <div class="max-w-full px-3 w-1/2 lg:flex-none space-y-3">
                  <x-form.label for="phone">Phone Number</x-form.label>
                  <x-input type="text" wire:model.defer="phone" id="phone" placeholder="phone number" required />
                  @error('phone')
                    <p class="text-red-500 text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
                <div class="max-w-full px-3 w-1/2 lg:flex-none space-y-3">
                  <x-form.label for="address">Address</x-form.label>
                  <x-input type="text" wire:model.defer="address" id="address" placeholder="address" required />
                  @error('address')
                    <p class="text-red-500 text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="space-y-3 mt-4">
                <x-form.label for="about">About Me</x-form.label>
                <x-textarea wire:model.defer="about" id="about" rows="5" placeholder="Tell us about yourself"
                  required></x-textarea>
                @error('about')
                  <p class="text-red-500 text-size-sm">{{ $message }}</p>
                @enderror
              </div>

              <div class="mt-4">
                <x-button type="submit">Save</x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

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

            <form wire:submit.prevent="resetPassword" autocomplete="on" id="profileForm">
              @csrf
              <div class="flex flex-wrap -mx-3">
                <div class="max-w-full px-3 w-1/2 lg:flex-none">
                  <div class="flex flex-col h-full space-y-3">
                    <x-form.label for="name">Current password</x-form.label>
                    <x-input type="text" wire:model.defer="name" id="name" placeholder="name" required />
                    @error('name')
                      <p class="text-red-500 text-size-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="max-w-full px-3 w-1/2 lg:flex-none">
                  <div class="flex flex-col h-full space-y-3">
                    <x-form.label for="email">New password</x-form.label>
                    <x-input type="email" wire:model.defer="email" id="email" placeholder="email" required />
                    @error('email')
                      <p class="text-red-500 text-size-sm">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="flex flex-wrap -mx-3 mt-4">
                <div class="max-w-full px-3 w-1/2 lg:flex-none space-y-3">
                  <x-form.label for="phone">Phone Number</x-form.label>
                  <x-input type="text" wire:model.defer="phone" id="phone" placeholder="phone number"
                    required />
                  @error('phone')
                    <p class="text-red-500 text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
                <div class="max-w-full px-3 w-1/2 lg:flex-none space-y-3">
                  <x-form.label for="address">Address</x-form.label>
                  <x-input type="text" wire:model.defer="address" id="address" placeholder="address"
                    required />
                  @error('address')
                    <p class="text-red-500 text-size-sm">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="space-y-3 mt-4">
                <x-form.label for="about">About Me</x-form.label>
                <x-textarea wire:model.defer="about" id="about" rows="5"
                  placeholder="Tell us about yourself" required></x-textarea>
                @error('about')
                  <p class="text-red-500 text-size-sm">{{ $message }}</p>
                @enderror
              </div>

              <div class="mt-4">
                <x-button type="submit">Save</x-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
