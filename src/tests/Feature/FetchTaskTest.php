<?php

namespace Tests\Feature;

use App\Enums\Status;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class FetchTaskTest extends AbstractApiTest
{

    private const string ENDPOINT = '/api/v1/tasks';

    public function testFetchTask(): void {

        $task = Task::factory()->create();

        $this->json('GET', self::ENDPOINT."/$task->id")
            ->assertOk()
            ->assertJson([
                'data' => [
                    'id' => $task->id,
                    'title' => $task->title,
                    'description' => $task->description,
                    'status' => $task->status->title(),
                ]
            ]);
    }

    public function testInvalidFetchTask(): void {
        $this->json('GET', self::ENDPOINT.'/1')
            ->assertStatus(404);
    }
}
