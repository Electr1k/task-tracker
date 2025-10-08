<?php

namespace App\Http\Requests\Task;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:255'],
            'status' => ['required', 'string', Rule::in(Status::values())],
            'description' => ['nullable', 'string', 'min:1', 'max:4096'],
        ];
    }
}
