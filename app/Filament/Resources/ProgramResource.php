<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static ?string $navigationLabel = 'Kelola Program Kursus';

    protected static ?string $navigationGroup = 'Kelola Halaman Website';

    protected static ?string $pluralModelLabel = 'Kelola Program Kursus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }
                                        $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->disabled()
                                    ->dehydrated()
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(Program::class, 'slug', ignoreRecord: true),
                                Forms\Components\TextInput::make('rate')
                                    ->required()
                                    ->numeric()
                                    ->minValue(1)
                                    ->maxValue(5),
                                Forms\Components\MarkdownEditor::make('short_description')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2),
                        Forms\Components\Section::make('Upload Image')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->required()
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->directory('program')
                                    ->visibility('public'),
                            ]),
                        Forms\Components\Section::make('Pricing')
                            ->schema([
                                Forms\Components\TextInput::make('price')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('register_fee')
                                    ->required()
                                    ->numeric(),
                            ])
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('is_visible')
                                    ->label('Visible')
                                    ->helperText('This program will be hidden for all users')
                                    ->default(true),
                                Forms\Components\DatePicker::make('published_at')
                                    ->label('Availability')
                                    ->default(now())
                                    ->required(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->square()
                    ->size(48)
                    ->rounded(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('slug')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('price')
                    ->searchable()
                    ->sortable()
                    ->money('idr'),
                TextColumn::make('register_fee')
                    ->searchable()
                    ->sortable()
                    ->money('idr'),
                IconColumn::make('is_visible')
                    ->boolean()
                    ->label('Visibility')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('published_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Filter::make('name')
                    ->label('Nama Program')
                    ->form([
                        Forms\Components\TextInput::make('search')
                            ->placeholder('Cari nama program...')
                            ->columnSpanFull(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['search'] ?? null,
                            fn (Builder $query, string $search): Builder => $query->where('name', 'like', '%'.$search.'%')
                        );
                    }),
                Filter::make('slug')
                    ->label('Slug')
                    ->form([
                        Forms\Components\TextInput::make('search')
                            ->placeholder('Cari slug...')
                            ->columnSpanFull(),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['search'] ?? null,
                            fn (Builder $query, string $search): Builder => $query->where('slug', 'like', '%'.$search.'%')
                        );
                    }),
                SelectFilter::make('is_visible')
                    ->label('Visibilitas')
                    ->options([
                        '1' => 'Visible',
                        '0' => 'Hidden',
                    ])
                    ->query(fn (Builder $query, array $data): Builder => $query->when(
                        $data['is_visible'] ?? null,
                        fn (Builder $query, string $isVisible): Builder => $query->where('is_visible', $isVisible)
                    )),
                Filter::make('price')
                    ->label('Harga')
                    ->form([
                        Forms\Components\TextInput::make('min_price')
                            ->label('Minimum Price')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TextInput::make('max_price')
                            ->label('Maximum Price')
                            ->numeric()
                            ->minValue(0),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['min_price'] ?? null,
                            fn (Builder $query, string $minPrice): Builder => $query->where('price', '>=', $minPrice)
                        )->when(
                            $data['max_price'] ?? null,
                            fn (Builder $query, string $maxPrice): Builder => $query->where('price', '<=', $maxPrice)
                        );
                    }),
                Filter::make('register_fee')
                    ->label('Biaya Pendaftaran')
                    ->form([
                        Forms\Components\TextInput::make('min_register_fee')
                            ->label('Minimum Register Fee')
                            ->numeric()
                            ->minValue(0),
                        Forms\Components\TextInput::make('max_register_fee')
                            ->label('Maximum Register Fee')
                            ->numeric()
                            ->minValue(0),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query->when(
                            $data['min_register_fee'] ?? null,
                            fn (Builder $query, string $minRegisterFee): Builder => $query->where('register_fee', '>=', $minRegisterFee)
                        )->when(
                            $data['max_register_fee'] ?? null,
                            fn (Builder $query, string $maxRegisterFee): Builder => $query->where('register_fee', '<=', $maxRegisterFee)
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
            // 'view' => Pages\ViewProgram::route('/{record}'),
        ];
    }

    public static function getView(): ?string
    {
        return 'filament.resources.program-resource.views.view';
    }
}
