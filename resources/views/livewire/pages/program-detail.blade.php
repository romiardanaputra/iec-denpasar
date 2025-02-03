<section class="max-w-screen-xl mx-auto mt-40">
  <div class="h-[30rem] grid lg:grid-cols-4 gap-4">
    <div class="w-full grid lg:grid-cols-1 lg:col-span-2">
      <img src="{{ asset('storage/assets/images/about/iec-dps.jpg') }}" alt="iec-dps"
        class="size-full object-cover rounded-lg">
    </div>
    <div class="w-full grid lg:grid-rows-2 gap-4">
      <div>
        <img src="{{ asset('storage/assets/images/about/iec-dps.jpg') }}" alt="iec-dps"
          class="rounded-lg object-cover size-full">
      </div>
      <div>
        <img src="{{ asset('storage/assets/images/about/iec-dps.jpg') }}" alt="iec-dps"
          class="rounded-lg object-cover size-full">
      </div>
    </div>
    <div class="w-full grid lg:grid-rows-2 gap-4">
      <div>
        <img src="{{ asset('storage/assets/images/about/iec-dps.jpg') }}" alt="iec-dps"
          class="rounded-lg object-cover size-full">
      </div>
      <div>
        <img src="{{ asset('storage/assets/images/about/iec-dps.jpg') }}" alt="iec-dps"
          class="rounded-lg object-cover size-full">
      </div>
    </div>
  </div>
  <div class="py-10">
    <div class="grid lg:grid-cols-3 w-full gap-12">
      <div class="w-full grid lg:grid-cols-1 lg:col-span-2 gap-4">
        <x-typography.h2>
          The People of the Kingdom
        </x-typography.h2>
        <x-typography.p>
          The king, seeing how much happier his subjects were, realized the error of his ways and repealed the joke
          tax.
        </x-typography.p>
        <x-typography.list>
          <li>1st level of puns: 5 gold coins</li>
          <li>2nd level of jokes: 10 gold coins</li>
          <li>3rd level of one-liners : 20 gold coins</li>
        </x-typography.list>
        <div>
          <x-tabs defaultValue="overview" class="w-full">
            <x-tabs.List class="w-full">
              <x-tabs.trigger value="overview">Overview</x-tabs.trigger>
              <x-tabs.trigger value="delivery">Delivery</x-tabs.trigger>
              <x-tabs.trigger value="refund">Refund</x-tabs.trigger>
            </x-tabs.List>
            <div class="p-8">
              <x-tabs.content value="overview">We are seeking a dedicated and knowledgeable English
                Mentor to join our
                educational team. The English Mentor will be responsible for fostering a stimulating learning
                environment, aimed at enhancing students' comprehension and engagement with the English language. This
                role involves working closely with learners of varying proficiency levels, developing customized
                instructional strategies that cater to individual needs, and tracking their progress. The ideal
                candidate will possess a strong background in English literature, linguistics, or education, paired
                with
                communication skills that encourage and motivate students in their language journeys. As an English
                Mentor, you will also contribute to curriculum development and participate in collaborative
                discussions
                with fellow educators to implement best practices. You are expected to facilitate small group and
                one-on-one sessions, providing targeted assistance and support while promoting critical thinking and
                analytical skills. Additionally, this position requires a commitment to stay updated with contemporary
                teaching methods and educational technologies to ensure a rich and dynamic learning experience. We
                invite passionate individuals who are eager to make a difference in the realm of English language
                education to apply for this rewarding opportunity.</x-tabs.content>
              <x-tabs.content value="delivery">Change your password here.</x-tabs.content>
              <x-tabs.content value="refund">Change your password here.</x-tabs.content>
            </div>
          </x-tabs>
        </div>
      </div>
      <div class="lg:w-full flex flex-col gap-4">
        <span class="font-medium text-2xl">Rp. 500.000</span>
        <x-typography.p>
          The king, seeing how much happier his subjects were, realized the error of his ways and repealed the joke
          tax.
        </x-typography.p>
        <div class="flex gap-2 items-center">
          @for ($i = 0; $i < 5; $i++)
            <x-lucide-star class="size-4 text-yellow-400" />
          @endfor
          <span>(5 stars) 14.reviews</span>
        </div>
        <div class="flex flex-col gap-4">
          <span>Course Level</span>
          <div class="flex flex-wrap">
            <x-button>12 Level</x-button>
          </div>
        </div>
        <div class="flex">
          <x-button>Buy Course</x-button>
          <x-sheet>
            <x-sheet.trigger>Add to chart</x-sheet.trigger>
            <x-sheet.content>
              <x-sheet.header>
                <x-sheet.title>are you absolutely sure?</x-sheet.title>
                <x-sheet.description>
                  this action cannot be undone. this will permanently delete your account
                  and remove your data from our servers.
                </x-sheet.description>
              </x-sheet.header>
            </x-sheet.content>
          </x-sheet>
        </div>
      </div>
    </div>
  </div>
</section>
