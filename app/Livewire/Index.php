<?php

namespace App\Livewire;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

#[\Livewire\Attributes\Title('Landing')]
class Index extends Component
{
    public function render()
    {
        SEOMeta::setDescription('Tingkatkan kemampuan bahasa Inggris Anda bersama IEC Denpasar. Program kursus berkualitas untuk semua usia dan tingkat kemampuan.');
        SEOMeta::addMeta('article:published_time', now()->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Pendidikan', 'property');
        SEOMeta::addKeyword(['kursus bahasa Inggris', 'IEC Denpasar', 'belajar bahasa Inggris', 'kursus terbaik Bali']);

        OpenGraph::setDescription('Tingkatkan kemampuan bahasa Inggris Anda bersama IEC Denpasar. Program kursus berkualitas untuk semua usia dan tingkat kemampuan.');
        OpenGraph::setTitle('Belajar Bahasa Inggris di IEC Denpasar | Kursus Berkualitas');
        OpenGraph::setUrl('https://iecdenpasar.com');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);

        OpenGraph::addImage('https://iecdenpasar.com/assets/img/banner.jpg');
        OpenGraph::addImage('https://iecdenpasar.com/assets/img/classroom.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Belajar Bahasa Inggris di IEC Denpasar | Kursus Berkualitas');
        JsonLd::setDescription('Tingkatkan kemampuan bahasa Inggris Anda bersama IEC Denpasar. Program kursus berkualitas untuk semua usia dan tingkat kemampuan.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage('https://iecdenpasar.com/assets/img/logo.png');

        return view('livewire.index');
    }
}
