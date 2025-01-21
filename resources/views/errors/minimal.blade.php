<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    @vite(['resources/css/luvi-ui.css', 'resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body class="antialiased">
    <section class="bg-white dark:bg-gray-900 min-h-screen flex items-center mx-auto max-w-screen-xl gap-8 ">
      <div>
        <img class="size-full" src="{{ asset('storage/assets/user/vectors/undraw_no-data.svg') }}" alt="no-data-vectors">
      </div>
      <div class="py-8 px-4 lg:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm ">
          <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600 dark:text-primary-500">
            @yield('code')
          </h1>
          <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Something's
            missing.</p>
          <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">@yield('message')</p>
          <a href="{{ route('dashboard') }}"
            class="inline-flex text-white bg-blue-800 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Back
            to Homepage</a>
        </div>
      </div>
    </section>
  </body>
</html>
