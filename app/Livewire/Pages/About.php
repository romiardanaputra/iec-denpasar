<?php

namespace App\Livewire\Pages;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

#[\Livewire\Attributes\Title('Tentang Kami')]

class About extends Component
{
    public function render()
    {
        SEOMeta::setDescription('IEC Denpasar adalah lembaga kursus bahasa Inggris terbaik di Bali dengan metode pembelajaran interaktif dan tenaga pengajar berpengalaman.');
        SEOMeta::addMeta('article:published_time', now()->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Tentang Kami', 'property');
        SEOMeta::addKeyword(['tentang IEC Denpasar', 'kursus bahasa Inggris Bali', 'belajar bahasa Inggris', 'metode belajar interaktif']);

        OpenGraph::setDescription('IEC Denpasar adalah lembaga kursus bahasa Inggris terbaik di Bali dengan metode pembelajaran interaktif dan tenaga pengajar berpengalaman.');
        OpenGraph::setTitle('Tentang IEC Denpasar | Kursus Bahasa Inggris Terbaik di Bali');
        OpenGraph::setUrl('https://iecdenpasar.com/about');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);

        OpenGraph::addImage('https://iecdenpasar.com/assets/img/team.jpg');
        OpenGraph::addImage('https://iecdenpasar.com/assets/img/facility.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Tentang IEC Denpasar | Kursus Bahasa Inggris Terbaik di Bali');
        JsonLd::setDescription('IEC Denpasar adalah lembaga kursus bahasa Inggris terbaik di Bali dengan metode pembelajaran interaktif dan tenaga pengajar berpengalaman.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage('https://iecdenpasar.com/assets/img/logo.png');

        return view('livewire.pages.about');
    }
}
