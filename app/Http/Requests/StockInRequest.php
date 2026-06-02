<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockInRequest extends FormRequest
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
        return [
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:500',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'product_id' => 'Product',
            'supplier_id' => 'Supplier',
            'quantity' => 'Quantity',
            'unit_price' => 'Unit Price',
            'notes' => 'Notes',
        ];
    }
}
