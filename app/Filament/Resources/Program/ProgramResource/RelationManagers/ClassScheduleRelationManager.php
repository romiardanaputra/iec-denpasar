<?php

namespace App\Filament\Resources\Program\ProgramResource\RelationManagers;

use App\Filament\Resources\Schedule\ClassScheduleResource;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class ClassScheduleRelationManager extends RelationManager
{
    protected static string $relationship = 'classes';

    protected static ?string $recordTitleAttribute = 'program.name';

    public function form(Form $form): Form
    {
        return ClassScheduleResource::form($form);
    }

    public function table(Table $table): Table
    {
        return ClassScheduleResource::table($table);
    }
}
