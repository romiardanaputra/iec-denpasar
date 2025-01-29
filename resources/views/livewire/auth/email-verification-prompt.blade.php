<div class="min-h-screen flex items-center justify-center container max-w-screen-sm">
  <x-card class="p-6 flex flex-col items-center gap-4 space-y-8">
    <div class="text-center">
      @if (session('status'))
        <x-alert variant="success" class="my-8">
          <x-lucide-triangle-alert class="size-4" />
          <x-alert.title>Hi,Romi Ardana Putra</x-alert.title>
          <x-alert.description>
            {{ session('status') }}
          </x-alert.description>
        </x-alert>
      @endif
      <x-typography.h1 class="text-xl">Email Verification Required!</x-typography.h1>
      <x-typography.p class="text-center w-[80%] mx-auto"> Please verify your email address to access the
        dashboard.</x-typography.p>
    </div>

    <x-button wire:click="sendVerificationEmail">Resend Verification Email</x-button>
  </x-card>
</div>
