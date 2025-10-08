<?php

namespace App\Interfaces\Repository\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ShowDataInput extends Data
{
    public function __construct(
        readonly public int $id,
    ){}
}
