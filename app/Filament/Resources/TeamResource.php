<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\Widgets\TeamStats;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Team IEC Denpasar';

    protected static ?string $navigationGroup = 'Kelola Halaman Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Team Details')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('General Information')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('Name'))
                                    ->required()
                                    ->minLength(2)
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                        if ($operation !== 'create') {
                                            return;
                                        }
                                        $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\TextInput::make('slug')
                                    ->label(__('Slug'))
                                    ->disabled()
                                    ->required()
                                    ->unique(Team::class, 'slug', ignoreRecord: true),
                                Forms\Components\TextInput::make('mentor_class')
                                    ->label(__('Mentor Class'))
                                    ->required()
                                    ->minLength(2)
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('age')
                                    ->label(__('Age'))
                                    ->numeric()
                                    ->required(),
                                Forms\Components\Select::make('gender')
                                    ->label(__('Gender'))
                                    ->options([
                                        'male' => __('Male'),
                                        'female' => __('Female'),
                                    ])
                                    ->native(false)
                                    ->required(),
                                Forms\Components\Textarea::make('short_description')
                                    ->label(__('Short Description'))
                                    ->required()
                                    ->minLength(2)
                                    ->maxLength(500)
                                    ->autosize()
                                    ->columnSpanFull(),
                            ]),

                        Forms\Components\Tabs\Tab::make('Media')
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label(__('Image'))
                                    ->image()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        null,
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Social Media')
                            ->schema([
                                Forms\Components\TextInput::make('facebook')
                                    ->label(__('Facebook'))
                                    ->nullable()
                                    ->placeholder(__('ex: https://www.facebook.com/romiardanap'))
                                    ->helperText(__('Optional Facebook links')),
                                Forms\Components\TextInput::make('instagram')
                                    ->label(__('Instagram'))
                                    ->nullable()
                                    ->placeholder(__('ex: https://www.instagram.com/romiardanap_/'))
                                    ->helperText(__('Optional Instagram links')),
                                Forms\Components\TextInput::make('whatsapp')
                                    ->label(__('WhatsApp'))
                                    ->required()
                                    ->placeholder(__('6285792479249'))
                                    ->helperText(__('WhatsApp phone number')),
                                Forms\Components\TextInput::make('linkedin')
                                    ->label(__('LinkedIn'))
                                    ->nullable()
                                    ->placeholder(__('ex: https://www.linkedin.com/in/romiardana/'))
                                    ->helperText(__('Optional LinkedIn links')),
                            ]),

                        Forms\Components\Tabs\Tab::make('Status')
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label(__('Is Active?'))
                                    ->required()
                                    ->default(true)
                                    ->helperText(__('Determine if a team is active or not')),
                                Forms\Components\DateTimePicker::make('join_at')
                                    ->label(__('Join Date'))
                                    ->required()
                                    ->default(now())
                                    ->helperText(__('Determine when a member joined')),
                            ]),
                    ])
                    ->columns([
                        'sm' => 1,
                        'md' => 2,
                        'lg' => 3,
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__('Image'))
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label(__('Slug'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('age')
                    ->label(__('Age'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label(__('Gender'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label(__('WhatsApp'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('join_at')
                    ->label(__('Join Date'))
                    ->since()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('Is Active?'))
                    ->boolean()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('is_active')
                    ->query(fn (Builder $query) => $query->where('is_active', true))
                    ->label(__('Active Teams')),
                Tables\Filters\QueryBuilder::make()
                    ->constraints([
                        Tables\Filters\QueryBuilder\Constraints\TextConstraint::make('name'),
                        Tables\Filters\QueryBuilder\Constraints\TextConstraint::make('slug'),
                        Tables\Filters\QueryBuilder\Constraints\NumberConstraint::make('age')
                            ->label(__('Filter by Age')),
                        Tables\Filters\QueryBuilder\Constraints\TextConstraint::make('mentor_class')
                            ->label(__('Filter by Mentor Class')),
                        Tables\Filters\QueryBuilder\Constraints\SelectConstraint::make('gender')
                            ->label(__('Filter by Gender'))
                            ->options([
                                'male' => __('Male'),
                                'female' => __('Female'),
                            ])
                            ->multiple(),
                        Tables\Filters\QueryBuilder\Constraints\BooleanConstraint::make('is_active')
                            ->label(__('Active Teams')),
                        Tables\Filters\QueryBuilder\Constraints\DateConstraint::make('join_at'),
                    ])
                    ->constraintPickerColumns(2),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->deferFilters()
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

    public static function getWidgets(): array
    {
        return [
            TeamStats::class,
        ];
    }

    public static function getRelations(): array
    {
        return [];
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
