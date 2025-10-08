<?php

namespace App\Builders\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;

class FilterDataInput extends Data
{
    public function __construct(
        readonly public string|null $title = null,
        readonly public Status|null $status = null,
    ){}
}
