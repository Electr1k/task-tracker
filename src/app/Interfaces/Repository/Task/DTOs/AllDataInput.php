<?php

namespace App\Interfaces\Repository\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;

class AllDataInput extends Data
{
    public function __construct(
        readonly public string|null $title = null,
        readonly public Status|null $status = null,
    ){}
}
