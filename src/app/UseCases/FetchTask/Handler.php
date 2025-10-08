<?php

namespace App\UseCases\FetchTask;

use App\Services\Task\DTOs\ShowDataInput as ShowServiceDTO;
use App\Services\Task\TaskService;

readonly class Handler
{
    public function __construct(private TaskService $service){}

    public function handle(DataInput $dataInput): DataOutput
    {
        $showServiceDTO = ShowServiceDTO::from($dataInput);

        return DataOutput::from($this->service->show($showServiceDTO));
    }
}
