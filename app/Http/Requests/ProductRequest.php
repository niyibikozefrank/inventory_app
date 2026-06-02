<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $productId = $this->route('product')?->id;
        
        return [
            'name' => 'required|string|max:255' . ($productId ? '|unique:products,name,' . $productId : '|unique:products,name'),
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'unit_price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:100',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'Product Name',
            'description' => 'Description',
            'quantity' => 'Quantity',
            'unit_price' => 'Unit Price',
            'category' => 'Category',
        ];
    }
}
