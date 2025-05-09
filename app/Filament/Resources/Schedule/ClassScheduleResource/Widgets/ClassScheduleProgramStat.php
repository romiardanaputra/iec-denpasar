<?php

namespace App\Filament\Resources\Schedule\ClassScheduleResource\Widgets;

use App\Models\Schedule\ClassSchedule;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class ClassScheduleProgramStat extends BaseWidget
{
    protected function getStats(): array
    {
        // Ambil jumlah jadwal per program dari database
        $results = ClassSchedule::query()
            ->join('programs', 'programs.program_id', '=', 'class_schedules.program_id')
            ->select(
                'programs.name as program_name',
                DB::raw('count(class_schedules.class_schedule_id) as total')
            )
            ->groupBy('programs.name')
            ->get();

        // Buat Stat untuk setiap program
        $stats = [];

        foreach ($results as $row) {
            $stats[] = Stat::make($row->program_name, $row->total)
                ->description('Jumlah Jadwal')
                ->chart([$row->total])
                ->color('success');
        }

        return $stats;
    }
}
