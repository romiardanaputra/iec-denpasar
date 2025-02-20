<div>
  <div class="container pt-40">
    <div class="flex flex-wrap gap-8">

      <div class="flex gap-4">

        <!-- Category Filter -->
        <div class="w-full lg:w-7/12">
          <div class="mb-4">
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="category" wire:model="selectedCategory"
              class="mt-1 block w-full p-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
              <option value="">All Categories</option>
              @foreach ($categories as $category)
                <option wire:key="{{ $category->id }}" value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Author Filter -->
        <div class="w-full lg:w-7/12">
          <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
            <select id="author" wire:model="selectedAuthor"
              class="mt-1 block w-full p-4 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
              <option value="">All Authors</option>
              @foreach ($authors as $author)
                <option wire:key="{{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Unified Search Bar and Filters -->
        <div class="w-full lg:w-7/12">
          <div class="mb-8">
            <label for="search" class="block text-sm font-medium text-gray-700">Search Blog</label>
            <div class="flex items-center space-x-2">
              <input type="text" wire:model="search"
                placeholder="Search blog posts by title, content, category, or author..."
                class="w-full p-4 border mt-1 border-gray-300 rounded focus:outline-none focus:border-blue-500" />
              <button wire:click="performSearch" class="p-4 bg-blue-500 text-white rounded hover:bg-blue-600">
                Search
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Content -->
      <div class="w-full lg:w-7/12 space-y-8">
        @foreach ($blogs as $key => $blog)
          <x-card wire:key="{{ $blog->id }}" class="p-4">
            <div class="flex items-center gap-4 mb-8">
              <x-avatar class="size-8">
                <x-avatar.image src="https://github.com/shadcn.png" />
                <x-avatar.fallback>{{ $blog->author->name }}</x-avatar.fallback>
              </x-avatar>
              <span class="text-slate-700 font-medium text-sm">{{ $blog->author->name }}</span>
            </div>
            <div class="flex items-center justify-between">
              <div class="w-8/12 space-y-4">
                <h1 class="font-bold text-2xl">{{ $blog->title }}</h1>
                <p class="text-slate-700 text-sm leading-relaxed tracking-wide">
                  {{ Str::limit($blog->content, 100) }}
                </p>
                <div class="flex gap-4 items-center">
                  <p class="text-slate-700 text-sm font-medium">{{ $blog->created_at->format('F j, Y g:i A') }}</p>
                  <span>-</span>
                  <p class="text-slate-700 text-sm font-medium">{{ $blog->category->name }}</p>
                </div>
              </div>
              <div class="w-2/12">
                <img class="aspect-video object-cover h-24" src="{{ asset('storage/' . $blog->image) }}"
                  alt="{{ $blog->title }}">
              </div>
            </div>
          </x-card>
        @endforeach

        <!-- Pagination Links -->
        <div class="mt-8">
          <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
            <ul class="pagination flex gap-2">
              @if ($blogs->onFirstPage())
                <li class="page-item disabled">
                  <span
                    class="page-link relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    Previous
                  </span>
                </li>
              @else
                <li class="page-item">
                  <button wire:click="previousPage"
                    class="page-link relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:z-20 focus:outline-none focus:bg-gray-100 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Previous
                  </button>
                </li>
              @endif

              @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $blogs->currentPage() ? 'active' : '' }}">
                  <button wire:click="gotoPage({{ $page }})"
                    class="page-link relative inline-flex items-center px-4 py-2 text-sm font-medium {{ $page == $blogs->currentPage() ? 'bg-blue-500 text-white' : 'text-gray-700 bg-white' }} border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:z-20 focus:outline-none focus:bg-gray-100 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {{ $page }}
                  </button>
                </li>
              @endforeach

              @if ($blogs->hasMorePages())
                <li class="page-item">
                  <button wire:click="nextPage"
                    class="page-link relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:z-20 focus:outline-none focus:bg-gray-100 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Next
                  </button>
                </li>
              @else
                <li class="page-item disabled">
                  <span
                    class="page-link relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    Next
                  </span>
                </li>
              @endif
            </ul>
          </nav>
        </div>
        {{ $blogs->links() }}

      </div>

      <!-- Sticky Sidebar -->
      <div class="w-full lg:w-4/12 lg:sticky top-20 self-start">
        <x-card class="p-8 px-4">
          <span class="font-medium text-lg">Rekomendasi Berita</span>
          @foreach ($recommendedBlogs as $key => $recommendedBlog)
            <x-card class="p-4 mt-4" wire:key="{{ $recommendedBlog->id }}">
              <div class="flex items-center gap-4 mb-2">
                <x-avatar class="size-6">
                  <x-avatar.image src="https://github.com/shadcn.png" />
                  <x-avatar.fallback>{{ $recommendedBlog->author->name }}</x-avatar.fallback>
                </x-avatar>
                <span class="text-slate-700 font-medium text-[13px]">{{ $recommendedBlog->author->name }}</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="w-full space-y-2">
                  <h1 class="font-bold text-base">{{ $recommendedBlog->title }}</h1>
                  <p class="text-slate-700 text-[13px] leading-relaxed tracking-wide">
                    {{ Str::limit($recommendedBlog->content, 50) }}
                  </p>
                  <div class="flex gap-4 items-center">
                    <p class="text-slate-700 text-[13px] font-medium">
                      {{ $recommendedBlog->created_at->format('F j, Y g:i A') }}</p>
                    <span>-</span>
                    <p class="text-slate-700 text-[13px] font-medium">{{ $recommendedBlog->category->name }}</p>
                  </div>
                </div>
              </div>
            </x-card>
          @endforeach
        </x-card>
      </div>
    </div>
  </div>
</div>
