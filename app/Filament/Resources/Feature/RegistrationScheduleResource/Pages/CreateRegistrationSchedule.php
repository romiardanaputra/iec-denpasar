<?php

namespace App\Filament\Resources\Feature\RegistrationScheduleResource\Pages;

use App\Filament\Resources\Feature\RegistrationScheduleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateRegistrationSchedule extends CreateRecord
{
    protected static string $resource = RegistrationScheduleResource::class;

    public function getTitle(): string
    {
        return 'Buat Jadwal Kursus';
    }
}
