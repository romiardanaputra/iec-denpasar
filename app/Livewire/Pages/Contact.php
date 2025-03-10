<?php

namespace App\Livewire\Pages;

use App\Mail\ContactMessageNotification;
use App\Mail\UserContactMessageConfirmation;
use App\Models\ContactMessage;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Contact extends Component
{
    public $name = '';

    public $email = '';

    public $phone = '';

    public $message = '';

    public $communicationMethod;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'communicationMethod' => 'nullable|string|in:email,phone',
        'message' => 'required|string',
    ];

    public function submit()
    {
        // Validasi input
        $this->validate();

        // Simpan data ke database
        $contactMessage = ContactMessage::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'communicationMethod' => $this->communicationMethod,
            'message' => $this->message,
        ]);

        // dd($contactMessage);

        Mail::to('romiardana21@gmail.com')->send(new ContactMessageNotification($contactMessage));

        Mail::to($this->email)->send(new UserContactMessageConfirmation($contactMessage));

        $this->reset(['name', 'email', 'phone', 'message', 'communicationMethod']);

        session()->flash('success', 'Pesan berhasil dikirim!');
    }

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

        OpenGraph::addImage('https://www.iecdenpasar.com/public/favicon.ico');
        OpenGraph::addImage('https://iecdenpasar.com/public/storage/iec-assets/iec-hero-banner-small.webp', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle('Kontak IEC Denpasar | Hubungi Kami Sekarang');
        JsonLd::setDescription('Hubungi IEC Denpasar untuk informasi lebih lanjut mengenai kursus bahasa Inggris kami. Kami siap membantu Anda mencapai tujuan belajar bahasa Inggris.');
        JsonLd::setType('EducationalOrganization');
        JsonLd::addImage('https://www.iecdenpasar.com/public/favicon.ico');
        JsonLd::addValue('address', [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Jl. Jaya Giri Gg. XXII No.10x, Renon, Kec. Denpasar Tim., Kota Denpasar, Bali 80236',
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
