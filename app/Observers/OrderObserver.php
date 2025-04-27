<?php

namespace App\Observers;

use App\Models\Transaction\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        // Cek apakah kolom "status" berubah
        if ($order->isDirty('status')) {
            // Update semua payment yang berelasi
            $order->payments()->update([
                'status' => $this->mapOrderStatusToPaymentStatus($order->status),
            ]);
        }
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }

    protected function mapOrderStatusToPaymentStatus(string $orderStatus): string
    {
        return match ($orderStatus) {
            'pending' => 'PENDING',
            'completed' => 'PAID',
            'cancelled' => 'CANCEL',
            default => 'PENDING', // fallback
        };
    }
}
