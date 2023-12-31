<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:30'],
            'description' => ['required'],
            'parent_id' => ['nullable', 'numeric', 'exists:categories,id'],
            'is_active' => ['required', 'boolean'],
            'image' => ['mimes:png,jpeg,jpg|max:2048'],
        ];
    }
}
