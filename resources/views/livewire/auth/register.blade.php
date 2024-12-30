<div class="max-w-screen-xl mx-auto h-screen">
  <div class="grid md:grid-cols-2 items-center gap-8 h-full">
    <form class="max-w-lg max-md:mx-auto w-full p-6">
      <div class="mb-12">
        <h3 class="text-gray-800 text-4xl font-extrabold">Sign Up</h3>
        <p class="text-gray-800 text-sm mt-6">Immerse yourself in a hassle-free login journey with our intuitively
          designed login form. Effortlessly access your account.</p>
      </div>

      <div class="mt-4">
        <x-label htmlFor="fullName">Full Name</x-label>
        <div class="relative flex items-center">
          <x-input class="text-gray-800 rounded-full" type="text" id="fullName" placeholder="full name" />
          <x-lucide-user class="size-4 absolute right-0 mr-4" />
        </div>
      </div>

      <div class="grid lg:grid-cols-2 gap-4">
        <div class="mt-4">
          <x-label htmlFor="phone">Phone Number</x-label>
          <div class="relative flex items-center">
            <x-input class="text-gray-800 rounded-full" type="number" id="phone" placeholder="Phone Number" />
            <x-lucide-phone class="size-4 absolute right-0 mr-4" />
          </div>
        </div>

        <div class="mt-4">
          <x-label htmlFor="email">Email</x-label>
          <div class="relative flex items-center">
            <x-input class="text-gray-800 rounded-full" type="email" id="email" placeholder="Email Address" />
            <x-lucide-mail class="size-4 absolute right-0 mr-4" />
          </div>
        </div>
      </div>

      <div class="grid lg:grid-cols-2 gap-4">
        <div class="mt-4">
          <x-label htmlFor="password">Password</x-label>
          <div class="relative flex items-center">
            <x-input class="text-gray-800 rounded-full" type="password" id="password" placeholder="Password" />
            <x-lucide-eye class="size-4 absolute right-0 mr-4" />
          </div>
        </div>

        <div class="mt-4">
          <x-label htmlFor="passConfirm">Confirm Password</x-label>
          <div class="relative flex items-center">
            <x-input class="text-gray-800 rounded-full" type="passConfirm" id="passConfirm"
              placeholder="Confirm Password" />
            <x-lucide-eye-off class="size-4 absolute right-0 mr-4" />
          </div>
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-4 justify-between mt-4">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox"
            class="shrink-0 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded-md" />
          <label for="remember-me" class="ml-3 block text-sm text-gray-800">
            Remember me
          </label>
        </div>
        <div class="text-sm">
          <a href="jajvascript:void(0);" class="text-blue-600 font-semibold hover:underline">
            Forgot your password?
          </a>
        </div>
      </div>

      <div class="mt-8">
        <x-button size='lg' class="w-full bg-blue-800  hover:bg-blue-900 text-white rounded-full px-8 py-6 ">
          <x-lucide-log-in class="mr-2 size-4" /> Sign In
        </x-button>
      </div>
      <p class="text-sm mt-8 text-center text-gray-800">Already have an account? <a href="{{ route('login') }}"
          class="text-blue-600 font-semibold tracking-wide hover:underline ml-1">Login here</a></p>
    </form>

    <div class="h-full flex justify-center items-center">
      <img src="https://readymadeui.com/photo.webp" class="rounded-md lg:w-4/5 md:w-11/12 z-50 relative"
        alt="Dining Experience" />
    </div>
  </div>
</div>
