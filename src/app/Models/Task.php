<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

/**
 * Задача
 * @property int $id - PK
 * @property string $title - Название
 * @property string|null $description - Описание
 * @property Status $status - Статус
 */
class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => Status::class,
    ];
}
