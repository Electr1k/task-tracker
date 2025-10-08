<?php

namespace App\Services\Task;

use App\Interfaces\Repository\Task\DTOs\IndexDataInput as IndexRepositoryDTO;
use App\Interfaces\Repository\Task\DTOs\ShowDataInput as ShowRepositoryDTO;
use App\Interfaces\Repository\Task\DTOs\StoreDataInput as StoreRepositoryDTO;
use App\Interfaces\Repository\Task\DTOs\DeleteDataInput as DeleteRepositoryDTO;
use App\Interfaces\Repository\Task\DTOs\TaskDTO as RepositoryTaskDTO;
use App\Interfaces\Repository\Task\TaskInterface;
use App\Services\Task\DTOs\DeleteDataInput;
use App\Services\Task\DTOs\IndexDataInput;
use App\Services\Task\DTOs\ShowDataInput;
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

    public function show(ShowDataInput $dataInput): TaskDTO
    {
        $repositoryDataInput = ShowRepositoryDTO::from($dataInput);
        $dto = $this->repository->show($repositoryDataInput);

        return TaskDTO::from($dto);
    }

    public function store(StoreDataInput $dataInput): TaskDTO
    {
        $repositoryDataInput = StoreRepositoryDTO::from($dataInput);
        $dto = $this->repository->store($repositoryDataInput);

        return TaskDTO::from($dto);
    }

    public function update(TaskDTO $taskDTO): TaskDTO
    {
        $repositoryDataInput = RepositoryTaskDTO::from($taskDTO);
        $dto = $this->repository->update($repositoryDataInput);

        return TaskDTO::from($dto);
    }

    public function destroy(DeleteDataInput $dataInput): bool
    {
        $repositoryDataInput = DeleteRepositoryDTO::from($dataInput);
        return $this->repository->destroy($repositoryDataInput);
    }
}
