<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\Widgets\TeamStats;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\QueryBuilder\Constraints\BooleanConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\DateConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\NumberConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\SelectConstraint;
use Filament\Tables\Filters\QueryBuilder\Constraints\TextConstraint;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                                    ->minLength(2)
                                    ->live(onBlur: true)
                                    ->maxLength(255)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }

                                        $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->disabled()
                                    ->required()
                                    ->dehydrated()
                                    ->maxLength(255)
                                    ->unique(Team::class, 'slug', ignoreRecord: true),
                                Forms\Components\TextInput::make('mentor_class')
                                    ->required()
                                    ->minLength(2)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('age')
                                    ->required()
                                    ->numeric(),
                                Forms\Components\Select::make('gender')
                                    ->options([
                                        'male' => 'Male',
                                        'female' => 'Female',
                                    ])
                                    ->native(false)
                                    ->required(),
                                Forms\Components\Textarea::make('short_description')
                                    ->required()
                                    ->minLength(2)
                                    ->maxLength(500)
                                    ->autosize()
                                    ->columnSpanFull(),
                            ])
                            ->columns(['md' => 2]),
                        Forms\Components\Section::make('Image IEC Member')
                            ->schema([
                            Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ]),
                        ]),
                        Forms\Components\Section::make('Social Media IEC Team')
                            ->schema([
                            Forms\Components\TextInput::make('facebook')
                                    ->nullable()
                                    ->string()
                                    ->placeholder('ex:https://www.facebook.com/romiardanap')
                                    ->helperText('optional facebook links'),
                            Forms\Components\TextInput::make('instagram')
                                    ->nullable()
                                    ->string()
                                    ->placeholder('ex:https://www.instagram.com/romiardanap_/')
                                    ->helperText('optional instagram links'),
                            Forms\Components\TextInput::make('whatsapp')
                                    ->required()
                                    ->string()
                                    ->placeholder('6285792479249')
                                    ->helperText('whatsapp phone number'),
                            Forms\Components\TextInput::make('linkedin')
                                    ->nullable()
                                    ->string()
                                    ->placeholder('ex:https://www.linkedin.com/in/romiardana/')
                                    ->helperText('optional for linekdin\'s links'),
                        ])
                            ->columns(['md' => 2]),
                    ])
                    ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                    ->schema([
                    Forms\Components\Section::make('Status')
                        ->schema([
                            Forms\Components\Toggle::make('is_active')
                                    ->required()
                                    ->default(true)
                                    ->helperText('Determine if a team is active or not'),
                            Forms\Components\DateTimePicker::make('join_at')
                                    ->required()
                                    ->default(now())
                                    ->helperText('Determine if a member joined at'),
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
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('age')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->sortable(),
                Tables\Columns\TextColumn::make('linkedin'),
                Tables\Columns\TextColumn::make('instagram'),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('join_at')
                    ->searchable()
                    ->since()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Is Active ?')
                    ->sortable()
                    ->toggleable(),
            ])
            ->searchOnBlur()
            ->filters([
                Filter::make('is_active')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),
                QueryBuilder::make()
                    ->constraints([
                        TextConstraint::make('name'),
                        TextConstraint::make('slug'),
                        NumberConstraint::make('age')
                            ->label('Filter Age by inputing number'),
                        TextConstraint::make('mentor_class')
                            ->label('Filter by class'),
                        SelectConstraint::make('gender')
                            ->label('filter by gender (male, female)')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ])
                            ->multiple(),
                        BooleanConstraint::make('is_active')
                            ->label('Active team'),
                        DateConstraint::make('join_at'),
                    ])
                    ->constraintPickerColumns(2),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            TeamStats::class,
        ];
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
