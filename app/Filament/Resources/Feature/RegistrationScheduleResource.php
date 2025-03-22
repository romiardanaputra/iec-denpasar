<?php

namespace App\Filament\Resources\Feature;

use App\Filament\Resources\Feature\RegistrationScheduleResource\Pages;
use App\Models\Feature\RegistrationSchedule;
use App\Models\Schedule\ClassSchedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                Forms\Components\Section::make('Informasi Murid Pendaftar')
                    ->schema([
                        Forms\Components\Select::make('registration_id')
                            ->relationship('registration', 'student_name')
                            ->label('Nama Pendaftar')
                            ->helperText('Pilih nama pendaftar')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->native(false),
                    ]),
                Forms\Components\Section::make('Informasi Jadwal Kelas')
                    ->schema([
                        Forms\Components\Select::make('class_schedule_id')
                            ->relationship('classSchedule', 'class_code')
                            ->label('Jadwal Kelas')
                            ->helperText('Pilih jadwal kelas')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->debounce()
                            ->native(false)
                            ->options(function () {
                                return ClassSchedule::with('program', 'book', 'time', 'day', 'team')
                                    ->get()
                                    ->mapWithKeys(function ($classSchedule) {
                                        return [$classSchedule->class_schedule_id => "{$classSchedule->class_code} ({$classSchedule->program->name})"];
                                    });
                            })
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if ($state) {
                                    $classSchedule = ClassSchedule::find($state);
                                    if ($classSchedule && $classSchedule->book) {
                                        $set('book_name', '('.$classSchedule->book->book_code.') '.$classSchedule->book->book_name);
                                    }
                                    if ($classSchedule && $classSchedule->time) {
                                        $set('time_class', '('.$classSchedule->time->time_code.') '.$classSchedule->time->time_start.' - '.$classSchedule->time->time_end);
                                    }
                                    if ($classSchedule && $classSchedule->day) {
                                        $set('day_class', '('.$classSchedule->day->day_code.') '.$classSchedule->day->day_name);
                                    }
                                }
                            }),

                        Forms\Components\TextInput::make('book_name')
                            ->label('Nama Buku')
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Buku sesuai dengan jadwal kelas yang dipilih'),
                        Forms\Components\TextInput::make('time_class')
                            ->label('Jam')
                            ->helperText('Jam/waktu sesuai dengan jadwal kelas yang dipilih')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\TextInput::make('day_class')
                            ->label('Hari')
                            ->disabled()
                            ->dehydrated(false)
                            ->helperText('Hari sesuai dengan jadwal kelas yang dipilih'),
                    ]),
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
            Tables\Filters\TrashedFilter::make(),
            Tables\Filters\SelectFilter::make('registration_id')
                    ->label('Pendaftar')
                    ->relationship('registration', 'student_name'),
            Tables\Filters\SelectFilter::make('class_schedule_id')
                    ->label('Jadwal Kelas')
                    ->relationship('classSchedule', 'class_code'),
        ])
            ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\ViewAction::make(),
            Tables\Actions\RestoreAction::make(),
            Tables\Actions\ForceDeleteAction::make(),
        ])
            ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
            ]),
        ])
            ->query(
                fn (): Builder => RegistrationSchedule::query()
                    ->with(['registration', 'classSchedule.program', 'classSchedule.book', 'classSchedule.time', 'classSchedule.day', 'classSchedule.team'])
            );
    }

    public static function getRelations(): array
    {
        return [];
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
