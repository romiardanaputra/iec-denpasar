<x-dialog>
  <x-dialog.trigger class="bg-red-600 hover:bg-red-700 rounded-full hover:text-white">Logout</x-dialog.trigger>
  <x-dialog.content>
    <x-dialog.header>
      <x-dialog.title>Apakah anda yakin logout?</x-dialog.title>
      <x-dialog.description>
        Anda akan logout setelah mengeklik tombol logout, dan diarahkan ke halaman awal!
      </x-dialog.description>
      <x-dialog.footer>
        <x-button wire:click='logout' class="bg-red-600 hover:bg-red-700 rounded-full ">
          <i class="fa fa-user sm:mr-1"></i>
          <span class="">Ya, Log out sekarang</span>
        </x-button>
      </x-dialog.footer>
    </x-dialog.header>
  </x-dialog.content>
</x-dialog>
