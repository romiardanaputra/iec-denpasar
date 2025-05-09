<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PaymentStatus: string implements HasColor, HasIcon, HasLabel
{
    case Unpaid = 'unpaid';
    case Paid = 'paid';
    case Expired = 'expired';
    case Failed = 'failed';

    public function getLabel(): string
    {
        return match ($this) {
            self::Unpaid => 'unpaid',
            self::Paid => 'paid',
            self::Expired => 'expired',
            self::Failed => 'failed',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Unpaid => 'warning',
            self::Paid => 'success',
            self::Expired => 'danger',
            self::Failed => 'secondary',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::Unpaid => 'heroicon-o-clock',
            self::Paid => 'heroicon-o-check',
            self::Expired => 'heroicon-m-x-circle',
            self::Failed => 'heroicon-m-x-circle',
        };
    }
}
