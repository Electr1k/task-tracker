<?php

namespace App\Builders\Task;

use App\Builders\BaseBuilder;
use app\Builders\Task\DTOs\FilterDataInput;
use App\Enums\Status;
use Spatie\LaravelData\Optional;

class TaskBuilder extends BaseBuilder
{

    public function filter(FilterDataInput $dataInput): self
    {
        ! $dataInput->title instanceof Optional && $this->whereTitleLike($dataInput->title);

        ! $dataInput->status instanceof Optional && $this->whereStatus($dataInput->status);

        return $this;
    }

    public function whereTitleLike(string $title): self
    {
        return $this->whereLike('title', "%$title%");
    }

    public function whereStatus(Status $status): self
    {
        return $this->where('status', $status->value);
    }
}
