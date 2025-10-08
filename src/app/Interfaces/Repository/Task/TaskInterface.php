<?php

namespace App\Interfaces\Repository\Task;

use App\Interfaces\Repository\Task\DTOs\DeleteDataInput;
use App\Interfaces\Repository\Task\DTOs\IndexDataInput;
use App\Interfaces\Repository\Task\DTOs\ShowDataInput;
use App\Interfaces\Repository\Task\DTOs\StoreDataInput;
use App\Interfaces\Repository\Task\DTOs\TaskDTO;
use Illuminate\Support\Collection;

interface TaskInterface
{

    /** @return Collection<int, TaskDTO> */
    public function index(IndexDataInput $dataInput): Collection;

    public function show(ShowDataInput $dataInput): TaskDTO;

    public function store(StoreDataInput $taskDTO): TaskDTO;

    public function update(TaskDTO $taskDTO): TaskDTO;

    public function destroy(DeleteDataInput $taskDTO): bool;
}
