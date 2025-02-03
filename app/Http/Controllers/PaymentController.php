<?php

namespace App\Http\Controllers;

use App\Services\MidtransService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function midtransCallback(Request $request, MidtransService $midtransService)
    {
        if ($midtransService->isSignatureKeyVerified()) {
            $order = $midtransService->getOrder();

            if ($midtransService->getStatus() == 'success') {
                $order->update([
                    'status' => 'processing',
                    'payment_status' => 'paid',
                ]);

                $lastPayment = $order->payments()->latest()->first();
                $lastPayment->update([
                    'status' => 'PAID',
                    'paid_at' => now(),
                ]);
            }

            if ($midtransService->getStatus() == 'pending') {
                // lakukan sesuatu jika pembayaran masih pending, seperti mengirim notifikasi ke customer
                // bahwa pembayaran masih pending dan harap selesai pembayarannya

                $order->update([
                    'status' => 'pending',
                    'payment_status' => 'unpaid',
                ]);

            }

            if ($midtransService->getStatus() == 'expire') {
                // lakukan sesuatu jika pembayaran expired, seperti mengirim notifikasi ke customer
                // bahwa pembayaran expired dan harap melakukan pembayaran ulang

                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'expired',
                ]);
            }

            if ($midtransService->getStatus() == 'cancel') {
                // lakukan sesuatu jika pembayaran dibatalkan
                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'cancelled',
                ]);
            }

            if ($midtransService->getStatus() == 'failed') {
                // lakukan sesuatu jika pembayaran gagal
                $order->update([
                    'status' => 'failed',
                    'payment_status' => 'failed',
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }
    }
}
