<?php

namespace App\Livewire\Pages;

use App\Models\Program\Program;
use App\Models\Transaction\Order;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;

#[\Livewire\Attributes\Title('Detail Program Kami')]

class ProgramDetail extends Component
{
    public $slug;

    public $program;

    public $search = '';

    public $perPage = 5;

    public $latestOrder;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->loadProgram();
        $this->SeoTag();
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

    public function SeoTag()
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
        OpenGraph::addImage('https://www.iecdenpasar.com/public/'.$program->image ? asset('storage/'.$program->image) : 'https://iecdenpasar.com/assets/img/default-program.jpg');
        OpenGraph::addImage($program->image ? asset('storage/'.$program->image) : 'https://iecdenpasar.com/assets/img/default-program.jpg', ['height' => 300, 'width' => 300]);

        JsonLd::setTitle($program->name.' | Kursus Bahasa Inggris di IEC Denpasar');
        JsonLd::setDescription($program->short_description ?? 'Pelajari lebih lanjut tentang '.$program->name.' di IEC Denpasar.');
        JsonLd::setType('Course');
        JsonLd::addImage($program->image ? asset('storage/'.$program->image) : 'https://www.iecdenpasar.com/public/favicon.ico');
        JsonLd::addValue('provider', [
            '@type' => 'EducationalOrganization',
            'name' => 'IEC Denpasar',
            'url' => 'https://iecdenpasar.com',
        ]);
    }

    public function loadProgram()
    {
        try {
            $this->program = Program::with(['detail', 'images', 'classes'])->where('slug', $this->slug)->firstOrFail();
            if (! $this->program) {
                abort(404);
            }
        } catch (\Exception $e) {
            report($e);
            abort(404);
        }
    }

    public function redirectToBill()
    {
        return redirect()->route('bill');
    }

    public function render()
    {
        if (auth()->check() && auth()->user()->hasVerifiedEmail()) {
            $latestOrder = Order::where('user_id', auth()->user()->id)
                ->where(function ($query) {
                    $query->where('payment_status', 'unpaid')
                        ->orWhere('status', 'pending');
                })
                ->latest()
                ->first();
            $this->latestOrder = $latestOrder;
        } else {
            $this->latestOrder = null;
        }

        // dd($latestOrder);
        return view('livewire.pages.program-detail');
    }
}
