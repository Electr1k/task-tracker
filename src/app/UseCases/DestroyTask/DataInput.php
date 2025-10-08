<?php

namespace App\UseCases\DestroyTask;

use App\Enums\Status;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class DataInput extends Data
{
    public function __construct(
        public readonly int $id,
    ){}
}
