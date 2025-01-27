<x-guest-layout>
  @livewire('partials.hero-section', ['routeName' => 'landing', 'breadcrumb' => 'About Us', 'title' => 'About Us'])
  <section class="py-20">
    <div class="max-w-screen-xl mx-auto">
      <div class="grid lg:grid-cols-2 gap-20">
        <div>
          <p class="text-3xl">We grow our brand</p>
          <h2 class="text-blue-800 font-medium ">Vision & Mission</h2>
          <div class="space-y-8 mt-10">
            <p class="text-justify leading-loose">Diakui sebagai lembaga pendidikan non formal profesional dalam
              pelatihan bahasa lnggris dan berusaha
              untuk
              mensukseskan para murid kursus kami dan untuk kepuasan seluruh IEC.</p>
            <p class="text-justify leading-loose">Memegang teguh dan melaksanakan komitmen untuk senantiasa,
              memberikan kepuasan kepada seluruh peserta
              didik
              dan
              dunia kerja pengguna lulusan melalui layanan berkualitas, metode pengajaran yang tepa! guna dan bertumpu
              pacta
              staf berdedikasi dan berkinerja tinggi.</p>
          </div>
        </div>
        <div>
          <img src="{{ asset('storage/assets/images/about/iec.jpg') }}" alt="about-section-2-image" class="rounded-2xl">
        </div>
      </div>
      <div class="grid lg:grid-cols-2 gap-20 mt-10">
        <div>
          <h3 class="font-medium text-blue-800">Who we are?</h3>
          <p class="mt-6 leading-loose text-justify">Intensive English Course (IEC) adalah lembaga pendidikan bahasa
            inggris, didirikan pada tahun 1968, yang
            mempunyai jumlah siswa aktif pertahun 18.000 orang dan sudah meluluskan lebih dari 700.000 orang alumni,
            banyak diantara mereka sudah menjadi orang penting atau tokoh masyarakat. Lembaga tersebut menyelenggarakan
            pelatihan untuk peserta dari berbagai latar belakang dan kalangan yang mempunyai keinginan sama yaitu mampu
            berkomunikasi dalam Bahasa Inggris.</p>
        </div>
        <div>
          <h3 class="font-medium text-blue-800">What we do?</h3>
          <p class="mt-6 leading-loose text-justify">menawarkan beragam pilihan program yang dapat disesuaikan dengan
            kebutuhan peserta sehingga peserta disiapkan untuk memiliki kemampuan berkomunikasi dalam bahasa lnggris
            untuk berbagai keperluan sosialisasi, bisnis, perkuliahan, konperensi dan sebagainya.</p>
        </div>
      </div>
    </div>
  </section>
  @livewire('partials.team-section')
  @livewire('partials.cta-section')
</x-guest-layout>
