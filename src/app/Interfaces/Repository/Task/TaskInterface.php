<?php

namespace App\Interfaces\Repository\Task;

use App\Interfaces\Repository\Task\DTOs\AllDataInput;
use App\Interfaces\Repository\Task\DTOs\TaskDTO;
use Illuminate\Support\Collection;

interface TaskInterface
{

    /** @return Collection<int, TaskDTO> */
    public function getAll(AllDataInput $dataInput): Collection;

}
