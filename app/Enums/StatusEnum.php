<?php

namespace App\Enums;

enum StatusEnum: int
{
    case OPEN = 1;
    case IN_PROGRESS = 2;
    case ON_HOLD = 3;
    case DONE = 4;
    case CLOSED = 5;

    public function description(): string
    {
        return match ($this) {
            self::OPEN => 'Open',
            self::IN_PROGRESS => 'In Progress',
            self::ON_HOLD => 'On Hold',
            self::DONE => 'Done',
            self::CLOSED => 'Closed',
        };
    }
}