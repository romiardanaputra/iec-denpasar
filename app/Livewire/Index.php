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
        SEOMeta::addKeyword(['kursus bahasa Inggris', 'intensive english course denpasar', 'kursus bahasa inggris denpasar', 'IEC Denpasar', 'belajar bahasa Inggris', 'kursus bahasa inggris terbaik Bali']);

        OpenGraph::setDescription('Tingkatkan kemampuan bahasa Inggris Anda bersama IEC Denpasar. Program kursus berkualitas untuk semua usia dan tingkat kemampuan.');
        OpenGraph::setTitle('Belajar Bahasa Inggris di IEC Denpasar | Kursus Berkualitas');
        OpenGraph::setUrl('https://iecdenpasar.com');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);
        OpenGraph::setSiteName('iecdenpasar');
        OpenGraph::setType('website');
        OpenGraph::addImage(url('storage/assets/iec-assets/iec-dps-og.png'));

        JsonLd::setTitle('Belajar Bahasa Inggris di IEC Denpasar | Kursus Berkualitas');
        JsonLd::setDescription('Tingkatkan kemampuan bahasa Inggris Anda bersama IEC Denpasar. Program kursus berkualitas untuk semua usia dan tingkat kemampuan.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage(url('storage/assets/iec-assets/iec-dps-og.png'));

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
