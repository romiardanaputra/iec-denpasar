<?php

namespace App\Filament\Widgets;

use App\Models\Transaction\Registration;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Support\Facades\DB;

class RegistransChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected static ?string $heading = 'Total Pendaftar Kursus';

    protected static ?int $sort = 1;

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $startDate = $this->filters['startDate'] ?? Carbon::now()->startOfYear();
        $endDate = $this->filters['endDate'] ?? Carbon::now()->endOfYear();

        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);

        $registrations = Registration::query()
            ->select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"), DB::raw('COUNT(*) as count'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month');

        // Generate all months between the start and end dates
        $months = [];
        $currentMonth = $startDate->copy();
        while ($currentMonth->lte($endDate)) {
            $months[] = $currentMonth->format('Y-m');
            $currentMonth->addMonth();
        }

        // Prepare the data for the chart
        $data = [];
        foreach ($months as $month) {
            $data[] = $registrations->get($month, 0);
        }

        // Format the labels for the chart
        $labels = collect($months)->map(function ($month) {
            return Carbon::createFromFormat('Y-m', $month)->format('M'); // e.g., "Jan", "Feb"
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Pendaftar Kursus',
                    'data' => $data,
                    'fill' => 'start',
                ],
            ],
            'labels' => $labels,
        ];
    }
}
