<div>
  <div class="container pt-40">
    <div class="flex flex-wrap gap-8">
      <!-- Main Content -->
      <div class="w-full lg:w-7/12 space-y-8">
        @for ($i = 0; $i < 3; $i++)
          <x-card class="p-4">
            <div class="flex items-center gap-4 mb-8">
              <x-avatar class="size-8">
                <x-avatar.image src="https://github.com/shadcn.png" />
                <x-avatar.fallback>Kadek Romi Ardana Putra</x-avatar.fallback>
              </x-avatar>
              <span class="text-slate-700 font-medium text-sm">Kadek Romi Ardana Putra</span>
            </div>
            <div class="flex items-center justify-between">
              <div class="w-8/12 space-y-4">
                <h1 class="font-bold text-2xl">Laravel 12 Is coming</h1>
                <p class="text-slate-700 text-sm leading-relaxed tracking-wide">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit labore alias laboriosam ipsam
                  nostrum,
                  esse enim nihil maiores sequi magnam delectus unde tempora error architecto commodi possimus
                  consequuntur
                  aperiam obcaecati.
                </p>
                <div class="flex gap-4 items-center">
                  <p class="text-slate-700 text-sm font-medium">10 Januari 2025</p>
                  <span>-</span>
                  <p class="text-slate-700 text-sm font-medium">Kategori Blog</p>
                </div>
              </div>
              <div class="w-2/12">
                <img class="aspect-video object-cover"
                  src="https://miro.medium.com/v2/resize:fit:640/format:webp/0*9FiR6bauClbM5Pc3" alt="test">
              </div>
            </div>
          </x-card>
        @endfor
      </div>

      <!-- Sticky Sidebar -->
      <div class="w-full lg:w-4/12 lg:sticky top-20 self-start">
        <x-card class="p-8 px-4">
          <span class="font-medium text-lg">Rekomendasi Berita</span>
          @for ($i = 0; $i < 4; $i++)
            <x-card class="p-4 mt-4">
              <div class="flex items-center gap-4 mb-2">
                <x-avatar class="size-6">
                  <x-avatar.image src="https://github.com/shadcn.png" />
                  <x-avatar.fallback>Authors</x-avatar.fallback>
                </x-avatar>
                <span class="text-slate-700 font-medium text-[13px]">Authors</span>
              </div>
              <div class="flex items-center justify-between">
                <div class="w-full space-y-2">
                  <h1 class="font-bold text-base">Laravel 12 Is coming</h1>
                  <p class="text-slate-700 text-[13px] leading-relaxed tracking-wide">
                    {{ Str::limit(
                        'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit labore alias laboriosam ipsam nostrum,
                                                                                                  esse enim nihil maiores sequi magnam delectus unde tempora error architecto commodi possimus consequuntur
                                                                                                  aperiam obcaecati.',
                        100,
                    ) }}
                  </p>
                  <div class="flex gap-4 items-center">
                    <p class="text-slate-700 text-[13px] font-medium">10 Januari 2025</p>
                    <span>-</span>
                    <p class="text-slate-700 text-[13px] font-medium">Kategori Blog</p>
                  </div>
                </div>
              </div>
            </x-card>
          @endfor

        </x-card>
      </div>
    </div>
  </div>
</div>
