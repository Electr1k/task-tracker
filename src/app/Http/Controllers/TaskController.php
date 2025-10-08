<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\IndexRequest;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Resources\TaskResource;
use App\UseCases\FetchTasks\DataInput as FetchTaskDataInput;
use App\UseCases\FetchTasks\Handler as FetchTasksHandler;
use App\UseCases\StoreTask\DataInput as StoreTaskDataInput;
use App\UseCases\StoreTask\Handler as StoreTaskHandler;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{

    public function index(FetchTasksHandler $handler, IndexRequest $request): JsonResource {
        $collection = $handler->handle(FetchTaskDataInput::from($request));

        return TaskResource::collection($collection);
    }

    public function store(StoreTaskHandler $handler, StoreRequest $request): TaskResource
    {
        $dto = $handler->handle(StoreTaskDataInput::from($request));

        return new TaskResource($dto);
    }
}
