<?php

namespace App\Filament\Resources\Schedule\ClassTimeCodeResource\Pages;

use App\Filament\Resources\Schedule\ClassTimeCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClassTimeCodes extends ManageRecords
{
    protected static string $resource = ClassTimeCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
