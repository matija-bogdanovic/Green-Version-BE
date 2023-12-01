<?php

namespace App\Http\Requests;

class UpdateUserDataRequest extends AbstractRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|between:6,100',
            'email' => 'nullable|string|email|max:100|unique:users',
            'profile_photo' => 'nullable|string',
        ];
    }
}
