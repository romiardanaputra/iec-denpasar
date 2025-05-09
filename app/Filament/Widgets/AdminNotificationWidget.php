<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;

class AdminNotificationWidget extends Widget
{
    protected static string $view = 'filament.widgets.admin-notification-widget';

    public function mount(): void
    {
        // Tidak perlu logika mount, semua logic di view
    }
}
