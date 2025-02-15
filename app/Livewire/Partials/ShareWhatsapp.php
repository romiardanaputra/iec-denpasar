<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class ShareWhatsapp extends Component
{
    public $program;

    public $class;

    public function mount($program, $class)
    {
        $this->program = $program;
        $this->class = $class;
    }

    public function getWhatsAppShareUrl()
    {
        $whatsappMessage = "Halo, saya ingin membagikan detail program *{$this->program->name}* kepada Anda:\n\n";
        $whatsappMessage .= "*Nama Program:* {$this->program->name}\n";
        $whatsappMessage .= "*Deskripsi:* {$this->program->short_description}\n\n";
        $whatsappMessage .=
          '*Harga:* Rp. '.number_format($this->program->price, 0, ',', '.')."\n";
        $whatsappMessage .= "*Rating:* {$this->program->rate} stars (14 reviews)\n";
        $whatsappMessage .= "*Level Kursus:* {$this->program->detail->level} Level\n";
        $whatsappMessage .= "*[Manfaat]:*\n";
        foreach ($this->program->detail->benefits as $benefit) {
            $whatsappMessage .= '- '.$benefit['item']."\n";
        }
        $whatsappMessage .= "*[Jadwal Kelas]:*\n";
        $whatsappMessage .= "  *Nama Program:* {$this->class->program->name}\n";
        $whatsappMessage .= "  *Buku:* {$this->class->book->book_name}\n";
        $whatsappMessage .= "  *Hari:* {$this->class->day->day_name}\n";
        $whatsappMessage .= "  *Jam Mulai:* {$this->class->time->time_start}\n";
        $whatsappMessage .= "  *Jam Selesai:* {$this->class->time->time_end}\n";
        $whatsappMessage .= "  *Kode Kelas:* {$this->class->class_code}\n\n";
        $whatsappMessage .= "*[Kebijakan Pengembalian Dana]:*\n";
        $whatsappMessage .= __(
            'Kami menawarkan kebijakan pengembalian dana yang fleksibel. Jika Anda tidak puas dengan program kami, Anda dapat mengajukan permohonan pengembalian dana dalam 30 hari pertama pendaftaran. Silakan hubungi kami di +62 361 234 567 untuk informasi lebih lanjut.',
        );

        return 'https://wa.me/?text='.urlencode($whatsappMessage);
    }

    public function render()
    {
        return view('livewire.partials.share-whatsapp');
    }
}
