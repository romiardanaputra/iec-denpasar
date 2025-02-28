<?php

namespace App\Filament\Resources\Feature\GradeResource\Pages;

use App\Filament\Resources\Feature\GradeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateGrade extends CreateRecord
{
    protected static string $resource = GradeResource::class;

    public function getTitle(): string
    {
        return 'Buat Nilai Siswa';
    }
}
