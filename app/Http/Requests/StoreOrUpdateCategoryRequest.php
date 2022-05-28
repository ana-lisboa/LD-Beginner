<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrUpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'id' => 'nullable|integer|exists:categories,id',
            'name' => ['required', 'min:3', 'max:255', Rule::unique('categories')->ignore($this->id)],
        ];
    }
}
