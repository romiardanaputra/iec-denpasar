<?php

namespace App\Filament\Resources\Schedule\ClassScheduleResource\Pages;

use App\Filament\Resources\Schedule\ClassScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageClassSchedules extends ManageRecords
{
    protected static string $resource = ClassScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
