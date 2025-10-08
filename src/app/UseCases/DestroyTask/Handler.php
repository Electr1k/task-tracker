<?php

namespace App\UseCases\DestroyTask;

use App\Services\Task\DTOs\DeleteDataInput as DeleteServiceDTO;
use App\Services\Task\TaskService;

readonly class Handler
{
    public function __construct(private TaskService $service){}

    public function handle(DataInput $dataInput): bool
    {
        $indexServiceDTO = DeleteServiceDTO::from($dataInput);

        return $this->service->destroy($indexServiceDTO);
    }
}
