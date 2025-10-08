<?php

namespace App\Services\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;

class StoreDataInput extends Data
{
    public function __construct(
        readonly public string $title,
        readonly public Status $status,
        readonly public string|null $description = null,
    ){}
}
