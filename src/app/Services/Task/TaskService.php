<?php

namespace App\Services\Task;

use App\Interfaces\Repository\Task\DTOs\IndexDataInput as IndexRepositoryDTO;
use App\Interfaces\Repository\Task\DTOs\StoreDataInput as StoreRepositoryDTO;
use App\Interfaces\Repository\Task\DTOs\TaskDTO as RepositoryTaskDTO;
use App\Interfaces\Repository\Task\TaskInterface;
use App\Services\Task\DTOs\IndexDataInput;
use App\Services\Task\DTOs\StoreDataInput;
use App\Services\Task\DTOs\TaskDTO;
use Illuminate\Support\Collection;

class TaskService
{

    public function __construct(protected TaskInterface $repository){}

    public function index(IndexDataInput $dataInput): Collection
    {
        $repositoryDataInput = IndexRepositoryDTO::from($dataInput);
        $repositoryCollection = $this->repository->index($repositoryDataInput);

        return TaskDTO::collect($repositoryCollection);
    }

    public function store(StoreDataInput $taskDTO): TaskDTO
    {
        $repositoryDataInput = StoreRepositoryDTO::from($taskDTO);
        $dto = $this->repository->store($repositoryDataInput);

        return TaskDTO::from($dto);
    }
}
