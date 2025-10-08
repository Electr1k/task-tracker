<?php

namespace App\Repository\Task;

use App\Builders\Task\DTOs\FilterDataInput;
use app\Interfaces\Repository\Task\DTOs\AllDataInput;
use App\Interfaces\Repository\Task\DTOs\TaskDTO;
use app\Interfaces\Repository\Task\TaskInterface;
use App\Models\Task;
use Illuminate\Support\Collection;

class TaskRepository implements TaskInterface
{

    public function getAll(AllDataInput $dataInput): Collection
    {
        $collection = Task::query()
            ->filter(FilterDataInput::from($dataInput))
            ->get();

        return TaskDTO::collect($collection);
    }

}
