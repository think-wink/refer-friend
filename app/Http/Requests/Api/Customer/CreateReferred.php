<?php

namespace App\Http\Requests\Api\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CreateReferred extends FormRequest
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
            'referred' => [
                'required',
                'array',
            ],
            'referred.*.email' => [
                'required',
                'distinct:strict',
                'email',
                'unique:referreds'
            ],
            'referred.*.phone_number' => [
                'required',
                'distinct:strict',
                'digits:10',
                'unique:referreds'
            ],
            'referred.*.first_name' => [
                'required',
                'string',
                'min:2',
                'max:50'
            ],
            'referred.*.last_name' => [
                'required',
                'string',
                'min:2',
                'max:50'
            ]
        ];
    }
}
