<?php

namespace App\Interfaces\Repository\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreDataInput extends Data
{
    public function __construct(
        readonly public string $title,
        readonly public Status $status,
        readonly public string|null $description = null,
    ){}
}
