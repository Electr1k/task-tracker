<?php

namespace Tests\Feature;

use App\Enums\Status;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class DestroyTaskTest extends AbstractApiTest
{

    private const string ENDPOINT = '/api/v1/tasks';

    public function testValidDeleteTask(): void {

        $task = Task::factory()->create();

        $this->json('DELETE', self::ENDPOINT."/$task->id",)
            ->assertNoContent();
    }

    public function testInvalidDeleteTask(): void {
        $this->json('DELETE', self::ENDPOINT.'/1')
            ->assertStatus(404);
    }
}
