<?php

namespace App\Models;

use App\Builders\Task\TaskBuilder;
use App\Enums\Status;
use App\Traits\HasCustomBuilder;
use Illuminate\Database\Eloquent\Model;

/**
 * Задача
 * @property int $id - PK
 * @property string $title - Название
 * @property string|null $description - Описание
 * @property Status $status - Статус
 *
 * @method static TaskBuilder query()
 */
class Task extends Model
{
    use HasCustomBuilder;

    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];
}
