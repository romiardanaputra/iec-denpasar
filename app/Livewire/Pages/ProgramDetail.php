<?php

namespace App\Livewire\Pages;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

#[\Livewire\Attributes\Title('Detail Program Kami')]

class ProgramDetail extends Component
{
    // public $program;

    public function render()
    {
        // SEOMeta::setTitle($program->title . ' | Kursus Bahasa Inggris di IEC Denpasar');
        // SEOMeta::setDescription($program->summary ?? 'Pelajari lebih lanjut tentang ' . $program->title . ' di IEC Denpasar. Program terbaik untuk meningkatkan kemampuan bahasa Inggris Anda.');
        // SEOMeta::addMeta('article:published_time', $program->created_at->toW3CString(), 'property');
        // SEOMeta::addMeta('article:section', 'Program Kursus', 'property');
        // SEOMeta::addKeyword([$program->title, 'kursus bahasa Inggris', 'IEC Denpasar', 'belajar bahasa Inggris', 'kursus terbaik Bali']);

        // OpenGraph::setDescription($program->summary ?? 'Pelajari lebih lanjut tentang ' . $program->title . ' di IEC Denpasar.');
        // OpenGraph::setTitle($program->title . ' | Kursus Bahasa Inggris di IEC Denpasar');
        // OpenGraph::setUrl(route('program.detail', ['slug' => $program->slug]));
        // OpenGraph::addProperty('type', 'article');
        // OpenGraph::addProperty('locale', 'id_ID');
        // OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);

        // OpenGraph::addImage($program->image ? asset('storage/' . $program->image) : 'https://iecdenpasar.com/assets/img/default-program.jpg');
        // OpenGraph::addImage($program->image ? asset('storage/' . $program->image) : 'https://iecdenpasar.com/assets/img/default-program.jpg', ['height' => 300, 'width' => 300]);

        // JsonLd::setTitle($program->title . ' | Kursus Bahasa Inggris di IEC Denpasar');
        // JsonLd::setDescription($program->summary ?? 'Pelajari lebih lanjut tentang ' . $program->title . ' di IEC Denpasar.');
        // JsonLd::setType('Course');
        // JsonLd::addImage($program->image ? asset('storage/' . $program->image) : 'https://iecdenpasar.com/assets/img/default-program.jpg');
        // JsonLd::addProperty('provider', [
        //   '@type' => 'EducationalOrganization',
        //   'name' => 'IEC Denpasar',
        //   'url' => 'https://iecdenpasar.com',
        // ]);

        return view('livewire.pages.program-detail');
    }
}
