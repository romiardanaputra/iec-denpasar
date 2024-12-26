<section class="container py-16">
  <article class="space-y-4">
    <p class="font-medium text-blue-800">courses</p>
    <h1 class="lg:text-5xl font-medium sm:text-inherit leading-tight mb-5 ">Our program</h1>
    <div class="sm:flex justify-between gap-5">
      <p class="mb-4 sm:w-1/2 text-slate-600">Unlock your potential with our diverse range of English courses
        tailored for all
        levels. Whether you're a
        beginner or looking to refine your skills, we have the perfect program for you.</p>
      <a href="#">
        <x-button size='lg' class="bg-blue-800 text-white hover:bg-blue-800 rounded-full px-8 py-6">
          <x-lucide-eye class="mr-2 size-4" /> View all
        </x-button>
      </a>
    </div>
  </article>
  <article class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full my-8 ">
    @forelse ($cards as $card)
      <x-card class="min-w-[300px]">
        <x-card.header class="pb-4">
          <img class="w-100 object-cover rounded-xl" src="{{ asset('storage/assets/user/images/home/' . $card->img) }}"
            alt="course-image">
          <x-typography.h4 class="pt-4 px-6">
            {{ $card->title }}
          </x-typography.h4>
        </x-card.header>
        <x-card.content>
          <x-typography.p class="text-slate-600">
            {{ Str::limit($card->short_description, 70, '...') }}
          </x-typography.p>
        </x-card.content>
        <x-card.footer class="flex justify-between ">
          <div class="flex items-center gap-2">
            <div class="flex items-center justify-center text-slate-200 bg-blue-800 size-10 rounded-full">
              5
            </div>
            <div class="flex items-center">
              @for ($i = 0; $i < 5; $i++)
                <x-lucide-star class="mr-1 size-4 text-yellow-400" />
              @endfor
            </div>
          </div>
          <x-button size='lg'
            class="border border-blue-800 hover:bg-blue-800 hover:text-white bg-white text-blue-800 px-6 py-5 rounded-full">
            <x-lucide-user-round-plus class="mr-2 size-4" /> Enroll
          </x-button>
        </x-card.footer>
      </x-card>
    @empty
      <div>No data found</div>
    @endforelse

  </article>
</section>
