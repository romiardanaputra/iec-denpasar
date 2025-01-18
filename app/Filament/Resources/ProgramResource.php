<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';

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
                                Forms\Components\MarkdownEditor::make('short_description')->columnSpanFull(),
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
                                    ]),
                        ]),
                        Forms\Components\Section::make('pricing')
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
                    Forms\Components\Section::make('status')
                        ->schema([
                            Forms\Components\Toggle::make('is_visible')
                                    ->label('Visible')
                                    ->helperText('This program will be hidden for all users')
                                    ->default(true),
                            Forms\Components\DatePicker::make('published_at')
                                    ->label('availability')
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
                Tables\Columns\ImageColumn::make('image')
                    ->square(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('register_fee')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_visible')
                    ->boolean()
                    ->label('Visibility')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
        ];
    }
}
