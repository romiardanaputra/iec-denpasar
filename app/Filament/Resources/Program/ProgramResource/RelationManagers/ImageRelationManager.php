<?php

namespace App\Filament\Resources\Program\ProgramResource\RelationManagers;

use App\Filament\Resources\Program\ImageResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ImageRelationManager extends RelationManager
{
    protected static string $relationship = 'images';

    protected static ?string $recordTitleAttribute = 'program.name';

    public function form(Form $form): Form
    {
        return ImageResource::form($form);
    }

    public function table(Table $table): Table
    {
        return ImageResource::table($table);
    }
}
