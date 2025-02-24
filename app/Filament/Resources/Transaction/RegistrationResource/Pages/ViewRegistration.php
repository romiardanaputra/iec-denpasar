<?php

namespace App\Filament\Resources\Transaction\RegistrationResource\Pages;

use App\Filament\Resources\Transaction\RegistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRegistration extends ViewRecord
{
    protected static string $resource = RegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
