<?php

namespace App\Filament\Resources\Web;

use App\Filament\Resources\Web\FaqResource\Pages;
use App\Models\Web\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kelola FAQ';

    protected static ?string $navigationGroup = 'Kelola Halaman Website';

    protected static ?string $pluralModelLabel = 'FAQ';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->label(__('Pertanyaan'))
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Masukkan pertanyaan')),
                Forms\Components\Textarea::make('answer')
                    ->label(__('Jawaban'))
                    ->required()
                    ->placeholder(__('Masukkan jawaban')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label(__('Pertanyaan'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('answer')
                    ->label(__('Jawaban'))
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('Dibuat Pada'))
                    ->dateTime('d M Y H:i:s')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('Diperbarui Pada'))
                    ->dateTime('d M Y H:i:s')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('question')
                    ->label(__('Pertanyaan')),
                Tables\Filters\Filter::make('answer')
                    ->label(__('Jawaban')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->iconButton(),
                Tables\Actions\EditAction::make()->iconButton(),
                Tables\Actions\DeleteAction::make()->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageFaqs::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
