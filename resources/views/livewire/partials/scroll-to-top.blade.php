<div x-data="{ isVisible: false }" x-init="window.addEventListener('scroll', () => { isVisible = window.scrollY > 100; })" class="fixed bottom-6 right-6 z-50" x-show="isVisible"
  x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-2"
  x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
  x-transition:leave-start="opacity-100 transform translate-y-0"
  x-transition:leave-end="opacity-0 transform translate-y-2" style="display: none;">
  <button title="Scroll to top" aria-label="Scroll to top" x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })"
    class="inline-flex items-center gap-x-2 rounded-full bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 w-full">
    scroll to top
  </button>
</div>
