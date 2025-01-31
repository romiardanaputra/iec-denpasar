<?php

namespace App\Livewire\Pages;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

#[\Livewire\Attributes\Title('Program Kami')]

class Program extends Component
{
    public function render()
    {
        SEOMeta::setDescription('Temukan berbagai program kursus bahasa Inggris di IEC Denpasar. Mulai dari anak-anak hingga profesional, kami menyediakan metode pembelajaran terbaik.');
        SEOMeta::addMeta('article:published_time', now()->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Program Kursus', 'property');
        SEOMeta::addKeyword(['kursus bahasa Inggris Bali', 'program kursus IEC Denpasar', 'belajar bahasa Inggris', 'kursus anak dan dewasa']);

        OpenGraph::setDescription('Temukan berbagai program kursus bahasa Inggris di IEC Denpasar. Mulai dari anak-anak hingga profesional, kami menyediakan metode pembelajaran terbaik.');
        OpenGraph::setTitle('Program Kursus Bahasa Inggris di IEC Denpasar | Semua Level');
        OpenGraph::setUrl('https://iecdenpasar.com/program');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);

        OpenGraph::addImage('https://iecdenpasar.com/assets/img/program-banner.jpg');
        OpenGraph::addImage('https://iecdenpasar.com/assets/img/classroom.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Program Kursus Bahasa Inggris di IEC Denpasar | Semua Level');
        JsonLd::setDescription('Temukan berbagai program kursus bahasa Inggris di IEC Denpasar. Mulai dari anak-anak hingga profesional, kami menyediakan metode pembelajaran terbaik.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage('https://iecdenpasar.com/assets/img/logo.png');

        return view('livewire.pages.program');
    }
}
