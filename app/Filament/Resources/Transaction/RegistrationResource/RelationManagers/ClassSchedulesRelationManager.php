<?php

namespace App\Filament\Resources\Transaction\RegistrationResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ClassSchedulesRelationManager extends RelationManager
{
    protected static string $relationship = 'classSchedules';

    protected static ?string $recordTitleAttribute = 'class_code';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('class_schedule_id')
                    ->relationship('classSchedule', 'class_code')
                    ->required()
                    ->searchable()
                    ->preload(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('student_name')
            ->columns([
                Tables\Columns\TextColumn::make('class_code')
                    ->label('Kode Kelas')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('program.name')
                    ->label('Nama Program')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('book.book_name')
                    ->label('Nama Buku')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('time.time_code')
                    ->label('Kode Jam Kelas')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return $record->time ? "{$record->time->time_code} ({$record->time->time_start} - {$record->time->time_end})" : '';
                    }),
                Tables\Columns\TextColumn::make('day.day_code')
                    ->label('Kode Hari Kelas')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return $record->day ? "{$record->day->day_code} ({$record->day->day_name})" : '';
                    }),
                Tables\Columns\TextColumn::make('team.name')
                    ->label('Nama Mentor')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
