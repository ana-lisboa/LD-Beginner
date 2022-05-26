<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrUpdateTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'id' => 'nullable|integer|exists:articles,id',
            'name' => ['required', 'min:3', 'max:255', Rule::unique('tags')->ignore($this->id)],
        ];
    }
}
