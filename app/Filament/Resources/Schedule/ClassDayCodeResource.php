<?php

namespace App\Filament\Resources\Schedule;

use App\Filament\Resources\Schedule\ClassDayCodeResource\Pages;
use App\Models\Schedule\ClassDayCode;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClassDayCodeResource extends Resource
{
    protected static ?string $model = ClassDayCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'Kelola Jadwal Less';

    protected static ?string $navigationLabel = 'Kode Hari';

    protected static ?string $pluralModelLabel = 'Kode Hari';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('day_code')
                    ->required()
                    ->unique(ClassDayCode::class)
                    ->label('Kode hari'),
                TextInput::make('day_name')
                    ->required()
                    ->label('Nama hari'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('day_code')
                    ->label('Kode hari'),
                TextColumn::make('day_name')
                    ->label('Nama hari'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Dibuat Pada'))
                    ->dateTime('d M Y H:i:s')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Diperbarui Pada'))
                    ->dateTime('d M Y H:i:s')
                    ->sortable(),

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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageClassDayCodes::route('/'),
        ];
    }
}
