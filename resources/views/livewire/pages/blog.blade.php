<div>
  @livewire('partials.hero-section', ['title' => 'Temukan Artikel Terbaru Seputar Bahasa Inggris di   ', 'subTitle' => ' Tips belajar, kisah sukses alumni, strategi TOEFL/IELTS, dan update informasi kursus terbaru dari para ahli', 'ctaButton' => '#blogKami', 'highlightedText' => 'Blog IEC Denpasar'])
  <div class="min-w-[478px]:container pt-12">

    <section class="lg:py-24 relative">
      <div class="w-full max-w-7xl mx-auto px-4 md:px-8">
        <div class="flex flex-col lg:flex-row items-center lg:items-center max-lg:gap-4 justify-between w-full">

          <div class="relative w-full max-w-sm">
            <svg class="absolute top-1/2 -translate-y-1/2 left-4 z-40" width="20" height="20" viewBox="0 0 20 20"
              fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M16.5555 3.33203H3.44463C2.46273 3.33203 1.66675 4.12802 1.66675 5.10991C1.66675 5.56785 1.84345 6.00813 2.16004 6.33901L6.83697 11.2271C6.97021 11.3664 7.03684 11.436 7.0974 11.5068C7.57207 12.062 7.85127 12.7576 7.89207 13.4869C7.89728 13.5799 7.89728 13.6763 7.89728 13.869V16.251C7.89728 17.6854 9.30176 18.6988 10.663 18.2466C11.5227 17.961 12.1029 17.157 12.1029 16.251V14.2772C12.1029 13.6825 12.1029 13.3852 12.1523 13.1015C12.2323 12.6415 12.4081 12.2035 12.6683 11.8158C12.8287 11.5767 13.0342 11.3619 13.4454 10.9322L17.8401 6.33901C18.1567 6.00813 18.3334 5.56785 18.3334 5.10991C18.3334 4.12802 17.5374 3.33203 16.5555 3.33203Z"
                stroke="black" stroke-width="1.6" stroke-linecap="round" />
            </svg>
            <select id="Offer"
              class="h-12 border border-gray-300 text-gray-900 pl-11 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50">
              <option selected>Sort by category</option>
              @foreach ($categories as $category)
                <option wire:key="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
            <svg class="absolute top-1/2 -translate-y-1/2 right-4 z-40" width="16" height="16"
              viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>

          <div class="relative w-full max-w-sm">
            <svg class="absolute top-1/2 -translate-y-1/2 left-4 z-40" width="20" height="20" viewBox="0 0 20 20"
              fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M16.5555 3.33203H3.44463C2.46273 3.33203 1.66675 4.12802 1.66675 5.10991C1.66675 5.56785 1.84345 6.00813 2.16004 6.33901L6.83697 11.2271C6.97021 11.3664 7.03684 11.436 7.0974 11.5068C7.57207 12.062 7.85127 12.7576 7.89207 13.4869C7.89728 13.5799 7.89728 13.6763 7.89728 13.869V16.251C7.89728 17.6854 9.30176 18.6988 10.663 18.2466C11.5227 17.961 12.1029 17.157 12.1029 16.251V14.2772C12.1029 13.6825 12.1029 13.3852 12.1523 13.1015C12.2323 12.6415 12.4081 12.2035 12.6683 11.8158C12.8287 11.5767 13.0342 11.3619 13.4454 10.9322L17.8401 6.33901C18.1567 6.00813 18.3334 5.56785 18.3334 5.10991C18.3334 4.12802 17.5374 3.33203 16.5555 3.33203Z"
                stroke="black" stroke-width="1.6" stroke-linecap="round" />
            </svg>
            <select id="Offer"
              class="h-12 border border-gray-300 text-gray-900 pl-11 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50">
              <option selected>Sort by author</option>
              @foreach ($authors as $key => $author)
                <option value="{{ $key }}">{{ $author }}</option>
              @endforeach
            </select>
            <svg class="absolute top-1/2 -translate-y-1/2 right-4 z-40" width="16" height="16"
              viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.0002 5.99845L8.00008 9.99862L3.99756 5.99609" stroke="#111827" stroke-width="1.6"
                stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>

          <div class="relative w-full max-w-sm">
            <input id="searcgBlog" wire:model="search"
              class="h-12 border border-gray-300 text-gray-900 pl-11 pr-16 text-base font-normal leading-7 rounded-full block w-full py-2.5 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50"
              placeholder="Search offers..." />
            <button wire:click="performSearch"
              class="absolute top-1/2 -translate-y-1/2 right-4 z-40 bg-blue-600 text-white rounded-full h-8 w-8 flex items-center justify-center hover:bg-blue-700 transition-all duration-200 focus:outline-none">
              <svg class="w-5 h-5" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M9.5 4C12.533 4 15 6.467 15 9.5C15 12.533 12.533 15 9.5 15C6.467 15 4 12.533 4 9.5C4 6.467 6.467 4 9.5 4ZM15.5 15.5L19 19"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" />
              </svg>
            </button>
          </div>
        </div>
        <svg class="my-7 w-full" xmlns="http://www.w3.org/2000/svg" width="1216" height="2" viewBox="0 0 1216 2"
          fill="none">
          <path d="M0 1H1216" stroke="#E5E7EB" />
        </svg>
        <div class="grid grid-cols-12">

          <div class="col-span-12 md:col-span-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
              <h2 class="font-manrope text-4xl font-bold text-gray-900 text-center mb-16">Our latest blog</h2>

              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($blogs as $key => $blog)
                  <a href="{{ route('blog.detail', ['slug' => $blog->slug]) }}" wire:key="{{ $blog->id }}">
                    <div
                      class="group border border-gray-300 rounded-2xl overflow-hidden transition-shadow hover:shadow-lg">
                      <img class="w-full h-48 object-cover"
                        src="{{ $blog->image ? (Str::startsWith($blog->image, 'http') ? $blog->image : asset('storage/' . Str::replaceLast('.png', '.webp', $blog->image))) : asset('images/default.webp') }}"
                        alt="{{ $blog->name }}" loading="lazy"
                        srcset="
                {{ $blog->image ? (Str::startsWith($blog->image, 'http') ? $blog->image : asset('storage/' . Str::replaceLast('.png', '-small.webp', $blog->image))) : asset('images/default-small.webp') }} 480w,
                {{ $blog->image ? (Str::startsWith($blog->image, 'http') ? $blog->image : asset('storage/' . Str::replaceLast('.png', '-medium.webp', $blog->image))) : asset('images/default-medium.webp') }} 768w,
                {{ $blog->image ? (Str::startsWith($blog->image, 'http') ? $blog->image : asset('storage/' . Str::replaceLast('.png', '-large.webp', $blog->image))) : asset('images/default-large.webp') }} 1024w
              "
                        sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" />
                      <div class="p-6 transition-all duration-300 group-hover:bg-gray-50">
                        <span
                          class="text-blue-600 font-medium mb-3 block">{{ $blog->created_at->format('F j, Y g:i A') }}</span>
                        <h4 class="text-xl text-gray-900 font-bold leading-8 mb-5">
                          {{ Str::limit($blog->title, 25) }}</h4>
                        <p class="text-gray-500 leading-6 mb-6">{{ Str::limit($blog->content, 100) }}</p>
                        <p class="text-base text-blue-600 hover:underline">
                          {{ $blog->author?->team?->name }} (author)</p>
                      </div>
                    </div>
                  </a>
                @empty
                  @livewire('partials.empty-state', [
                      'title' => 'No blogs posted yet',
                      'message' => 'We\'re working on some exciting content to share with you. Check back soon for fresh perspectives
                                                                                                                                                                                                                                                                                                                                                                                                                                    and insights.',
                      'iconType' => 'animation',
                      'customIcon' => 'assets/empty-state-animation/blog.gif',
                  ])
                @endforelse
                {{ $blogs->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @livewire('partials.scroll-to-top')
</div>
