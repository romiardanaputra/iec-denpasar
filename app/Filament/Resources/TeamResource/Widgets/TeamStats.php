<?php

namespace App\Filament\Resources\TeamResource\Widgets;

use App\Filament\Resources\TeamResource\Pages\ListTeams;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TeamStats extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

    protected function getTablePage(): string
    {
        return ListTeams::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('total teams', $this->getPageTableQuery()->count()),
            Stat::make('total active', $this->getPageTableQuery()->where('is_active', 1)->count()),
            Stat::make('total inactive', $this->getPageTableQuery()->where('is_active', 0)->count()),
        ];
    }
}
