<?php

namespace App\Filament\Resources\Web;

use App\Filament\Resources\Web\TestimonialResource\Pages;
use App\Models\Web\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Kelola Testimonial';

    protected static ?string $navigationGroup = 'Kelola Halaman Website';

    protected static ?string $pluralModelLabel = 'Testimonials';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('Nama'))
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Masukkan nama')),
                Forms\Components\TextInput::make('position')
                    ->label(__('Posisi'))
                    ->required()
                    ->maxLength(255)
                    ->placeholder(__('Masukkan posisi')),
                Forms\Components\Textarea::make('testimony')
                    ->label(__('Testimoni'))
                    ->required()
                    ->placeholder(__('Masukkan testimoni')),
                Forms\Components\FileUpload::make('image_path')
                    ->label(__('Gambar'))
                    ->directory('assets/images/testimonials')
                    ->image()
                    ->required()
                    ->placeholder(__('Unggah gambar')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label(__('Gambar'))
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__('Nama'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->label(__('Posisi'))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('testimony')
                    ->label(__('Testimoni'))
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
                Tables\Filters\Filter::make('date_range')
                    ->label('Rentang Tanggal')
                    ->form([
                        Forms\Components\DatePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->placeholder('Pilih tanggal mulai'),
                        Forms\Components\DatePicker::make('end_date')
                            ->label('Tanggal Akhir')
                            ->placeholder('Pilih tanggal akhir'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['start_date'], fn ($query, $start) => $query->whereDate('created_at', '>=', $start))
                            ->when($data['end_date'], fn ($query, $end) => $query->whereDate('created_at', '<=', $end));
                    }),
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
            'index' => Pages\ManageTestimonials::route('/'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::$model::count();
    }
}
