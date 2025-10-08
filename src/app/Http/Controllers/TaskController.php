<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\IndexRequest;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Resources\TaskResource;
use App\UseCases\FetchTasks\DataInput as FetchTasksDataInput;
use App\UseCases\FetchTasks\Handler as FetchTasksHandler;
use App\UseCases\FetchTask\DataInput as FetchTaskDataInput;
use App\UseCases\FetchTask\Handler as FetchTaskHandler;
use App\UseCases\StoreTask\DataInput as StoreTaskDataInput;
use App\UseCases\StoreTask\Handler as StoreTaskHandler;
use App\UseCases\UpdateTask\DataInput as UpdateTaskDataInput;
use App\UseCases\UpdateTask\Handler as UpdateTaskHandler;
use App\UseCases\DestroyTask\DataInput as DestroyTaskDataInput;
use App\UseCases\DestroyTask\Handler as DestroyTaskHandler;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class TaskController extends Controller
{

    public function index(FetchTasksHandler $handler, IndexRequest $request): JsonResource {
        $collection = $handler->handle(FetchTasksDataInput::from($request->validated()));

        return TaskResource::collection($collection);
    }

    public function show(int $id, FetchTaskHandler $handler): TaskResource
    {
        $dto = $handler->handle(new FetchTaskDataInput($id));
        return new TaskResource($dto);
    }

    public function store(StoreTaskHandler $handler, StoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $dto = $handler->handle(StoreTaskDataInput::from($request->validated()));

        return response()->json(new TaskResource($dto), Response::HTTP_CREATED);
    }

    public function update(int $id, UpdateTaskHandler $handler, UpdateRequest $request): TaskResource
    {
        $dto = $handler->handle(UpdateTaskDataInput::from(['id' => $id, ...$request->validated()]));

        return new TaskResource($dto);
    }

    public function destroy(int $id, DestroyTaskHandler $handler): \Illuminate\Http\JsonResponse
    {
        $isSuccess = $handler->handle(new DestroyTaskDataInput($id));

        return response()->json(Response::HTTP_NO_CONTENT);
    }
}
