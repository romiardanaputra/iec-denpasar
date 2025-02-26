<?php

namespace App\Filament\Widgets;

use App\Models\Transaction\Order;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Number;

class StatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null) ?
          Carbon::parse($this->filters['startDate']) :
          null;
        $endDate = ! is_null($this->filters['endDate'] ?? null) ?
          Carbon::parse($this->filters['endDate']) :
          now();

        $query = Order::query()
            ->when($startDate, fn (Builder $query) => $query->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn (Builder $query) => $query->whereDate('created_at', '<=', $endDate));

        $totalRevenue = $query->sum('total_price');
        $newCustomers = $query->distinct('user_id')->count('user_id');
        $newOrders = $query->count();

        $formatNumber = function (int|float $number): string {
            if ($number < 1000) {
                return (string) Number::format($number, 0);
            }
            if ($number < 1000000) {
                return Number::format($number / 1000, 2).'k';
            }

            return Number::format($number / 1000000, 2).'m';
        };

        return [
            Stat::make('Pendapatan', 'IDR '.$formatNumber($totalRevenue))
                ->description('Based on selected period')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),
            Stat::make('Pendaftar baru', $formatNumber($newCustomers))
                ->description('Based on selected period')
                ->chart([17, 16, 14, 15, 14, 13, 12])
                ->color('primary'),
            Stat::make('Order baru', $formatNumber($newOrders))
                ->description('Based on selected period')
                ->chart([15, 4, 10, 2, 12, 4, 12])
                ->color('success'),
        ];
    }
}
