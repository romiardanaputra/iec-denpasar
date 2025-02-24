<?php

namespace App\Filament\Resources\Schedule;

use App\Filament\Resources\Program\ProgramResource\RelationManagers\ClassScheduleRelationManager;
use App\Filament\Resources\Schedule\ClassScheduleResource\Pages;
use App\Models\Program\Book;
use App\Models\Program\Program;
use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassSchedule;
use App\Models\Schedule\ClassTimeCode;
use App\Models\Team;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class ClassScheduleResource extends Resource
{
    protected static ?string $model = ClassSchedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Kelola Jadwal Less';

    protected static ?string $navigationLabel = 'Jadwal Kelas';

    protected static ?string $pluralModelLabel = 'Jadwal Kelas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('program_id')
                    ->relationship('program', 'name')
                    ->label('Nama program')
                    ->helperText('Pilih nama program untuk ditampilkan pada jadwal')
                    ->required()
                    ->options(Program::pluck('name', 'program_id')->toArray())
                    ->searchable()
                    ->native(false),

                Select::make('book_id')
                    ->relationship('book', 'book_name')
                    ->label('Nama buku')
                    ->helperText('Nama buku mengikuti program dan level')
                    ->searchable()
                    ->options(Book::pluck('book_name', 'book_id')->toArray())
                    ->native(false)
                    ->required()
                    ->afterStateUpdated(function (Set $set, Get $get) {
                        self::generateClassCode($set, $get);
                    }),

                Select::make('time_code_id')
                    ->required()
                    ->relationship('time', 'time_code')
                    ->label('Kode jam kelas')
                    ->searchable()
                    ->options(
                        ClassTimeCode::query()
                            ->orderBy('time_start')
                            ->get()
                            ->map(function ($timeCode) {
                                return [
                                    'value' => $timeCode->time_code_id,
                                    'label' => "{$timeCode->time_code} ({$timeCode->time_start} - {$timeCode->time_end})",
                                ];
                            })
                            ->pluck('label', 'value')
                            ->toArray()
                    )
                    ->helperText('Kode jam mengacu pada standarisasi IEC Denpasar')
                    ->native(false)
                    ->afterStateUpdated(function (Set $set, Get $get) {
                        self::generateClassCode($set, $get);
                    }),

                Select::make('day_code_id')
                    ->required()
                    ->relationship('day', 'day_code')
                    ->label('Kode hari kelas')
                    ->helperText('kode waktu mengacu pada standarisasi IEC Denpasar')
                    ->searchable()
                    ->options(
                        ClassDayCode::query()
                            ->orderBy('day_code_id')
                            ->get()
                            ->map(function ($dayCode) {
                                return [
                                    'value' => $dayCode->day_code_id,
                                    'label' => "{$dayCode->day_code} ({$dayCode->day_name})",
                                ];
                            })
                            ->pluck('label', 'value')
                            ->toArray()
                    )
                    ->native(false)
                    ->afterStateUpdated(function (Set $set, Get $get) {
                        self::generateClassCode($set, $get);
                    }),
                Select::make('team_id')
                    ->required()
                    ->relationship('team', 'name')
                    ->label('Nama Mentor')
                    ->helperText('Pilih nama mentor')
                    ->searchable()
                    ->options(Team::pluck('name', 'team_id')->toArray())
                    ->native(false),

                TextInput::make('class_code')
                    ->label('Kode Kelas (per hari)')
                    ->helperText('Kode digenerate secara otomatis oleh sistem')
                    ->disabled()
                    ->unique(ClassSchedule::class)
                    ->placeholder('Kode digenerate secara otomatis oleh sistem!')
                    ->dehydrated(),
            ])
            ->columns(2);
    }

    protected static function generateClassCode(Set $set, Get $get)
    {
        $dayCodeId = $get('day_code_id');
        $bookId = $get('book_id');
        $timeCodeId = $get('time_code_id');

        Log::info("dayCodeId: $dayCodeId, bookId: $bookId, timeCodeId: $timeCodeId");

        if ($dayCodeId && $bookId && $timeCodeId) {
            $dayCode = ClassDayCode::find($dayCodeId);
            $book = Book::find($bookId);
            $timeCode = ClassTimeCode::find($timeCodeId);

            Log::info('dayCode: '.($dayCode ? $dayCode->day_code : 'null'));
            Log::info('book: '.($book ? $book->book_code : 'null'));
            Log::info('timeCode: '.($timeCode ? $timeCode->time_code : 'null'));

            if ($dayCode && $book && $timeCode) {
                $dayCodePart = strtoupper(substr($dayCode->day_code, 0, 2));
                $bookNamePart = strtoupper(substr($book->book_code, 0, 3));
                $timeCodePart = strtoupper(substr($timeCode->time_code, 0, 1));
                $classCode = $dayCodePart.$bookNamePart.$timeCodePart;
                Log::info("classCode: $classCode");
                $set('class_code', $classCode);
            } else {
                $set('class_code', '');
            }
        } else {
            $set('class_code', '');
        }
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('program.name')
                    ->label('Nama Program')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('book.book_name')
                    ->label('Nama Buku')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('time.time_code')
                    ->label('Kode Jam Kelas')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return $record->time ? "{$record->time->time_code} ({$record->time->time_start} - {$record->time->time_end})" : '';
                    }),
                TextColumn::make('day.day_code')
                    ->label('Kode Hari Kelas')
                    ->sortable()
                    ->searchable()
                    ->getStateUsing(function ($record) {
                        return $record->day ? "{$record->day->day_code} ({$record->day->day_name})" : '';
                    }),
                TextColumn::make('class_code')
                    ->label('Kode Kelas')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('team.name')
                    ->label('Nama Mentor')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([

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
            ClassScheduleRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageClassSchedules::route('/'),
        ];
    }

    public static function getView(): ?string
    {
        return 'filament.class-schedule.show';
    }
}
