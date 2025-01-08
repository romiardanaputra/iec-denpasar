<x-guest-layout>
  <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
  </div>
  @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
      {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
  @endif
  <x-form action={{ route('verification.send') }} method="post">
    @csrf
    <div class="mt-8">
      <x-button type="submit" size='lg'
        class="w-full bg-blue-800  hover:bg-blue-900 text-white rounded-full px-8 py-6 ">
        <x-lucide-log-in class="mr-2 size-4" /> Resend Verification Email
      </x-button>
    </div>
  </x-form>
</x-guest-layout>
