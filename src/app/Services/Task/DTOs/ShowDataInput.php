<?php

namespace App\Services\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;

class ShowDataInput extends Data
{
    public function __construct(
        readonly public int $id,
    ){}
}
