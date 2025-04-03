<?php

namespace App\Filament\Widgets;

use App\Models\Transaction\Order;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Facades\DB;

class OrdersChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Total Order Masuk';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        // Ambil nilai filter startDate dan endDate
        $startDate = $this->filters['startDate'] ?? Carbon::now()->startOfYear();
        $endDate = $this->filters['endDate'] ?? Carbon::now()->endOfYear();

        // Pastikan nilai startDate dan endDate adalah instance Carbon
        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        // Query data order berdasarkan rentang tanggal
        $orders = Order::query()
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Generate semua bulan antara startDate dan endDate
        $months = [];
        $currentMonth = $startDate->copy();
        while ($currentMonth->lte($endDate)) {
            $months[] = $currentMonth->format('Y-m');
            $currentMonth->addMonth();
        }

        // Siapkan data untuk chart
        $data = [];
        foreach ($months as $month) {
            $data[] = $orders->get($month, 0); // Gunakan fallback 0 jika tidak ada data
        }

        // Format labels untuk chart
        $labels = collect($months)->map(function ($month) {
            return Carbon::createFromFormat('Y-m', $month)->format('M'); // Contoh: "Jan", "Feb"
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Order Masuk',
                    'data' => $data,
                    'fill' => 'start',
                ],
            ],
            'labels' => $labels,
        ];
    }
}
