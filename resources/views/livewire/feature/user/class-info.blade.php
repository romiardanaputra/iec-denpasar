@section('js_custom')
  <script>
    function showTime() {
      var date = new Date();
      var h = date.getHours(); // 0 - 23
      var m = date.getMinutes(); // 0 - 59
      var s = date.getSeconds(); // 0 - 59
      var session = "AM";

      if (h == 0) {
        h = 12;
      }

      if (h > 12) {
        h = h - 12;
        session = "PM";
      }

      h = (h < 10) ? "0" + h : h;
      m = (m < 10) ? "0" + m : m;
      s = (s < 10) ? "0" + s : s;

      var time = h + ":" + m + ":" + s + " " + session;
      document.getElementById("MyClockDisplay").innerText = time;
      document.getElementById("MyClockDisplay").textContent = time;

      setTimeout(showTime, 1000);

    }

    showTime();
  </script>
@endsection

<div>
  <div class="flex flex-wrap">
    <section class="p-4 w-7/12 order space-y-4">
      <x-typography.h3>
        Important update!
      </x-typography.h3>
      {{-- <x-card class="p-8">
        <x-accordion type="single" collapsible class="w-full">
          @for ($i = 1; $i <= 6; $i++)
            <x-accordion.item value="item-{{ $i }}">
              <x-accordion.trigger>is it accessible?</x-accordion.trigger>
              <x-accordion.content class="!text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, aliquid earum doloribus molestiae
                voluptatem
                quia nisi voluptate. Suscipit adipisci nemo, cum itaque molestiae laboriosam iure quidem laudantium?
                Quaerat
                sequi saepe suscipit. Atque totam dolores amet nam, ratione dolorem facilis, maiores excepturi
                exercitationem nemo at rerum reprehenderit? Quidem ipsa facilis, repudiandae officia cumque aliquam hic
                ea
                tempore placeat sapiente minima dolor quisquam commodi, voluptates quibusdam. Fuga fugiat natus
                accusantium
                obcaecati odit ratione repellat unde sapiente distinctio corporis! Nihil iure totam pariatur. Saepe modi
                libero ducimus. Cupiditate, asperiores ea id, nulla veritatis at voluptatum vel, debitis officiis iure
                quasi
                aliquam tenetur quia.
              </x-accordion.content>
            </x-accordion.item>
          @endfor
        </x-accordion>
      </x-card> --}}
      <x-card class="mt-6">
        <x-card.header class="p-8">
          <x-typography.h3>
            This week's class
          </x-typography.h3>
        </x-card.header>
        @for ($i = 0; $i < 2; $i++)
          <x-card.content>
            <div class="flex gap-6 w-full items-center bg-teal-50 p-4 rounded-lg">
              <div class="flex flex-col w-1/12 items-center">
                <span class="font-medium text-slate-600">09.00</span>
                <span class="font-medium text-slate-600">AM</span>
              </div>
              <div class="flex flex-col w-10/12">
                <p class="font-medium">Topic {{ $i }}: Conversation with john</p>
                <p class="text-sm font-medium text-slate-600">Chapter 6: buy to market</p>
              </div>
              <div class="w-1/12">
                <x-dialog>
                  <x-dialog.trigger>Detail</x-dialog.trigger>
                  <x-dialog.content>
                    <x-dialog.header>
                      <x-dialog.title>Are you absolutely sure?</x-dialog.title>
                      <x-dialog.description>
                        This action cannot be undone. This will permanently delete your account
                        and remove your data from our servers.
                      </x-dialog.description>
                    </x-dialog.header>
                  </x-dialog.content>
                </x-dialog>
              </div>
            </div>
          </x-card.content>
        @endfor

      </x-card>
    </section>
    <section class="p-4 w-4/12 space-y-4">
      <x-card>
        <x-card.header class="flex flex-row justify-between items-center gap-4 p-6">
          <p class="font-medium text-lg">English for children</p>
          <x-badge class="bg-green-200/50 px-2 rounded-full text-green-500">Active</x-badge>
        </x-card.header>
        <x-card.content class="w-[80%]">
          <x-typography.p class="text-gray-600 font-medium">
            Hi, Kids let get started with fun learning and explore the joy of english!
          </x-typography.p>

          <div class="flex items-center gap-4 py-4">
            <x-avatar class="">
              <x-avatar.image src="https://github.com/shadcn.png" alt="@shadcn" />
              <x-avatar.fallback>CN</x-avatar.fallback>
            </x-avatar>
            <div>
              <p>Mr. Wii chen</p>
              <p class="text-sm text-gray-600">Senior Web Development</p>
            </div>
          </div>

        </x-card.content>
        <x-card.footer>
          <x-dialog>
            <x-dialog.trigger>See Profile</x-dialog.trigger>
            <x-dialog.content>
              <x-dialog.header>
                <x-dialog.title>Are you absolutely sure?</x-dialog.title>
                <x-dialog.description>
                  This action cannot be undone. This will permanently delete your account
                  and remove your data from our servers.
                </x-dialog.description>
              </x-dialog.header>
            </x-dialog.content>
          </x-dialog>
        </x-card.footer>
      </x-card>
      <x-card class="flex items-center justify-center h-56 bg-blue-200/50">
        <div id="MyClockDisplay" class="text-6xl text-blue-800 font-bold" onload="showTime()"></div>
      </x-card>
    </section>
  </div>
</div>
