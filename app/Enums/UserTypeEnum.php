<?php

namespace App\Enums;

enum UserTypeEnum: int
{
    case ADMIN = 1;
    case USER = 2;

    public function description(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::USER => 'User'
        };
    }
}