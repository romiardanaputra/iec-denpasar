<?php

namespace App\Filament\Resources\Feature;

use App\Filament\Resources\Feature\GradeResource\Pages;
use App\Models\Feature\Grade;
use App\Models\Transaction\Registration;
use App\Models\User;
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

    protected static ?string $navigationLabel = 'Nilai Siswa';

    protected static ?string $pluralModelLabel = 'Nilai Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Siswa')
                    ->schema([
                        Forms\Components\Select::make('registration_id')
                            ->label('Nama Siswa')
                            ->helperText('Nama akun siswa yang didaftarkan oleh pengguna website')
                            ->options(
                                Registration::query()
                                    ->with('program')
                                    ->get()
                                    ->mapWithKeys(function ($registration) {
                                        return [
                                            $registration->id => "{$registration->student_name} ({$registration->program->name})",
                                        ];
                                    })
                            )
                            ->afterStateUpdated(function ($state, Forms\Set $set) {
                                if ($state) {
                                    $registration = Registration::find($state);
                                    // dd($registration->program->name);
                                    if ($registration && $registration->user) {
                                        $set('user_id', $registration->user->id);
                                    }
                                    if ($registration && $registration->program) {
                                        $set('program_name', $registration->program->name);
                                    } else {
                                        $set('program_name', null);
                                    }
                                }
                            })
                            ->required()
                            ->debounce()
                            ->searchable(),
                        Forms\Components\TextInput::make('program_name')
                            ->label('Nama Program')
                            ->helperText('Program yang sedang diambil')
                            ->disabled()
                            ->dehydrated(false),
                        Forms\Components\Select::make('user_id')
                            ->label('Nama Akun Pengguna')
                            ->helperText('Nama akun pengguna yang terdaftar pada website')
                            ->options(User::query()->pluck('name', 'id'))
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->searchable(),
                    ]),
                Forms\Components\Section::make('Detail Nilai')
                    ->schema([
                    Forms\Components\ToggleButtons::make('level_name')
                            ->label('Level ke')
                            ->inline()
                            ->options([
                                'Level 1' => 1,
                                'Level 2' => 2,
                                'Level 3' => 3,
                                'Level 4' => 4,
                                'Level 5' => 5,
                                'Level 6' => 6,
                            ])
                            ->required(),
                    Forms\Components\ToggleButtons::make('badge_grade')
                            ->label('Status Badge Nilai')
                            ->inline()
                            ->options([
                                'need improvement' => 'Need Improvement',
                                'good' => 'Good',
                                'excellent' => 'Excellent',
                            ])
                            ->required(),
                    Forms\Components\Grid::make(4)
                            ->schema([
                                Forms\Components\TextInput::make('reading_grade')
                                    ->label('Nilai Membaca')
                                    ->helperText('Input nilai value dari 0-100')
                                    ->maxValue(100)
                                    ->minValue(0)
                                    ->numeric()
                                    ->afterStateUpdated(fn ($state, Forms\Get $get, Forms\Set $set) => static::calculateAverageGrade($get, $set))
                                    ->debounce()
                                    ->required(),
                                Forms\Components\TextInput::make('listening_grade')
                                    ->label('Nilai Mendengarkan')
                                    ->helperText('Input nilai value dari 0-100')
                                    ->maxValue(100)
                                    ->minValue(0)
                                    ->numeric()
                                    ->debounce()
                                    ->afterStateUpdated(fn ($state, Forms\Get $get, Forms\Set $set) => static::calculateAverageGrade($get, $set))
                                    ->required(),
                                Forms\Components\TextInput::make('speaking_grade')
                                    ->label('Nilai Berbicara')
                                    ->helperText('Input nilai value dari 0-100')
                                    ->maxValue(100)
                                    ->minValue(0)
                                    ->numeric()
                                    ->debounce()
                                    ->afterStateUpdated(fn ($state, Forms\Get $get, Forms\Set $set) => static::calculateAverageGrade($get, $set))
                                    ->required(),

                                Forms\Components\TextInput::make('writing_grade')
                                    ->label('Nilai Menulis')
                                    ->helperText('Input nilai value dari 0-100')
                                    ->maxValue(100)
                                    ->minValue(0)
                                    ->numeric()
                                    ->debounce()
                                    ->afterStateUpdated(fn ($state, Forms\Get $get, Forms\Set $set) => static::calculateAverageGrade($get, $set))
                                    ->required(),
                            ]),
                    Forms\Components\TextInput::make('average_grade')
                            ->label('Rata-rata nilai')
                            ->numeric()
                            ->dehydrated()
                            ->disabled()
                            ->required(),
                ]),
                Forms\Components\Section::make('Komentar')
                    ->schema([
                    Forms\Components\RichEditor::make('strong_area')
                            ->label('Strong Area')
                            ->helperText('Kelebihan dari siswa pada jenjang level')
                            ->required(),
                    Forms\Components\RichEditor::make('improvement_area')
                            ->label('Improvement Area')
                            ->helperText('Hal yang dapat di improve dari siswa pada jenjang level')
                            ->required(),
                    Forms\Components\RichEditor::make('weak_area')
                            ->label('Weak Area')
                            ->helperText('Hal yang sangat perlu diperhatikan (kekurangan) dari siswa pada jenjang level')
                            ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('registration.student_name')
                    ->label('Nama Siswa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Akun Pengguna')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration.program.name')
                    ->label('Program')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('level_name')
                    ->label('Level ke')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('badge_grade')
                    ->label('Status Badge Nilai')
                    ->sortable(),
                Tables\Columns\TextColumn::make('reading_grade')
                    ->label('Nilai Membaca')
                    ->sortable(),
                Tables\Columns\TextColumn::make('listening_grade')
                    ->label('Nilai Mendengar')
                    ->sortable(),
                Tables\Columns\TextColumn::make('speaking_grade')
                    ->label('Nilai Berbicara')
                    ->sortable(),
                Tables\Columns\TextColumn::make('average_grade')
                    ->label('Rata-rata nilai')
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
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\MultiSelectFilter::make('registration_id')
                    ->label('Registration')
                    ->preload()
                    ->relationship('registration', 'student_name'),
                Tables\Filters\MultiSelectFilter::make('user_id')
                    ->label('User')
                    ->preload()
                    ->relationship('registration.user', 'name'),
                Tables\Filters\MultiSelectFilter::make('program_id')
                    ->label('program')
                    ->preload()
                    ->relationship('registration.program', 'name'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    protected static function calculateAverageGrade(Forms\Get $get, Forms\Set $set)
    {
        $readingGrade = (float) ($get('reading_grade') ?? 0);
        $listeningGrade = (float) ($get('listening_grade') ?? 0);
        $speakingGrade = (float) ($get('speaking_grade') ?? 0);
        $writingGrade = (float) ($get('writing_grade') ?? 0);

        // Calculate the average grade
        $averageGrade = ($readingGrade + $listeningGrade + $speakingGrade + $writingGrade) / 4;

        // Set the calculated average grade
        $set('average_grade', round($averageGrade, 2));
    }

    public static function getRelations(): array
    {
        return [];
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

    public static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
