<?php

namespace App\UseCases\FetchTasks;

use App\Services\Task\DTOs\IndexDataInput as IndexServiceDTO;
use App\Services\Task\TaskService;
use Illuminate\Support\Collection;

readonly class Handler
{
    public function __construct(private TaskService $service){}

    public function handle(DataInput $dataInput): Collection
    {
        $indexServiceDTO = IndexServiceDTO::from($dataInput);

        return DataOutput::collect($this->service->index($indexServiceDTO));
    }
}
