<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('businessCustomersOnly')
                            ->label('Business Customers Only')
                            ->boolean(),
                        DatePicker::make('startDate')
                            ->label('Start Date')
                            ->maxDate(fn (Get $get) => $get('endDate') ?: now()),
                        DatePicker::make('endDate')
                            ->label('End Date')
                            ->minDate(fn (Get $get) => $get('startDate') ?: now())
                            ->maxDate(now()),
                    ])
                    ->columns(3),
            ]);
    }

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';
}
