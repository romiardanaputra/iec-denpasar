<?php

namespace App\Filament\Resources\Program\ProgramResource\RelationManagers;

use App\Filament\Resources\Program\ProgramDetailResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class DetailRelationManager extends RelationManager
{
    protected static string $relationship = 'detail';

    protected static ?string $recordTitleAttribute = 'program.name';

    public function form(Form $form): Form
    {
        return ProgramDetailResource::form($form);
    }

    public function table(Table $table): Table
    {
        return ProgramDetailResource::table($table);
    }
}
