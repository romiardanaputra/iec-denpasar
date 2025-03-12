<footer class="w-full py-14">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="border-b border-gray-200 pb-14 flex justify-between items-center flex-col gap-8 lg:gap-0 lg:flex-row">
      <div class="block">
        <h3 class="font-manrope text-3xl text-gray-900 font-bold mb-2 text-center lg:text-left">Lihat Berbagai Program
          Kursus Kami
        </h3>
        <p class="text-gray-500 w-full sm:w-6/12 mx-auto lg:mx-0 text-center lg:text-left">Dapatkan update program
          kursus, akses materi eksklusif,
          dan
          tips sukses langsung dari IEC Denpasar. Daftar Hari Ini dan mulai langkahmu menuju masa depan cerah!"</p>
      </div>
      <div class="flex items-center flex-col gap-4 lg:flex-row">
        <a href="{{ route('our-program') }}">
          <button class="h-14 py-3.5 px-7 bg-blue-600 shadow-sm rounded-full text-white font-bold">Program</button>
        </a>
      </div>
    </div>
    <!--Grid-->
    <div
      class="grid grid-cols-2 min-[690px]:grid-cols-4 lg:grid-cols-6 gap-4 xl:gap-8 pt-14 pb-10 max-w-xs mx-auto min-[690px]:max-w-2xl lg:max-w-full">
      <div class="col-span-full mb-10 lg:col-span-2 lg:mb-0">
        <a href="{{ route('landing') }}" class="flex justify-center lg:justify-start font-bold text-xl">
          IEC Denpasar
        </a>
        <p class="py-8 text-gray-500 lg:max-w-xs text-center lg:text-left">Lebih dari sekedar kursus bahasa inggris!
          Bergabunglah dengan kursus bahasa Inggris kami yang dirancang untuk semua tingkatan.

        </p>
        <a href="javascript:;"
          class="py-2.5 px-5 h-9 block w-fit bg-blue-600 rounded-full shadow-sm text-xs text-white mx-auto transition-all  duration-500 hover:bg-blue-700 lg:mx-0">
          Contact us
        </a>
      </div>
      <!--End Col-->
      <div class="lg:mx-auto text-left ">
        <h4 class="text-lg text-gray-900 font-medium mb-7">IEC Denpasar</h4>
        <ul class="text-sm  transition-all duration-500">
          @foreach ($iecNavs as $iecNav)
            <li class="mb-6"><a href="{{ $iecNav->route }}"
                class="text-gray-600 whitespace-nowrap hover:text-gray-900">{{ $iecNav->name }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <!--End Col-->
      <div class="lg:mx-auto text-left ">
        <h4 class="text-lg text-gray-900 font-medium mb-7">Program</h4>
        <ul class="text-sm  transition-all duration-500">
          @foreach ($programs as $program)
            <li class="mb-6"><a href="{{ route('program.detail', ['slug' => $program->slug]) }}"
                class="text-gray-600 hover:text-gray-900">{{ $program->name }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <!--End Col-->
      <div class="lg:mx-auto text-left ">
        <h4 class="text-lg text-gray-900 font-medium mb-7">Resources</h4>
        <ul class="text-sm  transition-all duration-500">
          @foreach ($resources as $resource)
            <li class="mb-6"><a href="{{ $resource->route }}"
                class="text-gray-600 whitespace-nowrap hover:text-gray-900">{{ $resource->name }}</a>
            </li>
          @endforeach
        </ul>
      </div>
      <!--End Col-->
      <div class="lg:mx-auto text-left ">
        <h4 class="text-lg text-gray-900 font-medium mb-7">Support</h4>
        <ul class="text-sm  transition-all duration-500">
          @foreach ($supports as $support)
            <li class="mb-6"><a href="{{ $support->value }}" target="_blank"
                class="text-gray-600 whitespace-nowrap hover:text-gray-900">{{ $support->name }}</a></li>
          @endforeach
        </ul>
      </div>
      <!--End Col-->
    </div>
    <!--Grid-->
    <div class="py-7 border-t border-gray-200">
      <div class="flex items-center justify-center flex-col lg:justify-between lg:flex-row">
        <span class="text-sm text-gray-500 ">©<a href="{{ route('landing') }}">IEC Denpasar</a>2024, All rights
          reserved.</span>
        <div class="flex mt-4 space-x-4 sm:justify-center lg:mt-0 ">
          <a href="https://www.facebook.com/iec.denpasar" target="_blank" aria-label="iec denpasar facebook link"
            class="w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center bg-[#33CCFF] hover:bg-gray-900">
            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="Social Media">
                <path id="Vector"
                  d="M11.8214 9.81691L16.9919 3.93591H15.7667L11.2772 9.0423L7.6914 3.93591H3.55566L8.97803 11.6577L3.55566 17.8248H4.78097L9.522 12.4323L13.3088 17.8248H17.4446L11.8211 9.81691H11.8214ZM10.1432 11.7257L9.59382 10.9568L5.22246 4.83846H7.10445L10.6322 9.77615L11.1816 10.5451L15.7672 16.9633H13.8852L10.1432 11.726V11.7257Z"
                  fill="white" />
              </g>
            </svg>

          </a>
          <a href="https://www.instagram.com/iecdenpasar/" target="_blank" aria-label="iec denpasar instragram link"
            class="relative w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center bg-[linear-gradient(45deg,#FEE411_6.9%,#FEDB16_10.98%,#FEC125_17.77%,#FE983D_26.42%,#FE5F5E_36.5%,#FE2181_46.24%,#9000DC_85.57%)]  hover:bg-gradient-to-b from-gray-900 to-gray-900
                  ">
            <svg class="w-[1.25rem] h-[1.125rem] text-white" viewBox="0 0 16 16" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5.63434 7.99747C5.63434 6.69062 6.6941 5.63093 8.00173 5.63093C9.30936 5.63093 10.3697 6.69062 10.3697 7.99747C10.3697 9.30431 9.30936 10.364 8.00173 10.364C6.6941 10.364 5.63434 9.30431 5.63434 7.99747ZM4.35427 7.99747C4.35427 10.0108 5.98723 11.6427 8.00173 11.6427C10.0162 11.6427 11.6492 10.0108 11.6492 7.99747C11.6492 5.98418 10.0162 4.3522 8.00173 4.3522C5.98723 4.3522 4.35427 5.98418 4.35427 7.99747ZM10.9412 4.20766C10.9411 4.37615 10.991 4.54087 11.0846 4.681C11.1783 4.82113 11.3113 4.93037 11.4671 4.99491C11.6228 5.05945 11.7942 5.07639 11.9595 5.04359C12.1249 5.01078 12.2768 4.92971 12.3961 4.81062C12.5153 4.69153 12.5966 4.53977 12.6295 4.37453C12.6625 4.2093 12.6457 4.03801 12.5812 3.88232C12.5168 3.72663 12.4076 3.59354 12.2674 3.49988C12.1273 3.40622 11.9625 3.35619 11.7939 3.35612H11.7936C11.5676 3.35623 11.3509 3.44597 11.1911 3.60563C11.0313 3.76529 10.9414 3.98182 10.9412 4.20766ZM5.132 13.7759C4.43946 13.7444 4.06304 13.6291 3.81289 13.5317C3.48125 13.4027 3.24463 13.249 2.99584 13.0007C2.74705 12.7524 2.59305 12.5161 2.46451 12.1847C2.367 11.9348 2.25164 11.5585 2.22016 10.8664C2.18572 10.1181 2.17885 9.89331 2.17885 7.99752C2.17885 6.10174 2.18629 5.87758 2.22016 5.12866C2.2517 4.43654 2.36791 4.06097 2.46451 3.81035C2.59362 3.47891 2.7474 3.24242 2.99584 2.99379C3.24428 2.74515 3.48068 2.59124 3.81289 2.46278C4.06292 2.36532 4.43946 2.25004 5.132 2.21857C5.88074 2.18416 6.10566 2.17729 8.00173 2.17729C9.89779 2.17729 10.1229 2.18472 10.8723 2.21857C11.5648 2.25009 11.9406 2.36623 12.1914 2.46278C12.5231 2.59124 12.7597 2.74549 13.0085 2.99379C13.2573 3.24208 13.4107 3.47891 13.5398 3.81035C13.6373 4.06023 13.7527 4.43654 13.7841 5.12866C13.8186 5.87758 13.8255 6.10174 13.8255 7.99752C13.8255 9.89331 13.8186 10.1175 13.7841 10.8664C13.7526 11.5585 13.6367 11.9347 13.5398 12.1847C13.4107 12.5161 13.2569 12.7526 13.0085 13.0007C12.76 13.2488 12.5231 13.4027 12.1914 13.5317C11.9414 13.6292 11.5648 13.7444 10.8723 13.7759C10.1236 13.8103 9.89865 13.8172 8.00173 13.8172C6.10481 13.8172 5.88051 13.8103 5.132 13.7759ZM5.07318 0.941429C4.31699 0.975845 3.80027 1.09568 3.34902 1.27116C2.88168 1.45239 2.48605 1.69552 2.09071 2.09C1.69537 2.48447 1.45272 2.88049 1.27139 3.34755C1.0958 3.79882 0.975892 4.31494 0.941455 5.07068C0.90645 5.82761 0.898438 6.0696 0.898438 7.99747C0.898438 9.92534 0.90645 10.1673 0.941455 10.9243C0.975892 11.68 1.0958 12.1961 1.27139 12.6474C1.45272 13.1142 1.69543 13.5106 2.09071 13.9049C2.48599 14.2992 2.88168 14.542 3.34902 14.7238C3.80113 14.8993 4.31699 15.0191 5.07318 15.0535C5.83096 15.0879 6.0727 15.0965 8.00173 15.0965C9.93075 15.0965 10.1729 15.0885 10.9303 15.0535C11.6865 15.0191 12.2029 14.8993 12.6544 14.7238C13.1215 14.542 13.5174 14.2994 13.9127 13.9049C14.3081 13.5105 14.5502 13.1142 14.7321 12.6474C14.9077 12.1961 15.0281 11.68 15.062 10.9243C15.0964 10.1668 15.1044 9.92534 15.1044 7.99747C15.1044 6.0696 15.0964 5.82761 15.062 5.07068C15.0276 4.31489 14.9077 3.79853 14.7321 3.34755C14.5502 2.88077 14.3075 2.4851 13.9127 2.09C13.518 1.69489 13.1215 1.45239 12.655 1.27116C12.2029 1.09568 11.6865 0.975277 10.9308 0.941429C10.1735 0.907013 9.93132 0.898438 8.00229 0.898438C6.07327 0.898438 5.83096 0.906445 5.07318 0.941429Z"
                fill="white"></path>
            </svg>

          </a>
          <a href="https://www.facebook.com/iec.denpasar" target="_blank" aria-label="iec denpasar facebook link"
            class="relative w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center bg-[#337FFF]  hover:bg-gray-900 ">
            <svg class="w-[1rem] h-[1rem] text-white" viewBox="0 0 8 14" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M7.04111 7.81204L7.41156 5.46043H5.1296V3.93188C5.1296 3.28886 5.44818 2.66054 6.46692 2.66054H7.51899V0.657999C6.90631 0.560385 6.28723 0.507577 5.66675 0.5C3.78857 0.5 2.56239 1.62804 2.56239 3.66733V5.46043H0.480469V7.81204H2.56239V13.5H5.1296V7.81204H7.04111Z"
                fill="currentColor" />
            </svg>

          </a>
          <a href="https://www.tiktok.com/@guzzed1" target="_blank"
            class="relative w-8 h-8 rounded-full transition-all duration-500 flex justify-center items-center bg-[#FF0000]  hover:bg-gray-900 "
            aria-label="iec denpasar tikok link">
            <svg class=" text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 333335 333336"
              shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality"
              fill-rule="evenodd" clip-rule="evenodd">
              <path
                d="M72464 0h188407c39856 0 72464 32609 72464 72465v188407c0 39855-32608 72464-72464 72464H72464C32608 333336 0 300727 0 260872V72465C0 32609 32608 0 72464 0zm127664 70642c337 2877 825 5661 1461 8341l6304 2c1170 9991 4006 19119 8465 26697 7282 6745 16797 10904 28280 11641v9208c2131 444 4350 746 6659 894v29690c-14847 1462-27841-3426-42981-12531l2324 50847c0 16398 61 23892-8738 38977-20546 35222-58194 36677-82176 18323-12269-4256-23069-12466-29881-23612-19875-32516-1959-85512 55687-90966l-94 7835v1970c3105-646 6365-1144 9794-1468v31311c-12484 2057-20412 5890-24119 12980-7424 14197-4049 26526 3716 34309 16276 2796 34401-8481 31673-43351V70644h33628z"
                fill="#1a121f" />
              <path
                d="M200128 70642c3093 26406 18915 45038 44510 46681v25046l-165 15v-21275c-25595-1642-40311-17390-43404-43796l-27114-1v111095c3912 50005-35050 51490-49955 32531 17482 10934 45867 3826 42501-39202V70641h33628zm-72854 184165c-15319-3153-29249-12306-37430-25689-19875-32516-1959-85512 55687-90966l-94 7835c-53444 8512-58809 65920-44009 89802 5707 9209 15076 15686 25846 19019z"
                fill="#26f4ee" />
              <path
                d="M207892 78985c1761 15036 7293 28119 16454 36903-12866-6655-20630-19315-23062-36905l6609 2zm36580 47511c2181 463 4456 777 6824 929v29690c-14847 1462-27841-3426-42981-12531l2324 50847c0 16398 61 23892-8738 38977-21443 36760-61517 36743-85239 15810 30930 17765 84928 3857 84829-56453v-55496c15141 9105 28134 13993 42981 12530v-24302zm-99036 21460c3105-646 6365-1144 9794-1468v31311c-12484 2057-20412 5890-24119 12980-10441 19964 474 36238 14923 41365-18075-649-36010-19214-23555-43031 3707-7089 10474-10923 22958-12980v-28177z"
                fill="#fb2c53" />
              <path
                d="M201068 77313c3093 26406 17809 42154 43404 43796v29689c-14847 1462-27841-3425-42981-12530v55496c119 72433-77802 77945-100063 42025-14800-23881-9435-81290 44009-89802v30147c-12483 2057-19250 5891-22958 12980-22909 43808 56997 69872 51475-706V77313l27114 1z"
                fill="#fefefe" />
            </svg>

          </a>
        </div>
      </div>
    </div>
  </div>
</footer>
