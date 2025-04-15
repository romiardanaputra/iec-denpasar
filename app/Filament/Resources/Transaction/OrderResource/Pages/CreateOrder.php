<?php

namespace App\Filament\Resources\Transaction\OrderResource\Pages;

use App\Filament\Resources\Transaction\OrderResource;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;

    protected function afterCreate()
    {
        $order = $this->record;
        $user = auth()->user();
        Notification::make()
            ->title('Pesanan pendaftar kursus baru')
            ->icon('heroicon-o-shopping-bag')
            ->body("{$order->user?->name} telah memesan {$order->items->count()} program \n nama program : {$order->program?->name} \n dipesan pada: {$order->created_at}")
            ->actions([
                Action::make('View')
                    ->url(OrderResource::getUrl('edit', ['record' => $order])),
            ])
            ->sendToDatabase($user, true);
    }
}
