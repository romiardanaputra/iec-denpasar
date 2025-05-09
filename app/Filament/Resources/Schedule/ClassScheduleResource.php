<?php

namespace App\Filament\Resources\Schedule;

use App\Enums\SlotClassStatus;
use App\Filament\Resources\Schedule\ClassScheduleResource\Pages;
use App\Filament\Resources\Schedule\ClassScheduleResource\RelationManagers\RegistrationRelationManager;
use App\Filament\Resources\Schedule\ClassScheduleResource\Widgets\ClassSchedulePerProgramChart;
use App\Filament\Resources\Schedule\ClassScheduleResource\Widgets\ClassScheduleProgramStat;
use App\Models\Program\Book;
use App\Models\Schedule\ClassDayCode;
use App\Models\Schedule\ClassSchedule;
use App\Models\Schedule\ClassTimeCode;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\MultiSelectFilter;
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
                Section::make()
                    ->schema([
                        Select::make('program_id')
                            ->relationship('program', 'name')
                            ->label('Nama Program')
                            ->helperText('Pilih nama program untuk ditampilkan pada jadwal')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->live()
                            ->native(false),

                        // BUKU
                        Select::make('book_id')
                            ->relationship('book', 'book_name')
                            ->label('Nama Buku')
                            ->helperText('Nama buku mengikuti program dan level')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->live()
                            ->native(false)
                            ->afterStateUpdated(fn (Set $set) => $set('class_code', null))
                            ->afterStateUpdated(fn (Set $set, Get $get) => self::generateClassCode($set, $get)),

                        // WAKTU KELAS
                        Select::make('time_code_id')
                            ->relationship('time', 'time_code')
                            ->label('Kode Jam Kelas')
                            ->helperText('Kode jam mengacu pada standarisasi IEC Denpasar')
                            ->required()
                            ->options(
                                ClassTimeCode::query()
                                    ->orderBy('time_start')
                                    ->get()
                                    ->map(fn ($timeCode) => [
                                        'value' => $timeCode->time_code_id,
                                        'label' => "{$timeCode->time_code} ({$timeCode->time_start} - {$timeCode->time_end})",
                                    ])
                                    ->pluck('label', 'value')
                                    ->toArray()
                            )
                            ->searchable()
                            ->live()
                            ->native(false)
                            ->afterStateUpdated(fn (Set $set) => $set('class_code', null))
                            ->afterStateUpdated(fn (Set $set, Get $get) => self::generateClassCode($set, $get)),

                        // HARI KELAS
                        Select::make('day_code_id')
                            ->relationship('day', 'day_code')
                            ->label('Kode Hari Kelas')
                            ->helperText('Kode waktu mengacu pada standarisasi IEC Denpasar')
                            ->required()
                            ->options(
                                ClassDayCode::query()
                                    ->orderBy('day_code_id')
                                    ->get()
                                    ->map(fn ($dayCode) => [
                                        'value' => $dayCode->day_code_id,
                                        'label' => "{$dayCode->day_code} ({$dayCode->day_name})",
                                    ])
                                    ->pluck('label', 'value')
                                    ->toArray()
                            )
                            ->searchable()
                            ->live()
                            ->native(false)
                            ->afterStateUpdated(fn (Set $set) => $set('class_code', null))
                            ->afterStateUpdated(fn (Set $set, Get $get) => self::generateClassCode($set, $get)),

                        // MENTOR
                        Select::make('team_id')
                            ->relationship('team', 'name')
                            ->label('Nama Mentor')
                            ->helperText('Pilih nama mentor')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->live()
                            ->native(false),

                        // SLOT
                        TextInput::make('slot')
                            ->label('Slot Kelas')
                            ->helperText('Slot kelas mengacu pada kapasitas kelas')
                            ->numeric()
                            ->required(),

                        // STATUS SLOT
                        ToggleButtons::make('slot_status')
                            ->label('Status Slot')
                            ->inline()
                            ->default('available')
                            ->options(SlotClassStatus::class)
                            ->required()
                            ->disabled()
                            ->dehydrated(true),

                        // KODE KELAS
                        TextInput::make('class_code')
                            ->label('Kode Kelas (per hari)')
                            ->helperText('Kode digenerate secara otomatis oleh sistem')
                            ->disabled()
                            ->unique(ClassSchedule::class, ignorable: fn (?ClassSchedule $record) => $record)
                            ->placeholder('Kode digenerate secara otomatis!')
                            ->dehydrated(),
                    ])->columns(2),
            ]);
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
            ->defaultSort('created_at', 'desc')
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

                TextColumn::make('total_registrations')
                    ->label('Jumlah Pendaftar')
                    ->sortable(),

                TextColumn::make('slot')
                    ->label('Slot Kelas')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slot_status')
                    ->colors([
                        'success' => SlotClassStatus::Available->value,
                        'danger' => SlotClassStatus::Full->value,
                    ])
                    ->badge()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                MultiSelectFilter::make('program')
                    ->label('Program')
                    ->relationship('program', 'name')
                    ->preload()
                    ->searchable(),
                MultiSelectFilter::make('book')
                    ->label('Buku')
                    ->relationship('book', 'book_name')
                    ->preload()
                    ->searchable(),
                MultiSelectFilter::make('time')
                    ->label('Kode Jam Kelas')
                    ->relationship('time', 'time_code')
                    ->preload()
                    ->searchable(),
                MultiSelectFilter::make('day')
                    ->label('Kode Hari Kelas')
                    ->relationship('day', 'day_code')
                    ->preload()
                    ->searchable(),
                MultiSelectFilter::make('team')
                    ->label('Mentor')
                    ->relationship('team', 'name')
                    ->preload()
                    ->searchable(),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),

                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RegistrationRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            // 'index' => Pages\ManageClassSchedules::route('/'),
            'index' => Pages\ListClassSchedules::route('/'),
            'create' => Pages\CreateClassSchedule::route('/create'),
            'edit' => Pages\EditClassSchedule::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            // ClassSchedulePerProgramChart::class,
            ClassScheduleProgramStat::class,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
