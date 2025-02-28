<?php

namespace App\Filament\Widgets;

use App\Models\Transaction\Registration;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class RegistransChart extends ChartWidget
{
    protected static ?string $heading = 'Total Pendaftar Kursus';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $startDate = Carbon::now()->startOfYear();
        $endDate = Carbon::now()->endOfYear();

        $registrations = Registration::query()
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        $months = range(1, 12);
        $data = [];

        foreach ($months as $month) {
            $yearMonth = $startDate->copy()->month($month)->format('Y-m');
            $data[] = $registrations->get($yearMonth, 0);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pendaftar Kursus',
                    'data' => $data,
                    'fill' => 'start',
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
