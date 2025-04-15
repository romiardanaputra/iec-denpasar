<?php

namespace App\Filament\Resources\Transaction;

use App\Enums\OrderStatus;
use App\Filament\Resources\Program\ProgramResource;
use App\Filament\Resources\Transaction\OrderResource\Pages;
use App\Filament\Resources\Transaction\OrderResource\RelationManagers;
use App\Filament\Resources\Transaction\OrderResource\Widgets\OrderStats;
use App\Models\Program\Program;
use App\Models\Transaction\Order;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $recordTitleAttribute = 'order_id';

    protected static ?string $navigationGroup = 'Kelola Transaksi';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Data Pesanan Kursus';

    protected static ?string $pluralModelLabel = 'Data Pesanan Kursus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema(static::getDetailsFormSchema())
                            ->columns(2),
                        Forms\Components\Section::make('Order items')
                            ->headerActions([
                                Action::make('reset')
                                    ->modalHeading('Are you sure?')
                                    ->modalDescription('All existing items will be removed from the order.')
                                    ->requiresConfirmation()
                                    ->color('danger')
                                    ->action(fn (Forms\Set $set) => $set('items', [])),
                            ])
                            ->schema([
                                static::getItemsRepeater(),
                            ]),
                    ])
                    ->columnSpan(['lg' => fn (?Order $record) => $record === null ? 3 : 2]),
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn (Order $record): ?string => $record->created_at?->diffForHumans()),
                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn (Order $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn (?Order $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('program.name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('payment_status')
                    ->badge(),
                Tables\Columns\TextColumn::make('payment_method')
                    ->badge(),
                Tables\Columns\TextColumn::make('total_price')
                    ->searchable()
                    ->sortable()
                    ->money('IDR')
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('IDR'),
                    ]),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Order Date')
                    ->date()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->placeholder(fn ($state): string => 'Dec 18, '.now()->subYear()->format('Y')),
                        Forms\Components\DatePicker::make('created_until')
                            ->placeholder(fn ($state): string => now()->format('M d, Y')),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'] ?? null,
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'Order from '.Carbon::parse($data['created_from'])->toFormattedDateString();
                        }
                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Order until '.Carbon::parse($data['created_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    }),
            ])
            ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\RestoreAction::make(),
            Tables\Actions\ForceDeleteAction::make(),
        ])
            ->groupedBulkActions([
            Tables\Actions\DeleteBulkAction::make()
                    ->action(function () {
                        Notification::make()
                            ->title('Now, now, don\'t be cheeky, leave some records for others to play with!')
                            ->warning()
                            ->send();
                    }),
            Tables\Actions\RestoreBulkAction::make(),
            Tables\Actions\ForceDeleteBulkAction::make(),

        ])
            ->groups([
            Tables\Grouping\Group::make('created_at')
                    ->label('Order Date')
                    ->date()
                    ->collapsible(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            // RelationManagers\PaymentsRelationManager::class,
        ];
    }

    public static function getWidgets(): array
    {
        return [
            OrderStats::class,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScope(SoftDeletingScope::class);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['order_id', 'user.name', 'program.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        /** @var Order $record */
        return [
            'User' => optional($record->user)->name,
            'Program' => optional($record->program)->name,
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        /** @var class-string<Model> $modelClass */
        $modelClass = static::$model;

        return (string) $modelClass::where('status', 'pending')->count();
    }

    /** @return Forms\Components\Component[] */
    public static function getDetailsFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('order_id')
                ->default('OR-'.random_int(100000, 999999))
                ->disabled()
                ->dehydrated()
                ->required()
                ->maxLength(32)
                ->unique(Order::class, 'order_id', ignoreRecord: true),
            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->required()
                ->debounce()
                ->preload()
                ->native(false),
            Forms\Components\Select::make('program_id')
                ->relationship('program', 'name')
                ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('total_price', Program::find($state)?->price ?? 0))
                ->searchable()
                ->preload()
                ->debounce()
                ->required(),
            Forms\Components\Select::make('registration_id')
                ->relationship('registration', 'student_name')
                ->searchable()
                ->preload()
                ->debounce()
                ->required(),
            Forms\Components\ToggleButtons::make('status')
                ->inline()
                ->options(OrderStatus::class)
                ->required(),
            Forms\Components\ToggleButtons::make('payment_method')
                ->inline()
                ->options([
                    'cash' => 'Cash',
                    'online' => 'Online',
                ]),
            Forms\Components\ToggleButtons::make('payment_status')
                ->inline()
                ->options([
                    'unpaid' => 'Unpaid',
                    'paid' => 'Paid',
                    'expired' => 'Expired',
                    'cancelled' => 'Cancelled',
                    'failed' => 'Failed',
                ])
                ->required(),
            Forms\Components\TextInput::make('total_price')
                ->numeric()
                ->prefix('IDR')
                ->required(),

            Forms\Components\MarkdownEditor::make('notes')
                ->columnSpan('full'),
        ];
    }

    public static function getItemsRepeater(): Repeater
    {
        return Repeater::make('items')
            ->relationship()
            ->schema([
                Forms\Components\Select::make('program_id')
                    ->label('Program')
                    ->options(Program::query()->pluck('name', 'program_id'))
                    ->required()
                    ->debounce()
                    ->afterStateUpdated(fn ($state, Forms\Set $set) => $set('price', Program::find($state)?->price ?? 0))
                    ->distinct()
                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                    ->columnSpan([
                        'md' => 5,
                    ])
                    ->searchable(),
                Forms\Components\TextInput::make('quantity')
                    ->label('Quantity')
                    ->numeric()
                    ->default(1)
                    ->columnSpan([
                        'md' => 2,
                    ])
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->label('Unit Price')
                    ->disabled()
                    ->prefix('IDR')
                    ->dehydrated()
                    ->numeric()
                    ->required()
                    ->columnSpan([
                        'md' => 3,
                    ]),
            ])
            ->extraItemActions([
                Action::make('openProgram')
                    ->tooltip('Open program')
                    ->icon('heroicon-m-arrow-top-right-on-square')
                    ->url(function (array $arguments, Repeater $component): ?string {
                        $itemData = $component->getRawItemState($arguments['item']);
                        $program = Program::find($itemData['program_id']);
                        if (! $program) {
                            return null;
                        }

                        return ProgramResource::getUrl('edit', ['record' => $program]);
                    }, shouldOpenInNewTab: true)
                    ->hidden(fn (array $arguments, Repeater $component): bool => blank($component->getRawItemState($arguments['item'])['program_id'])),
            ])
          // ->orderColumn('sort')
            ->defaultItems(1)
            ->hiddenLabel()
            ->columns([
            'md' => 10,
        ])
            ->required();
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['user', 'program', 'items']);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
