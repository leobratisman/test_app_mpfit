<?php
namespace App\Utils\enums;

enum OrderStatus: string
{
    case NEW = 'NEW';
    case DONE = 'DONE';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
