<?php

namespace App\UseCases\UpdateTask;

use App\Enums\Status;
use Spatie\LaravelData\Data;

class DataOutput extends Data
{
    public function __construct(
        readonly public int $id,
        readonly public string $title,
        readonly public Status $status,
        readonly public string|null $description,
    ){}
}
