<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait HasCustomBuilder
{
    public function newEloquentBuilder($query): Builder
    {
        $modelName = class_basename(static::class);
        return new (str_replace('Models', 'Builders\\'.$modelName, static::class).'Builder')($query);
    }
}
