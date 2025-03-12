<div class="pt-8 pb-16 lg:pt-32 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
    <article
      class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
      <header class="mb-4 lg:mb-6 not-format">
        <address class="flex items-center mb-6 not-italic">
          <div>
            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
              <img class="mr-4 w-16 h-16 object-cover rounded-full"
                src="{{ $blog->author->team?->image ? (Str::startsWith($blog->author?->team?->image, 'http') ? $blog->author?->team?->image : asset('storage/' . $blog->author?->team?->image)) : 'https://png.pngtree.com/png-clipart/20231019/original/pngtree-user-profile-avatar-png-image_13369988.png' }}"
                alt="{{ $blog->author?->team?->name ?? 'author tidak diketahui' }}" />
              <a href="#" rel="author"
                class="text-xl font-bold text-gray-900 dark:text-white">{{ $blog->author?->team?->name ?? 'author tidak diketahui' }}</a>
            </div>

            <p class="text-base text-gray-500 mb-3 dark:text-gray-400">{{ $blog->author->bio }}</p>
            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate
                datetime="{{ $blog->created_at->toDateString() }}"
                title="{{ $blog->created_at->format('F j, Y') }}">{{ $blog->created_at->format('F j, Y') }}</time></p>
          </div>
        </address>
        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
          {{ $blog->title }}</h1>
      </header>
      <div class="mb-4">
        <img class="w-full h-full object-cover"
          src="{{ $blog->image ? (Str::startsWith($blog->image, 'http') ? $blog->image : asset('storage/' . Str::replaceLast('.png', '.webp', $blog->image))) : asset('images/default.webp') }}"
          alt="{{ $blog->name }}" loading="lazy"
          srcset="
                {{ $blog->image ? (Str::startsWith($blog->image, 'http') ? $blog->image : asset('storage/' . Str::replaceLast('.png', '-small.webp', $blog->image))) : asset('images/default-small.webp') }} 480w,
                {{ $blog->image ? (Str::startsWith($blog->image, 'http') ? $blog->image : asset('storage/' . Str::replaceLast('.png', '-medium.webp', $blog->image))) : asset('images/default-medium.webp') }} 768w,
                {{ $blog->image ? (Str::startsWith($blog->image, 'http') ? $blog->image : asset('storage/' . Str::replaceLast('.png', '-large.webp', $blog->image))) : asset('images/default-large.webp') }} 1024w
              "
          sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" />
      </div>
      <div class="prose prose-lg max-w-none">
        {!! nl2br(e($blog->content)) !!}
      </div>
    </article>
  </div>
  @livewire('partials.scroll-to-top')
</div>
