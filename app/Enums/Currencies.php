<?php

namespace App\Enums;

enum Currencies: string
{
    case BYN = 'BYN';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
