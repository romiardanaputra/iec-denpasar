<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PaymentMethod: string implements HasColor, HasIcon, HasLabel
{
    case Online = 'online';
    case Cash = 'cash';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function getLabels(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function getOptions(): array
    {
        return array_combine(self::getValues(), self::getLabels());
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::Online => 'Online',
            self::Cash => 'Cash',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Online => 'primary',
            self::Cash => 'success',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Online => 'heroicon-o-credit-card',
            self::Cash => 'heroicon-o-banknotes',
        };
    }
}
