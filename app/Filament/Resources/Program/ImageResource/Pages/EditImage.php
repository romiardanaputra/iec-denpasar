<?php

namespace App\Filament\Resources\Program\ImageResource\Pages;

use App\Filament\Resources\Program\ImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImage extends EditRecord
{
    protected static string $resource = ImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
