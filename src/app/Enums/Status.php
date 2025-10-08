<?php

namespace App\Enums;

use App\Interfaces\HasTitleInterface;
use App\Traits\EnumValues;

enum Status: string implements HasTitleInterface
{
    use EnumValues;

    case SUCCESS = 'success';

    case PENDING = 'pending';

    case WAITING = 'waiting';

    public function title(): string
    {
        return match ($this) {
            self::SUCCESS => __('statuses.success'),
            self::PENDING => __('statuses.pending'),
            self::WAITING => __('statuses.waiting'),
        };
    }
}
