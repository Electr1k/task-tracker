<?php

namespace App\Interfaces\Repository\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;

class DeleteDataInput extends Data
{
    public function __construct(
        readonly public int $id,
    ){}
}
