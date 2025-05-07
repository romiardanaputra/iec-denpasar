<?php

namespace App\Enums;

enum SlotClassStatus: string
{
    case Available = 'available';
    case Full = 'full';

    public static function options(): array
    {
        return [
            self::Available->value => 'Available',
            self::Full->value => 'Full',
        ];
    }
}
