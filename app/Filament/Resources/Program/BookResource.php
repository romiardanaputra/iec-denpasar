<?php

namespace App\Filament\Resources\Program;

use App\Filament\Resources\Program\BookResource\Pages;
use App\Models\Program\Book;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
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
                    ->helperText('Nama buku harus unik')
                    ->afterStateUpdated(function ($state, \Filament\Forms\Set $set, Component $component, \Filament\Forms\Get $get) {
                        // Get the selected level
                        $level = $get('level');
                        if ($level) {
                            // Generate book_name based on book_name and level
                            $newBookName = $state.' '.$level;
                            $set('book_name', $newBookName);

                            // Generate book_code based on book_name
                            $bookCode = self::generateBookCode($newBookName);
                            $set('book_code', $bookCode);
                        }
                    }),
                Select::make('level')
                    ->required()
                    ->label('Level')
                    ->options([
                        '1' => 'Level 1',
                        '2' => 'Level 2',
                        '3' => 'Level 3',
                        '4' => 'Level 4',
                        '5' => 'Level 5',
                        '6' => 'Level 6',
                    ])
                    ->afterStateUpdated(function ($state, \Filament\Forms\Set $set, Component $component, \Filament\Forms\Get $get) {
                        $bookName = $get('book_name');
                        if ($bookName) {
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
                    ->disabled(),
                TextInput::make('book_price')
                    ->required()
                    ->label('Harga Buku')
                    ->helperText('Harga buku per level'),
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

        // Find the last number in the book name
        preg_match('/(\d+)/', $bookName, $matches);
        if (! empty($matches)) {
            $code .= $matches[1];
        } else {
            $code .= '1'; // Default number if no number is found
        }

        return $code;
    }
}
