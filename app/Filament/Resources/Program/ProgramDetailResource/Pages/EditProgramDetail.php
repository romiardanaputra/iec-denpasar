<?php

namespace App\Filament\Resources\Program\ProgramDetailResource\Pages;

use App\Filament\Resources\Program\ProgramDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramDetail extends EditRecord
{
    protected static string $resource = ProgramDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
