<?php

namespace App\Livewire\Feature\Payment;

use App\Models\Program\Program;
use Livewire\Component;

class Checkout extends Component
{
    public $program;

    public $slug;

    public $schedules = [];

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

    public function mount()
    {
        $programId = request()->query('program');
        $scheduleIds = request()->query('schedule');

        if (! $programId) {
            abort(404, 'Prgoram tidak ditemukan.');
        }

        if (! is_array($scheduleIds) || count($scheduleIds) !== 2) {
            session()->flash('error', 'Harus memilih 2 jadwal.');

            return redirect()->route('program.detail', ['slug' => $this->slug]);
        }

        $this->program = Program::find($programId);
        if (! $this->program) {
            abort(404, 'Program tidak ditemukan');
        }

        $this->schedules = $this->program->classes()->whereIn('class_schedule_id', $scheduleIds)->get();

        if ($this->schedules->count() < 2) {
            session()->flash('error', 'Jadwal tidak ditemukan.');

            return redirect()->route('program.detail', ['slug' => $this->slug]);
        }

    }

    public function render()
    {
        $data = [
            'program' => Program::select(['name', 'price', 'image', 'program_id'])->where('slug', $this->slug)->first(),
            'schedules' => $this->schedules,

        ];

        return view('livewire.feature.payment.checkout', $data);
    }

    public function submit()
    {
        $this->validate([
            'student_name' => 'required|string|max:255',
            'birthplace' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'required|string',
            'education' => 'required|string',
            'job' => 'required|string',
            'market' => 'required|string',
            'payment_method' => 'required|in:cash,online',
        ]);

        $postData = [
            'student_name' => $this->student_name,
            'birthplace' => $this->birthplace,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'education' => $this->education,
            'job' => $this->job,
            'market' => $this->market,
            'parent_guardian' => $this->parent_guardian,
            'payment_method' => $this->payment_method,
            'schedule' => $this->schedules->pluck('id')->toArray(),
        ];
        $this->emitSelf('submitForm', $postData);
    }
}
