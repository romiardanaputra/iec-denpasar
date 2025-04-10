<?php

namespace App\Filament\Resources\Schedule;

use App\Filament\Resources\Schedule\ClassTimeCodeResource\Pages;
use App\Models\Schedule\ClassTimeCode;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClassTimeCodeResource extends Resource
{
    protected static ?string $model = ClassTimeCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'Kelola Jadwal Less';

    protected static ?string $navigationLabel = 'Kode Jam';

    protected static ?string $pluralModelLabel = 'Kode Jam';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('time_code')
                    ->label('Kode Jam')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                        'E' => 'E',
                        'F' => 'F',
                    ])
                    ->unique(ClassTimeCode::class)
                    ->native(false),
                TimePicker::make('time_start')
                    ->required()
                    ->label('Jam Mulai'),
                TimePicker::make('time_end')
                    ->required()
                    ->label('Jam Selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('time_code')
                    ->label('Kode Jam'),
                TextColumn::make('time_start')
                    ->label('Jam Mulai'),
                TextColumn::make('time_end')
                    ->label('Jam Selesai'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageClassTimeCodes::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
