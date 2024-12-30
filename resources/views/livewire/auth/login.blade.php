<div class="max-w-screen-xl mx-auto h-screen">
  <div class="grid md:grid-cols-2 items-center gap-8 h-full">
    <form class="max-w-lg max-md:mx-auto w-full p-6">
      <div class="mb-12">
        <h3 class="text-gray-800 text-4xl font-extrabold">Sign in</h3>
        <p class="text-gray-800 text-sm mt-6">Immerse yourself in a hassle-free login journey with our intuitively
          designed login form. Effortlessly access your account.</p>
      </div>

      <div>
        <label class="text-gray-800 font-medium text-[15px] mb-2 block">Email</label>
        <div class="relative flex items-center">
          <input name="email" type="text" required
            class="w-full text-sm text-gray-800 focus:bg-transparent px-4 py-3.5 rounded-full border-1 border-blue-800 outline-blue-800"
            placeholder="Enter email" />
          <x-lucide-mail class="size-4 absolute right-0 mr-4" />
        </div>
      </div>

      <div class="mt-4">
        <label class="text-gray-800 text-[15px] font-medium mb-2 block">Password</label>
        <div class="relative flex items-center">
          <input name="password" type="password" required
            class="w-full text-sm text-gray-800  focus:bg-transparent px-4 py-3.5 rounded-full border-1 border-blue-800 outline-blue-800"
            placeholder="Enter password" />
          <x-lucide-eye class="size-4 absolute right-0 mr-4" />
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
        <button type="button"
          class="w-full shadow-xl py-4 px-6 text-sm tracking-wide font-semibold rounded-full text-white bg-blue-800 hover:bg-blue-900 focus:outline-none">
          Log in
        </button>
      </div>
      <p class="text-sm mt-8 text-center text-gray-800">Don't have an account? <a href="javascript:void(0);"
          class="text-blue-600 font-semibold tracking-wide hover:underline ml-1">Register here</a></p>
    </form>

    <div class="h-full flex justify-center items-center">
      <img src="https://readymadeui.com/photo.webp" class="rounded-md lg:w-4/5 md:w-11/12 z-50 relative"
        alt="Dining Experience" />
    </div>
  </div>
</div>
