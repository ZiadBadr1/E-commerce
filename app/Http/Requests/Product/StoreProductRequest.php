<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'in_stock' => ['required', 'numeric', 'min:0'],
            'is_active' => ['required', 'boolean'],
            'description' => ['required', 'min:3', 'max:255'],
            'discount_precentage' => ['numeric', 'min:0', 'max:100'],
            'category_id' => ['required', 'exists:categories,id'],
            'store_id' => ['required', 'exists:stores,id'],
            'images.*' => ['required', 'image'],
        ];
    }

    public function errors()
    {
        return [
            'in_stock.required' => 'The quantity is required',
        ];
    }
}
