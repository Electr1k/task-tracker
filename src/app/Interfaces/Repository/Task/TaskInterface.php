<?php

namespace App\Interfaces\Repository\Task;

use App\Interfaces\Repository\Task\DTOs\IndexDataInput;
use App\Interfaces\Repository\Task\DTOs\TaskDTO;
use Illuminate\Support\Collection;

interface TaskInterface
{

    /** @return Collection<int, TaskDTO> */
    public function index(IndexDataInput $dataInput): Collection;

    public function store(TaskDTO $taskDTO): TaskDTO;

    public function update(TaskDTO $taskDTO): TaskDTO;

}
