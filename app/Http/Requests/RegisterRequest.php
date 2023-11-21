<?php

namespace App\Http\Requests;

class RegisterRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|between:6,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:9',
        ];
    }
}
