<?php

namespace App\Filament\Resources\Feature\RegistrationScheduleResource\Pages;

use App\Filament\Resources\Feature\RegistrationScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegistrationSchedule extends EditRecord
{
    protected static string $resource = RegistrationScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return 'Edit Jadwal Siswa';
    }
}
