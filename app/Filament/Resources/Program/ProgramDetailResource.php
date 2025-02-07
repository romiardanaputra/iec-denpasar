<?php

namespace App\Filament\Resources\Program;

use App\Filament\Resources\Program\ProgramDetailResource\Pages;
use App\Models\ProgramDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProgramDetailResource extends Resource
{
    protected static ?string $model = ProgramDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('program_id')
                    ->relationship('program', 'name')
                    ->required(),
                Forms\Components\Textarea::make('long_description')
                    ->maxLength(65535),
                Forms\Components\TextInput::make('level')
                    ->maxLength(255),
                Forms\Components\Repeater::make('benefits')
                    ->schema([
                        Forms\Components\TextInput::make('item')
                            ->required()
                            ->maxLength(255),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('program.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('long_description')
                    ->limit(50),
                Tables\Columns\TextColumn::make('level'),
                Tables\Columns\TextColumn::make('benefits')
                    ->getStateUsing(function ($record) {
                        return implode(', ', array_column($record->benefits, 'item'));
                    }),
            ])
            ->filters([
            //
        ])
            ->actions([
            Tables\Actions\EditAction::make(),
        ])
            ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProgramDetails::route('/'),
            'create' => Pages\CreateProgramDetail::route('/create'),
            'edit' => Pages\EditProgramDetail::route('/{record}/edit'),
        ];
    }
}
