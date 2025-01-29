<div class="min-h-screen flex items-center justify-center container max-w-screen-sm">
  <x-card class="p-6 flex flex-col items-center gap-4 space-y-8">
    <div class="text-center">
      <x-typography.h1 class="text-xl">Verify Email</x-typography.h1>
      <x-typography.p class="text-center w-[80%] mx-auto"> Your email is being verified. If you face any issues, please
        contact support.</x-typography.p>
    </div>
    <x-button wire:click="verify" class="btn btn-primary">Verify Email</x-button>
  </x-card>
</div>
