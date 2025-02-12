<?php

namespace App\Services;

use App\Models\Transaction\Order;
use Exception;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class MidtransService
{
    protected string $serverKey;

    protected string $isProduction;

    protected string $isSanitized;

    protected string $is3ds;

    public function __construct()
    {
        $this->serverKey = config('midtrans.server_key');
        $this->isProduction = config('midtrans.is_production');
        $this->isSanitized = config('midtrans.is_sanitized');
        $this->is3ds = config('midtrans.is_3ds');

        // setup global config midtrans
        Config::$serverKey = $this->serverKey;
        Config::$isProduction = $this->isProduction;
        Config::$isSanitized = $this->isSanitized;
        Config::$is3ds = $this->is3ds;
    }

    public function createSnapToken(Order $order): string
    {
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_id,
                'gross_amount' => $order->total_price,
            ],
            'item_details' => $this->mapItemToDetails($order),
            'customer_details' => $this->getCustomerDetails($order),
        ];

        try {
            return Snap::getSnapToken($params);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function isSignatureKeyVerified(): bool
    {
        $notification = new Notification;
        $localSignatureKey = hash('sha512', $notification->order_id.$notification->status_code.$notification->gross_amount.$this->serverKey);

        return $localSignatureKey === $notification->signature_key;
    }

    public function getOrder(): Order
    {
        $notification = new Notification;

        return Order::where('order_id', $notification->order_id)->first();
    }

    public function getStatus(): string
    {
        $notification = new Notification;
        $transactionStatus = $notification->transaction_status;
        $fraudStatus = $notification->fraud_status;

        return match ($transactionStatus) {
            'capture' => ($fraudStatus == 'accept') ? 'success' : 'pending',
            'settlement' => 'success',
            'deny' => 'failed',
            'cancel' => 'cancel',
            'expire' => 'pending',
            default => 'unknown'
        };
    }

    protected function mapItemToDetails(Order $order): array
    {
        return $order->items()->get()->map(function ($item) {
            return [
                'id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'name' => $item->product_name,
            ];
        })->toArray();
    }

    protected function getCustomerDetails(Order $order): array
    {
        return [
            'name' => 'romi',
            'phone' => '1234',
        ];
    }
}
