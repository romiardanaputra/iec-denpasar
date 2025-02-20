<?php

namespace App\Filament\Resources\Program;

use App\Filament\Resources\Program\ProgramDetailResource\Pages;
use App\Models\Program\Program;
use App\Models\Program\ProgramDetail;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProgramDetailResource extends Resource
{
    protected static ?string $model = ProgramDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';

    protected static ?string $navigationGroup = 'Kelola Program';

    protected static ?string $navigationLabel = 'Detail Program';

    protected static ?string $pluralModelLabel = 'Detail Program';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->label('Nama program')
                    ->helperText('Pilih nama program untuk ditampilkan pada detail')
                    ->required()
                    ->options(Program::pluck('name', 'program_id')->toArray())
                    ->searchable()
                    ->native(false),
                TextInput::make('level')
                    ->label('Level Kursus')
                    ->maxLength(255),
                RichEditor::make('long_description')
                    ->label('Deskripsi Panjang')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Repeater::make('benefits')
                    ->label('Benefit')
                    ->schema([
                        TextInput::make('item')
                            ->label('Benefit')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('program.name')
                    ->label('Nama Program')
                    ->searchable(),
                TextColumn::make('long_description')
                    ->label('Deskripsi Panjang')
                    ->limit(50),
                TextColumn::make('level')
                    ->label('Level Kursus'),
                TextColumn::make('benefits')
                    ->label('Benefit')
                    ->getStateUsing(function ($record) {
                        $benefits = is_array($record->benefits) ? $record->benefits : json_decode($record->benefits, true);

                        return implode(', ', array_column($benefits, 'item'));
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
