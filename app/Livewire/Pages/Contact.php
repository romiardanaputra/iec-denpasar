<?php

namespace App\Livewire\Pages;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

#[\Livewire\Attributes\Title('Contact')]
class Contact extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Kontak IEC Denpasar | Hubungi Kami Sekarang');
        SEOMeta::setDescription('Hubungi IEC Denpasar untuk informasi lebih lanjut mengenai kursus bahasa Inggris kami. Kami siap membantu Anda mencapai tujuan belajar bahasa Inggris.');
        SEOMeta::addMeta('article:published_time', now()->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Kontak', 'property');
        SEOMeta::addKeyword(['kontak IEC Denpasar', 'kursus bahasa Inggris Bali', 'alamat IEC Denpasar', 'nomor telepon IEC Denpasar']);

        OpenGraph::setDescription('Hubungi IEC Denpasar untuk informasi lebih lanjut mengenai kursus bahasa Inggris kami. Kami siap membantu Anda mencapai tujuan belajar bahasa Inggris.');
        OpenGraph::setTitle('Kontak IEC Denpasar | Hubungi Kami Sekarang');
        OpenGraph::setUrl('https://iecdenpasar.com/contact');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);

        OpenGraph::addImage('https://iecdenpasar.com/assets/img/contact-banner.jpg');
        OpenGraph::addImage('https://iecdenpasar.com/assets/img/map-location.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Kontak IEC Denpasar | Hubungi Kami Sekarang');
        JsonLd::setDescription('Hubungi IEC Denpasar untuk informasi lebih lanjut mengenai kursus bahasa Inggris kami. Kami siap membantu Anda mencapai tujuan belajar bahasa Inggris.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage('https://iecdenpasar.com/assets/img/logo.png');
        JsonLd::addValue('address', [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Jl. Teuku Umar No. 123, Denpasar, Bali',
            'addressLocality' => 'Denpasar',
            'addressRegion' => 'Bali',
            'postalCode' => '80114',
            'addressCountry' => 'ID',
        ]);
        JsonLd::addValue('telephone', '+62 361 123456');
        JsonLd::addValue('email', 'info@iecdenpasar.com');

        return view('livewire.pages.contact');
    }
}
