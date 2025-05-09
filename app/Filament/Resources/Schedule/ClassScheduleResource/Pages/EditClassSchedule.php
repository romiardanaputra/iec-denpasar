<?php

namespace App\Filament\Resources\Schedule\ClassScheduleResource\Pages;

use App\Filament\Resources\Schedule\ClassScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClassSchedule extends EditRecord
{
    protected static string $resource = ClassScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
