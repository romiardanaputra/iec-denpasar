<?php

namespace App\Filament\Resources\Schedule\ClassDayCodeResource\Pages;

use App\Filament\Resources\Schedule\ClassDayCodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClassDayCodes extends ManageRecords
{
    protected static string $resource = ClassDayCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
