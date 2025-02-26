<?php

namespace App\Enums;

enum TicketStatus: string
{
    case Open = 'open';
    case InProgress = 'inprogress';
    case Closed = 'closed';

    public function color(): string
    {
        return match ($this) {
            self::Open => 'bg-green-500', // Green for Open
            self::InProgress => 'bg-yellow-500', // Yellow for In Progress
            self::Closed => 'bg-red-500', // Red for Closed
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::Open => __('site.open'),
            self::InProgress => __('site.inprogress'),
            self::Closed => __('site.closed'),
        };
    }
}
