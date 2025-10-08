<?php

namespace App\UseCases\FetchTask;

use App\Enums\Status;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class DataInput extends Data
{
    public function __construct(
        public readonly int $id,
    ){}
}
