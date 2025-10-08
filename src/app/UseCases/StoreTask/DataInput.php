<?php

namespace App\UseCases\StoreTask;

use App\Enums\Status;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class DataInput extends Data
{
    public function __construct(
        public readonly string $title,
        public readonly ?string $description,
        public readonly Status $status,
    ){}
}
