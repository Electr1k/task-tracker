<?php

namespace App\Repository;

use App\Builders\Task\DTOs\FilterDataInput;
use App\Interfaces\Repository\Task\DTOs\DeleteDataInput;
use app\Interfaces\Repository\Task\DTOs\IndexDataInput;
use App\Interfaces\Repository\Task\DTOs\ShowDataInput;
use App\Interfaces\Repository\Task\DTOs\StoreDataInput;
use App\Interfaces\Repository\Task\DTOs\TaskDTO;
use APP\Interfaces\Repository\Task\TaskInterface;
use App\Models\Task;
use Illuminate\Support\Collection;

/**
 * Репозиторий заданий (Mysql)
 */
class TaskRepository implements TaskInterface
{

    public function index(IndexDataInput $dataInput): Collection
    {
        $collection = Task::query()
            ->filter(FilterDataInput::from($dataInput))
            ->get();

        return TaskDTO::collect($collection);
    }

    public function show(ShowDataInput $dataInput): TaskDTO
    {
        $model = Task::query()
            ->findOrFail($dataInput->id);

        return TaskDTO::from($model);
    }

    public function store(StoreDataInput $taskDTO): TaskDTO
    {
        $model = Task::query()->create($taskDTO->toArray());

        return TaskDTO::from($model);
    }

    public function update(TaskDTO $taskDTO): TaskDTO
    {
        Task::query()
            ->findOrFail($taskDTO->id)
            ->update($taskDTO->toArray());

        return TaskDTO::from(Task::query()->findOrFail($taskDTO->id));
    }

    public function destroy(DeleteDataInput $taskDTO): bool
    {
        return Task::query()->findOrFail($taskDTO->id)->delete();
    }
}
