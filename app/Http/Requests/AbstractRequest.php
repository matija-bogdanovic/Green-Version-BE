<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class AbstractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errorResponse = [];

        $errorResponse['errors'] = $validator->errors();

        throw new HttpResponseException(response()->json(
            $errorResponse,
            JsonResponse::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}
