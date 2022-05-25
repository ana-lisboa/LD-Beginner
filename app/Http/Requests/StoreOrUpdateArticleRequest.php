<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrUpdateArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'id' => 'nullable|integer|exists:articles,id',
            'title' => ['required', 'min:3', 'max:255', Rule::unique('articles')->ignore($this->id)],
            'full_text' => 'required|min:3',
            'image' => 'sometimes|image|max:2048',
        ];
    }
}
