<?php

namespace App\Livewire\Pages;

use App\Models\Program\Program;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;
use Livewire\WithPagination;

#[\Livewire\Attributes\Title('Detail Program Kami')]

class ProgramDetail extends Component
{
    // public $program;

    use WithPagination;

    public $slug;

    public $program;

    public $search = '';

    public $perPage = 5;

    public $student_name;

    public $birthdate;

    public $address;

    public $education;

    public $job;

    public $parent_guardian;

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

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadProgram();
    }

    public function checkBeforeRegisterProgram()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $this->student_name = $user->name;
            $this->birthdate = $user->birthdate;
            $this->address = $user->address;
            $this->education = $user->education;
            $this->job = $user->job;
            $this->parent_guardian = $user->parent_guardian;
        } else {

            return redirect()->route('login');
        }
    }

    public function loadProgram()
    {
        $this->program = Program::with(['detail', 'images', 'classes'])->where('slug', $this->slug)->firstOrFail();
        if (! $this->program) {
            abort(404);
        }
    }

    public function render()
    {
        $program = $this->program;

        SEOMeta::setTitle($program->name.' | Kursus Bahasa Inggris di IEC Denpasar');
        SEOMeta::setDescription($program->short_description ?? 'Pelajari lebih lanjut tentang '.$program->name.' di IEC Denpasar. Program terbaik untuk meningkatkan kemampuan bahasa Inggris Anda.');
        SEOMeta::addMeta('article:published_time', $program->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', 'Program Kursus', 'property');
        SEOMeta::addKeyword([$program->name, 'kursus bahasa Inggris', 'IEC Denpasar', 'belajar bahasa Inggris', 'kursus terbaik Bali']);

        OpenGraph::setDescription($program->short_description ?? 'Pelajari lebih lanjut tentang '.$program->name.' di IEC Denpasar.');
        OpenGraph::setTitle($program->name.' | Kursus Bahasa Inggris di IEC Denpasar');
        OpenGraph::setUrl(route('program.detail', ['slug' => $program->slug]));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('locale', 'id_ID');
        OpenGraph::addProperty('locale:alternate', ['en_US', 'id_ID']);
        OpenGraph::addImage($program->image ? asset('storage/'.$program->image) : 'https://iecdenpasar.com/assets/img/default-program.jpg');
        OpenGraph::addImage($program->image ? asset('storage/'.$program->image) : 'https://iecdenpasar.com/assets/img/default-program.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($program->name.' | Kursus Bahasa Inggris di IEC Denpasar');
        JsonLd::setDescription($program->short_description ?? 'Pelajari lebih lanjut tentang '.$program->name.' di IEC Denpasar.');
        JsonLd::setType('Course');
        JsonLd::addImage($program->image ? asset('storage/'.$program->image) : 'https://iecdenpasar.com/assets/img/default-program.jpg');
        JsonLd::addValue('provider', [
            '@type' => 'EducationalOrganization',
            'name' => 'IEC Denpasar',
            'url' => 'https://iecdenpasar.com',
        ]);

        $this->program->classes = $this->program->classes()
            ->when($this->search, function ($query) {
                return $query->where(function ($q) {
                    $q->where('class_code', 'like', '%'.$this->search.'%')
                        ->orWhereHas('program', function ($qr) {
                            $qr->where('name', 'like', '%'.$this->search.'%');
                        })
                        ->orWhereHas('book', function ($qr) {
                            $qr->where('book_name', 'like', '%'.$this->search.'%');
                        })
                        ->orWhereHas('day', function ($qr) {
                            $qr->where('day_name', 'like', '%'.$this->search.'%');
                        });
                });
            })
            ->paginate($this->perPage);

        // dd($user);
        $data = [
            'program' => $program,
            'classes' => $this->program->classes,
        ];

        // dd(get_class($classes));

        // dd($data['program']);

        return view('livewire.pages.program-detail', $data);
    }
}
