<?php

namespace App\Filament\Resources\Feature;

use App\Filament\Resources\Feature\GradeResource\Pages;
use App\Models\Feature\Grade;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GradeResource extends Resource
{
    protected static ?string $model = Grade::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';

    protected static ?string $navigationGroup = 'Kelola Murid';

    protected static ?string $navigationLabel = 'Input Nilai';

    protected static ?string $pluralModelLabel = 'Input Nilai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('registration_id')
                    ->label('Registration')
                    ->relationship('registration', 'student_name')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('level_name')
                    ->label('Level Name')
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('badge_grade')
                    ->label('Badge Grade')
                    ->required(),
                Forms\Components\TextInput::make('reading_grade')
                    ->label('Reading Grade')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('listening_grade')
                    ->label('Listening Grade')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('speaking_grade')
                    ->label('Speaking Grade')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('average_grade')
                    ->label('Average Grade')
                    ->numeric()
                    ->required(),
                Forms\Components\Textarea::make('strong_area')
                    ->label('Strong Area')
                    ->required(),
                Forms\Components\Textarea::make('improvement_area')
                    ->label('Improvement Area')
                    ->required(),
                Forms\Components\Textarea::make('weak_area')
                    ->label('Weak Area')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration.student_name')
                    ->label('Student Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('level_name')
                    ->label('Level Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('badge_grade')
                    ->label('Badge Grade')
                    ->sortable(),
                Tables\Columns\TextColumn::make('reading_grade')
                    ->label('Reading Grade')
                    ->sortable(),
                Tables\Columns\TextColumn::make('listening_grade')
                    ->label('Listening Grade')
                    ->sortable(),
                Tables\Columns\TextColumn::make('speaking_grade')
                    ->label('Speaking Grade')
                    ->sortable(),
                Tables\Columns\TextColumn::make('average_grade')
                    ->label('Average Grade')
                    ->sortable(),
                Tables\Columns\TextColumn::make('strong_area')
                    ->label('Strong Area')
                    ->sortable(),
                Tables\Columns\TextColumn::make('improvement_area')
                    ->label('Improvement Area')
                    ->sortable(),
                Tables\Columns\TextColumn::make('weak_area')
                    ->label('Weak Area')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('registration_id')
                    ->label('Registration')
                    ->relationship('registration', 'student_name'),
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListGrades::route('/'),
            'create' => Pages\CreateGrade::route('/create'),
            'view' => Pages\ViewGrade::route('/{record}'),
            'edit' => Pages\EditGrade::route('/{record}/edit'),
        ];
    }
}
