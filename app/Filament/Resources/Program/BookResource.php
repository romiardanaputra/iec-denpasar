<?php

namespace App\Filament\Resources\Program;

use App\Filament\Resources\Program\BookResource\Pages;
use App\Models\Program\Book;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Kelola Program';

    protected static ?string $navigationLabel = 'Buku Les';

    protected static ?string $pluralModelLabel = 'Buku Les';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('book_name')
                    ->required()
                    ->label('Nama Buku')
                    ->maxLength(255)
                    ->unique(Book::class, ignoreRecord: true)
                    ->helperText('Nama buku harus unik'),
                TextInput::make('book_code')
                    ->required()
                    ->label('Kode Kelas Buku')
                    ->maxLength(50)
                    ->unique(Book::class, ignoreRecord: true)
                    ->helperText('Kode kelas buku harus unik'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('book_name')
                    ->label('Nama Buku')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('book_code')
                    ->label('Kode Kelas Buku')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Filter::make('book_name')
                    ->label('Nama Buku')
                    ->form([
                        TextInput::make('search')
                            ->placeholder('Cari nama buku...')
                            ->columnSpanFull(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['search'] ?? null,
                            fn (Builder $query, string $search): Builder => $query->where('book_name', 'like', '%'.$search.'%')
                        );
                    }),
                Filter::make('book_code')
                    ->label('Kode Kelas Buku')
                    ->form([
                        TextInput::make('search')
                            ->placeholder('Cari kode kelas buku...')
                            ->columnSpanFull(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['search'] ?? null,
                            fn (Builder $query, string $search): Builder => $query->where('book_code', 'like', '%'.$search.'%')
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBooks::route('/'),
        ];
    }

    public static function getView(): ?string
    {
        return 'filament.resources.book-resource.views.view';
    }
}
