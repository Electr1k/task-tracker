<?php

namespace App\Interfaces\Repository\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class IndexDataInput extends Data
{
    public function __construct(
        public readonly string|Optional $title = new Optional(),
        public readonly Status|Optional $status = new Optional(),
    ){}
}
