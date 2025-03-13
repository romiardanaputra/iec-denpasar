<?php

namespace App\Livewire\Pages;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class OurTeam extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Tim Pengajar IEC Denpasar | Tenaga Pendidik Profesional');
        SEOMeta::setDescription('Kenali tim pengajar IEC Denpasar yang berpengalaman dan profesional. Kami siap membantu Anda belajar bahasa Inggris dengan metode terbaik.');
        SEOMeta::addMeta('article:published_time', now()->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Tim Pengajar', 'property');
        SEOMeta::addKeyword(['tim pengajar IEC Denpasar', 'guru bahasa Inggris profesional', 'kursus bahasa Inggris terbaik', 'belajar dengan native speaker']);

        OpenGraph::setDescription('Kenali tim pengajar IEC Denpasar yang berpengalaman dan profesional. Kami siap membantu Anda belajar bahasa Inggris dengan metode terbaik.');
        OpenGraph::setTitle('Tim Pengajar IEC Denpasar | Tenaga Pendidik Profesional');
        OpenGraph::setUrl('https://iecdenpasar.com/our-teams');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::setType('website');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);
        OpenGraph::addImage(url('public/storage/iec-assets/iec-dps-og.png'));

        JsonLd::setTitle('Tim Pengajar IEC Denpasar | Tenaga Pendidik Profesional');
        JsonLd::setDescription('Kenali tim pengajar IEC Denpasar yang berpengalaman dan profesional. Kami siap membantu Anda belajar bahasa Inggris dengan metode terbaik.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage(url('public/storage/iec-assets/iec-dps-og.png'));

        return view('livewire.pages.our-team');
    }
}
