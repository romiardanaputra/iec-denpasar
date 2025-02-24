<?php

namespace App\Filament\Resources\Feature;

use App\Filament\Resources\Feature\RegistrationScheduleResource\Pages;
use App\Models\Feature\RegistrationSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RegistrationScheduleResource extends Resource
{
    protected static ?string $model = RegistrationSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kelola Murid';

    protected static ?string $navigationLabel = 'Jadwal Kursus Siswa';

    protected static ?string $pluralModelLabel = 'Jadwal Kursus Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('registration_id')
                    ->relationship('registration', 'student_name')
                    ->label('Nama Pendaftar')
                    ->helperText('Pilih nama pendaftar')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false),
                Forms\Components\Select::make('class_schedule_id')
                    ->relationship('classSchedule', 'class_code')
                    ->label('Jadwal Kelas')
                    ->helperText('Pilih jadwal kelas')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->native(false)
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
                Tables\Columns\TextColumn::make('registration.student_name')
                    ->label('Nama Pendaftar')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('classSchedule.class_code')
                    ->label('Kode Kelas')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('classSchedule.program.name')
                    ->label('Nama Program')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('classSchedule.book.book_name')
                    ->label('Nama Buku')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('classSchedule.time.time_code')
                    ->label('Kode Jam Kelas')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return $record->classSchedule->time ? "{$record->classSchedule->time->time_code} ({$record->classSchedule->time->time_start} - {$record->classSchedule->time->time_end})" : '';
                    }),
                Tables\Columns\TextColumn::make('classSchedule.day.day_code')
                    ->label('Kode Hari Kelas')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return $record->classSchedule->day ? "{$record->classSchedule->day->day_code} ({$record->classSchedule->day->day_name})" : '';
                    }),
                Tables\Columns\TextColumn::make('classSchedule.team.name')
                    ->label('Nama Mentor')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
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
            'index' => Pages\ListRegistrationSchedules::route('/'),
            'create' => Pages\CreateRegistrationSchedule::route('/create'),
            'edit' => Pages\EditRegistrationSchedule::route('/{record}/edit'),
        ];
    }
}
