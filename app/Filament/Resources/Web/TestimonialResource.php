<?php

namespace App\Filament\Resources\Web;

use App\Filament\Resources\Web\TestimonialResource\Pages;
use App\Models\Web\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kelola Testimonial';

    protected static ?string $navigationGroup = 'Kelola Halaman Website';

    protected static ?string $pluralModelLabel = 'Kelola Testimonial';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Nama'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('position')
                    ->label(__('Posisi'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('testimony')
                    ->label(__('Testimoni'))
                    ->required(),
                Forms\Components\FileUpload::make('image_path')
                    ->label(__('Gambar'))
                    ->directory('assets/images/testimonials')
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Nama')),
                Tables\Columns\TextColumn::make('position')
                    ->label(__('Posisi')),
                Tables\Columns\ImageColumn::make('image_path')
                    ->label(__('Gambar')),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('position')
                    ->label(__('Posisi'))
                    ->options(Testimonial::distinct()->pluck('position', 'position')->toArray())
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTestimonials::route('/'),
        ];
    }
}
