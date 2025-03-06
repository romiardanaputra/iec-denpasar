<?php

namespace App\Livewire;

use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        SEOMeta::setTitle('Belajar Bahasa Inggris di IEC Denpasar | Kursus Berkualitas');
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

        OpenGraph::addImage('https://www.iecdenpasar.com/public/favicon.ico');
        OpenGraph::addImage('https://iecdenpasar.com/public/storage/iec-assets/iec-hero-banner-small.webp', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Belajar Bahasa Inggris di IEC Denpasar | Kursus Berkualitas');
        JsonLd::setDescription('Tingkatkan kemampuan bahasa Inggris Anda bersama IEC Denpasar. Program kursus berkualitas untuk semua usia dan tingkat kemampuan.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage('https://www.iecdenpasar.com/public/favicon.ico');

        $features = [
            [
                'icon' => 'book-open',
                'iconColor' => 'indigo',
                'backgroundColor' => 'indigo',
                'title' => 'Pembelajaran Terstruktur',
                'description' => 'Program kami dirancang untuk membantu anda belajar secara sistematis, mulai dari dasar hingga mahir',
            ],
            [
                'icon' => 'layout-grid',
                'iconColor' => 'pink',
                'backgroundColor' => 'pink',
                'title' => 'Integrasi Teknologi',
                'description' => 'Kami memberikan akses informasi mengenai kursus, pendaftaran serta pembayaran terintegrasi untuk memudahkan anda dalam bergabung bersama kami',
            ],
            [
                'icon' => 'notebook-text',
                'iconColor' => 'teal',
                'backgroundColor' => 'teal',
                'title' => 'Laporan kemajuan belajar',
                'description' => 'Pantau kemajuan belajar anda secara realtime melalui laporan berkala yang dapat diakses pada dashboard',
            ],
            [
                'icon' => 'laptop-minimal',
                'iconColor' => 'orange',
                'backgroundColor' => 'orange',
                'title' => 'Metode pembalajaran interaktif',
                'description' => 'Nikmati pengalaman belajar yang menyenangkan dengan metode interaktif seperti role-play, diskusi, dan simulasi.',
            ],
        ];

        return view('livewire.index', ['features' => $features]);
    }
}
