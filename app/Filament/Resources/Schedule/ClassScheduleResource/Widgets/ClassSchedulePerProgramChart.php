<?php

namespace App\Filament\Resources\Schedule\ClassScheduleResource\Widgets;

use App\Models\Schedule\ClassSchedule;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class ClassSchedulePerProgramChart extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Jadwal Per Program';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Ambil jumlah jadwal per program
        $data = ClassSchedule::query()
            ->join('programs', 'programs.program_id', '=', 'class_schedules.program_id')
            ->select(
                'programs.name as program_name',
                DB::raw('count(class_schedules.class_schedule_id) as total')
            )
            ->groupBy('programs.name')
            ->get();

        return [
            'labels' => $data->pluck('program_name'),
            'datasets' => [
                [
                    'label' => 'Jumlah Jadwal',
                    'data' => $data->pluck('total'),
                    'backgroundColor' => '#36A2EB',
                    'borderColor' => '#9BD0F5',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Bisa diganti ke 'pie', 'doughnut', dll.
    }
}
