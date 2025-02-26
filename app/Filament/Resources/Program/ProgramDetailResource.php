<?php

namespace App\Filament\Resources\Program;

use App\Filament\Resources\Program\ProgramDetailResource\Pages;
use App\Models\Program\ProgramDetail;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                    ->label('Nama Program')
                    ->helperText('Pilih nama program untuk ditampilkan pada detail')
                    ->required()
                    ->searchable()
                    ->native(false),
                TextInput::make('level')
                    ->label('Level Kursus')
                    ->maxLength(255)
                    ->required()
                    ->helperText('Jumlah level kursus tersedia'),
                RichEditor::make('long_description')
                    ->label('Deskripsi Panjang')
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->required()
                    ->helperText('Masukkan deskripsi panjang program'),
                Repeater::make('benefits')
                    ->label('Benefit')
                    ->schema([
                        TextInput::make('item')
                            ->label('Benefit')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Masukkan benefit program'),
                    ])
                    ->columnSpanFull()
                    ->required()
                    ->helperText('Daftar benefit program'),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('program.name')
                    ->label('Nama Program')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('level')
                    ->label('Level Kursus')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('long_description')
                    ->label('Deskripsi Panjang')
                    ->sortable()
                    ->searchable()
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('benefits')
                    ->label('Benefit')
                    ->getStateUsing(function ($record) {
                        $benefits = is_array($record->benefits) ? $record->benefits : json_decode($record->benefits, true);

                        return implode(', ', array_column($benefits, 'item'));
                    })
                    ->sortable()
                    ->searchable()
                    ->wrap(),
            ])
            ->filters([
                Filter::make('program_name')
                    ->label('Nama Program')
                    ->form([
                        TextInput::make('search')
                            ->placeholder('Cari nama program...')
                            ->columnSpanFull(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['search'] ?? null,
                            fn (Builder $query, string $search): Builder => $query->whereHas('program', function (Builder $query) use ($search) {
                                $query->where('name', 'like', '%'.$search.'%');
                            })
                        );
                    }),
                Filter::make('level')
                    ->label('Level Kursus')
                    ->form([
                        TextInput::make('search')
                            ->placeholder('Cari level kurxsus...')
                            ->columnSpanFull(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['search'] ?? null,
                            fn (Builder $query, string $search): Builder => $query->where('level', 'like', '%'.$search.'%')
                        );
                    }),
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
            ])
            ->defaultSort('program.name');
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('program');
    }
}
