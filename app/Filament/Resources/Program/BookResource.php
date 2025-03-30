<?php

namespace App\Filament\Resources\Program;

use App\Filament\Resources\Program\BookResource\Pages;
use App\Models\Program\Book;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
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
                    ->debounce()
                    ->unique(Book::class, ignoreRecord: true)
                    ->helperText('Nama buku harus unik')
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        // Get the selected level
                        $level = $get('level');
                        // dd($state);
                        if ($level) {
                            $newBookName = $state.' '.$level;
                            $set('book_name', $newBookName);
                        }
                    }),
                Select::make('level')
                    ->required()
                    ->debounce()
                    ->label('Level')
                    ->options([
                        '1' => 'Level 1',
                        '2' => 'Level 2',
                        '3' => 'Level 3',
                        '4' => 'Level 4',
                        '5' => 'Level 5',
                        '6' => 'Level 6',
                    ])
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        $bookName = $get('book_name');
                        if ($bookName) {
                            $bookName = preg_replace('/\s\d+$/', '', $bookName);
                            $newBookName = $bookName.' '.$state;
                            $set('book_name', $newBookName);
                            $bookCode = self::generateBookCode($newBookName);
                            $set('book_code', $bookCode);
                        }
                    }),
                TextInput::make('book_code')
                    ->required()
                    ->label('Kode Kelas Buku')
                    ->maxLength(50)
                    ->unique(Book::class, ignoreRecord: true)
                    ->helperText('Kode kelas buku harus unik')
                    ->disabled()
                    ->dehydrated(),
                TextInput::make('book_price')
                    ->required()
                    ->numeric()
                    ->label('Harga Buku')
                    ->prefix('Rp. '),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('book_name')
                    ->label('Nama Buku')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('level')
                    ->label('Level')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
                TextColumn::make('book_price')
                    ->label('Harga Buku')
                    ->sortable()
                    ->searchable()
                    ->money('IDR')
                    ->wrap(),
                TextColumn::make('book_code')
                    ->label('Kode Kelas Buku')
                    ->sortable()
                    ->searchable()
                    ->wrap(),
            ])
            ->filters([
                Tables\Filters\Filter::make('book_name')
                    ->label('Nama Buku')
                    ->form([
                        TextInput::make('search')
                            ->label('Cari Nama Buku')
                            ->debounce()
                            ->placeholder('cari nama buku...'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['search'],
                                fn ($query, $search) => $query->where('book_name', 'LIKE', "%{$search}%")
                            );
                    }),
                Tables\Filters\MultiSelectFilter::make('level')
                    ->label('Level')
                    ->options([
                        '1' => 'Level 1',
                        '2' => 'Level 2',
                        '3' => 'Level 3',
                        '4' => 'Level 4',
                        '5' => 'Level 5',
                        '6' => 'Level 6',
                    ]),
                Tables\Filters\Filter::make('price_range')
                    ->label('Harga Buku')
                    ->form([
                        TextInput::make('min_price')
                            ->label('Harga Minimum')
                            ->placeholder('10000')
                            ->numeric(),
                        TextInput::make('max_price')
                            ->label('Harga Maksimum')
                            ->placeholder('20000')
                            ->numeric(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['min_price'], fn ($query, $minPrice) => $query->where('book_price', '>=', $minPrice))
                            ->when($data['max_price'], fn ($query, $maxPrice) => $query->where('book_price', '<=', $maxPrice));
                    }),
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
        ])
            ->defaultSort('book_name') // Default sort by book name
            ->reorderable('book_id'); // Allows reordering if needed
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

    /**
     * Generate book code from book name.
     */
    protected static function generateBookCode(string $bookName): string
    {
        // Example logic: Take the first two letters of each word and append the last number found
        $words = explode(' ', $bookName);
        $code = '';

        foreach ($words as $word) {
            if (strlen($word) > 0) {
                $code .= strtoupper($word[0]);
            }
        }

        return $code;
    }

    public static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
