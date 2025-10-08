<?php

namespace App\UseCases\UpdateTask;

use App\Services\Task\DTOs\TaskDTO as TaskServiceDTO;
use App\Services\Task\TaskService;

readonly class Handler
{
    public function __construct(private TaskService $service){}

    public function handle(DataInput $dataInput): DataOutput
    {
        $indexServiceDTO = TaskServiceDTO::from($dataInput);

        return DataOutput::from($this->service->update($indexServiceDTO));
    }
}
