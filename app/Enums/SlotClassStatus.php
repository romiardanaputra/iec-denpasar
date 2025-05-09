<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum SlotClassStatus: string implements HasColor, HasIcon, HasLabel
{
    case Available = 'available';
    case Full = 'full';

    public function getLabel(): string
    {
        return match ($this) {
            self::Available => 'available',
            self::Full => 'full',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Available => 'success',
            self::Full => 'danger',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Available => 'heroicon-o-check',
            self::Full => 'heroicon-m-x-circle',
        };
    }
}
