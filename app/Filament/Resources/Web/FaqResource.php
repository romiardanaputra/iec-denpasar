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

    protected static ?string $navigationLabel = 'Kelola Faq';

    protected static ?string $navigationGroup = 'Kelola Halaman Website';

    protected static ?string $pluralModelLabel = 'Kelola Faq';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->label(__('Pertanyaan'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('answer')
                    ->label(__('Jawaban'))
                    ->required(),
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
                    ->sortable(),
            ])
            ->filters([
                // Tables\Filters\TextInputFilter::make('question')
                //   ->label(__('Pertanyaan'))
                //   ->placeholder(__('Cari pertanyaan...')),
                // Tables\Filters\TextInputFilter::make('answer')
                //   ->label(__('Jawaban'))
                //   ->placeholder(__('Cari jawaban...')),
            ])
            ->actions([
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
            'index' => Pages\ManageFaqs::route('/'),
        ];
    }
}
