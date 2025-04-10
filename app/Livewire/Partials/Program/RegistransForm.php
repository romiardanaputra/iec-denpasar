<?php

namespace App\Livewire\Partials\Program;

use Livewire\Component;

class RegistransForm extends Component
{
    public $program;

    public $educationOptions = [
        'SD' => 'Sekolah Dasar',
        'SMP' => 'Sekolah Menengah Pertama',
        'SMA' => 'Sekolah Menengah Atas',
        'D3' => 'Diploma 3',
        'S1' => 'Sarjana 1',
        'S2' => 'Magister',
        'S3' => 'Doktor',
    ];

    public $jobOptions = [
        'Pelajar' => 'Pelajar',
        'Mahasiswa' => 'Mahasiswa',
        'Karyawan Swasta' => 'Karyawan Swasta',
        'Wiraswasta' => 'Wiraswasta',
        'Guru/Dosen' => 'Guru/Dosen',
        'Pensiunan' => 'Pensiunan',
        'Lainnya' => 'Lainnya',
    ];

    public $marketOptions = [
        'teman' => 'Teman',
        'family' => 'Family',
        'papan nama' => 'Papan Nama',
        'medsos' => 'Medsos',
    ];

    public function render()
    {
        return view('livewire.partials.program.registrans-form');
    }
}
