<?php

namespace App\Interfaces\Repository\Task\DTOs;

use App\Enums\Status;
use Spatie\LaravelData\Data;

class TaskDTO extends Data
{
    public function __construct(
        readonly public int $id,
        readonly public string $title,
        readonly public Status $status,
        readonly public string|null $description,
    ){}
}
