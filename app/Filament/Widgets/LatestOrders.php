<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Transaction\OrderResource;
use App\Models\Transaction\Order;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LatestOrders extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(Order::query()->withoutGlobalScope(SoftDeletingScope::class))
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('order_id')
                    ->label('Order ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Customer Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('program.name')
                    ->label('Program Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge(),
                Tables\Columns\TextColumn::make('payment_status')
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
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('open')
                    ->label('View Order')
                    ->url(fn (Order $record): string => OrderResource::getUrl('edit', ['record' => $record]))
                    ->icon('heroicon-m-eye'),
            ]);
    }
}
