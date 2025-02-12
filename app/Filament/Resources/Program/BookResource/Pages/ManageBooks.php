<?php

namespace App\Filament\Resources\Program\BookResource\Pages;

use App\Filament\Resources\Program\BookResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBooks extends ManageRecords
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
