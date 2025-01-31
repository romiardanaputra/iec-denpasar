<?php

namespace App\Livewire\Pages;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

#[\Livewire\Attributes\Title('Our teams')]

class OurTeam extends Component
{
    public $breadcrumb;

    public $title;

    public $routeName;

    public function render()
    {
        SEOMeta::setTitle('Tim Pengajar IEC Denpasar | Tenaga Pendidik Profesional');
        SEOMeta::setDescription('Kenali tim pengajar IEC Denpasar yang berpengalaman dan profesional. Kami siap membantu Anda belajar bahasa Inggris dengan metode terbaik.');
        SEOMeta::addMeta('article:published_time', now()->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Tim Pengajar', 'property');
        SEOMeta::addKeyword(['tim pengajar IEC Denpasar', 'guru bahasa Inggris profesional', 'kursus bahasa Inggris terbaik', 'belajar dengan native speaker']);

        OpenGraph::setDescription('Kenali tim pengajar IEC Denpasar yang berpengalaman dan profesional. Kami siap membantu Anda belajar bahasa Inggris dengan metode terbaik.');
        OpenGraph::setTitle('Tim Pengajar IEC Denpasar | Tenaga Pendidik Profesional');
        OpenGraph::setUrl('https://iecdenpasar.com/team');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);

        OpenGraph::addImage('https://iecdenpasar.com/assets/img/team-group.jpg');
        OpenGraph::addImage('https://iecdenpasar.com/assets/img/teacher-class.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Tim Pengajar IEC Denpasar | Tenaga Pendidik Profesional');
        JsonLd::setDescription('Kenali tim pengajar IEC Denpasar yang berpengalaman dan profesional. Kami siap membantu Anda belajar bahasa Inggris dengan metode terbaik.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage('https://iecdenpasar.com/assets/img/logo.png');

        return view('livewire.pages.our-team');
    }
}
