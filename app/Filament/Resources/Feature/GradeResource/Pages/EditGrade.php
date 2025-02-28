<?php

namespace App\Filament\Resources\Feature\GradeResource\Pages;

use App\Filament\Resources\Feature\GradeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGrade extends EditRecord
{
    protected static string $resource = GradeResource::class;

    public function getTitle(): string
    {
        return 'Edit Nilai Siswa';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
