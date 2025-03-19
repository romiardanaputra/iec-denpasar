<?php

namespace App\Livewire\Feature\Payment;

use App\Models\Program\Program;
use Livewire\Component;

class Checkout extends Component
{
    public $slug;

    // array of education option
    public $educationOptions = [
        'TK' => 'Taman kanak kanak',
        'SD' => 'Sekolah Dasar',
        'SMP' => 'Sekolah Menengah Pertama',
        'SMA/K' => 'Sekolah Menengah Atas / Kejuruan',
        'D3' => 'Diploma 3',
        'D4' => 'Diploma 4',
        'S1' => 'Sarjana 1',
        'S2' => 'Magister',
        'S3' => 'Doktor',
    ];

    // array of market optional iec denpasar
    public $marketOptions = [
        'teman' => 'Teman',
        'saudara' => 'Saudara',
        'intagram' => 'Instagram',
        'facebook' => 'Facebook',
        'website' => 'Website',
        'tiktok' => 'Tiktok',
    ];

    // array of job option iec denpasar
    public $jobOptions = [
        'pelajar' => 'Pelajar',
        'mahasiswa' => 'Mahasiswa',
        'karyawan' => 'Karyawan',
        'wiraswasta' => 'Wiraswasta',
        'guru/dosen' => 'Guru/Dosen',
        'pensiunan' => 'Pensiunan',
        'lainnya' => 'Lainnya',
    ];

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->program = Program::where('slug', $this->slug)->first();
        if (! $this->program) {
            abort(404);
        }
    }

    public function render()
    {
        $data = [
            'program' => Program::select(['name', 'price', 'image', 'program_id'])->where('slug', $this->slug)->first(),

        ];

        return view('livewire.feature.payment.checkout', $data);
    }
}
