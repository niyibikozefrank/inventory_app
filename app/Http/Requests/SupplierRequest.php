<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
        $supplierId = $this->route('supplier')?->id;
        
        return [
            'name' => 'required|string|max:255' . ($supplierId ? '|unique:suppliers,name,' . $supplierId : '|unique:suppliers,name'),
            'contact_person' => 'required|string|max:255',
            'email' => 'required|email' . ($supplierId ? '|unique:suppliers,email,' . $supplierId : '|unique:suppliers,email'),
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'Supplier Name',
            'contact_person' => 'Contact Person',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
        ];
    }
}
