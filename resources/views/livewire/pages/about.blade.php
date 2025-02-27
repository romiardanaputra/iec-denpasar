<div>
  @livewire('partials.hero-section', ['routeName' => 'landing', 'breadcrumb' => 'Tentang Kami', 'title' => 'Tentang Kami'])
  <section class="py-20">
    <div class="max-w-screen-xl container mx-auto">
      <div class="grid lg:grid-cols-2 gap-20">
        <div>
          <p class="text-3xl">{{ __('Kami mengembangkan brand kami') }}</p>
          <h2 class="text-blue-800 font-medium ">{{ __('Visi & Misi') }}</h2>
          <div class="space-y-8 mt-10">
            <p class="text-justify leading-loose">
              {{ __('Diakui sebagai lembaga pendidikan non-formal profesional dalam pelatihan bahasa Inggris. Kami berkomitmen untuk mensukseskan para murid kursus kami serta memberikan kepuasan kepada seluruh keluarga besar IEC.') }}
            </p>
            <p class="text-justify leading-loose">
              {{ __('Memegang teguh komitmen untuk senantiasa memberikan layanan berkualitas tinggi, metode pengajaran yang efektif, dan bertumpu pada staf yang berdedikasi serta berkinerja tinggi. Kami berupaya memenuhi kebutuhan peserta didik dan dunia kerja melalui program pelatihan yang relevan.') }}
            </p>
          </div>
        </div>
        <div>
          <img src="{{ asset('storage/assets/iec/iec-1.jpg') }}" alt="about-section-2-image"
            class="rounded-lg object-cover aspect-video">
        </div>
      </div>
      <div class="grid lg:grid-cols-2 gap-20 mt-10">
        <div>
          <h3 class="font-medium text-blue-800">{{ __('Siapa kami?') }}</h3>
          <p class="mt-6 leading-loose text-justify">
            {{ __("Intensive English Course (IEC) adalah lembaga pendidikan bahasa
                                                                                                                        inggris, didirikan pada tahun 1968, yang
                                                                                                                        mempunyai jumlah siswa aktif pertahun 18.000 orang dan sudah meluluskan lebih dari 700.000 orang alumni,
                                                                                                                        banyak diantara mereka sudah menjadi orang penting atau tokoh masyarakat. Lembaga tersebut menyelenggarakan
                                                                                                                        pelatihan untuk peserta dari berbagai latar belakang dan kalangan yang mempunyai keinginan sama yaitu mampu
                                                                                                                        berkomunikasi dalam Bahasa Inggris.") }}
          </p>
        </div>
        <div>
          <h3 class="font-medium text-blue-800">{{ __('Apa yang kita tawarkan?') }}</h3>
          <p class="mt-6 leading-loose text-justify">
            {{ __('menawarkan beragam pilihan program yang dapat disesuaikan dengan
                                                                                                            kebutuhan peserta sehingga peserta disiapkan untuk memiliki kemampuan berkomunikasi dalam bahasa lnggris
                                                                                                            untuk berbagai keperluan sosialisasi, bisnis, perkuliahan, konperensi dan sebagainya.') }}
          </p>
        </div>
      </div>
    </div>
  </section>
  @livewire('partials.team-section')
  @livewire('partials.cta-section')
</div>

@section('js_custom')
@endsection
