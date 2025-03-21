<?php

namespace App\Filament\Resources\Transaction;

use App\Filament\Resources\Transaction\RegistrationResource\Pages;
use App\Filament\Resources\Transaction\RegistrationResource\RelationManagers\ClassSchedulesRelationManager;
use App\Models\Transaction\Registration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-magnifying-glass';

    protected static ?string $navigationGroup = 'Kelola Transaksi';

    protected static ?string $navigationLabel = 'Data Pendaftar Kursus';

    protected static ?string $pluralModelLabel = 'Data Pendaftar Kursus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name', fn ($query) => $query->whereNull('deleted_at'))
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('program_id')
                    ->relationship('program', 'name', fn ($query) => $query->withTrashed())
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('student_name')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('birthplace')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birthdate')
                    ->required(),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->maxLength(1000),
                Forms\Components\TextInput::make('education')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('job')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('market')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('parent_guardian')
                    ->maxLength(255)
                    ->nullable(),
                Forms\Components\Toggle::make('is_visible')
                    ->label('Is Visible'),
                Forms\Components\MultiSelect::make('class_schedules')
                    ->relationship('classSchedules', 'class_code')
                    ->label('Jadwal Kelas')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->required()
                    ->options(function () {
                        return \App\Models\Schedule\ClassSchedule::with('program')
                            ->get()
                            ->mapWithKeys(function ($classSchedule) {
                                return [$classSchedule->class_schedule_id => "{$classSchedule->class_code} ({$classSchedule->program->name})"];
                            });
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return $record->user
                          ? ($record->user->trashed() ? "{$record->user->name} (Deleted)" : $record->user->name)
                          : 'User Not Found';
                    }),
                Tables\Columns\TextColumn::make('program.name')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(fn ($record) => $record->program ? ($record->program->trashed() ? "{$record->program->name} (Deleted)" : $record->program->name) : 'Program not found'),
                Tables\Columns\TextColumn::make('student_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthplace')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('birthdate')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('education')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('job')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('market')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_guardian')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('is_visible')
                    ->sortable(),
                Tables\Columns\TextColumn::make('classSchedules.class_code')
                    ->label('Jadwal Kelas')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return $record->classSchedules->map(function ($classSchedule) {
                            return "{$classSchedule->class_code} ({$classSchedule->program->name})";
                        })->implode(', ');
                    }),
            ])
            ->filters([
            Tables\Filters\Filter::make('is_visible')
                    ->query(fn (Builder $query): Builder => $query->where('is_visible', true)),
            Tables\Filters\SelectFilter::make('user')
                    ->relationship('user', 'name'),
            Tables\Filters\SelectFilter::make('program')
                    ->relationship('program', 'name'),
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
            ClassSchedulesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrations::route('/'),
            'create' => Pages\CreateRegistration::route('/create'),
            'view' => Pages\ViewRegistration::route('/{record}'),
            'edit' => Pages\EditRegistration::route('/{record}/edit'),
        ];
    }
}
