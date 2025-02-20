<?php

namespace App\Filament\Resources\Program;

use App\Filament\Resources\Program\ImageResource\Pages;
use App\Models\Program\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Kelola Program';

    protected static ?string $navigationLabel = 'Gambar Detail Program';

    protected static ?string $pluralModelLabel = 'Gambar Detail Program';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('program_id')
                    ->relationship('program', 'name')
                    ->label('Nama Program')
                    ->helperText('Pilih nama program untuk ditampilkan pada gambar')
                    ->required()
                    ->searchable()
                    ->native(false),
                Forms\Components\FileUpload::make('path')
                    ->label('Gambar')
                    ->image()
                    ->required()
                    ->directory('program_images')
                    ->visibility('public')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1080')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeMode('crop')
                    ->helperText('Unggah gambar detail program')
                    ->hint('Unggah gambar dengan resolusi 1920x1080 dan rasio 16:9 untuk hasil terbaik.')
                    ->columnSpanFull(),
            ])
            ->columns(1); // Mengatur kolom menjadi 1 kolom untuk tampilan yang lebih rapi
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('program.name')
                    ->label('Nama Program')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('path')
                    ->label('Gambar')
                    ->circular()
                    ->size(40)
                    ->tooltip(function ($record) {
                        return "<img src='{$record->path}' alt='Gambar Program' style='max-width: 300px; max-height: 300px;' />";
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('program')
                    ->relationship('program', 'name')
                    ->label('Filter by Program')
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}
