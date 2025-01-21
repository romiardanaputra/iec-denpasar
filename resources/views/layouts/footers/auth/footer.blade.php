<footer class="pt-4">
  <div class="w-full px-6 mx-auto">
    <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
      <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
        <div
          class="leading-normal text-center text-size-sm text-slate-500 {{ Request::is('rtl') ? 'lg:text-right' : 'lg:text-left' }}">
          © <span class="year"></span>, made with <i class="fa fa-heart"></i> by
          <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">IEC Denpasar</a>
        </div>
      </div>
    </div>
  </div>
</footer>

@section('js_custom')
  <script>
    function updateYear() {
      document.querySelectorAll('.year').forEach(el => {
        el.textContent = new Date().getFullYear();
      });
    }

    document.addEventListener('livewire:navigate.done', () => {
      console.log('Page navigated and DOM updated.');

      updateYear();

      if (typeof Tooltip !== 'undefined') {
        Tooltip.init();
      }
    });

    updateYear();
  </script>
@endsection
