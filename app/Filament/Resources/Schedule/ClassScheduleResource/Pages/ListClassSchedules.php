<?php

namespace App\Filament\Resources\Schedule\ClassScheduleResource\Pages;

use App\Filament\Resources\Schedule\ClassScheduleResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListClassSchedules extends ListRecords
{
    protected static string $resource = ClassScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return ClassScheduleResource::getWidgets();
    }

    public function getTabs(): array
    {
        return [
            'Semua Jadwal' => Tab::make(),

            'Tersedia' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('slot_status', 'available'))
                ->badge(ClassScheduleResource::getModel()::query()
                    ->where('slot_status', 'available')
                    ->count()),

            'Penuh' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('slot_status', 'full'))
                ->badge(ClassScheduleResource::getModel()::query()
                    ->where('slot_status', 'full')
                    ->count()),

        ];
    }
}
