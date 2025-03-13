<?php

namespace App\Livewire\Pages;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Program extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Program Kursus Bahasa Inggris di IEC Denpasar | Semua Level');
        SEOMeta::setDescription('Temukan berbagai program kursus bahasa Inggris di IEC Denpasar. Mulai dari anak-anak hingga profesional, kami menyediakan metode pembelajaran terbaik.');
        SEOMeta::addMeta('article:published_time', now()->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Program Kursus', 'property');
        SEOMeta::addKeyword(['kursus bahasa Inggris Bali', 'program kursus IEC Denpasar', 'belajar bahasa Inggris', 'kursus anak dan dewasa']);

        OpenGraph::setDescription('Temukan berbagai program kursus bahasa Inggris di IEC Denpasar. Mulai dari anak-anak hingga profesional, kami menyediakan metode pembelajaran terbaik.');
        OpenGraph::setTitle('Program Kursus Bahasa Inggris di IEC Denpasar | Semua Level');
        OpenGraph::setUrl('https://www.iecdenpasar.com/our-program');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);
        OpenGraph::setSiteName('iecdenpasar');
        OpenGraph::addImage(url('public/storage/iec-assets/iec-dps-og.png'));

        JsonLd::setTitle('Program Kursus Bahasa Inggris di IEC Denpasar | Semua Level');
        JsonLd::setDescription('Temukan berbagai program kursus bahasa Inggris di IEC Denpasar. Mulai dari anak-anak hingga profesional, kami menyediakan metode pembelajaran terbaik.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage(url('public/storage/iec-assets/iec-dps-og.png'));

        return view('livewire.pages.program');
    }
}
