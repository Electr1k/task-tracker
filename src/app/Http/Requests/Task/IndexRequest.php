<?php

namespace App\Http\Requests\Task;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => ['bail', 'string', 'min:1', 'max:255'],
            'status' => ['bail', 'string', Rule::in(Status::values())],
        ];
    }
}
