<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\IndexRequest;
use App\Http\Resources\TaskResource;
use App\UseCases\FetchTasks\DataInput;
use App\UseCases\FetchTasks\Handler as FetchTasksHandler;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskController extends Controller
{

    public function index(FetchTasksHandler $handler, IndexRequest $request): JsonResource {
        $collection = $handler->handle(DataInput::from($request));

        return TaskResource::collection($collection);
    }
}
