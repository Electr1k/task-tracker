<?php

namespace App\UseCases\StoreTask;

use App\Services\Task\DTOs\StoreDataInput as StoreServiceDTO;
use App\Services\Task\TaskService;

readonly class Handler
{
    public function __construct(private TaskService $service){}

    public function handle(DataInput $dataInput): DataOutput
    {
        $indexServiceDTO = StoreServiceDTO::from($dataInput);

        return DataOutput::from($this->service->store($indexServiceDTO));
    }
}
