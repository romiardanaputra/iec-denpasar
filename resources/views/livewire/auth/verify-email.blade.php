<div class="min-h-screen flex items-center justify-center container max-w-screen-sm">
  <x-card class="p-6 flex flex-col items-center gap-4 space-y-8">
    <div class="text-center">
      <x-typography.h1 class="text-xl">Verify Email</x-typography.h1>
      <x-typography.p class="text-center w-[80%] mx-auto">
        @if ($verificationStatus === 'already_verified')
          <span class="text-green-600 font-semibold">Your email is already verified.</span>
        @elseif ($verificationStatus === 'success')
          <span class="text-green-600 font-semibold">Your email has been successfully verified!</span>
        @elseif ($verificationStatus === 'failed')
          <span class="text-red-600 font-semibold">Email verification failed. Please try again.</span>
        @elseif ($verificationStatus === 'error')
          <span class="text-red-600 font-semibold">An error occurred while verifying your email. Please contact
            support.</span>
        @endif
      </x-typography.p>
    </div>
    {{-- <x-button wire:click="verify" class="btn btn-primary">Verify Email</x-button> --}}
  </x-card>
  <script>
    setTimeout(() => {
      window.location.href = "{{ route('dashboard', ['verified' => 1]) }}";
    }, 2000);
  </script>
</div>
