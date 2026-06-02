<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        // If updating a user, make email and password optional
        if ($this->user) {
            $rules['email'] = ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user->id)];
            $rules['password'] = ['nullable', 'confirmed', Rules\Password::defaults()];
        }

        return $rules;
    }

    /**
     * Get the validated data from the request.
     */
    public function validated(): array
    {
        $data = parent::validated();
        
        // Hash password if provided
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        
        return $data;
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
