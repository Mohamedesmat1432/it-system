<?php

namespace App\Enums;

enum UserStatus: int
{
    case Active = 1;
    case Inactive = 0;

    public function label(): string
    {
        return match ($this) {
            self::Active => __('site.active'),
            self::Inactive => __('site.inactive'),
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Active => 'bg-green-500 text-white',
            self::Inactive => 'bg-gray-500 text-white',
        };
    }

    // public function isActive(): bool
    // {
    //     return $this === self::Active;
    // }
}
