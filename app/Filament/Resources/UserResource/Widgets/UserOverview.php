<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Filament\Resources\UserResource\Pages\ListUsers;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected static ?string $pollingInterval = null;

    protected function getTablePage(): string
    {
        return ListUsers::class;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('total users', $this->getPageTableQuery()->count()),
            Stat::make('verified users', $this->getPageTableQuery()->whereNotNull('email_verified_at')->count()),
            Stat::make('total admins', $this->getPageTableQuery()->whereHas('roles', function ($query) {
                $query->where('name', 'admin');
            })->count()),
        ];
    }
}
