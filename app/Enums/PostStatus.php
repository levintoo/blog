<?php

namespace App\Enums;

enum PostStatus: Int
{
    case PUBLIC = 0;
    case UNLISTED = 1;

    public static function getValueName(int $value): ?string
    {
        foreach (self::cases() as $case) {
            if ($case->value === $value) {
                return strtolower($case->name);
            }
        }
        return null;
    }
}
