<div>
  @livewire('partials.hero-section', ['title' => 'Penguasaan Bahasa Inggris Dimulai di ', 'subTitle' => ' Lembaga kursus berpengalaman sejak 2010 dengan metode pembelajaran interaktif dan kurikulum berstandar internasional', 'ctaButton' => '#tentangKami', 'highlightedText' => 'IEC Denpasar'])

  <section id="tentangKami" class="py-20">
    <div class="max-w-screen-xl container mx-auto space-y-8">
      <div class="grid lg:grid-cols-2 gap-20 mt-10">
        <!-- Left Side: Siapa Kami -->
        <div>
          <h3 class="font-bold text-blue-600 leading-none tracking-wide">{{ __('Siapa Kami?') }}</h3>
          <p class="mt-4 leading-7 text-balance">
            {{ __('Intensive English Course (IEC) adalah lembaga pendidikan bahasa Inggris, didirikan pada tahun 1968, yang mempunyai jumlah siswa aktif pertahun 18.000 orang dan sudah meluluskan lebih dari 700.000 orang alumni, banyak diantara mereka sudah menjadi orang penting atau tokoh masyarakat. Lembaga tersebut menyelenggarakan pelatihan untuk peserta dari berbagai latar belakang dan kalangan yang mempunyai keinginan sama yaitu mampu berkomunikasi dalam Bahasa Inggris.') }}
          </p>
        </div>
        <!-- Right Side: Apa yang Kita Tawarkan -->
        <div>
          <h3 class="font-bold  text-blue-600 leading-none tracking-wide">
            {{ __('Apa yang Kita Tawarkan?') }}</h3>
          <p class="mt-4 leading-7 text-balance">
            {{ __('Kami menawarkan beragam pilihan program yang dapat disesuaikan dengan kebutuhan peserta sehingga peserta disiapkan untuk memiliki kemampuan berkomunikasi dalam bahasa Inggris untuk berbagai keperluan sosialisasi, bisnis, perkuliahan, konferensi, dan sebagainya.') }}
          </p>
        </div>
      </div>
      <div class="grid lg:grid-cols-2 gap-20">
        <!-- Right Side: Image -->
        <div>
          <img src="{{ asset('storage/assets/iec/iec-1.webp') }}"
            srcset="
              {{ asset('storage/assets/iec/iec-1-small.webp') }} 480w,
              {{ asset('storage/assets/iec/iec-1-medium.webp') }} 768w,
              {{ asset('storage/assets/iec/iec-1-large.webp') }} 1024w
            "
            sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" alt="Tentang Kami di IEC Denpasar"
            class="rounded-xl shadow object-cover aspect-video" loading="lazy" />
        </div>
        <!-- Left Side: Text Content -->
        <div>
          <h1 class="text-blue-600 text-4xl font-bold mt-2 leading-none tracking-wide">
            {{ __('Visi & Misi') }}</h1>
          <div class="space-y-2 mt-3">
            <p class="text-balance leading-7">
              {{ __('Diakui sebagai lembaga pendidikan non-formal profesional dalam pelatihan bahasa Inggris. Kami berkomitmen untuk mensukseskan para murid kursus kami serta memberikan kepuasan kepada seluruh keluarga besar IEC.') }}
            </p>
            <p class="text-balance leading-7">
              {{ __('Memegang teguh komitmen untuk senantiasa memberikan layanan berkualitas tinggi, metode pengajaran yang efektif, dan bertumpu pada staf yang berdedikasi serta berkinerja tinggi. Kami berupaya memenuhi kebutuhan peserta didik dan dunia kerja melalui program pelatihan yang relevan.') }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- team section start --}}
  @livewire('partials.team-section')

  {{-- scroll to top button --}}
  @livewire('partials.scroll-to-top')
</div>
