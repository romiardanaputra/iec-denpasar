<section class="relative z-20 overflow-hidden bg-white dark:bg-dark pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
  <div class="container mx-auto">
    <div class="flex flex-wrap -mx-4">
      <div class="w-full px-4">
        <div class="mx-auto mb-[60px] max-w-[520px] text-center lg:mb-20">
          <span class="block mb-2 text-lg font-semibold text-primary">
            FAQ
          </span>
          <h2 class="text-dark dark:text-white mb-4 text-3xl font-bold sm:text-[40px]/[48px]">
            Pertanyaan Umum Seputar IEC Denpasar
          </h2>
          <p class="text-base text-body-color dark:text-dark-6">
            Berikut adalah jawaban atas pertanyaan yang sering diajukan tentang layanan kami di IEC Denpasar.
          </p>
        </div>
      </div>
    </div>
    <div class="flex flex-wrap -mx-4">
      <!-- Data FAQ -->
      @foreach ($faqs as $index => $faq)
        <div class="w-full px-4 lg:w-1/2">
          <div
            class="w-full p-4 mb-8 bg-white rounded-lg shadow-[0px_20px_95px_0px_rgba(201,203,204,0.30)] dark:shadow-[0px_20px_95px_0px_rgba(0,0,0,0.30)] dark:bg-dark-2 sm:p-8 lg:px-6 xl:px-8">
            <button class="flex w-full text-left faq-btn" onclick="toggleFaq({{ $index }})">
              <div
                class="bg-primary/5 dark:bg-white/5 text-primary mr-5 flex h-10 w-full max-w-[40px] items-center justify-center rounded-lg">
                <svg id="faq-icon-{{ $index }}" width="22" height="22" viewBox="0 0 22 22" fill="none"
                  xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M11 15.675C10.7937 15.675 10.6219 15.6062 10.45 15.4687L2.54374 7.69998C2.23436 7.3906 2.23436 6.90935 2.54374 6.59998C2.85311 6.2906 3.33436 6.2906 3.64374 6.59998L11 13.7844L18.3562 6.53123C18.6656 6.22185 19.1469 6.22185 19.4562 6.53123C19.7656 6.8406 19.7656 7.32185 19.4562 7.63123L11.55 15.4C11.3781 15.5719 11.2062 15.675 11 15.675Z"
                    fill="currentColor" />
                </svg>
              </div>
              <div class="w-full">
                <h4 class="mt-1 text-lg font-semibold text-dark dark:text-white">{{ __($faq->question) }}</h4>
              </div>
            </button>
            <div id="faq-content-{{ $index }}" class="faq-content pl-[62px]" style="display: none;">
              <p class="py-3 text-base leading-relaxed text-body-color dark:text-dark-6">{{ __($faq->answer) }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@section('js_custom')
  <script>
    function toggleFaq(index) {
      var content = document.getElementById('faq-content-' + index);
      var icon = document.getElementById('faq-icon-' + index);

      if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'block';
        icon.classList.add('rotate-180');
      } else {
        content.style.display = 'none';
        icon.classList.remove('rotate-180');
      }
    }
  </script>
@endsection
