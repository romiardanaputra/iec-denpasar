<div>
  @livewire('partials.navbar')
  <div class="min-h-screen space-y-20">
    {{-- banner here --}}
    <section class="min-h-svh flex items-center justify-center">
      <div class="flex items-center container w-full">
        <div class="space-y-8 w-full">
          <article class="space-y-8 sm:space-y-6 ">
            <h1 class="text-6xl text-slate-700 font-medium sm:text-inherit leading-tight">A new way to learn <br> & get
              knowledge</h1>
            <p class="sm:w-[80%]">Join our dynamic English courses designed for all levels. Discover the joy of learning
            </p>
          </article>
          <div class="flex gap-5">
            <a href="#">
              <x-button size='lg' class="bg-blue-800 text-white hover:bg-blue-800 rounded-full py-6 px-12">
                <x-lucide-mail-open class="mr-2 size-4" /> Explore
              </x-button>
            </a>
            <a href="#">
              <x-button size='lg'
                class="border border-blue-800 bg-white text-blue-800 hover:bg-blue-800 hover:text-white rounded-full py-6 px-12 ">
                <x-lucide-mail-open class="mr-2 size-4" /> Sign Up
              </x-button>
            </a>
          </div>
        </div>
        <div class="w-full">
          <img class="size-full h-fit" src="{{ asset('storage/assets/user/images/home/hero.svg') }}" alt="hero.svg">
        </div>
      </div>
    </section>

    {{-- why choose us section --}}
    <section class="container mx-auto pb-10">
      <div class="grid xl:grid-cols-2 xl:gap-20 ">
        <article class="place-self-center">
          <h1 class="text-6xl font-medium sm:text-inherit leading-tight mb-5">A new way to learn <br> & get knowledge
          </h1>
          <div class="leading-relaxed space-y-4 mb-8 text-slate-700">
            <x-typography.p>
              Our English courses are designed for learners of all levels, ensuring personalized attention and effective
              learning. Experience interactive lessons that make mastering English enjoyable and impactful.
            </x-typography.p>
            <x-typography.list>
              <li>1st level of puns: 5 gold coins</li>
              <li>2nd level of jokes: 10 gold coins</li>
              <li>3rd level of one-liners : 20 gold coins</li>
            </x-typography.list>
          </div>
          <a href="#">
            <x-button size='lg' class="bg-blue-800 text-white hover:bg-blue-800 rounded-full py-6 px-12">
              <x-lucide-mail-open class="mr-2 size-4" /> Enroll Now
            </x-button>
          </a>
        </article>

        <div class="size-[100%] ">
          <img class="size-full rounded-xl object-cover" src="{{ asset('storage/assets/user/images/home/whyus.webp') }}"
            alt="why-us-course-image">
        </div>

      </div>
    </section>

    {{-- program section --}}
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
            <x-button size='lg' class="bg-blue-800 text-white hover:bg-blue-800 rounded-full py-8 px-12">
              <x-lucide-mail-open class="mr-2 size-4" /> View all
            </x-button>
          </a>
        </div>
      </article>
      <article class="flex flex-wrap flex-row gap-8 w-full justify-center my-8 ">
        @php
          $cards = [
              (object) [
                  'img' => 'classic-lms-01.jpg',
                  'title' => 'English For Children',
                  'short_description' =>
                      'Fun and interactive lessons to help children learn English through games and activities.',
              ],
              (object) [
                  'img' => 'classic-lms-02.jpg',
                  'title' => 'English For Junior',
                  'short_description' => 'Engaging stories and songs to make learning English enjoyable for kids.',
              ],
              (object) [
                  'img' => 'classic-lms-03.jpg',
                  'title' => 'General English',
                  'short_description' => 'Creative writing exercises to boost children\'s English language skills.',
              ],
              (object) [
                  'img' => 'course-online-02.jpg',
                  'title' => 'TOEFL/TOEIC Program',
                  'short_description' => 'Interactive quizzes and puzzles to reinforce English vocabulary and grammar.',
              ],
              (object) [
                  'img' => 'course-online-03.jpg',
                  'title' => 'Conversation Practice',
                  'short_description' =>
                      'Live online classes with experienced teachers to guide children in learning English.',
              ],
              (object) [
                  'img' => 'course-online-06.jpg',
                  'title' => 'Grammar Class',
                  'short_description' =>
                      'A variety of multimedia resources to support children\'s English learning journey.',
              ],
          ];
        @endphp

        @forelse ($cards as $card)
          <x-card class="min-w-[300px] w-[28%] ">
            <x-card.header>
              <img class="w-100 object-cover rounded-xl"
                src="{{ asset('storage/assets/user/images/home/' . $card->img) }}" alt="course-image">
              <x-typography.h4 class="pt-4">
                {{ $card->title }}
              </x-typography.h4>
            </x-card.header>
            <x-card.content>
              <x-typography.p class="text-slate-600">
                {{ Str::limit($card->short_description, 70, '...') }}
              </x-typography.p>
            </x-card.content>
            <x-card.footer class="flex justify-between gap-8">
              <div class="flex items-center gap-4">
                <span class="text-slate-200 bg-blue-800/80 p-3.5 py-2 rounded-full">5</span>
                <div class="flex items-center">
                  @for ($i = 0; $i < 5; $i++)
                    <x-lucide-star class="mr-1 size-4 text-yellow-400" />
                  @endfor
                </div>
              </div>
              <x-button size='lg'
                class="border border-blue-800 hover:bg-blue-800 hover:text-white bg-white text-blue-800 px-8 py-6 rounded-full">
                <x-lucide-mail-open class="mr-2 size-4" /> Enroll
              </x-button>
            </x-card.footer>
          </x-card>
        @empty
          <div>No data found</div>
        @endforelse

      </article>
    </section>

    {{-- testimonial section --}}
    <section class="bg-white dark:bg-gray-900">
      <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
        <figure class="max-w-screen-md mx-auto">
          <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z"
              fill="currentColor" />
          </svg>
          <blockquote>
            <p class="text-2xl font-medium text-gray-900 dark:text-white">"Flowbite is just awesome. It contains tons of
              predesigned components and pages starting from login screen to complex dashboard. Perfect choice for your
              next SaaS application."</p>
          </blockquote>
          <figcaption class="flex items-center justify-center mt-6 space-x-3">
            <img class="w-6 h-6 rounded-full"
              src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png"
              alt="profile picture">
            <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
              <div class="pr-3 font-medium text-gray-900 dark:text-white">Micheal Gough</div>
              <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">CEO at Google</div>
            </div>
          </figcaption>
        </figure>
      </div>
    </section>

    {{-- cta section --}}
    <section class="bg-white dark:bg-gray-900 pb-20">
      <div
        class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-20 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
        <img src="{{ asset('storage/assets/user/images/home/whyus.webp') }}" class="rounded-2xl"
          alt="cta-image-section">
        <article class="mt-4 md:mt-0">
          <h1 class="mb-4 text-4xl tracking-tight font-medium text-gray-900 dark:text-white">Waiting for what? Let's
            enroll and find your own joy</h1>
          <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">IEC denpasar is more than just English
            course. Educate everyone with our professional mentors</p>
          <a href="#">
            <x-button size='lg' class="bg-blue-800 text-white hover:bg-blue-800 rounded-full py-6 px-12">
              <x-lucide-library class="mr-2 size-4" /> Enroll Now
            </x-button>
          </a>
        </article>
      </div>
    </section>
  </div>
  @livewire('partials.footer')
</div>
