<?php

namespace App\Filament\Resources\Feature\RegistrationScheduleResource\Pages;

use App\Filament\Resources\Feature\RegistrationScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegistrationSchedules extends ListRecords
{
    protected static string $resource = RegistrationScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
