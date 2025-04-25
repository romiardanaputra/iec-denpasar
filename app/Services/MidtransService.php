<?php

namespace App\Services;

use App\Models\Transaction\Order;
use Exception;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

class MidtransService
{
    protected string $serverKey;

    protected string $isProduction;

    protected string $isSanitized;

    protected string $is3ds;

    /**
     * MidtransService constructor.
     *
     * Menyiapkan konfigurasi Midtrans berdasarkan pengaturan yang ada di file konfigurasi.
     */
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

    /**
     * Membuat snap token untuk transaksi berdasarkan data order.
     *
     * @param  Order  $order  Objek order yang berisi informasi transaksi.
     * @return string Snap token yang dapat digunakan di front-end untuk proses pembayaran.
     *
     * @throws Exception Jika terjadi kesalahan saat menghasilkan snap token.
     */
    public function createSnapToken(Order $order): string
    {

        // $itemDetails = $this->mapItemToDetails($order);
        // $totalAmount = array_sum(array_map(function ($item) {
        //   return $item['price'] * $item['quantity'];
        // }, $itemDetails));

        // if ($totalAmount !== $order->total_price) {
        //   throw new Exception('Total amount mismatch between order and item details');
        // }
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_id,
                'gross_amount' => $order->total_price,
            ],
            'item_details' => $this->mapItemToDetails($order),
            'customer_details' => $this->getCustomerDetails($order),
        ];

        Log::info('Isi midtrans params: '.json_encode($params));

        try {
            Log::info('generate snapnya');

            return Snap::getSnapToken($params);
        } catch (Exception $e) {
            Log::error('Failed to create snap token: '.$e->getMessage());
            throw new Exception('Failed to create snap token');
        }
    }

    /**
     * Memvalidasi apakah signature key yang diterima dari Midtrans sesuai dengan signature key yang dihitung di server.
     *
     * @return bool Status apakah signature key valid atau tidak.
     */
    public function isSignatureKeyVerified(): bool
    {
        // Membuat signature key lokal dari data notifikasi
        $notification = new Notification;
        $localSignatureKey = hash('sha512', $notification->order_id.$notification->status_code.$notification->gross_amount.$this->serverKey);

        // Memeriksa apakah signature key valid
        return $localSignatureKey === $notification->signature_key;
    }

    /**
     * Mendapatkan data order berdasarkan order_id yang ada di notifikasi Midtrans.
     *
     * @return Order Objek order yang sesuai dengan order_id yang diterima.
     */
    public function getOrder(): Order
    {
        $notification = new Notification;

        return Order::where('order_id', $notification->order_id)->first();
    }

    /**
     * Mendapatkan status transaksi berdasarkan status yang diterima dari notifikasi Midtrans.
     *
     * @return string Status transaksi ('success', 'pending', 'expire', 'cancel', 'failed').
     */
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

    /**
     * Memetakan item dalam order menjadi format yang dibutuhkan oleh Midtrans.
     *
     * @param  Order  $order  Objek order yang berisi daftar item.
     * @return array Daftar item yang dipetakan dalam format yang sesuai.
     */
    protected function mapItemToDetails(Order $order): array
    {

        $items = $order->items()->get();

        return $items->map(function ($item) {
            return [
                'id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->quantity,
                'name' => $item->program->name,
            ];
        })->toArray();
    }

    /**
     * Mendapatkan informasi customer dari order.
     * Data ini dapat diambil dari relasi dengan tabel lain seperti users atau tabel khusus customer.
     *
     * @param  Order  $order  Objek order yang berisi informasi tentang customer.
     * @return array Data customer yang akan dikirim ke Midtrans.
     */
    protected function getCustomerDetails(Order $order): array
    {
        $user = $order->user;

        if (! $user) {
            Log::error('User not found for order ID: '.$order->order_id);
            throw new Exception('User not found for this order');
        }

        return [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
        ];
    }
}
