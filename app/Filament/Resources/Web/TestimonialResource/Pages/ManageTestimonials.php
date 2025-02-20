<?php

namespace App\Filament\Resources\Web\TestimonialResource\Pages;

use App\Filament\Resources\Web\TestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTestimonials extends ManageRecords
{
    protected static string $resource = TestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
