<?php

namespace Tests\Feature;

use App\Enums\Status;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class FetchTasksTest extends AbstractApiTest
{

    private const string ENDPOINT = '/api/v1/tasks';

    public static function validListParamsDataProvider(): iterable
    {
        return [
            [[]],
            [['title' => 'Task']],
            [['status' => 'success']],
            [['status' => 'success', 'title' => 'Task']],
        ];
    }

    public static function invalidListParamsDataProvider(): iterable
    {
        return [
            [['title' => 234]],
            [['status' => 'asfg']],
            [['status' => 1234]],
        ];
    }


    #[DataProvider('validListParamsDataProvider')]
    public function testFetchTasks(array $body): void {

        $tasks = Task::factory()->count(5)->create();
        $tasks->first()->update(['status' => Status::SUCCESS]);

        $expectedCount = Task::query()
            ->when(isset($body['title']), fn($query) => $query->whereLike('title', $body['title'] . '%'))
            ->when(isset($body['status']), fn($query) => $query->where('status', $body['status']))
            ->count();

        $this->json('GET', self::ENDPOINT, $body)
            ->assertOk()
            ->assertJsonCount($expectedCount, 'data');
    }

    #[DataProvider('invalidListParamsDataProvider')]
    public function testInvalidFetchTasks(array $body): void {
        $this->json('GET', self::ENDPOINT, $body)
            ->assertStatus(422);
    }
}
