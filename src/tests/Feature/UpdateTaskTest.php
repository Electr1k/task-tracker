<?php

namespace Tests\Feature;

use App\Enums\Status;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class UpdateTaskTest extends AbstractApiTest
{

    private const string ENDPOINT = '/api/v1/tasks';

    public static function validListParamsDataProvider(): iterable
    {
        return [
            [['title' => 'Task', 'description' => null, 'status' => Status::SUCCESS->value]],
            [['title' => 'Task', 'description' => 'Absd', 'status' => Status::SUCCESS->value]],
            [['title' => str_repeat('a', 1), 'description' => null, 'status' => Status::SUCCESS->value]],
            [['title' => str_repeat('a', 255), 'description' => null, 'status' => Status::SUCCESS->value]],
            [['title' => 'Task', 'description' => str_repeat('a', 1), 'status' => Status::SUCCESS->value]],
            [['title' => 'Task', 'description' => str_repeat('a', 4096), 'status' => Status::SUCCESS->value]],
        ];
    }

    public static function invalidListParamsDataProvider(): iterable
    {
        return [
            [['description' => null, 'status' => Status::SUCCESS->value]],
            [['title' => 'Task', 'description' => null]],
            [['title' => 'Task', 'description' => null, 'status' => 'abc']],
            [['title' => str_repeat('a', 0), 'description' => null, 'status' => Status::SUCCESS->value]],
            [['title' => str_repeat('a', 256), 'description' => null, 'status' => Status::SUCCESS->value]],
            [['title' => 'Task', 'description' => 12345, 'status' => Status::SUCCESS->value]],
            [['title' => 'Task', 'description' => str_repeat('a', 4097), 'status' => Status::SUCCESS->value]],
            [['title' => 12345, 'description' => null, 'status' => Status::SUCCESS->value]],
            [['title' => 'Task', 'description' => 1234, 'status' => Status::SUCCESS->value]],
            [['title' => 'Task', 'description' => null, 'status' => 1234]],
        ];
    }


    #[DataProvider('validListParamsDataProvider')]
    public function testStoreTask(array $body): void {
        $task = Task::factory()->create($body);

        $this->json('PUT', self::ENDPOINT."/$task->id", $body)
            ->assertOk();

        $this->assertArrayIsIdenticalToArrayOnlyConsideringListOfKeys($body, $task->fresh()->toArray(), array_keys($body));
        $this->assertDatabaseCount('tasks', 1);
    }

    #[DataProvider('invalidListParamsDataProvider')]
    public function testInvalidStoreTask(array $body): void {
        $task = Task::factory()->create();

        $this->json('PUT', self::ENDPOINT."/$task->id", $body)
            ->assertStatus(422);
    }

    public function testNotFound(): void {
        $this->json('PUT', self::ENDPOINT."/1", ['title' => 'Task', 'description' => null, 'status' => Status::SUCCESS->value])
            ->assertStatus(404);
    }
}
