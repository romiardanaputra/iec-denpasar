<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Widgets\UserOverview;
use App\Models\User;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Kelola Akses';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationLabel = 'Pengguna';

    protected static ?string $pluralModelLabel = 'Pengguna';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Section::make('User Information')
                            ->schema([
                                TextInput::make('student_card_number')
                                    ->label('Student Card Number (SC Number)')
                                    ->unique(ignoreRecord: true)
                                    ->placeholder('SC-IEC-0001')
                                    ->maxLength(20)
                                    ->disabled(fn ($record) => filled($record?->student_card_number)) // SC Number tidak bisa diubah setelah diset
                                    ->helperText('Masukkan SC Number siswa. Sekali diset, tidak dapat diubah.'),
                                TextInput::make('name')
                                    ->required()
                                    ->minLength(2)
                                    ->maxLength(255),
                                TextInput::make('about')
                                    ->required()
                                    ->minLength(2),
                                TextInput::make('address')
                                    ->required()
                                    ->minLength(2),
                                TextInput::make('email')
                                    ->email()
                                    ->required()
                                    ->unique(User::class, 'email', ignoreRecord: true),
                                TextInput::make('phone')
                                    ->tel()
                                    ->unique(User::class, 'phone', ignoreRecord: true)
                                    ->required(),
                                FileUpload::make('avatar')
                                    ->image()
                                    ->directory('avatars')
                                    ->visibility('public')
                                    ->nullable(),
                            ]),

                        Section::make('Authentication')
                            ->schema([
                                TextInput::make('password')
                                    ->password()
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->dehydrated(fn ($state): bool => filled($state))
                                    ->minLength(8)
                                    ->same('passwordConfirmation'),
                                TextInput::make('passwordConfirmation')
                                    ->password()
                                    ->label('Confirm Password')
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->dehydrated(false),
                            ]),

                        Section::make('Roles')
                            ->schema([
                                Select::make('roles')
                                    ->multiple()
                                    ->relationship('roles', 'name')
                                    ->preload()
                                    ->required(),
                            ]),
                    ]),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('roles.name')
                    ->label('Roles')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'admin' => 'success',
                        'user' => 'info',
                        // 'tamu' => 'warning',
                    })
                    ->sortable(),
                TextColumn::make('email_verified_at')
                    ->label('Email Verified')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
            Tables\Filters\TrashedFilter::make(),
            SelectFilter::make('roles')
                    ->preload()
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->label('Filter by Role'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            UserOverview::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
